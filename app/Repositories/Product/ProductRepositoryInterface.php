<?php

namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;

interface ProductRepositoryInterface
{
    public function paginateProduct();
    public function getAll();
    public function addProduct($data);
    public function getProduct($id);
    public function updateProduct($data, $id);
    public function deleteProduct($id);
}
