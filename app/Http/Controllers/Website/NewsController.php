<?php

namespace App\Http\Controllers\Website;

use App\Enum\EventType;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function news()
    {
        if (Input::get("orderBy") == "date")
        {
            $news = Events::where("type",EventType::NEWS)
                ->orderBy("date","DESC")
                ->paginate(12);
        }
        elseif (Input::get("orderBy") == "views")
        {
            $news = Events::where("type",EventType::NEWS)
                ->orderBy("views","DESC")
                ->paginate(12);
        }
        else
        {
            $news = Events::where("type",EventType::NEWS)
                ->orderBy("id","DESC")
                ->paginate(12);
        }

        return view("news.news")->with(["allNews"=>$news]);
    }

    public function singleNews()
    {
        $id = Input::get("id");
        $news = Events::where("id", $id)
            ->where("type", EventType::NEWS)
            ->firstOrfail();

        self::addViewToNews($news->id);

        $allNews = Events::where("type", EventType::NEWS)
            ->orderBy("date","DESC")
            ->paginate(12);

        return view("news.singleNews")->with(["news"=>$news,"allNews"=>$allNews]);
    }

    public static function addViewToNews($id)
    {
        $news = Events::find($id);
        $news->views = $news->views + 1;
        $success = $news->save();

        return $success;
    }
}
