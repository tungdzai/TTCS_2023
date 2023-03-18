<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Password_resets;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Reset\ResetPassRequest;


class ResetPasswordController extends Controller
{
    /** show form reset password
     * @param $token
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function showResetForm($token)
    {
        $passwordReset = Password_resets::where('token', $token)->first();
        if (!$passwordReset) {
            return redirect()->route('auth.forgotPassword')->with('error', __('resetpassword.errors.token'));
        }
        if (Carbon::parse($passwordReset->created_at)->addMinutes(180)->isPast()) {
            Password_resets::where('token', $token)->delete();
            return redirect()->route('auth.forgotPassword')->with('error_time_out', __('resetpassword.errors.time_out'));
        }
        return view('auth.user.reset_pass', [
            'token' => $token,
        ]);
    }

    /** handle reset pass word
     * @param ResetPassRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function handleResetForm(ResetPassRequest $request)
    {

        $passwordReset = Password_resets::where('token', $request->input('token'))->first();
        if (!$passwordReset) {
            return redirect()->route('auth.forgotPassword')->with('error', __('resetpassword.errors.token'));
        }
        $email = $passwordReset->email;

        $statusUpdate = Users::where('email', $email)->update([
            'password' => Hash::make($request->input('password')),
        ]);
        if ($statusUpdate) {
            Password_resets::where('email', $email)->delete();
            return redirect()->route('user.getLogin')->with('successReset', __('resetpassword.success.resetPass'));
        }
    }
}
