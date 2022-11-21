<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table ='user_details';
    protected $primaryKey = 'id';
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function detail(){
        return $this->belongsTo(Detail::class,'detail_id','id');
    }
}
