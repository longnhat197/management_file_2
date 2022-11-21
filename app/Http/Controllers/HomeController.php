<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\DetailTemp;
use App\Models\Template0;
use App\Models\Template1;
use App\Models\UserDetail;
use App\Services\Detail\DetailServiceInterface;
use App\Services\Contractor\ContractorServiceInterface;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\File\FileServiceInterface;
use App\Services\ListUser\ListUserServiceInterface;
use App\Services\Package\PackageServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $fileService;
    private $contractorService;
    private $projectService;
    private $customerService;
    private $packageService;
    private $listUserService;
    private $detailService;
    public function __construct(
        FileServiceInterface $fileService,
        ContractorServiceInterface $contractorService,
        ProjectServiceInterface $projectService,
        CustomerServiceInterface $customerService,
        PackageServiceInterface $packageService,
        ListUserServiceInterface $listUserService,
        DetailServiceInterface $detailService

    ) {
        $this->fileService = $fileService;
        $this->contractorService = $contractorService;
        $this->projectService = $projectService;
        $this->customerService = $customerService;
        $this->packageService = $packageService;
        $this->listUserService = $listUserService;
        $this->detailService = $detailService;
    }
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->remember;
        if (Auth::attempt($credentials, $remember)) {
            $isExit = UserDetail::select("*")
            ->where("user_id",Auth::user()->id)->exists();
            if($isExit){
                return redirect('home/edit');
            }
            return redirect('home/add'); // Mặc định vào trang thêm thông tin chung
        } else {
            return back()->with('notification', 'ERROR: Email or password is incorrect');
        }
    }

    public function edit(){
        $id = Auth::user()->userDetails[0]->detail_id;
        $detail = $this->detailService->find($id);

        return view('home.edit',compact('detail'));
    }

    public function editStore(Request $request){
        $id = $request->get('id');
        $data = [
            'name_goi_thau' => $request->get('name_goi_thau'),
            'name_du_an' => $request->get('name_du_an'),
            'so_thong_bao' => $request->get('so_tbmt'),
            'name_moi_thau' => $request->get('name_moi_thau'),
            'address' => $request->get('address'),
            'hinh_thuc_thau' => $request->get('hinh_thuc_thau'),
            'hinh_thuc_tham_du' => $request->get('hinh_thuc_tham_du'),
            'uy_quyen' => $request->get('uy_quyen'),
            'time_phat_hanh' => $request->get('time_phat_hanh'),
            'time_mo_thau' => $request->get('time_mo_thau'),
            'time_dong_thau' => $request->get('time_dong_thau'),
        ];
        try{
            $this->detailService->update($data, $id);
            return back()->with('success','Cập nhật thành công');
        }catch(\Exception $err){
            return back()->with('error', $err->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function index()
    {

        // $detail_id = Auth::user()->userDetails[0]->detail_id;
        // $list_temps = DetailTemp::where('detail_id',$detail_id)->get() ?? [];
        // return $list_temps;
        return view('home.index');
    }

    public function create(Request $request){
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
            'so_thong_bao' => $request->get('so_tbmt'),
            'name_moi_thau' => $request->get('name_moi_thau'),
            'address' => $request->get('address'),
            'hinh_thuc_thau' => $request->get('hinh_thuc_thau'),
            'hinh_thuc_tham_du' => $request->get('hinh_thuc_tham_du'),
            'uy_quyen' => $request->get('uy_quyen'),
            'time_phat_hanh' => $request->get('time_phat_hanh'),
            'time_mo_thau' => $request->get('time_mo_thau'),
            'time_dong_thau' => $request->get('time_dong_thau'),
        ]);
        $id = $detail->id;

        UserDetail::create([
            'user_id' =>  $request->get('user_id'),
            'detail_id' => $id,
            'comment' => 'create',
        ]);

        if($request->get('hinh_thuc_tham_du') == 0){
            $type =0;
            $templates = Template0::all();
            return view('template.index',compact('templates','id','type'));
        }else if($request->get('hinh_thuc_tham_du') == 1){
            $type =1;
            $templates = Template1::all();
            return view('template.index',compact('templates','id','type'));
        }
    }
}
