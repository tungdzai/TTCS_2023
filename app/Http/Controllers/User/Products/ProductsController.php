<?php

namespace App\Http\Controllers\User\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests\User\Product\ProductRequest;
use App\Repositories\Category\CategoryRepositoryInterface;


class ProductsController extends Controller
{
    protected $productRepository, $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /** get view list products
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $model = $this->productRepository->paginateProduct();
        $data["products"] = $model;
        return view('user.Products.products', $data);
    }

    /** get view add product and get (id,name)->category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addProduct()
    {
        $category = $this->categoryRepository->getAll();
        $data['categories'] = $category;
        return view("user.Products.addProduct", $data);
    }

    /** handle add product
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleAddProduct(ProductRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('upload/user/avatar'), $file_name);
            $pathAvatar = '/upload/user/avatar/' . $file_name;
        }
        $dataProduct = [
            'name' => $request->name,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'expired_at' => $request->expired_at,
            'category_id' => $request->category_id,
            'avatar' => $pathAvatar,
            'flag_delete' => 0,
            'created_at' => date(now('Asia/Ho_Chi_Minh')),
        ];
        $status = $this->productRepository->addProduct($dataProduct);
        if ($status) {
            return redirect()->route('user.product')->with('successAdd', __('messages.success.addUser'));
        } else {
            return redirect()->route('user.addProduct')->with('errorAdd', __('messages.success.addUser'));
        }
    }

    public function getEditProduct()
    {
        return view('user.Products.editProduct');

    }
}
