<?php

namespace App\Http\Controllers;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class QamerCenterActivityController extends Controller
{
    public function activities()
    {
        if (Input::get("orderBy") == "date")
        {
            $activities = Events::where("type",EventType::QAMER_CENTER_ACTIVITIES)
                ->orderBy("date","DESC")
                ->paginate(12);
        }
        elseif (Input::get("orderBy") == "views")
        {
            $activities = Events::where("type",EventType::QAMER_CENTER_ACTIVITIES)
                ->orderBy("views","DESC")
                ->paginate(12);
        }
        else
        {
            $activities = Events::where("type",EventType::QAMER_CENTER_ACTIVITIES)
                ->orderBy("id","DESC")
                ->paginate(12);
        }

        return view("qamerCenterActivity.qamerCenterActivities")->with(["activities"=>$activities]);
    }

    public function singleActivity()
    {
        $id = Input::get("id");
        $activity = Events::where("id", $id)
            ->where("type", EventType::QAMER_CENTER_ACTIVITIES)
            ->firstOrfail();

        self::addViewToActivity($activity->id);

        $allActivities = Events::where("type", EventType::QAMER_CENTER_ACTIVITIES)
            ->orderBy("date","DESC")
            ->paginate(12);

        return view("qamerCenterActivity.singleQamerCenterActivity")->with(["activity"=>$activity,"allActivities"=>$allActivities]);
    }

    public static function addViewToActivity($id)
    {
        $activity = Events::find($id);
        $activity->views = $activity->views + 1;
        $success = $activity->save();

        return $success;
    }
}
