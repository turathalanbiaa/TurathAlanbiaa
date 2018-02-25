<?php

namespace App\Http\Controllers;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public static function applications()
    {
        $applications = Events::where("type",EventType::APPLICATIONS)
            ->orderBy("id","DESC")
            ->paginate(6);

        return view("application.applications")->with(["applications"=>$applications]);
    }
}
