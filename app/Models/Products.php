<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class products
 * @property string $sku
 * @property string $name
 * @property integer $stock
 * @property string $avatar
 * @property date $expired_at
 * @property integer $category_id
 * @property bool $flag_delete
 */
class Products extends Model
{
    use HasFactory;

    public $table = 'products';
    protected $fillable = [
        'sku',
        'name',
        'stock',
        'avatar',
        'expired_at',
        'category_id',
        'flag_delete'
    ];
}
