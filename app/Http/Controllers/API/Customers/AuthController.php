<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginCustomerRequest;
use App\Models\Customers;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /** check login
     * @param LoginCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginCustomerRequest $request)
    {
        $phone=$request->input('phone');
        $password=$request->input("password");
        $customer = Customers::where('phone', $phone)->first();

        if (! $customer || ! Hash::check($password, $customer->password)) {
            return response()->json(
                ['error' => 'Số điện thoại hoặc mật khẩu không chính xác !'],
                Response::HTTP_UNAUTHORIZED );
        } else {
            $customer = Auth::guard('customer')->user();
            $token_customer = $customer->createToken('customer');
            $token = $token_customer->token;
            $token->save();
            return response()->json([
                'access_token' => $token_customer->accessToken,
                'token_type' => 'Bearer',
                'msg' => 'Đăng nhập thành công',
            ],   Response::HTTP_OK);
        }

    }
}
