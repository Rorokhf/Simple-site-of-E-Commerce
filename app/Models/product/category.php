<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable=['id','name','status','image'];

    public function subcategory(){
       // return $this-> hasMany('App/Models/product/subcategory',foreignKey:'category_id');
       return $this->hasMany(subcategory::class);
    }
    public function category(){
        return $this->hasManyThrough(product::class,subcategory::class);
    }
}
