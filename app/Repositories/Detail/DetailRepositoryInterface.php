<?php
namespace App\Repositories\Detail;
use App\Repositories\RepositoryInterface;

interface DetailRepositoryInterface extends RepositoryInterface{
    public function deleteSave($id);

    public function searchActive($searches, $perPage);
    public function searchNoActive($searches, $perPage);
    public function searchAdmin($searches, $perPage);
    public function deleteTem0($id, $tem_id);
    public function deleteTem1($id, $tem_id);
}
