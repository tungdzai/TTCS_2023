<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\User\Category\CategoryRequest;
use App\Services\Delete\DeleteServiceInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $categoryRepository, $deleteService;

    public function __construct(CategoryRepositoryInterface $categoryRepository, DeleteServiceInterface $deleteService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->deleteService = $deleteService;
    }

    /** paginate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $model = $this->categoryRepository->paginateCategory();
        $data["categories"] = $model;
        return view('user.Categories.categories', $data);
    }

    /** get view Category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addCategory()
    {
        $model = $this->categoryRepository->getAll();
        $data['categories'] = $model;
        return view("user.Categories.addCategory", $data);

    }

    /** handle add Category
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleAddCategory(CategoryRequest $request)
    {
        $dataCategory = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'created_at' => date(now('Asia/Ho_Chi_Minh')),
        ];
        $status = $this->categoryRepository->addCategory($dataCategory);
        if ($status) {
            session()->flash("successAdd", __('messages.success.addUser'));
            return redirect()->route('user.category');
        }
        session()->flash("errors", __('messages.errors.addUser'));
        return redirect()->route('user.addCategory')->with('errors', __('messages.errors.addUser'));
    }

    /** get view edit Category
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getEditCategory(Request $request)
    {
        $id = $request->get('id');
        $getCategory = $this->categoryRepository->getCategory($id);
        if (!empty($getCategory)) {
            $categories = $this->categoryRepository->getAll();
            $category_parent = [];
            if (!empty($getCategory->parent_id)) {
                foreach ($categories as $category) {
                    if ($category->id == $getCategory->parent_id) {
                        $category_parent = $category;
                    }
                }
            }
            if (!empty($category_parent)) {
                $data['category_parent'] = $category_parent;
            }
            $data['categories'] = $categories;
            $data['getCategory'] = $getCategory;
            $request->session()->put('id', $id);
            return view('user.Categories.editCategory', $data);

        }
        return redirect()->route('user.category');
    }

    /** handle Edit Category
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleEditCategory(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $id = session('id');
        $dataCategory = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'updated_at' => date(now('Asia/Ho_Chi_Minh')),
        ];
        $status = $this->categoryRepository->updateCategory($dataCategory, $id);
        if ($status) {
            session()->flash('successUpdate', __('messages.success.successUpdate'));
            return redirect()->route('user.category');
        } else {
            session()->flash('errorUpdate', __('messages.errors.updateUser'));
            return redirect()->route('user.getEditCategory');
        }
    }

    /** delete Category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function deleteCategory(Request $request)
    {

        $id = $request->get('id');
        if (Categories::where('id', $id)->exists()) {
            $status = $this->deleteService->delete($id);
            if ($status) {
                return redirect()->route("user.category")->with("successDelete", __('messages.success.deleteUser'));
            }
        } else {
            return redirect()->route("user.category")->with("errorDelete", __('messages.success.deleteUser'));
        }
    }

}
