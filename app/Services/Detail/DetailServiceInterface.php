<?php
namespace App\Services\Detail;
use App\Services\ServiceInterface;


interface DetailServiceInterface extends ServiceInterface{
    public function deleteSave($id);
}
