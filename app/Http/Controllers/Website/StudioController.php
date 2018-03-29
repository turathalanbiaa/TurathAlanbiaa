<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudioController extends Controller
{
    public function index()
    {
        return view("website.studio.studio");
    }
}
