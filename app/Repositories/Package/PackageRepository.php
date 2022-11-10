<?php
namespace App\Repositories\Package;

use App\Models\Package;
use App\Repositories\BaseRepository;


class PackageRepository extends BaseRepository implements PackageRepositoryInterface{
    public function getModel()
    {
        return Package::class;
    }
}
