<?php

namespace App\Models\product;

use App\Models\order\order;
use App\Models\product\brand;
use App\Models\product\offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    protected $table="products";
    protected $fillable=['id','name','code','price','quantity','description','status','image','brand_id','subcategory_id'];
    protected $hidden=['brand_id','pivot','created_at','updated_at'];

    public function subCategory(){
        return $this->hasOne(subcategory::class,foreignKey:'subcategory_id');
    }
    public function order(){
        return $this-> belongsToMany(order::class,'product_order','product_id','order_id');
    }

    public function brand(){
        return $this-> belongsTo(brand::class,foreignKey:'brand_id');
    }

    public function offer(){

        return $this->belongsToMany(offer::class,'product_offer','product_id','offer_id');
     }
     public function category(){
         return $this->hasOneThrough(category::class,subcategory::class);
     }
     public function attributes(){
        return $this->hasMany(ProductAtrr_model::class,'products_id','id');
    }

}
