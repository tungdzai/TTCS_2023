<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    public $table = "customers";
    protected $fillable = ['email', 'phone', 'birthday', 'full_name', 'password', 'reset_password', 'address', 'province_id', 'district_id', 'commune_id', 'status', 'flag_delete'];
}
