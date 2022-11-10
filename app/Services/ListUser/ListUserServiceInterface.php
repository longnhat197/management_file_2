<?php
namespace App\Services\ListUser;
use App\Services\ServiceInterface;


interface ListUserServiceInterface extends ServiceInterface{
    public function getUserByType($type);
}
