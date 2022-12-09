<?php
namespace App\Repositories\Detail;

use App\Models\Detail;
use App\Models\Mau1;
use App\Models\Mau2;
use App\Repositories\BaseRepository;


class DetailRepository extends BaseRepository implements DetailRepositoryInterface{
    public function getModel()
    {
        return Detail::class;
    }

    public function deleteSave($id){
        if(Mau1::select("*")->where('detail_id', $id)->exists()){
            Mau1::where('detail_id', $id)->delete();
        }
        if(Mau2::select("*")->where('detail_id', $id)->exists()){
            Mau2::where('detail_id', $id)->delete();
        }

    }
}
