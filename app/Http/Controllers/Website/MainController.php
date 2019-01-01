<?php

namespace App\Http\Controllers\Website;

use App\Enum\EventType;
use App\Models\Events;
use App\Models\FAQ;
use App\Models\Masael;
use App\Models\SpecialStudents;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view("website.main.main")->with([
            "latestNews"=>self::latestNews(),
            "latestActivities"=>self::latestActivities(),
            "latestQamerCenterActivities"=>self::latestQamerCenterActivities(),
            "applications"=>self::application(),
            "releases"=>self::release(),
            "students"=>self::specialStudent(),
            "faqQuestions"=>self::faqQuestions(),
            "masaelQuestions"=>self::masaelQuestions()
        ]);
    }

    public static function latestNews()
    {
        $news = Events::where("type",EventType::NEWS)
            ->orderBy("id","DESC")
            ->take(10)
            ->get();

        return $news;
    }

    public static function latestActivities()
    {
        $activities = Events::where("type",EventType::ACTIVITIES)
            ->orderBy("id","DESC")
            ->take(15)
            ->get();

        return $activities;
    }

    public static function latestQamerCenterActivities()
    {
        $qamerCenterActivities = Events::where("type",EventType::QAMER_CENTER_ACTIVITIES)
            ->orderBy("id","DESC")
            ->take(15)
            ->get();

        return $qamerCenterActivities;
    }

    public static function application()
    {
        $applications = Events::where("type",EventType::APPLICATIONS)
            ->orderBy("id","DESC")
            ->take(6)
            ->get();

        return $applications;
    }

    public static function release()
    {
        $releases = Events::where("type",EventType::RELEASES)
            ->orderBy("id","DESC")
            ->take(8)
            ->get();

        return $releases;
    }

    public static function specialStudent(){
        $month = date("n");
        $year = date("Y");

        $students = SpecialStudents::where("month", $month)
            ->where("year", $year)
            ->OrderBy("stars","DESC")
            ->get();

        return $students;
    }

    public static function faqQuestions()
    {
        $questions = FAQ::orderBy("id","ASC")
            ->take(10)
            ->get();

        return $questions;
    }

    public static function masaelQuestions()
    {
        $questions = Masael::orderBy("id","DESC")
            ->take(10)
            ->get();

        return $questions;
    }
}
