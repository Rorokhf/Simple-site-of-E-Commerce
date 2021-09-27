<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table="Coupons";
    protected $fillable=['id','code','discount','status','description','discountType','end_date','star_date',' maxPrice'];
    protected $hidden=['pivot','created_at','updated_at'];
    
    public function user(){
       // return $this-> hasMany('App/Models/product/subcategory',foreignKey:'category_id');
       return $this->belongsToMany(user::class,'user_coupon','user_id','coupon_id');
    }
}
