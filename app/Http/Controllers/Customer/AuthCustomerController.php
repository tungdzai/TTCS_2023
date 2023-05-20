<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthCustomerController extends Controller
{
    public function login(){
        return view('customer.login.loginCustomer');
    }
}
