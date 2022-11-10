<?php
namespace App\Services\File;

use App\Repositories\File\FileRepositoryInterface;
use App\Services\BaseService;


class FileService extends BaseService implements FileServiceInterface{
    public $repository;

    public function __construct(FileRepositoryInterface $FileRepository)
    {
        $this->repository = $FileRepository;
    }
    public function getFileOnIndex($request,$perPage){
        return $this->repository->getFileOnIndex($request,$perPage);
    }
}
