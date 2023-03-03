<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $table='products';
    protected $fillable = ['sku','name','stock','avatar','expired_at','category_id','flag_delete'];
}
