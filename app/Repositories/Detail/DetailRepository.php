<?php
namespace App\Repositories\Detail;

use App\Models\Detail;
use App\Repositories\BaseRepository;


class DetailRepository extends BaseRepository implements DetailRepositoryInterface{
    public function getModel()
    {
        return Detail::class;
    }
}
