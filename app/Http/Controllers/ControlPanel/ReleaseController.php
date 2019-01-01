<?php

namespace App\Http\Controllers\ControlPanel;

use App\Enum\EventType;
use App\Models\Events;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ReleaseController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $releases = Events::where("type",EventType::RELEASES)
                ->where("title","like","%".Input::get("query")."%")
                ->orderBy("title","ASC")
                ->simplePaginate(25);
        } else {
            $releases = Events::where("type",EventType::RELEASES)
                ->orderBy("id","DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.release.main")->with(["releases"=>$releases]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $release = Events::where("id", $id)
            ->where("type",EventType::RELEASES)
            ->first();

        if (!$release)
            return ["notFound"=>true];

        $success = $release->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE RELEASE", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.release.create");
    }

    public function validation(Request $request)
    {
        //Validations
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|file|image|min:0|max:250',
            'file' => 'file|mimes:doc,pdf,docx',
            'date' => 'required'
        ], [
            'title.required' => 'يرجى ادخال اسم الاصدار.',
            'detail.required' => 'يرجى أدخال بعض التفاصيل حول الاصدار.',
            'image.required' => 'يرجى رفع Logo الاصدار.',
            'image.file' => 'يرجى رفع Logo الاصدار.',
            'image.image' => 'انت تحاول رفع صورة(Logo) ليس بصورة.',
            'image.min' => 'انت تقوم برفع صورة صغيرة جداً.',
            'image.max' => 'حجم الصورة يجب ان لايتعدى 250KB.',
            'file.file' => 'انت تحاول رفع ملف ليس (doc,docx,pdf).',
            'file.mimes' => 'انت تحاول رفع ملف ليس (doc,docx,pdf).',
            'date.required' => 'يرجى ملئ حقل التأريخ.',
        ]);

        //Create New Release Event.
        $newEvents = new Events();
        $newEvents->title = Input::get("title");
        $newEvents->content = Input::get("detail");
        $newEvents->externalLink = Input::get("externalLink", null);
        $newEvents->videoLink = Input::get("videoLink", null);;
        $newEvents->views = 0;
        $newEvents->type = EventType::RELEASES;
        $newEvents->file = null;
        $newEvents->date = Input::get("date", "");

        if (isset($request->all()["file"]))
        {
            $file = $request->all()["file"];

            $path = Storage::putFile("public/release/file", $file);
            $newPath = str_replace("public/","",$path);
            $newEvents->file = $newPath;
        }

        $newEvents->save();

        //Add This New Event To Event Log
        EventLogController::add($request, "CREATE RELEASE", $newEvents->id);

        //Main Image for Release Event.
        $mainImage = $request->all()["image"];

        $path = Storage::putFile("public/release", $mainImage);
        $newPath = str_replace("public/","",$path);

        $newImage = new Image();
        $newImage->eventId = $newEvents->id;
        $newImage->image = $newPath;
        $newImage->save();

        //Return
        return redirect("/ControlPanel/release/create")->with("CreateReleaseMessage","تمت عملية الأضافة بنجاح.");
    }
}
