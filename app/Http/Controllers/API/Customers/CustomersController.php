<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomersResource;
use App\Models\Customers;
use App\Models\Details;
use App\Models\Orders;
use App\Models\Products;
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

    /** update customer
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCustomer(Request $request): \Illuminate\Http\JsonResponse
    {
        $customer = Auth::guard('customer')->user();
        $customer->update($request->all());
        return response()->json($customer);
    }

    /** handle purchase
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function purchase(Request $request)
    {
        $product_ids = $request->input('product_ids');
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
        foreach ($product_ids as $product_id) {
            $product = Products::find($product_id);

            $orderDetails[] = [
                'order_id' => $orderId,
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ];
        }

        Details::insert($orderDetails);
        return response()->json([
            'msg' => "Mua thành công ",
        ]);

    }


}
