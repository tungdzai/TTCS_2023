<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory;

    public $table = "admin";

    public function create($data)
    {
        return DB::insert('insert into ' . $this->table . '(first_name, last_name, birthday,user_name,email,password,reset_password,status,flag_delete,created_at) values (?,?,?,?,?,?,?,?,?,?)', $data);
    }
}
