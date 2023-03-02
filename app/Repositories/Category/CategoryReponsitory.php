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
}
