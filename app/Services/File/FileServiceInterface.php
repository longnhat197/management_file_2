<?php
namespace App\Services\File;
use App\Services\ServiceInterface;


interface FileServiceInterface extends ServiceInterface{
    public function getFileOnIndex($request,$perPage);
}
