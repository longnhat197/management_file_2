<?php
namespace App\Repositories\Contractor;

use App\Models\Contractor;
use App\Repositories\BaseRepository;


class ContractorRepository extends BaseRepository implements ContractorRepositoryInterface{
    public function getModel()
    {
        return Contractor::class;
    }
}
