<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'contractor_id',
        'path'
    ];

    public function contractor(){
        return $this->belongsTo(Contractor::class,'contractor_id','id');
    }

    public function filePaths(){
        return $this->hasMany(FilePath::class,'file_id','id');
    }
}
