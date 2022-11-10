<?php
namespace App\Repositories\ListUser;

use App\Models\ListUser;
use App\Repositories\BaseRepository;


class ListUserRepository extends BaseRepository implements ListUserRepositoryInterface{
    public function getModel()
    {
        return ListUser::class;
    }

    public function getUserByType($type =1){
        $users = $this->model
        ->where('type_user','=',$type)
        ->get();

        return $users;
    }
}
