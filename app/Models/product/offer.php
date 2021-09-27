<?php

namespace App\Models\product;

use App\Models\product\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class offer extends Model
{
    use HasFactory;

    protected $table="offers";
    protected $fillable=['id','name','discount','status','details','imge','end_date','star_date'];
    protected $hidden=['pivot','created_at','updated_at'];

    public function product(){

        return $this->belongsToMany(product::class,'product_offer','product_id','offer_id');
     }
}
