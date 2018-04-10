<?php

namespace App\Http\Controllers\ControlPanel;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StudioController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $videos = Events::where("type",EventType::STUDIO)
                ->where("title","like","%".Input::get("query")."%")
                ->orderBy("title","ASC")
                ->simplePaginate(25);
        } else {
            $videos = Events::where("type",EventType::STUDIO)
                ->orderBy("id","DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.studio.main")->with(["videos"=>$videos]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $video = Events::where("id", $id)
            ->where("type",EventType::STUDIO)
            ->first();

        if (!$video)
            return ["notFound"=>true];

        $success = $video->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE STUDIO", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.studio.create");
    }

    public function validation(Request $request)
    {
        //Validations
        $this->validate($request, [
            'title' => 'required',
            'videoLink' => 'required',
            'date' => 'required'
        ], [
            'title.required' => 'يرجى ادخال عنوان الفديو.',
            'videoLink.required' => 'يرجى أدخال YouTube Video ID.',
            'date.required' => 'يرجى ملئ حقل التأريخ.'
        ]);

        //Create New Activity Event.
        $newEvents = new Events();
        $newEvents->title = Input::get("title");
        $newEvents->content = null;
        $newEvents->externalLink = null;
        $newEvents->videoLink = Input::get("videoLink");
        $newEvents->views = 0;
        $newEvents->type = EventType::STUDIO;
        $newEvents->file = null;
        $newEvents->date = Input::get("date", "");
        $newEvents->save();

        //Add This New Event To Event Log
        EventLogController::add($request, "CREATE STUDIO", $newEvents->id);

        //Return
        return redirect("/ControlPanel/video/create")->with("CreateVideoMessage","تمت عملية الأضافة بنجاح.");
    }
}
