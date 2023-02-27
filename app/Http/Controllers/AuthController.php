<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class AuthController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Admin();
    }

    public function getLogin()
    {
        return view('Auth.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => "Email không được để trống !",
            'email.email' => "Email chưa đúng định dạng!",
            'password.required' => "Password không được để trống",
            "password.min" => "Password phải từ :min kí tự !"
        ];
        $request->validate($rules, $messages);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            dd("Đã pass qua");
        }
    }

    public function getRegister()
    {
        return view("Auth.register");
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'birthday' => 'required',
            'user_name' => 'required|min:8|unique:admin,user_name',
            'email' => 'required|email|unique:admin,email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'first_name.required' => "First Name không được để trống",
            "first_name.min" => "First Name phải từ :min kí tự !",

            'last_name.required' => "Last Name không được để trống!",
            "last_name.min" => "Last Name phải từ :min kí tự !",

            "birthday.required" => "Birthday không được để trống !",

            'user_name.required' => "User không được để trống!",
            "user_name.min" => "User phải từ :min kí tự !",
            'user_name.unique' => 'user đã tồn tại trên hệ thống!',

            'email.required' => "Email không được để trống !",
            'email.email' => "Email chưa đúng định dạng!",
            'email.unique' => 'Email đã tồn tại trên hệ thống !',

            'password.required' => "Password không được để trống",
            "password.min" => "Password phải từ :min kí tự !"
        ];
        $currentDateTime = Date::now();
        $currentDateTimeFormatted = $currentDateTime->format('Y-m-d H:i:s');
        $request->validate($rules, $messages);
        $dataAdmin = [
            $request->first_name,
            $request->last_name,
            $request->birthday,
            $request->user_name,
            $request->email,
            bcrypt($request->password),
            bcrypt('1'),
            'active',
            0,
            $currentDateTimeFormatted
        ];
        $status = $this->model->create($dataAdmin);
        if ($status) {
            return redirect()->route("auth.getLogin")->with("msg", 'Đăng ký thành công');
        } else {
            return redirect()->route("auth.getRegister")->with("msg", 'Lỗi đăng kí .Vui lòng đăng kí lại !');
        }
    }

    public function logout()
    {

    }
}
