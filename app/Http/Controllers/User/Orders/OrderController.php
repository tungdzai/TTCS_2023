<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\Controller;
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
        return view("User.Orders.order_list", $data);
    }

    /** show detail order
     * @param $order_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function detail(Request $request,$order_id)
    {
        $detail = Orders::select(
            'orders.id as order_id',
            'customers.email as email_customer',
            'customers.phone as phone_customer',
            'customers.full_name as full_name_customer',
            'products.name as product_name',
            'products.avatar as product_avatar',
            'order_details.quantity as order_details_quantity',
            'order_details.price as order_details_price',

            'province.name as province_name',
            'district.name as district_name',
            'commune.name as commune_name',
            'customers.address as address_customer'
        )
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('province', 'province.id', '=', 'customers.province_id')
            ->join('district', 'district.id', '=', 'customers.district_id')
            ->join('commune', 'commune.id', '=', 'customers.commune_id')
            ->where('orders.id', $order_id)
            ->get();
        $request->session()->put('detail', $detail);
        $data['details']=$detail;
        return view('User.Orders.detail',$data);
    }

    /**handle show bill pdf
     * @return mixed
     */
    public function billPDF(){
        $details=session('detail');
        if ($details->isEmpty()) {
            session()->flash("errorDownload", "Không có sản phẩm nào !");
        }
        $data['details']=$details;
        $pdf = app(PDF::class);
        $pdf->loadView('User.Orders.billPDF', $data);
        return $pdf->stream('hoa-don.pdf');
    }
}
