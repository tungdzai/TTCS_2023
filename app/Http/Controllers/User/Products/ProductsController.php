<?php

namespace App\Http\Controllers\User\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Services\Delete\DeleteServiceInterface;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests\User\Product\ProductRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\Upload\ImageUploadServiceInterface;
use App\Http\Requests\User\Product\ProductUpdateRequest;


class ProductsController extends Controller
{
    protected $productRepository, $categoryRepository, $deleteService, $imageService;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, DeleteServiceInterface $deleteService, ImageUploadServiceInterface $imageService)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->deleteService = $deleteService;
        $this->imageService = $imageService;
    }

    /** get view list products
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $model = $this->productRepository->paginateProduct();
        $data["products"] = $model;
        return view('user.products.products', $data);
    }

    /** get view add product and get (id,name)->category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addProduct()
    {
        $categories = $this->categoryRepository->getAll();
        $data['categories'] = $categories;
        return view("user.products.addProduct", $data);
    }

    /** handle add product
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleAddProduct(ProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->hasFile('avatar')) {
            $file_name = $this->imageService->upload($request->avatar);
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
            session()->flash('successAdd', __('messages.success.addUser'));
            return redirect()->route('user.product');
        } else {
            session()->flash('errorAdd', __('messages.success.addUser'));
            return redirect()->route('user.addProduct');
        }
    }

    /** get view product
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getEditProduct(Request $request)
    {
        $id = $request->get('id');
        if (!empty($data['getProduct'] = $this->productRepository->getProduct($id))) {
            if (Products::where('id', $id)->exists()) {
                $data['getProduct'] = $this->productRepository->getProduct($id);
                $data['categories'] = $this->categoryRepository->getAll();
                $request->session()->put('id', $id);
                $request->session()->put('image_product', $this->productRepository->getProduct($id)->avatar);
                return view('user.products.editProduct', $data);
            }
        }
        return redirect()->route('user.product');
    }

    /** handle edit product
     * @param ProductUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleEditProduct(ProductUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $id = session('id');
        if ($request->hasFile('avatar')) {
            $file_name = $this->imageService->upload($request->avatar);
            $pathAvatar = '/upload/user/avatar/' . $file_name;
        } else {
            $pathAvatar = session('image_product');
        }

        $updateProduct = [
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
            session()->flash('successUpdate', __('messages.success.successUpdate'));
            return redirect()->route('user.product');
        } else {
            session()->flash('errorUpdate', __('messages.errors.updateUser'));
            return redirect()->route('user.addProduct');
        }
    }

    /** delete product
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProduct($id)
    {
        $product = Products::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => __('messages.errors.deleteAjax')
            ]);
        }
        $product->delete();
        return response()->json([
            'status' => 'success',
            'message' => __('messages.success.deleteUser')
        ]);

    }

}
