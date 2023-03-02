<?php
namespace App\Repositories\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CategoryReponsitory implements CategoryRepositoryInterface{

    public $table = 'product_category';

    /**handle paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateCategory(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return DB::table($this->table)->paginate(15);
    }

    /** get all data categories
     * @return \Illuminate\Support\Collection
     */
    public function getAll(){
        return DB::table($this->table)->get();
    }

    /** add category
     * @param $data
     * @return bool
     */
    public function addCategory($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /** show category by id
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getCategory($id)
    {
        return DB::table($this->table)->select('name','parent_id')->where("id", $id)->first();
    }

    /** update category
     * @param $data
     * @param $id
     * @return int
     */
    public function updateCategory($data, $id)
    {
        return DB::table($this->table)->where("id", $id)->update($data);
    }

    /** delete category
     * @param $id
     * @return int
     */
    public function deleteCategory($id)
    {
        return DB::table($this->table)->delete($id);
    }

    /** get category by parent_id
     * @param $parent_id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getParent($parent_id)
    {
        return DB::table($this->table)->select('*')->where("id", $parent_id)->first();
    }
}
