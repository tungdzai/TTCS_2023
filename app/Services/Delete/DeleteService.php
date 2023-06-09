<?php

namespace App\Services\Delete;

use App\Models\Categories;

class DeleteService implements DeleteServiceInterface
{

    protected $model;

    public function __construct(Categories $model)
    {
        $this->model = $model;
    }

    /** delete category
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete($id);
    }
}
