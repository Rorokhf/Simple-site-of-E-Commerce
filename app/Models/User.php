<?php

namespace App\Models;

use App\Models\user\phone;
use App\Models\order\order;
use App\Models\order\Coupon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'order_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phone()
    {
        return $this-> hasOne(related:'App\models\user\phone',foreignKey:'user_id');
    }
    public function address()
    {
        return $this-> hasOne(related:'App\models\user\address',foreignKey:'user_id');
    }

    public function coupon()
    {
        return $this-> belongsToMany(Coupon::class,'user_coupon','user_id','coupon_id');
    }
    public function order(){
        return $this->belongsTo(order::class,foreignKey:'order_id');

    }

}
