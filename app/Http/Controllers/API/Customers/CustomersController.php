<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Details;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomersController extends Controller
{
    /** get login customer
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

    public function showCustomer()
    {
        $customer = Auth::guard('customer')->user();
        if ($customer){
            $dataCustomer=[
                'email' => $customer->email,
                'phone' => $customer->phone,
                'birthday' => $customer->birthday,
                'full_name' => $customer->full_name,
                'address' => $customer->address,
                'province_id' => $customer->province_id,
                'district_id' => $customer->district_id,
                'commune_id' => $customer->commune_id,
            ];
            return response()->json($dataCustomer);
        }
        return response()->json(
            ['error' => trans('api.error.show')],
            Response::HTTP_UNAUTHORIZED);
    }

    /** update customer
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCustomer(Request $request): \Illuminate\Http\JsonResponse
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
        if ($customer) {
            $customer->update($dataUpdate);
            return response()->json([
                $customer
            ], Response::HTTP_OK);
        }
        return response()->json(
            ['error' => trans('api.error.update')],
            Response::HTTP_UNAUTHORIZED);
    }

    /** handle purchase
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function purchase(Request $request)
    {
        $product_ids = $request->input('product_ids');
        // Lấy danh sách sản phẩm hết hàng

        $outOfStockProducts = Products::whereIn('id', $product_ids)->where('stock', '=', 0)->get();
        if ($outOfStockProducts->count() > 0) {
            return response()->json([
                'msg' => trans('api.error.product'),
            ]);
        }
        // Giảm số lượng sản phẩm
        Products::whereIn('id', $product_ids)->where('stock', '>', 0)->decrement('stock');
        // Tính tổng số tiền sản phẩm
        $total = Products::whereIn('id', $product_ids)->sum('price');
        //Tạo đơn hàng.
        $order = [
            'customer_id' => Auth::guard('customer')->user()->id,
            'quantity' => count($product_ids),
            'total' => $total
        ];
        $orderId = Orders::insertGetId($order);

        //Tạo chi tiết đơn hàng
        $orderDetails = [];
        $products = Products::whereIn('id', $product_ids)->get();
        foreach ($products as $product) {
            $orderDetails[] = [
                'order_id' => $orderId,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
                'status' => "Đã mua hàng"
            ];
        }

        Details::insert($orderDetails);

        return response()->json([
            'msg' => "Mua thành công ",
        ]);

    }
}
