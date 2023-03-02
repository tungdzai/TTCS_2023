<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;

interface UserReponsitoryInterface
{
    /**
     * @return mixed
     */
    public function paginateUser();

    public function addUser($data);

    public function getUser($id);

    public function updateUser($data, $id);

    public function deleteUser($id);
}
