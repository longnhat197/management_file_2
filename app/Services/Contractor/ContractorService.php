<?php
namespace App\Services\Contractor;

use App\Repositories\Contractor\ContractorRepositoryInterface;
use App\Services\BaseService;


class ContractorService extends BaseService implements ContractorServiceInterface{
    public $repository;

    public function __construct(ContractorRepositoryInterface $ContractorRepository)
    {
        $this->repository = $ContractorRepository;
    }
}
