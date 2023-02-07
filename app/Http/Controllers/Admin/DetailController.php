<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailTemp;
use App\Models\UserDetail;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\Detail\DetailServiceInterface;
use App\Services\Login\LoginServiceInterface;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    private $detailService;
    private $customerService;
    private $loginService;
    public function __construct(
        DetailServiceInterface $detailService,
        CustomerServiceInterface $customerService,
        LoginServiceInterface $loginService
    ) {
        $this->detailService = $detailService;
        $this->customerService = $customerService;
        $this->loginService = $loginService;
    }
    public function index(Request $request)
    {
        $this->loginService->checkOverTime();

        $details = $this->detailService->searchAdmin($request->get('search'), 7)->withPath('http://contract.ansv.vn/admin/home/detail');

        return view('admin.detail.index', compact('details'));
    }

    public function edit($id)
    {
        $customers = $this->customerService->all();
        $detail = $this->detailService->find($id);
        return view('admin.detail.edit', compact('detail', 'customers'));
    }

    public function editStore(Request $request)
    {
        $id = $request->get('id');
        $data = [
            'name_goi_thau' => $request->get('name_goi_thau'),
            'name_du_an' => $request->get('name_du_an'),
            'so_thong_bao' => $request->get('so_tbmt'),
            'name_moi_thau' => $request->get('name_moi_thau'),
            'customer' => $request->get('customer'),
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

    public function delete($id)
    {
        try {
            UserDetail::where('detail_id', $id)->delete();
            DetailTemp::where('detail_id', $id)->delete();
            $this->detailService->deleteSave($id);
            $this->detailService->delete($id);
        } catch (\Exception $err) {
            return redirect('admin/home/detail')->with('error', $err->getMessage());
        }
        return redirect('admin/home/detail')->with('success', 'Đã xoá thành công');
    }
}
