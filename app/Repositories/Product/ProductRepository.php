<?php
namespace App\Repositories\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductRepository implements ProductRepositoryInterface{
    public $table = 'product';
    /**handle paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateProduct()
    {
        return DB::table($this->table)->paginate(15);
    }
    /** get all data products
     * @return \Illuminate\Support\Collection
     */
    public function getAll()
    {
        return DB::table($this->table)->get();
    }
    /** add product
     * @param $data
     * @return bool
     */
    public function addProduct($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /** show product by id
     * @param $id
     *
     */
    public function getProduct($id)
    {
        // TODO: Implement getProduct() method.
    }
    /** update product
     * @param $data
     * @param $id
     *
     */
    public function updateProduct($data, $id)
    {
        // TODO: Implement updateProduct() method.
    }
    /** delete product
     * @param $id
     *
     */
    public function deleteProduct($id)
    {
        // TODO: Implement deleteProduct() method.
    }
}
