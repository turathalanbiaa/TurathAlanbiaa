<?php

namespace App\Http\Controllers;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Support\Facades\Input;

class ApplicationController extends Controller
{
    public static function applications()
    {
        $applications = Events::where("type",EventType::APPLICATIONS)
            ->orderBy("id","DESC")
            ->paginate(6);

        return view("applications.applications")->with(["applications"=>$applications]);
    }

    public function application()
    {
        $id = Input::get("id");
        $application = Events::where("id", $id)
            ->where("type", EventType::APPLICATIONS)
            ->firstOrfail();

        return view("applications.application")->with(["application"=>$application]);
    }
}
