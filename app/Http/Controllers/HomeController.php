<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\DetailTemp;
use App\Models\Template0;
use App\Models\Template1;
use App\Models\User;
use App\Models\UserDetail;
use App\Services\Detail\DetailServiceInterface;
use App\Services\Contractor\ContractorServiceInterface;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\File\FileServiceInterface;
use App\Services\ListUser\ListUserServiceInterface;
use App\Services\Login\LoginServiceInterface;
use App\Services\Package\PackageServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $fileService;
    private $contractorService;
    private $projectService;
    private $customerService;
    private $packageService;
    private $listUserService;
    private $detailService;
    private $loginService;
    public function __construct(
        FileServiceInterface $fileService,
        ContractorServiceInterface $contractorService,
        ProjectServiceInterface $projectService,
        CustomerServiceInterface $customerService,
        PackageServiceInterface $packageService,
        ListUserServiceInterface $listUserService,
        DetailServiceInterface $detailService,
        LoginServiceInterface $loginService

    ) {
        $this->fileService = $fileService;
        $this->contractorService = $contractorService;
        $this->projectService = $projectService;
        $this->customerService = $customerService;
        $this->packageService = $packageService;
        $this->listUserService = $listUserService;
        $this->detailService = $detailService;
        $this->loginService = $loginService;
    }
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        if ($request->get('email') == '' || $request->get('password') == '') {
            return back()->with('error', 'Không được để trống dữ liệu');
        }
        $this->loginService->checkOverTime();
        return $this->loginService->loginExpert($request);
    }

    public function edit($id)
    {

        // $id = Auth::user()->userDetails[0]->detail_id;
        $detail = $this->detailService->find($id);
        $customers = $this->customerService->all();

        return view('home.edit', compact('detail', 'customers'));
    }

    public function editStore(Request $request)
    {
        $id = $request->get('id');
        $detail = $this->detailService->find($id);

        $data = [
            'name_goi_thau' => $request->get('name_goi_thau'),
            'name_du_an' => $request->get('name_du_an'),
            'customer' => $request->get('customer'),
            'so_thong_bao' => $request->get('so_tbmt'),
            'name_moi_thau' => $request->get('name_moi_thau'),
            'address' => $request->get('address'),
            'time_phat_hanh' => $request->get('time_phat_hanh'),
            'time_mo_thau' => $request->get('time_mo_thau'),
            'time_dong_thau' => $request->get('time_dong_thau'),
        ];

        switch ($request->input('action')) {
            case 'update':
                try {
                    $this->detailService->update($data, $id);
                    DetailTemp::where('detail_id', $id)->delete();
                    $this->detailService->deleteSave($id);
                    $uy_quyen = $this->detailService->find($id)->uy_quyen;
                    if ($detail->hinh_thuc_tham_du == 0) {
                        $type = 0;
                        $templates = Template0::all();
                        return view('template.update', compact('templates', 'id', 'type', 'uy_quyen'));
                    } else if ($detail->hinh_thuc_tham_du == 1) {
                        $type = 1;
                        $templates = Template1::all();
                        return view('template.update', compact('templates', 'id', 'type', 'uy_quyen'));
                    }
                } catch (\Exception $err) {
                    return back()->with('error', $err->getMessage());
                }

                break;
            case 'edit':
                try {
                    $this->detailService->update($data, $id);
                    $uy_quyen = $this->detailService->find($id)->uy_quyen;
                    $detail_temps = DetailTemp::where('detail_id', $id)->get();
                    foreach ($detail_temps as $value) {
                        $array[] = $value->tem_id;
                    }

                    if ($detail->hinh_thuc_tham_du == 0) {
                        $type = 0;
                        $templates = Template0::all();
                        return view('template.edit', compact('templates', 'id', 'type', 'uy_quyen', 'array'));
                    } else if ($detail->hinh_thuc_tham_du == 1) {
                        $type = 1;
                        $templates = Template1::all();
                        return view('template.edit', compact('templates', 'id', 'type', 'uy_quyen', 'array'));
                    }
                } catch (\Exception $err) {
                    return back()->with('error', $err->getMessage());
                }
                break;
        }
    }

    // public function editNotDelete(Request $request,$id){
    //     $detail = $this->detailService->find($id);
    //     $data = [
    //         'name_goi_thau' => $request->get('name_goi_thau'),
    //         'name_du_an' => $request->get('name_du_an'),
    //         'customer' => $request->get('customer'),
    //         'so_thong_bao' => $request->get('so_tbmt'),
    //         'name_moi_thau' => $request->get('name_moi_thau'),
    //         'address' => $request->get('address'),
    //         'time_phat_hanh' => $request->get('time_phat_hanh'),
    //         'time_mo_thau' => $request->get('time_mo_thau'),
    //         'time_dong_thau' => $request->get('time_dong_thau'),
    //     ];
    //     return $data;
    //     // try {
    //     //     $this->detailService->update($data, $id);
    //     //     $uy_quyen = $this->detailService->find($id)->uy_quyen;
    //     //     if ($detail->hinh_thuc_tham_du == 0) {
    //     //         $type = 0;
    //     //         $templates = Template0::all();
    //     //         return view('template.update', compact('templates', 'id', 'type','uy_quyen'));
    //     //     } else if ($detail->hinh_thuc_tham_du == 1) {
    //     //         $type = 1;
    //     //         $templates = Template1::all();
    //     //         return view('template.update', compact('templates', 'id', 'type','uy_quyen'));
    //     //     }
    //     // } catch (\Exception $err) {
    //     //     return back()->with('error', $err->getMessage());
    //     // }


    // }

    public function delete($id)
    {
        try {
            UserDetail::where('detail_id', $id)->delete();
            DetailTemp::where('detail_id', $id)->delete();
            $this->detailService->deleteSave($id);
            $this->detailService->delete($id);
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
        return redirect()->back()->with('success', 'Đã xoá thành công');
    }

    public function logout()
    {
        Session::flush();
        $this->loginService->checkOverTime();
        Auth::logout();
        return redirect('login');
    }

    public function index()
    {

        // $detail_id = Auth::user()->userDetails[0]->detail_id;
        // $list_temps = DetailTemp::where('detail_id',$detail_id)->get() ?? [];
        // return $list_temps;

        $customers = $this->customerService->all();
        return view('home.index', compact('customers'));
    }

    public function show(Request $request)
    {
        $this->loginService->checkOverTime();

        $details = $this->detailService->searchActive($request->get('search'), 5)->withPath('http://contract.ansv.vn/template/show');
        return view('home.show', compact('details'));
    }

    public function showHs(Request $request)
    {
        $this->loginService->checkOverTime();

        $details = $this->detailService->searchNoActive($request->get('search'), 5)->withPath('http://contract.ansv.vn/template/showHs');
        return view('home.showHs', compact('details'));
    }

    public function create(Request $request)
    {

        // $request->validate([
        //     'name_goi_thau' => 'required',
        //     'name_du_an' => 'required',
        //     'so_tbmt'=>'required',
        //     'name_moi_thau' => 'required',
        //     'address' => 'required',
        //     'time_mo_thau' =>'required',
        //     'time_dong_thau' => 'required',
        //     'time_phat_hanh' => 'required'
        // ],[
        //     'name_goi_thau.required' =>'Cần điền tên gói thầu',
        //     'name_du_an.required' =>'Cần điền tên dự án',
        //     'so_tbmt.required' =>'Cần điền số thông báo mời thầu',
        //     'name_moi_thau.required' =>'Cần điền tên mời thầu',
        //     'address.required' =>'Cần điền địa chỉ',
        //     'time_mo_thau.required' =>'Cần điền thời gian mở thầu',
        //     'time_dong_thau.required' =>'Cần điền thời gian đóng thầu',
        //     'time_phat_hanh.required' =>'Cần điền thời gian phát hành',

        // ]);

        $detail = $this->detailService->create([
            'name_goi_thau' => $request->get('name_goi_thau'),
            'name_du_an' => $request->get('name_du_an'),
            'customer' => $request->get('customer'),
            'so_thong_bao' => $request->get('so_tbmt'),
            'name_moi_thau' => $request->get('name_moi_thau'),
            'address' => $request->get('address'),
            'hinh_thuc_thau' => $request->get('hinh_thuc_thau'),
            'hinh_thuc_tham_du' => $request->get('hinh_thuc_tham_du'),
            'uy_quyen' => $request->get('uy_quyen'),
            'time_phat_hanh' => $request->get('time_phat_hanh'),
            'time_mo_thau' => $request->get('time_mo_thau'),
            'time_dong_thau' => $request->get('time_dong_thau'),
            'user_id' => $request->get('user_id'),
            'enabled' => 1
        ]);
        $id = $detail->id;

        UserDetail::create([
            'user_id' =>  $request->get('user_id'),
            'detail_id' => $id,
        ]);
        $uy_quyen = $request->get('uy_quyen');
        if ($request->get('hinh_thuc_tham_du') == 0) {
            $type = 0;
            $templates = Template0::all();
            return view('template.index', compact('templates', 'id', 'type', 'uy_quyen'));
        } else if ($request->get('hinh_thuc_tham_du') == 1) {
            $type = 1;
            $templates = Template1::all();
            return view('template.index', compact('templates', 'id', 'type', 'uy_quyen'));
        }
    }
}
