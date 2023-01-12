<?php
namespace App\Services\Detail;
use App\Services\ServiceInterface;


interface DetailServiceInterface extends ServiceInterface{
    public function deleteSave($id);
    public function searchActive($searches, $perPage);
    public function searchNoActive($searches, $perPage);
    public function searchAdmin($searches, $perPage);
}
