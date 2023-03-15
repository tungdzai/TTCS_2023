<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**Class District
 * @property string $name
 * @property integer $province_id
 */
class District extends Model
{
    use HasFactory;
    public $table = 'district';
    protected $fillable = ['name','province_id'];

}
