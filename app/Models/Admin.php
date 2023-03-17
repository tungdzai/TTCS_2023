<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

/** Class admin
 * @property string $email
 * @property string $user_name
 * @property date $birthday
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $reset_password
 * @property string $status
 * @property bool $flag_delete
 */
class Admin extends Authenticatable
{
    public $table = "admin";
    protected $fillable = [
        'email',
        'user_name',
        'birthday',
        'first_name',
        'last_name',
        'password',
        'reset_password',
        'status',
        'flag_delete'
    ];
}
