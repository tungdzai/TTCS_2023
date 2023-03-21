<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** Class PasswordResets
 * @property integer $email
 * @property integer $created_at
 */
class PasswordResets extends Model
{
    use HasFactory;

    public $table = 'password_resets';
    protected $fillable = [
        'email',
        'created_at'
    ];
}
