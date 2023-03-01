<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Users extends Authenticatable
{
    use HasFactory;

    public $table = "users";

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateUser()
    {
        return DB::table($this->table)->paginate(15);
    }

    public function addUser($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function getUser($id)
    {
        return DB::table($this->table)->select('user_name', 'email', 'first_name', 'last_name', 'birthday')->where("id", $id)->first();
    }

    public function updateUser($data, $id)
    {
        return DB::table($this->table)->where("id", $id)->update($data);
    }

    public function deleteUser($id)
    {
        return  DB::table($this->table)->delete($id);
    }
}
