<?php

namespace App\Http\Controllers\User\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class SearchController extends Controller
{
    public $query;

    public function __construct()
    {
        $this->query = Products::select(
            'products.id',
            'products.name',
            'products.stock',
            'products.sku',
            'products.category_id',
            'products.expired_at'
        );

    }

    /** handle search product by name, category_name,stock
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        if (!empty($request->input('search'))) {
            $this->query->where('name', 'like', '%' . $request->input('search') . '%');

            if (empty($this->query->get())) {
                $this->query->join('categories', 'categories.id', 'products.category_id')
                    ->where('categories.name', 'like', '%' . $request->input('search') . '%');
            }

        }
        $stock = $request->input('stock');
        switch ($stock) {
            case 'less_than_10':
                $this->query->where('stock', '<', 10);
                break;
            case 'between_10_and_100':
                $this->query->whereBetween('stock', [10, 100]);
                break;
            case 'between_100_and_200':
                $this->query->whereBetween('stock', [100, 200]);
                break;
            case 'more_than_200':
                $this->query->where('stock', '>', 200);
                break;
            default:
                break;
        }
        session()->flash("titleSearch", $request->input("search"));
        $products = $this->query->get();
        $data['products'] = $products;
        return view('user.products.products', $data);
    }
}
