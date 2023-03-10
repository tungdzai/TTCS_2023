<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Customers extends Authenticatable
{
    use HasFactory,HasApiTokens;

    public $table = "customers";
    protected $fillable = ['email', 'phone', 'birthday', 'full_name', 'password', 'reset_password', 'address', 'province_id', 'district_id', 'commune_id', 'status', 'flag_delete'];
}
