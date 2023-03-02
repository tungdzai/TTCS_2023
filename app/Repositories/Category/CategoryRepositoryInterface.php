<?php
namespace App\Repositories\Category;
use Illuminate\Database\Eloquent\Model;
interface CategoryRepositoryInterface{
    public function paginateCategory();
    public function getAll();
    public function addCategory($data);
}
