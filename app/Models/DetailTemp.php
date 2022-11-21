<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTemp extends Model
{
    use HasFactory;
    protected $table = 'detail_temps';
    protected $primaryKey ='id';
    protected $guarded = [];

    public function templates0(){
        return $this->belongsTo(Template0::class,'tem_id','id');
    }
    public function detail(){
        return $this->belongsTo(DetailTemp::class,'detail_id','id');
    }

    public function templates1(){
        return $this->belongsTo(Template1::class,'tem_id','id');
    }

}
