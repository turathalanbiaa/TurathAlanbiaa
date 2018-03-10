<?php

namespace App\Http\Controllers\ControlPanel;

use App\Enum\EventType;
use App\Models\Events;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $applications = Events::where("type",EventType::APPLICATIONS)
                ->where("title","like","%".Input::get("query")."%")
                ->orderBy("title","ASC")
                ->simplePaginate(25);
        } else {
            $applications = Events::where("type",EventType::APPLICATIONS)
                ->orderBy("date","DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.application.main")->with(["applications"=>$applications]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $application = Events::where("id", $id)
            ->where("type",EventType::APPLICATIONS)
            ->first();

        if (!$application)
            return ["notFound"=>true];

        $success = $application->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE APPLICATION", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.application.create");
    }

    public function validation(Request $request)
    {
        //Validations
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|file|image|min:0|max:100',
            'images[]' => 'file|image',
            'date' => 'required'
        ], [
            'title.required' => 'يرجى ادخال اسم التطبيق.',
            'detail.required' => 'يرجى أدخال بعض التفاصيل حول التطبيق.',
            'image.required' => 'يرجى رفع Logo التطبيق.',
            'image.file' => 'يرجى رفع Logo التطبيق.',
            'image.image' => 'انت تحاول رفع ملف ليس بصورة.',
            'image.min' => 'انت تقوم برفع ملف صغير جداً.',
            'image.max' => 'حجم الملف يجب ان لايتعدى 100KB.',
            'images[].file' => 'انت تحاول رفع ملف ليس بصورة.',
            'images[].image' => 'انت تحاول رفع ملف ليس بصورة.',
            'date.required' => 'يرجى ملئ حقل التأريخ.',
        ]);

        //Create New Application Event.
        $newEvents = new Events();

        $googlePlayLink = Input::get("googlePlayLink") ?? "notFound";
        $appleStoreLink = Input::get("appleStoreLink") ?? "notFound";
        $externalLink = $googlePlayLink . "<>" . $appleStoreLink;

        $newEvents->title = Input::get("title");
        $newEvents->content = Input::get("detail");
        $newEvents->externalLink = $externalLink;
        $newEvents->videoLink = Input::get("videoLink",null);
        $newEvents->views = 0;
        $newEvents->type = EventType::APPLICATIONS;
        $newEvents->file = null;
        $newEvents->date = Input::get("date", "");
        $newEvents->save();

        //Add This New Event To Event Log
        EventLogController::add($request, "CREATE APPLICATION", $newEvents->id);

        //Main Image for Application Event.
        $mainImage = $request->all()["image"];

        $path = Storage::putFile("public/application", $mainImage);
        $newPath = str_replace("public/","",$path);

        $newImage = new Image();
        $newImage->eventId = $newEvents->id;
        $newImage->image = $newPath;
        $newImage->save();

        //Other Images for Application Event.
        if (isset($request->all()["images"]))
        {
            $images = $request->all()["images"];

            foreach ($images as $image)
            {
                $path = Storage::putFile("public/application", $image);
                $newPath = str_replace("public/","",$path);

                $newImage = new Image();
                $newImage->eventId = $newEvents->id;
                $newImage->image = $newPath;
                $newImage->save();
            }
        }

        //Return
        return redirect("/ControlPanel/application/create")->with("CreateApplicationMessage","تمت عملية الأضافة بنجاح.");
    }
}
