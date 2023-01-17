<?php
namespace App\Repositories\Detail;

use App\Models\Detail;
use App\Models\Mau1;
use App\Models\Mau10;
use App\Models\Mau11;
use App\Models\Mau12;
use App\Models\Mau13;
use App\Models\Mau14;
use App\Models\Mau151;
use App\Models\Mau152;
use App\Models\Mau153;
use App\Models\Mau161;
use App\Models\Mau162;
use App\Models\Mau2;
use App\Models\Mau3;
use App\Models\Mau4;
use App\Models\Mau41;
use App\Models\Mau5;
use App\Models\Mau51;
use App\Models\Mau6;
use App\Models\Mau61;
use App\Models\Mau7;
use App\Models\Mau71;
use App\Models\Mau8;
use App\Models\Mau9;
use App\Models\Mau91;
use App\Models\UserDetail;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;


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
        if(Mau3::select("*")->where('detail_id', $id)->exists()){
            Mau3::where('detail_id', $id)->delete();
        }
        if(Mau41::select("*")->where('detail_id', $id)->exists()){
            Mau41::where('detail_id', $id)->delete();
        }
        if(Mau4::select("*")->where('detail_id', $id)->exists()){
            Mau4::where('detail_id', $id)->delete();
        }
        if(Mau5::select("*")->where('detail_id', $id)->exists()){
            Mau5::where('detail_id', $id)->delete();
        }
        if(Mau51::select("*")->where('detail_id', $id)->exists()){
            Mau51::where('detail_id', $id)->delete();
        }
        if (Mau6::select("*")->where('detail_id', $id)->exists()) {
            Mau6::where('detail_id', $id)->delete();
        }
        if (Mau61::select("*")->where('detail_id', $id)->exists()) {
            Mau61::where('detail_id', $id)->delete();
        }
        if (Mau7::select("*")->where('detail_id', $id)->exists()) {
            Mau7::where('detail_id', $id)->delete();
        }
        if (Mau71::select("*")->where('detail_id', $id)->exists()) {
            Mau71::where('detail_id', $id)->delete();
        }
        if (Mau8::select("*")->where('detail_id', $id)->exists()) {
            Mau8::where('detail_id', $id)->delete();
        }
        if (Mau9::select("*")->where('detail_id', $id)->exists()) {
            Mau9::where('detail_id', $id)->delete();
        }
        if (Mau91::select("*")->where('detail_id', $id)->exists()) {
            Mau91::where('detail_id', $id)->delete();
        }
        if (Mau10::select("*")->where('detail_id', $id)->exists()) {
            Mau10::where('detail_id', $id)->delete();
        }
        if (Mau11::select("*")->where('detail_id', $id)->exists()) {
            Mau11::where('detail_id', $id)->delete();
        }
        if (Mau12::select("*")->where('detail_id', $id)->exists()) {
            Mau12::where('detail_id', $id)->delete();
        }
        if (Mau13::select("*")->where('detail_id', $id)->exists()) {
            Mau13::where('detail_id', $id)->delete();
        }
        if (Mau14::select("*")->where('detail_id', $id)->exists()) {
            Mau14::where('detail_id', $id)->delete();
        }
        if (Mau151::select("*")->where('detail_id', $id)->exists()) {
            Mau151::where('detail_id', $id)->delete();
        }
        if (Mau152::select("*")->where('detail_id', $id)->exists()) {
            Mau152::where('detail_id', $id)->delete();
        }
        if (Mau153::select("*")->where('detail_id', $id)->exists()) {
            Mau153::where('detail_id', $id)->delete();
        }
        if (Mau161::select("*")->where('detail_id', $id)->exists()) {
            Mau161::where('detail_id', $id)->delete();
        }
        if (Mau162::select("*")->where('detail_id', $id)->exists()) {
            Mau162::where('detail_id', $id)->delete();
        }
    }

    public function searchActive($searches, $perPage = 5){
        $searches = explode(',', $searches);
        $query = Detail::select("details.*")
            ->join('user_details', 'details.id', '=', 'user_details.detail_id')
            ->join('users', 'user_details.user_id', '=', 'users.id')
            ->where('details.enabled', 1)
            ->where('users.id', '=', Auth::user()->id);
        foreach ($searches as $search) {
            $query
                ->where(function ($q) use ($search) {
                    $q->where('name_du_an', 'like', '%' . $search . '%')
                        ->orWhere('users.email', 'like', '%' . $search . '%')
                        ->orWhere('name_goi_thau','like', '%' . $search.'%')
                        ->orWhere('customer', 'like', '%' . $search . '%')
                        ->orWhere('name_moi_thau', 'like', '%' . $search . '%');
            });

        }
        $data = $query->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends(['search' => $search]);
        return $data;
    }

    public function searchAdmin($searches, $perPage = 5){
        $searches = explode(',', $searches);
        $query = Detail::select("details.*")
        ->join('users', 'details.user_id', '=', 'users.id');
        foreach ($searches as $search) {
            $query
            ->where(function($q) use ($search)
            {
                $q->where('name_du_an','like','%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere('name_goi_thau','like', '%' . $search.'%')
                ->orWhere('customer','like','%' . $search . '%')
                ->orWhere('name_moi_thau','like','%' . $search . '%');
            });

        }
        $data = $query->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends(['search' => $search]);
        return $data;
    }
    public function searchNoActive($searches, $perPage = 5){
        $searches = explode(',', $searches);

        $query = Detail::select("details.*")
        ->join('users', 'details.user_id', '=', 'users.id');
        foreach ($searches as $search) {
            $query
            ->where('details.enabled',0)
            ->where(function($q) use ($search)
            {
                $q->where('name_du_an','like','%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere('name_goi_thau','like', '%' . $search.'%')
                ->orWhere('customer','like','%' . $search . '%')
                ->orWhere('name_moi_thau','like','%' . $search . '%');
            });

        }
        $data = $query->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends(['search' => $search]);
        return $data;
    }


}
