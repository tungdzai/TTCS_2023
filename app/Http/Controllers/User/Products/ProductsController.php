<?php

namespace App\Http\Controllers\User\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
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
        $categories = $this->categoryRepository->getAll();
        $data['categories'] = $categories;
        return view("user.Products.addProduct", $data);
    }

    /** handle add product
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleAddProduct(ProductRequest $request): \Illuminate\Http\RedirectResponse
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

    /** get view product
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getEditProduct(Request $request)
    {
        $id = $request->get('id');
        if (Products::where('id', $id)->exists()) {
            $data['getProduct'] = $this->productRepository->getProduct($id);;
            $data['categories'] = $this->categoryRepository->getAll();
            if (!empty($data['getProduct'])) {
                $request->session()->put('id', $id);
                return view('user.Products.editProduct', $data);
            }
            return redirect()->route('user.product');
        } else {
            return redirect()->route('user.product');
        }

    }

    public function handleEditProduct(ProductRequest $request)
    {
        $id = session('id');
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('upload/user/avatar'), $file_name);
            $pathAvatar = '/upload/user/avatar/' . $file_name;
        }

        $updateProduct= [
            'name' => $request->name,
            'stock' => $request->stock,
            'sku' => $request->sku,
            'expired_at' => $request->expired_at,
            'category_id' => $request->category_id,
            'avatar' => $pathAvatar,
            'flag_delete' => 0,
            'updated_at' => date(now('Asia/Ho_Chi_Minh')),
        ];
        $status = $this->productRepository->updateProduct($updateProduct, $id);
        if ($status) {
            return redirect()->route('user.product')->with('successUpdate', __('messages.success.successUpdate'));
        } else {
            return redirect()->route('user.addProduct')->with('errorUpdate', __('messages.errors.updateUser'));
        }



    }

}
