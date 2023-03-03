<?php
namespace App\Repositories\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
class ProductRepository implements ProductRepositoryInterface{
    /**handle paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateProduct()
    {
        return Products::paginate(15);
    }
    /** get all data products
     * @return \Illuminate\Support\Collection
     */
    public function getAll()
    {
        return Products::all();
    }
    /** add product
     * @param $data
     * @return bool
     */
    public function addProduct($data)
    {
        return Products::create($data);
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
