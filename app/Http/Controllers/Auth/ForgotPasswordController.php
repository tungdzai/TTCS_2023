<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Password_resets;
use Illuminate\Support\Carbon;
use App\Mail\ResetPassMail;
use App\Http\Requests\Reset\ForgotRequest;


class ForgotPasswordController extends Controller
{
    /** show form reset password
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function forgotPassword()
    {
        return view('auth.user.forgot');
    }

    /** handle reset pass word
     * @param ForgotRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleForgot(ForgotRequest $request)
    {
        $request->validate([
            'email' => "required|email|exists:users,email"
        ]);
        $email = $request->input('email');

        $user = Users::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', __("resetpassword.errors.url"));
        }
        // Tạo token
        $token = Str::random(60);

        Password_resets::insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $resetUrl = route('auth.reset', ['token' => $token]);
        Mail::to($email)->send(new ResetPassMail($resetUrl));
        return back()->with('success', __('resetpassword.success.url'));
    }
}
