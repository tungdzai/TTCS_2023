<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**Class Commune
 * @property string $name
 * @property integer $district_id
 */
class Commune extends Model
{
    use HasFactory;

    public $table = 'commune';
    protected $fillable = ['name', 'district_id'];
}
