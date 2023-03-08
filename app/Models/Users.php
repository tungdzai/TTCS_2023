<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable
{
    use HasFactory;

    public $table = "users";
    protected $fillable = ['email', 'user_name', 'birthday', 'first_name', 'last_name', 'password', 'reset_password', 'status', 'flag_delete'];
}
