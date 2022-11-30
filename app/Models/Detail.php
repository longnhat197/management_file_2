<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';
    protected $primaryKey='id';
    protected $guarded =[];

    public function userDetails(){
        return $this->hasMany(UserDetail::class,'detail_id','id');
    }

    public function detailTemps(){
        return $this->hasMany(DetailTemp::class,'detail_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function mau1(){
        return $this->belongsTo(Mau1::class,'detail_id','id');
    }
}
