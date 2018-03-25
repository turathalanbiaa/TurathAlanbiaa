<?php

namespace App\Http\Controllers\ControlPanel;

use App\Enum\EventType;
use App\Models\Events;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $news = Events::where("type",EventType::NEWS)
                ->where("title","like","%".Input::get("query")."%")
                ->orderBy("title","ASC")
                ->simplePaginate(25);
        } else {
            $news = Events::where("type",EventType::NEWS)
                ->orderBy("id","DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.news.main")->with(["allNews"=>$news]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $news = Events::where("id", $id)
            ->where("type",EventType::NEWS)
            ->first();

        if (!$news)
            return ["notFound"=>true];

        $success = $news->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE NEWS", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.news.create");
    }

    public function validation(Request $request)
    {
        //Validations
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|file|image|min:0|max:200',
            'images[]' => 'file|image',
            'date' => 'required'
        ], [
            'title.required' => 'يرجى ادخال عنوان الخبر.',
            'detail.required' => 'يرجى أدخال بعض التفاصيل حول الخبر.',
            'image.required' => 'يرجى رفع الصورة الرئيسية حول الخبر.',
            'image.file' => 'يرجى رفع الصورة الرئيسية حول الخبر.',
            'image.image' => 'انت تحاول رفع ملف ليس بصورة.',
            'image.min' => 'انت تقوم برفع ملف صغير جداً.',
            'image.max' => 'حجم الملف يجب ان لايتعدى 250KB.',
            'images[].file' => 'انت تحاول رفع ملف ليس بصورة.',
            'images[].image' => 'انت تحاول رفع ملف ليس بصورة.',
            'date.required' => 'يرجى ملئ حقل التأريخ.',
        ]);

        //Create New News Event.
        $newEvents = new Events();
        $newEvents->title = Input::get("title");
        $newEvents->content = Input::get("detail");
        $newEvents->externalLink = Input::get("externalLink", null);
        $newEvents->videoLink = Input::get("videoLink", "");
        $newEvents->views = 0;
        $newEvents->type = EventType::NEWS;
        $newEvents->file = null;
        $newEvents->date = Input::get("date", "");
        $newEvents->save();

        //Add This New Event To Event Log
        EventLogController::add($request, "CREATE NEWS", $newEvents->id);

        //Main Image for News Event.
        $mainImage = $request->all()["image"];

        $path = Storage::putFile("public/news", $mainImage);
        $newPath = str_replace("public/","",$path);

        $newImage = new Image();
        $newImage->eventId = $newEvents->id;
        $newImage->image = $newPath;
        $newImage->save();

        //Other Images for News Event.
        if (isset($request->all()["images"]))
        {
            $images = $request->all()["images"];

            foreach ($images as $image)
            {
                $path = Storage::putFile("public/news", $image);
                $newPath = str_replace("public/","",$path);

                $newImage = new Image();
                $newImage->eventId = $newEvents->id;
                $newImage->image = $newPath;
                $newImage->save();
            }
        }

        //Return
        return redirect("/ControlPanel/news/create")->with("CreateNewsMessage","تمت عملية الأضافة بنجاح.");
    }
}
