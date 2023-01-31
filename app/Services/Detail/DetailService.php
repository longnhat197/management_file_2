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
    public function deleteTem0($id,$tem_id){
        return $this->repository->deleteTem0($id,$tem_id);
    }

    public function deleteTem1($id,$tem_id){
        return $this->repository->deleteTem1($id,$tem_id);
    }

    public function searchActive($searches, $perPage){
        return $this->repository->searchActive($searches, $perPage);
    }
    public function searchNoActive($searches, $perPage){
        return $this->repository->searchNoActive($searches, $perPage);
    }
    public function searchAdmin($searches, $perPage){
        return $this->repository->searchAdmin($searches, $perPage);
    }
}
