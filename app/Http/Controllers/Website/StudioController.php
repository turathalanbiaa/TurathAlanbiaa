<?php

namespace App\Http\Controllers\Website;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StudioController extends Controller
{
    public function index()
    {

        if (!is_null(Input::get("id")))
        {
            $showItem = Events::where("type",EventType::STUDIO)
                ->where("id", Input::get("id"))->first();
            self::addViewToVideo($showItem->id);
        }
        else
        {
            $showItem = Events::where("type",EventType::STUDIO)
                ->orderBy("date","DESC")->first();
        }

        $items = Events::where("type",EventType::STUDIO)
            ->where("id", "!=", $showItem->id ?? 0)
            ->orderBy("date","DESC")
            ->simplePaginate(12);

        return view("website.studio.studio")->with([
            "showItem" => $showItem,
            "items" => $items
        ]);
    }

    public static function addViewToVideo($id)
    {
        $video = Events::find($id);
        $video->views = $video->views + 1;
        $success = $video->save();

        return $success;
    }
}
