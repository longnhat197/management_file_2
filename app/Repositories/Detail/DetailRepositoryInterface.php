<?php
namespace App\Repositories\Detail;
use App\Repositories\RepositoryInterface;

interface DetailRepositoryInterface extends RepositoryInterface{
    public function deleteSave($id);

    public function searchActive($searches, $perPage);
    public function searchNoActive($searches, $perPage);
}
