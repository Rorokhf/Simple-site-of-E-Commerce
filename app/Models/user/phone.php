<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;
    protected $table="phones";
    protected $fillable=['code','number','user_id'];
    protected $hidden=['user_id'];
    public function user(){
        return $this-> belongsTo(related:'App/User',foreignKey:'user_id');
    }

}
