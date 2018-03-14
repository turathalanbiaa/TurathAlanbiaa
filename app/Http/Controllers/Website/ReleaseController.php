<?php

namespace App\Http\Controllers\Website;

use App\Enum\EventType;
use App\Models\Events;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ReleaseController extends Controller
{
    public function releases()
    {
        $releases = Events::where("type",EventType::RELEASES)
            ->orderBy("id","DESC")
            ->simplePaginate(6);

        return view("website.release.releases")->with(["releases"=>$releases]);
    }

    public function download()
    {
        $id = Input::get("id");
        $release = Events::where("id", $id)
            ->where("type", EventType::RELEASES)
            ->firstOrfail();

        $fileName = str_replace("release/file/","",$release->file);

        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/storage/" . $release->file;

        return response()->download($file, $fileName);
    }
}
