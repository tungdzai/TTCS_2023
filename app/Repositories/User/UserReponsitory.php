<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class UserReponsitory implements UserReponsitoryInterface
{
    public $table = 'users';

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateUser(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return DB::table($this->table)->paginate(15);
    }

    /**
     * @param $data
     * @return bool
     */
    public function addUser($data): bool
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getUser($id)
    {
        return DB::table($this->table)->select('user_name', 'email', 'first_name', 'last_name', 'birthday')->where("id", $id)->first();
    }

    /**
     * @param $data
     * @param $id
     * @return int
     */
    public function updateUser($data, $id): int
    {
        return DB::table($this->table)->where("id", $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function deleteUser($id): int
    {
        return DB::table($this->table)->delete($id);
    }

}
