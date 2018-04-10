<?php

namespace App\Http\Controllers\ControlPanel;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $query = Input::get("query");
            $faqs = FAQ::where("question", "like", "%" . $query . "%")
                ->simplePaginate(25);
        } else {
            $faqs = FAQ::orderBy("id", "DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.faq.main")->with(["faqs"=>$faqs]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $faq = FAQ::where("id", $id)->first();

        if (!$faq)
            return ["notFound"=>true];

        $success = $faq->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE FAQ", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.faq.create");
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
        $faq = new FAQ();
        $faq->question = Input::get("question");
        $faq->answer = Input::get("answer");
        $success = $faq->save();

        if (!$success)
            return redirect("/ControlPanel/faq/create")->with("CreateFAQMessage","لم تتم عملية اضافة سؤال، يرجى اعادة المحاولة.");

        //Add This New Event To Event Log
        EventLogController::add($request, "CREATE FAQ", $faq->id);

        //Return
        return redirect("/ControlPanel/faq/create")->with("CreateFAQMessage","تمت عملية الأضافة بنجاح.");
    }
}
