<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginCustomerRequest;
use App\Http\Requests\Customer\RegisterCustomerRequest;
use App\Models\Customers;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /** Register Customer
     * @param RegisterCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function register(RegisterCustomerRequest $request)
    {
        $customer = [
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
            'full_name' => $request->input('full_name'),
            'password' => bcrypt($request->input('password')),
            'status' => 'active',
        ];
        $customer_status = Customers::create($customer);
        return response()->json(
            ['success' => trans('api.success.register')],
            Response::HTTP_OK
        );

    }

    /** check login
     * @param LoginCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginCustomerRequest $request)
    {
        $phone = $request->input('phone');
        $password = $request->input("password");

        $customer = Customers::where('phone', $phone)->first();

        if (!$customer || !Hash::check($password, $customer->password)) {
            return response()->json(
                ['error' => trans('api.error.login')],
                Response::HTTP_UNAUTHORIZED);
        } else {
            $customer = Auth::guard('customer')->setUser($customer)->user();
            $token_customer = $customer->createToken('customer');
            $token = $token_customer->token;
            $token->save();
            return response()->json([
                'access_token' => $token_customer->accessToken,
                'token_type' => 'Bearer',
                'success' => trans('api.success.login'),
            ], Response::HTTP_OK);
        }

    }

}


