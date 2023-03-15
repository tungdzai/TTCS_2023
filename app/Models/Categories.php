<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categories
 * @property string $name
 * @property integer $parent_id
 */
class Categories extends Model
{
    use HasFactory;

    public $table = 'categories';
    protected $fillable = ['name', 'parent_id'];
}
