<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new admin();
    }

    /*
        * @return View
     * */
    public function getLogin()
    {
        return view('auth.admin.login');
    }

    /* Check authentication of infomation admin provided to sign in
        * @param Request
        * @return View
        * */
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::guard('admin')->user();
            Auth::guard("admin")->login($user);
            dd('pass qua ');
        }
        return redirect()->back()->with("error", "Đăng nhập không thành công !");
    }
}
