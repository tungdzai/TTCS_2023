<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**get all product  and paginate(10)
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductAll()
    {
        $product = Products::select(
            'products.id',
            'products.name',
            'products.stock',
            'products.sku',
            'products.expired_at',
            'categories.name as category_name'
        )
            ->leftJoin('categories', 'categories.id', 'products.category_id')
            ->paginate(10);
        return response()->json($product);
    }

    public function getProductByID($product_id)
    {
        $product = Products::select(
            'products.id',
            'products.name',
            'products.stock',
            'products.sku',
            'products.expired_at',
            'categories.name as category_name'
        )
            ->leftJoin('categories', 'categories.id', 'products.category_id')
            ->where('products.id', $product_id)
            ->first();
        if (!$product) {
            return response()->json([
               'error'=>trans('api.product.not_exist')
            ]);
        }
        return response()->json($product);
    }
}
