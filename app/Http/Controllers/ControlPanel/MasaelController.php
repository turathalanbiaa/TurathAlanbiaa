<?php

namespace App\Http\Controllers\ControlPanel;

use App\Models\Masael;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MasaelController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $query = Input::get("query");
            $masaels = Masael::where("question", "like", "%" . $query . "%")
                ->simplePaginate(25);
        } else {
            $masaels = Masael::orderBy("id", "DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.masael.main")->with(["masaels"=>$masaels]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $masael = Masael::where("id", $id)->first();

        if (!$masael)
            return ["notFound"=>true];

        $success = $masael->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE MASAEL", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.masael.create");
    }

    public function validation(Request $request)
    {
        //Validations
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ], [
            'question.required' => 'يرجى ادخال السؤال.',
            'answer.required' => 'يرجى أدخال الجواب.'
        ]);

        //Create New FAQ.
        $masael = new Masael();
        $masael->question = Input::get("question");
        $masael->answer = Input::get("answer");
        $success = $masael->save();

        if (!$success)
            return redirect("/ControlPanel/masael/create")->with("CreateMasaelMessage","لم تتم عملية اضافة سؤال، يرجى اعادة المحاولة.");

        //Add This New Event To Event Log
        EventLogController::add($request, "CREATE MASAEL", $masael->id);

        //Return
        return redirect("/ControlPanel/masael/create")->with("CreateMasaelMessage","تمت عملية الأضافة بنجاح.");
    }
}
