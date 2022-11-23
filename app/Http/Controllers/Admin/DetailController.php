<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Detail\DetailServiceInterface;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    private $detailService;
    public function __construct(DetailServiceInterface $detailService)
    {
        $this->detailService = $detailService;
    }
    public function index(Request $request){
        $details = $this->detailService->searchAndPaginate('name_goi_thau',$request->get('search'),5);
        return view('admin.detail.index',compact('details'));
    }

    public function edit($id){
        $detail = $this->detailService->find($id);
        return view('admin.detail.edit',compact('detail'));
    }

    public function editStore(Request $request)
    {
        $id = $request->get('id');
        $data = [
            'name_goi_thau' => $request->get('name_goi_thau'),
            'name_du_an' => $request->get('name_du_an'),
            'so_thong_bao' => $request->get('so_tbmt'),
            'name_moi_thau' => $request->get('name_moi_thau'),
            'address' => $request->get('address'),
            'time_phat_hanh' => $request->get('time_phat_hanh'),
            'time_mo_thau' => $request->get('time_mo_thau'),
            'time_dong_thau' => $request->get('time_dong_thau'),
        ];
        try {
            $this->detailService->update($data, $id);
            return redirect('admin/home/detail')->with('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            return back()->with('error', $err->getMessage());
        }
    }
}
