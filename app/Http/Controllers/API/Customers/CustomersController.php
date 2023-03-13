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
        $customer->update($request->all());
        return response()->json($customer);
    }


}
