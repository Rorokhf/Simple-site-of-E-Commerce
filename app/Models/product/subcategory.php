<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $table="subcategories";
    protected $fillable=['id','name','status','image','category_id'];

    public function category(){
        return $this->belongsTo(category::class,foreignKey:'category_id');
    }

    public function product(){
        return $this->hasMany(product::class,foreignKey:'subcategory_id');
    }
}
