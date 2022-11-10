<?php
namespace App\Services\Package;

use App\Repositories\Package\PackageRepositoryInterface;
use App\Services\BaseService;


class PackageService extends BaseService implements PackageServiceInterface{
    public $repository;

    public function __construct(PackageRepositoryInterface $PackageRepository)
    {
        $this->repository = $PackageRepository;
    }
}
