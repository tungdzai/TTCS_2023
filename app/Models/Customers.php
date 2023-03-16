<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
/**
 * Class Customer
 * @property string $email
 * @property string $phone
 * @property date $birthday
 * @property string $full_name
 * @property string $password
 * @property string $reset_password
 * @property bool $flag_delete
 * @property string $address
 * @property integer $province_id
 * @property integer $district_id
 * @property integer $commune_id
 */
class Customers extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

    public $table = "customers";
    protected $fillable = [
        'email',
        'phone',
        'birthday',
        'full_name',
        'password',
        'reset_password',
        'address',
        'province_id',
        'district_id',
        'commune_id',
        'status',
        'flag_delete'
    ];
}
