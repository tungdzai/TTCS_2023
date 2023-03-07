<?php
namespace App\Repositories\Category;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CategoryReponsitory implements CategoryRepositoryInterface{
    /**handle paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateCategory(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Categories::paginate(15);
    }

    /** get all data categories
     * @return \Illuminate\Support\Collection
     */
    public function getAll(){
        return Categories::all();
    }

    /** add category
     * @param $data
     * @return bool
     */
    public function addCategory($data)
    {
        return Categories::create($data);
    }

    /** show category by id
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getCategory($id)
    {
        return Categories::select('name','parent_id')->where("id", $id)->first();
    }

    /** update category
     * @param $data
     * @param $id
     * @return int
     */
    public function updateCategory($data, $id)
    {
        return Categories::where("id", $id)->update($data);
    }

    /** delete category
     * @param $id
     * @return int
     */
    public function deleteCategory($id)
    {
        $category = Categories::find($id);
        return $category->delete();
    }

}
