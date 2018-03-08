<?php

namespace App\Http\Controllers\ControlPanel;

use App\Models\EventLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventLogController extends Controller
{
    public static function add(Request $request, $event , $eventId)
    {
        $row = new EventLog;
        $row->adminUsername = $request->session()->get("Username");
        $row->event = $event;
        $row->eventId = $eventId;
        $row->save();

        return "";
    }
}
