<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**Class Province
 * @property string $name
 */
class Province extends Model
{
    use HasFactory;

    public $table = 'province';
    protected $fillable = ['name'];
}
