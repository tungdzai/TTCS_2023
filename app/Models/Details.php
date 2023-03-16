<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** Class Details
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $price
 * @property string $status
 */
class Details extends Model
{
    use HasFactory;

    public $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'status'
    ];
}
