<?php
namespace App\Services\Project;

use App\Repositories\Project\ProjectRepositoryInterface;
use App\Services\BaseService;


class ProjectService extends BaseService implements ProjectServiceInterface{
    public $repository;

    public function __construct(ProjectRepositoryInterface $ProjectRepository)
    {
        $this->repository = $ProjectRepository;
    }
}
