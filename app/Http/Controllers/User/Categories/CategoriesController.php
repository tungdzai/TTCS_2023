<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Http\Requests\User\Category\CategoryRequest;

class CategoriesController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /** paginate
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $model = $this->categoryRepository->paginateCategory();
        $data["categories"] = $model;
        return view('user.Categories.categories',$data);
    }

    /** get view Category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addCategory(){
        $model=$this->categoryRepository->getAll();
        $data['categories']=$model;
        return view("user.Categories.addCategory",$data);

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
        $status=$this->categoryRepository->addCategory($dataCategory);
        if ($status){
            return redirect()->route('user.category')->with("successAdd",__('messages.success.addUser'));
        }
        return redirect()->route('user.addCategory')->with('errors',__('messages.errors.addUser'));
    }

}
