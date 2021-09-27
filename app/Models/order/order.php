<?php

namespace App\Models\order;

use App\Models\product\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=['id','code','totalCash','status','description'];
    protected $hidden=['created_at','updated_at'];

    public function user()
    {
        return $this->hasMany(user::class);
    }

    public function product(){
        return $this-> belongsToMany(product::class,'product_order','product_id','order_id');
    }
}
