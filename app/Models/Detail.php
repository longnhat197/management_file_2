<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function userDetails()
    {
        return $this->hasMany(UserDetail::class, 'detail_id', 'id');
    }

    public function detailTemps()
    {
        return $this->hasMany(DetailTemp::class, 'detail_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mau1()
    {
        return $this->belongsTo(Mau1::class, 'detail_id', 'id');
    }

    public function mau2()
    {
        return $this->belongsTo(Mau2::class, 'detail_id', 'id');
    }
    public function mau3()
    {
        return $this->belongsTo(Mau3::class, 'detail_id', 'id');
    }

    public function mau41()
    {
        return $this->belongsTo(Mau41::class, 'detail_id', 'id');
    }
    public function mau4()
    {
        return $this->belongsTo(Mau4::class, 'detail_id', 'id');
    }
    public function mau51()
    {
        return $this->belongsTo(Mau51::class, 'detail_id', 'id');
    }
    public function mau5()
    {
        return $this->belongsTo(Mau5::class, 'detail_id', 'id');
    }
    public function mau6()
    {
        return $this->belongsTo(Mau6::class, 'detail_id', 'id');
    }
    public function mau61()
    {
        return $this->belongsTo(Mau61::class, 'detail_id', 'id');
    }
    public function mau7()
    {
        return $this->belongsTo(Mau7::class, 'detail_id', 'id');
    }
    public function mau71()
    {
        return $this->belongsTo(Mau71::class, 'detail_id', 'id');
    }
    public function mau8()
    {
        return $this->belongsTo(Mau8::class, 'detail_id', 'id');
    }
    public function mau9()
    {
        return $this->belongsTo(Mau9::class, 'detail_id', 'id');
    }
    public function mau91()
    {
        return $this->belongsTo(Mau91::class, 'detail_id', 'id');
    }
    public function mau10()
    {
        return $this->belongsTo(Mau10::class, 'detail_id', 'id');
    }
    public function mau11()
    {
        return $this->belongsTo(Mau11::class, 'detail_id', 'id');
    }
    public function mau12()
    {
        return $this->belongsTo(Mau12::class, 'detail_id', 'id');
    }
    public function mau13()
    {
        return $this->belongsTo(Mau13::class, 'detail_id', 'id');
    }
    public function mau14()
    {
        return $this->belongsTo(Mau14::class, 'detail_id', 'id');
    }
}
