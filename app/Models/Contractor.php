<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;
    protected $table = 'contractors';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function files(){
        return $this->hasMany(File::class,'contractor_id','id');
    }
}
