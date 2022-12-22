<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mau51 extends Model
{
    use HasFactory;
    protected $table ='mau_51';
    protected $primaryKey ='id';
    protected $guarded = [];
    public function  detail(){
        return $this->belongsTo(Detail::class,'detail_id','id');
    }
}
