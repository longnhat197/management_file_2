<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mau71 extends Model
{
    use HasFactory;
    protected $table ='mau_71';
    protected $primaryKey ='id';
    protected $guarded = [];
    public function  detail(){
        return $this->belongsTo(Detail::class,'detail_id','id');
    }
}
