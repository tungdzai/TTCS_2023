<?php

namespace App\Repositories\Category;

use Illuminate\Database\Eloquent\Model;

interface CategoryRepositoryInterface
{
    public function paginateCategory();

    public function getAll();
    public function addCategory($data);
    public function getCategory($id);
    public function updateCategory($data, $id);
    public function deleteCategory($id);
}
