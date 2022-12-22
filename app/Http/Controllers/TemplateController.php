<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\DetailTemp;
use App\Models\Mau1;
use App\Models\Mau2;
use App\Models\Mau3;
use App\Models\Mau41;
use App\Models\Mau51;
use App\Models\Template0;
use App\Models\UserDetail;
use App\Services\Detail\DetailServiceInterface;
use App\Services\Contractor\ContractorServiceInterface;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\File\FileServiceInterface;
use App\Services\ListUser\ListUserServiceInterface;
use App\Services\Package\PackageServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\Template1;
use DOCXTemplate;
use Illuminate\Http\Request;

use TheSeer\Tokenizer\Exception;
use function Psy\debug;

include('docxtemplate.class.php');

class TemplateController extends Controller
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
    //
    // public function index()
    // {
    //     $tems = Template0::all();
    //     return view('template.index',compact('tems'));
    // }

    public function test(Request $request)
    {
        try {
            foreach ($request->get('list_tem') as $tem_id) {
                DetailTemp::create([
                    'detail_id' => $request->get('detail_id'),
                    'tem_id' => $tem_id,
                    'type' => $request->get('type'),
                ]);
            }
        } catch (\Exception $err) {
            return $err->getMessage();
        }
        $detail_id = Auth::user()->userDetails[0]->detail_id;

        $type = DetailTemp::where('detail_id', $detail_id)->first()->type;
        if ($type == 0) {
            $link = DetailTemp::where('detail_id', $detail_id)->first()->templates0->url . '/' . $detail_id;
        } else if ($type == 1) {
            $link = DetailTemp::where('detail_id', $detail_id)->first()->templates1->url . '/' . $detail_id;
        }
        return redirect($link);
    }

    public function cancelTemp($id)
    {

        $this->detailService->delete($id);
        UserDetail::where('detail_id', $id)->delete();
        return redirect('home/add');
    }

    //------------------Mẫu 01. ĐƠN DỰ THẦU (thuộc HSĐXKT)---------------------
    public function create1($detail_id)
    {

        $projects = $this->projectService->all();
        $packages = $this->packageService->all();
        $customers = $this->contractorService->all();
        $contractors = $this->contractorService->all();

        $detail = $this->detailService->find($detail_id);

        $exist = Mau1::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau1::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }

        return view('template.create1', compact('detail', 'detail_id', 'temp'));
    }

    public function save1(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau1::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau1::where('detail_id', $detail_id)
                    ->update([
                        'date_dang_ky' => $request->get('date1'),
                        'so_trich_yeu' => $request->get('soTrichYeu'),
                        'so_sua_doi' => $request->get('soSuaDoi'),
                        'name_nha_thau' => $request->get('nameNhaThau'),
                        'time_thuc_hien' => $request->get('timeThucHien'),
                        'time_hieu_luc' => $request->get('timeHieuLuc'),
                        'date_start' => $request->get('dateStart'),
                        'ten_chuc_danh' => $request->get('chucDanh')
                    ]);
                $res = 'Đã cập nhật bản lưu';
            } else {
                Mau1::create([
                    'date_dang_ky' => $request->get('date1'),
                    'so_trich_yeu' => $request->get('soTrichYeu'),
                    'detail_id' => $detail_id,
                    'so_sua_doi' => $request->get('soSuaDoi'),
                    'name_nha_thau' => $request->get('nameNhaThau'),
                    'time_thuc_hien' => $request->get('timeThucHien'),
                    'time_hieu_luc' => $request->get('timeHieuLuc'),
                    'date_start' => $request->get('dateStart'),
                    'ten_chuc_danh' => $request->get('chucDanh')
                ]);
                $res = 'Đã tạo bản lưu cho file';
            }
            echo json_encode($res);
        }
    }
    public function store1(Request $request)
    {
        $date1 = $request->get('date');
        $y1 = substr($date1, 0, 4);
        $m1 = substr($date1, 5, 2);
        $d1 = substr($date1, 8, 2);

        $new_date = $d1 . '/' . $m1 . '/' . $y1;

        $date = $request->get('d');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);

        $templateProcessor = new \PhpOffice\PhpWord\Template('Mẫu 01. ĐƠN DỰ THẦU (thuộc HSĐXKT).docx');
        $file = 'Mẫu 01. ĐƠN DỰ THẦU (thuộc HSĐXKT)_' . date("Y-m-d") . '.docx';
        $templateProcessor->setValues(array(
            'date' => $new_date ?? '[ghi ngày tháng năm ký đơn dự thầu]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '[ghi tên gói thầu theo thông báo mời thầu]',
            'name_du_an' => $request->get('name_du_an') ?? '[ghi tên dự án]',
            'so_trich_yeu' => $request->get('so_trich_yeu') != '' ? '</w:t><w:br/><w:t>Thư mời thầu số: ' . $request->get('so_trich_yeu') . '.' : '',
            'name_moi_thau' => $request->get('name_moi_thau') ?? '[ghi đầy đủ và chính xác tên của Bên mời thầu]',
            'so_sua_doi' => $request->get('so_sua_doi') != '' ? 'số ' . $request->get('so_sua_doi') : '',
            'name_nha_thau' => $request->get('name_nha_thau') ?? '____ [ghi tên nhà thầu]',
            'name_goi_thau1' => $request->get('name_goi_thau1') ?? '____ [ghi tên gói thầu]',
            'date_thuc_hien' => $request->get('date_thuc_hien') ?? '___[ghi thời gian thực hiện tất cả các công việc theo yêu cầu của gói thầu]',
            'time' => $request->get('time') ?? '___',
            'd' => $d ?? '___',
            'm' => $m ?? '___',
            'y' => $y ?? '___',
            'ten_chuc_danh' => $request->get('ten_chuc_danh') ?? '[ghi tên, chức danh, ký tên và đóng dấu]'
        ));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }
    //------------------End Mẫu 01. ĐƠN DỰ THẦU (thuộc HSĐXKT)---------------------

    // ------------------Mẫu 02. GIẤY ỦY QUYỀN---------------------
    public function create2($detail_id)
    {
        // $d = date("d");
        // $m = date("m");
        // $Y = date("Y");
        // $contractors = $this->contractorService->all();
        // $packages = $this->packageService->all();
        // $projects = $this->projectService->all();
        // $customers = $this->customerService->all();

        // $user_dds = $this->listUserService->getUserByType(1);
        // $user_duqs = $this->listUserService->getUserByType(2);
        $detail = $this->detailService->find($detail_id);

        $exist = Mau2::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau2::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create2', compact(
            // 'd',
            // 'm',
            // 'Y',
            'detail',
            'detail_id',
            'temp'
        ));
    }

    public function save2(Request $request)
    {

        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau2::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau2::where('detail_id', $detail_id)->update([
                    'noi_lam_giay' => $request->get('noi_lam_giay'),
                    'date' => $request->get('date'),
                    'thong_tin_dai_dien' => $request->get('thong_tin_dai_dien'),
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'dia_chi_nha_thau' => $request->get('dia_chi_nha_thau'),
                    'thong_tin_nguoi_duoc_uy_quyen' => $request->get('thong_tin_nguoi_duoc_uy_quyen'),
                    'name_dai_dien' => $request->get('name_dai_dien'),
                    'name_uy_quyen' => $request->get('name_uy_quyen'),
                    'from_date' => $request->get('from_date'),
                    'to_date' => $request->get('to_date'),
                    'total' => $request->get('total'),
                    'uq_giu' => $request->get('uq_giu'),
                    'duq_giu' => $request->get('duq_giu'),
                    'moi_thau_giu' => $request->get('moi_thau_giu'),
                    'chu_ky_duq' => $request->get('chu_ky_duq'),
                    'chu_ky_uq' => $request->get('chu_ky_uq'),
                ]);
                $res = 'Đã cập nhật bản lưu';
            } else {
                Mau2::create([
                    'detail_id' => $detail_id,
                    'noi_lam_giay' => $request->get('noi_lam_giay'),
                    'date' => $request->get('date'),
                    'thong_tin_dai_dien' => $request->get('thong_tin_dai_dien'),
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'dia_chi_nha_thau' => $request->get('dia_chi_nha_thau'),
                    'thong_tin_nguoi_duoc_uy_quyen' => $request->get('thong_tin_nguoi_duoc_uy_quyen'),
                    'name_dai_dien' => $request->get('name_dai_dien'),
                    'name_uy_quyen' => $request->get('name_uy_quyen'),
                    'from_date' => $request->get('from_date'),
                    'to_date' => $request->get('to_date'),
                    'total' => $request->get('total'),
                    'uq_giu' => $request->get('uq_giu'),
                    'duq_giu' => $request->get('duq_giu'),
                    'moi_thau_giu' => $request->get('moi_thau_giu'),
                    'chu_ky_duq' => $request->get('chu_ky_duq'),
                    'chu_ky_uq' => $request->get('chu_ky_uq'),
                ]);
                $res = 'Đã tạo bản lưu';
            }
            echo json_encode($res);
        }
    }

    public function store2(Request $request)
    {
        // return $request->all();

        //Format lại date export vào word
        $date = $request->get('from_date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);

        $new_date = $d . '/' . $m . '/' . $y;

        $date1 = $request->get('to_date');
        $y1 = substr($date1, 0, 4);
        $m1 = substr($date1, 5, 2);
        $d1 = substr($date1, 8, 2);

        $new_date1 = $d1 . '/' . $m1 . '/' . $y1;

        $date2 = $request->get('date');
        $y2 = substr($date2, 0, 4);
        $m2 = substr($date2, 5, 2);
        $d2 = substr($date2, 8, 2);



        $templateProcessor = new \PhpOffice\PhpWord\Template('Mẫu 02. GIẤY ỦY QUYỀN.docx');
        $file = 'Mẫu 02. GIẤY ỦY QUYỀN_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'd' => $d2,
            'm' => $m2,
            'y' => $y2,
            'address' => $request->get('address') ?? '___',
            'thong_tin_dai_dien' => $request->get('thong_tin_dai_dien') ?? '____[ghi tên, số CMND hoặc số hộ chiếu, chức danh của người đại diện theo pháp luật của nhà thầu]',
            'name_nha_thau' => $request->get('name_nha_thau') ?? '____[ghi tên nhà thầu]',
            'dia_chi_nha_thau' => $request->get('dia_chi_nha_thau') ?? '____[ghi địa chỉ của nhà thầu]',
            'thong_tin_nguoi_duoc_uy_quyen' => $request->get('thong_tin_nguoi_duoc_uy_quyen') ?? '____[ghi tên, số CMND hoặc số hộ chiếu, chức danh của người được ủy quyền]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '___[ghi tên gói thầu]',
            'name_du_an' => $request->get('name_du_an') ?? '____[ghi tên dự án]',
            'name_moi_thau' => $request->get('name_moi_thau') ?? '____[ghi tên Bên mời thầu]',
            'name_nha_thau1' => $request->get('name_nha_thau') ?? '____[ghi tên nhà thầu]',
            'name_dai_dien' => $request->get('name_dai_dien') ?? '____[ghi tên người đại diện theo pháp luật của nhà thầu]',
            'name_uy_quyen' => $request->get('name_uy_quyen') ?? '____[ghi tên người được ủy quyền]',
            'from_date' => $new_date ?? '____',
            'to_date' => $new_date1 ?? '____',
            'total' => $request->get('total') ?? '____',
            'uq_giu' => $request->get('uq_giu') ?? '____',
            'duq_giu' => $request->get('duq_giu') ?? '____',
            'moi_thau_giu' => $request->get('moi_thau_giu') ?? '____',
            'chu_ky_duq' => $request->get('chu_ky_duq') ?? '[ghi tên, chức danh, ký tên và đóng dấu (nếu có)]',
            'chu_ky_uq' => $request->get('chu_ky_uq') ?? '[ghi tên người đại diện theo pháp luật của nhà thầu, chức danh, ký tên và đóng dấu]',
        ));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    public function ajax(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '0') {
                $contractor = $this->contractorService->find($id);
                $data = array(
                    'address' => $contractor->address,
                );
            }
            if ($id == "0") {
                $data = array(
                    'address' => ''
                );
            }

            echo json_encode($data);
        }
    }
    public function ajax1(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '0') {
                $user = $this->listUserService->find($id);
                $data = array(
                    'name' => $user->name,
                    'cmnd' => $user->cmnd,
                    'title' => $user->title

                );
            }
            if ($id == "0") {
                $data = array(
                    'name' => ''
                );
            }
            echo json_encode($data);
        }
    }

    public function ajaxUQ(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '0') {
                $user = $this->listUserService->find($id);
                $data = array(
                    'name' => $user->name,
                    'cmnd' => $user->cmnd,
                    'title' => $user->title

                );
            }
            if ($id == "0") {
                $data = array(
                    'name' => ''
                );
            }
            echo json_encode($data);
        }
    }

    // ------------------End Mẫu 02. GIẤY ỦY QUYỀN---------------------


    // ------------------Mẫu 03. THỎA THUẬN LIÊN DANH---------------------
    public function create3($detail_id)
    {

        $detail = $this->detailService->find($detail_id);
        $exist = Mau3::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau3::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create3', compact('detail', 'temp', 'detail_id'));
    }

    public function save3(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau3::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau3::where('detail_id', $detail_id)->update([
                    'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                    'noi_lam_thoa_thuan' => $request->get('noi_lam_giay'),
                    'can_cu' => $request->get('can_cu'),
                    'can_cu1' => $request->get('can_cu1'),
                    'date_hsmt' => $request->get('date_hsmt'),
                    'ten_thanh_vien' => $request->get('ten_thanh_vien'),
                    'name_dai_dien' => $request->get('name_dai_dien'),
                    'chuc_vu' => $request->get('chuc_vu'),
                    'dia_chi' => $request->get('dia_chi'),
                    'dien_thoai' => $request->get('dien_thoai'),
                    'fax' => $request->get('fax'),
                    'email' => $request->get('email'),
                    'tai_khoan' => $request->get('tai_khoan'),
                    'ma_so_thue' => $request->get('ma_so_thue'),
                    'so_uy_quyen' => $request->get('so_uy_quyen'),
                    'date_uq' => $request->get('date_uq'),
                    'name_lien_danh' => $request->get('name_lien_danh'),
                    'table_content' => $request->get('table_content'),
                    'hinh_thuc_khac' => $request->get('hinh_thuc_khac'),
                    'name_mot_ben' => $request->get('name_mot_ben'),
                    'noi_dung_khac' => $request->get('noi_dung_khac'),
                    'total' => $request->get('total'),
                    'moi_ben_giu' => $request->get('moi_ben_giu'),
                    'chu_ky_dung_dau' => $request->get('chu_ky_dung_dau'),
                    'chu_ky_thanh_vien' => $request->get('chu_ky_thanh_vien')
                ]);
                $res = 'Đã cập nhật bản lưu';
            } else {
                Mau3::create([
                    'detail_id' => $detail_id,
                    'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                    'noi_lam_thoa_thuan' => $request->get('noi_lam_giay'),
                    'can_cu' => $request->get('can_cu'),
                    'can_cu1' => $request->get('can_cu1'),
                    'date_hsmt' => $request->get('date_hsmt'),
                    'ten_thanh_vien' => $request->get('ten_thanh_vien'),
                    'name_dai_dien' => $request->get('name_dai_dien'),
                    'chuc_vu' => $request->get('chuc_vu'),
                    'dia_chi' => $request->get('dia_chi'),
                    'dien_thoai' => $request->get('dien_thoai'),
                    'fax' => $request->get('fax'),
                    'email' => $request->get('email'),
                    'tai_khoan' => $request->get('tai_khoan'),
                    'ma_so_thue' => $request->get('ma_so_thue'),
                    'so_uy_quyen' => $request->get('so_uy_quyen'),
                    'date_uq' => $request->get('date_uq'),
                    'name_lien_danh' => $request->get('name_lien_danh'),
                    'table_content' => $request->get('table_content'),
                    'hinh_thuc_khac' => $request->get('hinh_thuc_khac'),
                    'name_mot_ben' => $request->get('name_mot_ben'),
                    'noi_dung_khac' => $request->get('noi_dung_khac'),
                    'total' => $request->get('total'),
                    'moi_ben_giu' => $request->get('moi_ben_giu'),
                    'chu_ky_dung_dau' => $request->get('chu_ky_dung_dau'),
                    'chu_ky_thanh_vien' => $request->get('chu_ky_thanh_vien')
                ]);

                $res = 'Đã tạo bản lưu';
            }
            echo json_encode($res);
        }
    }
    public function store3(Request $request)
    {

        $date = $request->get('date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);

        $date1 = $request->get('date1');
        $y1 = $date1 != null ? substr($date1, 0, 4) : '___';
        $m1 = $date1 != null ? substr($date1, 5, 2) : '___';
        $d1 = $date1 != null ? substr($date1, 8, 2) : '___';

        $date2 = $request->get('date2');
        $y2 = $date2 != null ? substr($date2, 0, 4) : '___';
        $m2 = $date1 != null ? substr($date2, 5, 2) : '___';
        $d2 = $date1 != null ? substr($date2, 8, 2) : '___';
        // return $request->all();
        $templateProcessor = new \PhpOffice\PhpWord\Template('Mẫu 03. THỎA THUẬN LIÊN DANH.docx');
        $file = 'Mẫu 03. THỎA THUẬN LIÊN DANH_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'address' => $request->get('address') ?? '____',
            'd' => $d,
            'm' => $m,
            'y' => $y,
            'name_goi_thau' => $request->get('name_goi_thau') ?? '____ [ghi tên gói thầu] ',
            'name_du_an' => $request->get('name_du_an') ?? '____ [ghi tên dự án]',
            'can_cu' => $request->get('can_cu') ?? '__ [Luật đấu thầu số 43/2013/QH13 ngày 26/11/2013 của Quốc hội];',
            'can_cu1' => $request->get('can_cu1') ?? '____ [Nghị định số 63/2014/NĐ-CP ngày 26/6/2014 của Chính phủ về hướng dẫn thi hành Luật đấu thầu về lựa chọn nhà thầu];',
            'd1' => $d1,
            'm1' => $m1,
            'y1' => $y1,
            'name_thanh_vien' => $request->get('ten_thanh_vien') ?? '____[ghi tên từng thành viên liên danh]',
            'uy_quyen' => $request->get('so_uy_quyen') != '' ? '</w:t><w:br/><w:t>Giấy uỷ quyền số ' . $request->get('so_uy_quyen') . ' ngày ' . $d2 . ' tháng ' . $m2 . ' năm ' . $y2 . '.' : '',
            'name_dai_dien' => $request->get('name_dai_dien') ?? '______________________________________________________',
            'chuc_vu' => $request->get('chuc_vu') ?? '______________________________________________________________',
            'dia_chi' => $request->get('dia_chi') ?? '_______________________________________________________________',
            'dien_thoai' => $request->get('dien_thoai') ?? '_____________________________________________________________',
            'fax' => $request->get('fax') ?? '__________________________________________________________________',
            'email' => $request->get('email') ?? '________________________________________________________________',
            'tai_khoan' => $request->get('tai_khoan') ?? '_____________________________________________________________',
            'ma_so_thue' => $request->get('ma_so_thue') ?? '____________________________________________________________',
            'name_lien_danh' => $request->get('name_lien_danh') ?? '____[ghi tên của liên danh theo thỏa thuận].',
            'hinh_thuc_khac' => $request->get('hinh_thuc_khac') != '' ? '</w:t><w:br/><w:t>- Hình thức xử lý khác ' . $request->get('hinh_thuc_khac') . '.' : '',
            'name_mot_ben' => $request->get('name_mot_ben') ?? '____[ghi tên một bên]',
            'noi_dung_khac' => $request->get('noi_dung_khac') != '' ? '</w:t><w:br/><w:t>- Các công việc khác trừ việc ký kết hợp đồng ' . $request->get('noi_dung_khac') . '.</w:t>' : '',
            'total' => $request->get('total') ?? '___',
            'moi_ben_giu' => $request->get('moi_ben_giu') ?? '___',
            'chu_ky_dung_dau' => $request->get('chu_ky_dung_dau') ?? '[ghi tên, chức danh, ký tên và đóng dấu]',
            'chu_ky_thanh_vien' => $request->get('chu_ky_thanh_vien') ?? '[ghi tên từng thành viên, chức danh, ký tên và đóng dấu]',

        ));
        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        // dd($request->get('table_content'));
        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    // ------------------End Mẫu 03. THỎA THUẬN LIÊN DANH---------------------



    // ------------------Mẫu 04 (a). BẢO LÃNH DỰ THẦU---------------------


    public function create4()
    {
        $customers = $this->customerService->all();
        $contractors = $this->contractorService->all();
        $projects = $this->projectService->all();
        $packages = $this->packageService->all();

        return view('template.create4', compact('customers', 'contractors', 'packages', 'projects'));
    }

    public function ajaxMT(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '0') {
                $customer = $this->customerService->find($id);
                $data = array(
                    'name' => $customer->name,
                    'address' => $customer->address,
                );
            }
            if ($id == "0") {
                $data = array(
                    'name' => '',
                    'address' => ''
                );
            }
            echo json_encode($data);
        }
    }

    public function store4(Request $request)
    {

        // return $request->all();
        $date = $request->get('ngay_phat_hanh');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);

        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '___[ghi ngày phát hành bảo lãnh]';

        $date1 = $request->get('date');
        $y1 = $date1 != null ? substr($date1, 0, 4) : '___';
        $m1 = $date1 != null ? substr($date1, 5, 2) : '___';
        $d1 = $date1 != null ? substr($date1, 8, 2) : '___';

        $templateProcessor = new \PhpOffice\PhpWord\Template('Mẫu 04 (a). BẢO LÃNH DỰ THẦU.docx');
        $file = 'Mẫu 04 (a). BẢO LÃNH DỰ THẦU_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'thong_tin_moi_thau' => $request->get('thong_tin_moi_thau') ?? '___[ghi tên và địa chỉ của Bên mời thầu]',
            'ngay_phat_hanh' => $new_date,
            'so_trich_yeu' => $request->get('so_trich_yeu') ?? '___[ghi số trích yếu của Bảo lãnh dự thầu]',
            'thong_tin_phat_hanh' => $request->get('thong_tin_phat_hanh'),
            'name_nha_thau' => $request->get('name_nha_thau') ?? '[ghi tên nhà thầu]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '[ghi tên gói thầu]',
            'name_du_an' => $request->get('name_du_an') ?? '[ghi tên dự án]',
            'so_trich_yeu1' => $request->get('so_trich_yeu1') ?? '[ghi số trích yếu của Thư mời thầu/thông báo mời thầu]',
            'so_tien' => $request->get('so_tien') ?? '____[ghi rõ giá trị bằng số, bằng chữ và đồng tiền sử dụng]',
            'time' => $request->get('time') ?? '____',
            'd' => $d1,
            'm' => $m1,
            'y' => $y1,
            'so_tien1' => $request->get('so_tien1') ?? '[ghi bằng chữ] [ghi bằng số]',
            'ten_chuc_danh' => $request->get('ten_chuc_danh') ?? '[ghi tên, chức danh, ký tên và đóng dấu]',
        ));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    public function create4_1($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau41::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau41::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }


        return view('template.create4_1', compact('detail', 'temp', 'detail_id'));
    }

    public function save41(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau41::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau41::where('detail_id', $detail_id)
                    ->update([
                        'thong_tin_moi_thau' => $request->get('thong_tin_moi_thau'),
                        'ngay_phat_hanh' => $request->get('ngay_phat_hanh'),
                        'so_trich_yeu' => $request->get('so_trich_yeu'),
                        'thong_tin_phat_hanh' => $request->get('thong_tin_phat_hanh'),
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'so_trich_yeu1' => $request->get('so_trich_yeu1'),
                        'so_tien_bl' => $request->get('so_tien_bl'),
                        'time' => $request->get('time'),
                        'from_date' => $request->get('from_date'),
                        'so_tien_tt' => $request->get('so_tien_tt'),
                        'name_lien_danh' => $request->get('name_lien_danh'),
                        'name_chuc_danh' => $request->get('name_chuc_danh'),
                    ]);
                $res = 'Đã cập nhật bản lưu';
            } else {
                Mau41::create([
                    'detail_id' => $detail_id,
                    'thong_tin_moi_thau' => $request->get('thong_tin_moi_thau'),
                    'ngay_phat_hanh' => $request->get('ngay_phat_hanh'),
                    'so_trich_yeu' => $request->get('so_trich_yeu'),
                    'thong_tin_phat_hanh' => $request->get('thong_tin_phat_hanh'),
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'so_trich_yeu1' => $request->get('so_trich_yeu1'),
                    'so_tien_bl' => $request->get('so_tien_bl'),
                    'time' => $request->get('time'),
                    'from_date' => $request->get('from_date'),
                    'so_tien_tt' => $request->get('so_tien_tt'),
                    'name_lien_danh' => $request->get('name_lien_danh'),
                    'name_chuc_danh' => $request->get('name_chuc_danh'),

                ]);
                $res = 'Đã tạo bản lưu cho file';
            }
            echo json_encode($res);
        }
    }
    public function ajaxMT41(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '0') {
                $customer = $this->customerService->find($id);
                $data = array(
                    'name' => $customer->name,
                    'address' => $customer->address,
                );
            }
            if ($id == "0") {
                $data = array(
                    'name' => '',
                    'address' => ''
                );
            }
            echo json_encode($data);
        }
    }

    public function store4_1(Request $request)
    {

        // return $request->all();
        $date = $request->get('ngay_phat_hanh');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);

        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '___[ghi ngày phát hành bảo lãnh]';

        $date1 = $request->get('date');
        $y1 = $date1 != null ? substr($date1, 0, 4) : '___';
        $m1 = $date1 != null ? substr($date1, 5, 2) : '___';
        $d1 = $date1 != null ? substr($date1, 8, 2) : '___';

        $templateProcessor = new \PhpOffice\PhpWord\Template('Mẫu 04 (b). BẢO LÃNH DỰ THẦU.docx');
        $file = 'Mẫu 04 (b). BẢO LÃNH DỰ THẦU_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'thong_tin_moi_thau' => $request->get('thong_tin_moi_thau') ?? '___[ghi tên và địa chỉ của Bên mời thầu]',
            'ngay_phat_hanh' => $new_date,
            'so_trich_yeu' => $request->get('so_trich_yeu') ?? '___[ghi số trích yếu của Bảo lãnh dự thầu]',
            'thong_tin_phat_hanh' => $request->get('thong_tin_phat_hanh'),
            'name_nha_thau' => $request->get('name_nha_thau') ?? '[ghi tên nhà thầu]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '[ghi tên gói thầu]',
            'name_du_an' => $request->get('name_du_an') ?? '[ghi tên dự án]',
            'so_trich_yeu1' => $request->get('so_trich_yeu1') ?? '[ghi số trích yếu của Thư mời thầu/thông báo mời thầu]',
            'so_tien' => $request->get('so_tien') ?? '____[ghi rõ giá trị bằng số, bằng chữ và đồng tiền sử dụng]',
            'time' => $request->get('time') ?? '____',
            'd' => $d1,
            'm' => $m1,
            'y' => $y1,
            'so_tien_1' => $request->get('so_tien1') ?? '[ghi bằng chữ] [ghi bằng số]',
            'name_lien_danh' => $request->get('name_lien_danh') ?? '_____ [ghi đầy đủ tên của nhà thầu liên danh]',
            'ten_chuc_danh' => $request->get('ten_chuc_danh') ?? '[ghi tên, chức danh, ký tên và đóng dấu]',
        ));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    // ------------------End Mẫu 04 (b). BẢO LÃNH DỰ THẦU---------------------


    // ------------------ Mẫu 05 (a). BẢN KÊ KHAI THÔNG TIN VỀ NHÀ THẦU---------------------

    public function create51($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau51::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau51::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create51', compact('detail', 'temp', 'detail_id'));
    }

    public function store51(Request $request)
    {
        return $request->all();
    }

    public function save51(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau51::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau51::where('detail_id', $detail_id)
                    ->update([
                        'ngay_ke_khai' => $request->get('ngay_ke_khai'),
                        'so_hieu' => $request->get('so_hieu'),
                        'trang' => $request->get('trang'),
                        'tren_trang' => $request->get('tren_trang'),
                        'name_lien_danh' => $request->get('name_lien_danh'),
                        'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                        'quoc_gia_dang_ky' => $request->get('quoc_gia_dang_ky'),
                        'nam_thanh_lap' => $request->get('nam_thanh_lap'),
                        'dia_chi_hop_phap' => $request->get('dia_chi_hop_phap'),
                        'name_thanh_vien' => $request->get('name_thanh_vien'),
                        'dia_chi' => $request->get('dia_chi'),
                        'so_dien_thoai' => $request->get('so_dien_thoai'),
                        'email' => $request->get('email'),
                    ]);
                $res = 'Đã cập nhật bản lưu';
            } else {
                Mau51::create([
                    'detail_id' => $detail_id,
                    'ngay_ke_khai' => $request->get('ngay_ke_khai'),
                    'so_hieu' => $request->get('so_hieu'),
                    'trang' => $request->get('trang'),
                    'tren_trang' => $request->get('tren_trang'),
                    'name_lien_danh' => $request->get('name_lien_danh'),
                    'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                    'quoc_gia_dang_ky' => $request->get('quoc_gia_dang_ky'),
                    'nam_thanh_lap' => $request->get('nam_thanh_lap'),
                    'dia_chi_hop_phap' => $request->get('dia_chi_hop_phap'),
                    'name_thanh_vien' => $request->get('name_thanh_vien'),
                    'dia_chi' => $request->get('dia_chi'),
                    'so_dien_thoai' => $request->get('so_dien_thoai'),
                    'email' => $request->get('email'),

                ]);
                $res = 'Đã tạo bản lưu cho file';
            }
            echo json_encode($res);
        }
    }


    // ------------------End Mẫu 05 (a). BẢN KÊ KHAI THÔNG TIN VỀ NHÀ THẦU---------------------
}
