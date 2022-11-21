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
}
