<?php
namespace App\Services\ListUser;

use App\Repositories\ListUser\ListUserRepositoryInterface;
use App\Services\BaseService;


class ListUserService extends BaseService implements ListUserServiceInterface{
    public $repository;

    public function __construct(ListUserRepositoryInterface $ListUserRepository)
    {
        $this->repository = $ListUserRepository;
    }

    public function getUserByType($type){
        return $this->repository->getUserByType($type);
    }
}
