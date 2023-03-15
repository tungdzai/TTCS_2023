<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomersResource;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /** get customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomer(): \Illuminate\Http\JsonResponse
    {
        $customer = Auth::guard('customer')->user();
        return response()->json($customer);
    }

    public function updateCustomer(Request $request): \Illuminate\Http\JsonResponse
    {
        $customer = Auth::guard('customer')->user();
        $dataUpdate=[
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'birthday'=>$request->input('birthday'),
            'full_name'=>$request->input('full_name'),
            'password'=>$request->input('password'),
            'address'=>$request->input('address'),
            'province_id'=>$request->input('province_id'),
            'district_id'=>$request->input('district_id'),
            'commune_id'=>$request->input('commune_id'),
        ];
        $customer->update($dataUpdate);
        return response()->json($customer);
    }


}
