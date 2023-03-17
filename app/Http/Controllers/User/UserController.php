<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserLogin\UserRequest;

class UserController extends Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Users();
    }

    /** View Login user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getLogin()
    {
        return view('auth.user.login');
    }

    /**Handle loginUser
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(UserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("user.category");
        }
        return redirect()->back()->with("error", __('messages.errors.login'));
    }

}
