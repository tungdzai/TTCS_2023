<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /* @return View
     * */
    public function getLogin()
    {
        return view('auth.user.login');
    }

    /* Check authentication of infomation user provided to sign in
     *  @param Request $request
     * @return View
     * */
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route();
        }
        return redirect()->back()->with("error", "Đăng nhập không thành công !");
    }

    /*
     * @return View
     * */
    public function getRegister()
    {
        return view('auth.user.register');
    }
}
