<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePath extends Model
{
    use HasFactory;

    protected $table = 'file_paths';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(File::class,'file_id','id');
    }
}
