<?php

namespace App\Http\Controllers\ControlPanel;

use App\Models\SpecialStudents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SpecialStudentController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        if (!is_null(Input::get("query")))
        {
            $query = Input::get("query");
            $students = SpecialStudents::where("name", "like", "%" . $query . "%")
                ->simplePaginate(25);
        } else {
            $students = SpecialStudents::orderBy("year", "DESC")
                ->orderBy("month", "DESC")
                ->simplePaginate(25);
        }

        return view("controlPanel.specialStudent.main")->with(["students"=>$students]);
    }

    public function delete(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        $id = Input::get("id");
        $student = SpecialStudents::where("id", $id)->first();

        if (!$student)
            return ["notFound"=>true];

        $success = $student->delete();
        if (!$success)
        {
            return ["success"=>false];
        }
        else
        {
            EventLogController::add($request, "DELETE SPECIAL STUDENT", $id);
            return ["success"=>true];
        }
    }

    public function create(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        MainController::loginWithCookie($request);

        return view("controlPanel.specialStudent.create");
    }

    public function validation(Request $request)
    {
        //Validations
        $this->validate($request, [
            'name' => 'required',
            'star' => 'required|integer|between:1,5',
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|between:2018,2050'
        ], [
            'name.required' => 'يرجى ادخال اسم الطالب.',
            'star.required' => 'يرجى أدخال تقييم الطالب.',
            'star.integer' => 'يجب ان يكون التقييم ليس رقم عشري.',
            'star.between' => 'يجب ان يكون التقييم يتراوح بين (1-5).',
            'month.required' => 'يرجى اختيار رقم الشهر.',
            'month.integer' => 'يجب ان يكون رقم الشهر ليس رقم عشري.',
            'month.between' => 'يجب ان يكون رقم الشهر بين (1-12).',
            'year.required' => 'يرجى اختيار رقم السنة.',
            'year.integer' => 'يجب ان يكون رقم السنة ليس رقم عشري.',
            'year.between' => 'يجب ان يكون رقم السنة بعد سنة 2018.',
        ]);

        //Create New Special Student.
        $student = new SpecialStudents();
        $student->name = Input::get("name");
        $student->stars = Input::get("star");
        $student->month = Input::get("month");
        $student->year = Input::get("year");
        $student->date = date("Y-m-d");
        $success = $student->save();

        if (!$success)
            return redirect("/ControlPanel/special-student/create")->with("CreateSpecialStudentMessage","لم تتم عملية اضافة الطالب، يرجى اعادة المحاولة.");

        //Add This New Event To Event Log
        EventLogController::add($request, "CREATE SPECIAL STUDENT", $student->id);

        //Return
        return redirect("/ControlPanel/special-student/create")->with("CreateSpecialStudentMessage","تمت عملية الأضافة بنجاح.");
    }
}
