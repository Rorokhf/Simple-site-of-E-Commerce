<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table="addresses";
    protected $fillable=['street','floor','flat','building','user_id'];
    protected $hidden=['user_id'];
    public function user(){
        return $this-> belongsTo(related:'App/User',foreignKey:'user_id');
    }
}
