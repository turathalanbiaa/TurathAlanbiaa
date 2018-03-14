<?php

namespace App\Http\Controllers\Website;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ApplicationController extends Controller
{
    public static function applications()
    {
        $applications = Events::where("type",EventType::APPLICATIONS)
            ->orderBy("id","DESC")
            ->simplePaginate(6);

        return view("website.application.applications")->with(["applications"=>$applications]);
    }

    public function application()
    {
        $id = Input::get("id");
        $application = Events::where("id", $id)
            ->where("type", EventType::APPLICATIONS)
            ->firstOrfail();

        $applications = Events::where("type", EventType::APPLICATIONS)
            ->orderBy("date","DESC")
            ->simplePaginate(12);

        return view("website.application.application")->with(["applications"=>$applications, "application"=>$application]);
    }
}
