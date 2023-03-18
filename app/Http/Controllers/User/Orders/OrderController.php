<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Details;
use App\Models\Orders;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class OrderController extends Controller
{
    /** show order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function getAllOrder()
    {

        $orders = Orders::select("id", 'customer_id', 'quantity', 'total')->get();
        $data['orders'] = $orders;
        return view("user.orders.order_list", $data);
    }

    /** show detail order
     * @param $order_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function detail(Request $request, $order_id)
    {
        $detail = Orders::select(
            'orders.id as order_id',
            'products.name as product_name',
            'products.avatar as product_avatar',
            'order_details.quantity as order_details_quantity',
            'order_details.price as order_details_price',
        )
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('orders.id', $order_id)
            ->get();

        $customer = Customers::select(
            'customers.email as email_customer',
            'customers.phone as phone_customer',
            'customers.full_name as full_name_customer',
            'province.name as province_name',
            'district.name as district_name',
            'commune.name as commune_name',
            'customers.address as address_customer'
        )
            ->join('province', 'province.id', '=', 'customers.province_id')
            ->join('district', 'district.id', '=', 'customers.district_id')
            ->join('commune', 'commune.id', '=', 'customers.commune_id')
            ->where('customers.id', Orders::find($order_id)->customer_id)
            ->get();
        $request->session()->put('detail', $detail);
        $request->session()->put('customer', $customer);
        $data['details'] = $detail;
        $data['customer'] = $customer;
        return view('user.orders.detail', $data);
    }

    /**handle show bill pdf
     * @return mixed
     */
    public function billPDF()
    {
        $details = session('detail');
        $customer = session('customer');
        if (!$details->isEmpty() && !$details->isEmpty()) {
            $data['details'] = $details;
            $data['customer'] = $customer;
            $pdf = app(PDF::class);
            $pdf->loadView('user.orders.billPDF', $data);
            return $pdf->stream('hoa-don.pdf');
        }
    }
}
