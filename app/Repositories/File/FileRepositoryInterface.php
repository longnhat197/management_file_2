<?php
namespace App\Repositories\File;
use App\Repositories\RepositoryInterface;

interface FileRepositoryInterface extends RepositoryInterface{
    public function getFileOnIndex($request,$perPage);
}
