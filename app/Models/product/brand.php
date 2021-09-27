<?php

namespace App\Models\product;

use App\Models\product\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class brand extends Model
{
    use HasFactory;

    protected $table="brands";
    protected $fillable=['id','name','status','image'];
    protected $hidden=['created_at','updated_at'];

    public function product(){
        // return $this-> hasMany('App/Models/product/subcategory',foreignKey:'category_id');
        return $this->hasMany(product::class);
     }
}
