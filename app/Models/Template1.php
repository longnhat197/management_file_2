<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template1 extends Model
{
    use HasFactory;

    protected $table = 'templates1';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function detailTemp(){
        return $this->belongsTo(DetailTemp::class,'tem_id','id');
    }
}
