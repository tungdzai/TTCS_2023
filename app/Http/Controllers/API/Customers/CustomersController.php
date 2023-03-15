<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomersResource;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomersController extends Controller
{
    /** get customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomer(): \Illuminate\Http\JsonResponse
    {
        $customer = Auth::guard('customer')->user();
        if ($customer) {
            return response()->json($customer);
        }
        return response()->json(
            ['error' => trans('api.status.error')],
            Response::HTTP_UNAUTHORIZED);

    }

    public function updateCustomer(Request $request, Customers $customers): \Illuminate\Http\JsonResponse
    {
        $customer = Auth::guard('customer')->user();
        $dataUpdate = [
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
            'full_name' => $request->input('full_name'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'province_id' => $request->input('province_id'),
            'district_id' => $request->input('district_id'),
            'commune_id' => $request->input('commune_id'),
        ];
        if ($customer){
            $customer->update($dataUpdate);
            return response()->json([
                $customer
            ],Response::HTTP_OK);
        }
        return response()->json(
            ['error' => trans('api.error.update')],
            Response::HTTP_UNAUTHORIZED);
    }

}
