<?php

namespace App\Http\Controllers\ControlPanel;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->cookie("SESSION"))
            return redirect("/ControlPanel/login");

        self::loginWithCookie($request);

        return view("controlPanel.main.main");
    }

    public function login(Request $request)
    {
        if ($request->cookie("SESSION"))
            return redirect("/ControlPanel");

        return view("controlPanel.main.login");
    }

    public function validation(Request $request)
    {
        $username = Input::get("username");
        $password = Input::get("password");

        $this->validate($request, [
            'username' => 'required|exists:admin,username',
            'password' => 'required|min:6'
        ], [
            'username.required' => 'يرجى ادخال اسم المستخدم.',
            'username.exists' => 'اسم المستخدم غير موجود.',
            'password.required' => 'يرجى أدخال كلمة المرور.',
            'password.min' => 'يجب ان تكون كلمة المرور لاتقل عن 6 حروف.',
        ]);

        $admin = Admin::where('username','=', $username)->where('password','=', md5($password))->first();

        if (!$admin)
            return redirect('/ControlPanel/login')->with('ErrorRegisterMessage', 'تسجيل الدخول غير صحيح ! يرجى أعادة المحاولة.');

        $session = md5(uniqid());

        $request->session()->put("Admin_ID" , $admin->id);
        $request->session()->put("Name", $admin->name);
        $request->session()->put("Username",$admin->username);
        $admin->session = $session;
        $admin->save();

        return redirect("/ControlPanel")->withCookie(cookie('SESSION' , $session,1000000));
    }

    public static function loginWithCookie(Request $request)
    {
        $session = $request->cookie("SESSION");
        $admin = Admin::where("session",$session)->first();

        if (!$admin)
            return redirect("/ControlPanel/logout");

        $request->session()->put("Admin_ID" , $admin->id);
        $request->session()->put("Name", $admin->name);
        $request->session()->put("Username",$admin->username);

        return "";
    }

    public function logout(Request $request)
    {
        $admin = Admin::where("session", $request->cookie("SESSION"))->first();
        $admin->session = null;
        $admin->save();

        $request->session()->remove("Admin_ID");
        $request->session()->remove("Name");
        $request->session()->remove("Username");
        
        return redirect("/ControlPanel/login")->withCookie(cookie('SESSION' , null , -1));
    }
}
