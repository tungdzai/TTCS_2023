<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\LoginCustomerRequest;

class AuthController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.login.loginCustomer');
    }

    public function login(LoginCustomerRequest $request)
    {
//        $passPostCustomer = Customers::where('phone',$request->input('phone'))->first();
//        if ($passPostCustomer->validateForPasspostPasswordGrant($request->input("password"))){
//            return "pass qua";
//        }

//        if (Auth::guard('customer')->attempt($credentials)) {
//            dd("ok");
//            $customer = $request->user('customer');
//            $tokenResult = $customer->createToken('Personal Access Token');
//            $token = $tokenResult->token;
//            $token->save();
//            return response()->json([
//                'access_token' => $token,
//                'token_type' => 'Bearer',
//                'msg'=>'Đăng nhập thành công',
//            ],200);
        }

//        return response()->json([
//            'error' => 'Unauthorized'
//        ], 401);
//    }
}
