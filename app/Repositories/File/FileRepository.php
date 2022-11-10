<?php

namespace App\Repositories\File;

use App\Models\File;
use App\Repositories\BaseRepository;


class FileRepository extends BaseRepository implements FileRepositoryInterface
{
    public function getModel()
    {
        return File::class;
    }

    public function getFileOnIndex($request, $perPage = 8)
    {
        $search = $request->search ?? '';
        $s_contractor = $request->s_contractor ?? '';
        if ($s_contractor != '') {
            $files = $this->model
                ->where('name', 'like', '%' . $search . '%')
                ->where('contractor_id', '=', $s_contractor)
                ->orderBy('id', 'desc')
                ->paginate($perPage)
                ->appends(['search' => $search, 's_contractor' => $s_contractor]);
        }
        if ($s_contractor == '') {
            $files = $this->model
                ->where('name', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate($perPage)
                ->appends(['search' => $search, 's_contractor' => $s_contractor]);
        }
        return $files;
    }


}
