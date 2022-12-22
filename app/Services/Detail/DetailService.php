<?php
namespace App\Services\Detail;

use App\Repositories\Detail\DetailRepositoryInterface;
use App\Services\BaseService;


class DetailService extends BaseService implements DetailServiceInterface{
    public $repository;

    public function __construct(DetailRepositoryInterface $DetailRepository)
    {
        $this->repository = $DetailRepository;
    }

    public function deleteSave($id){
        return $this->repository->deleteSave($id);
    }

    public function searchActive($searches, $perPage){
        return $this->repository->searchActive($searches, $perPage);
    }
    public function searchNoActive($searches, $perPage){
        return $this->repository->searchNoActive($searches, $perPage);
    }
}
