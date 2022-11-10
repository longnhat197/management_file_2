<?php
namespace App\Repositories\ListUser;
use App\Repositories\RepositoryInterface;

interface ListUserRepositoryInterface extends RepositoryInterface{
    public function getUserByType($type);
}
