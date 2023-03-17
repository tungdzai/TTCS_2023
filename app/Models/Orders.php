<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** Class orders
 * @property integer $customer_id
 * @property integer $quantity
 * @property integer $total
 */
class Orders extends Model
{
    use HasFactory;

    public $table = "orders";
    protected $fillable = [
        'customer_id',
        'quantity',
        'total'
    ];
}
