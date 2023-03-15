<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Users
 * @property string $email
 * @property string $user_name
 * @property date $birthday
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $reset_password
 * @property string $status
 * @property bool $flag_delete
 * @property string $avatar
 * @property integer $province_id
 * @property integer $district_id
 * @property integer $commune_id
 * @property string $address
 */
class Users extends Authenticatable
{
    use HasFactory;

    public $table = "users";
    protected $fillable = [
        'email',
        'user_name',
        'birthday',
        'first_name',
        'last_name',
        'password',
        'reset_password',
        'status',
        'flag_delete',
        'avatar',
        'province_id',
        'district_id',
        'commune_id',
        'address'
    ];
}
