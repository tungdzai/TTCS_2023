<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\LoginCustomerRequest;

class AuthController extends Controller
{
    /** show view login
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.login.loginCustomer');
    }

    /** check login
     * @param LoginCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginCustomerRequest $request)
    {
        $credentials = [
            'phone' => $request->phone,
            'password' => $request->password,
        ];

        if (!Auth::guard('customer')->attempt($credentials)) {
            return response()->json(
                ['error' => 'Unauthorized'],
                401);
        }
        $customer = Auth::guard('customer')->user();
        $token_customer = $customer->createToken('customer');
        $token = $token_customer->token;
        $token->save();
        return response()->json([
            'access_token' => $token_customer->accessToken,
            'token_type' => 'Bearer',
            'msg' => 'Đăng nhập thành công',
        ], 200);
    }
}
