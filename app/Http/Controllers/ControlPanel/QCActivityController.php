<?php

namespace App\Http\Controllers\ControlPanel;

use App\Enum\EventType;
use App\Models\Events;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class QCActivityController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $activities = Events::where("type",EventType::QAMER_CENTER_ACTIVITIES)
                ->where("title","like","%".Input::get("query")."%")
                ->orderBy("title","ASC")
                ->simplePaginate(25);
        } else {
            $activities = Events::where("type",EventType::QAMER_CENTER_ACTIVITIES)
                ->orderBy("date","DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.qcActivity.main")->with(["activities"=>$activities]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $activity = Events::where("id", $id)
            ->where("type",EventType::QAMER_CENTER_ACTIVITIES)
            ->first();

        if (!$activity)
            return ["notFound"=>true];

        $success = $activity->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE QAMER CENTER ACTIVITY", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.qcActivity.create");
    }

    public function validation(Request $request)
    {
        //Validations
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required|file|image|min:0|max:1024',
            'images[]' => 'file|image',
            'date' => 'required'
        ], [
            'title.required' => 'يرجى ادخال عنوان النشاط.',
            'detail.required' => 'يرجى أدخال بعض التفاصيل حول النشاط.',
            'image.required' => 'يرجى رفع الصورة الرئيسية حول النشاط.',
            'image.file' => 'يرجى رفع الصورة الرئيسية حول النشاط.',
            'image.image' => 'انت تحاول رفع ملف ليس بصورة.',
            'image.min' => 'انت تقوم برفع ملف صغير جداً.',
            'image.max' => 'حجم الملف يجب ان لايتعدى 1MB.',
            'images[].file' => 'انت تحاول رفع ملف ليس بصورة.',
            'images[].image' => 'انت تحاول رفع ملف ليس بصورة.',
            'date.required' => 'يرجى ملئ حقل التأريخ.',
        ]);

        //Create New Qamer Center Activity Event.
        $newEvents = new Events();
        $newEvents->title = Input::get("title");
        $newEvents->content = Input::get("detail");
        $newEvents->externalLink = Input::get("externalLink",null);
        $newEvents->videoLink = Input::get("videoLink",null);
        $newEvents->views = 0;
        $newEvents->type = EventType::QAMER_CENTER_ACTIVITIES;
        $newEvents->file = null;
        $newEvents->date = Input::get("date", "");
        $newEvents->save();

        //Main Image for Qamer Center Activity Event.
        $mainImage = $request->all()["image"];

        $path = Storage::putFile("public/qcActivity", $mainImage);
        $newPath = str_replace("public/","",$path);

        $newImage = new Image();
        $newImage->eventId = $newEvents->id;
        $newImage->image = $newPath;
        $newImage->save();

        //Other Images for Activity Event.
        if (isset($request->all()["images"]))
        {
            $images = $request->all()["images"];

            foreach ($images as $image)
            {
                $path = Storage::putFile("public/qcActivity", $image);
                $newPath = str_replace("public/","",$path);

                $newImage = new Image();
                $newImage->eventId = $newEvents->id;
                $newImage->image = $newPath;
                $newImage->save();
            }
        }

        //Return
        return redirect("/ControlPanel/qcActivity/create")->with("CreateActivityMessage","تمت عملية الأضافة بنجاح.");
    }
}
