<?php

namespace App\Http\Controllers\Website;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ActivityController extends Controller
{
    public function activities()
    {
        if (Input::get("orderBy") == "date")
        {
            $activities = Events::where("type",EventType::ACTIVITIES)
                ->orderBy("date","DESC")
                ->paginate(12);
        }
        elseif (Input::get("orderBy") == "views")
        {
            $activities = Events::where("type",EventType::ACTIVITIES)
                ->orderBy("views","DESC")
                ->paginate(12);
        }
        else
        {
            $activities = Events::where("type",EventType::ACTIVITIES)
                ->orderBy("id","DESC")
                ->paginate(12);
        }

        return view("activity.activities")->with(["activities"=>$activities]);
    }

    public function singleActivity()
    {
        $id = Input::get("id");
        $activity = Events::where("id", $id)
            ->where("type", EventType::ACTIVITIES)
            ->firstOrfail();

        self::addViewToActivity($activity->id);

        $allActivities = Events::where("type", EventType::ACTIVITIES)
            ->orderBy("date","DESC")
            ->paginate(12);

        return view("activity.singleActivity")->with(["activity"=>$activity,"allActivities"=>$allActivities]);
    }

    public static function addViewToActivity($id)
    {
        $activity = Events::find($id);
        $activity->views = $activity->views + 1;
        $success = $activity->save();

        return $success;
    }
}
