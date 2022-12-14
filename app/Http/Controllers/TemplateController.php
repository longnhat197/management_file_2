<?php

namespace App\Http\Controllers;


use App\Models\DetailTemp;
use App\Models\Mau1;
use App\Models\Mau10;
use App\Models\Mau11;
use App\Models\Mau12;
use App\Models\Mau13;
use App\Models\Mau14;
use App\Models\Mau151;
use App\Models\Mau152;
use App\Models\Mau153;
use App\Models\Mau161;
use App\Models\Mau2;
use App\Models\Mau3;
use App\Models\Mau4;
use App\Models\Mau41;
use App\Models\Mau5;
use App\Models\Mau51;
use App\Models\Mau6;
use App\Models\Mau61;
use App\Models\Mau7;
use App\Models\Mau71;
use App\Models\Mau8;
use App\Models\Mau9;
use App\Models\Mau91;
use App\Models\UserDetail;
use App\Services\Detail\DetailServiceInterface;
use App\Services\Contractor\ContractorServiceInterface;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\File\FileServiceInterface;
use App\Services\ListUser\ListUserServiceInterface;
use App\Services\Package\PackageServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use Illuminate\Http\Request;
use TemplateProcessor;

include('docxtemplate.class.php');
include('TemplateProcessor.php');

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
        $detail_id = $request->get('detail_id');

        $type = DetailTemp::where('detail_id', $detail_id)->first()->type;
        if ($type == 0) {
            $link = DetailTemp::where('detail_id', $detail_id)->first()->templates0->url . '/' . $detail_id;
        } elseif ($type == 1) {
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

    //------------------M???u 01. ????N D??? TH???U (thu???c HS??XKT)---------------------
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
                $res = '???? c???p nh???t b???n l??u';
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
                $res = '???? t???o b???n l??u cho file';
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

        $templateProcessor = new TemplateProcessor('M???u 01. ????N D??? TH???U (thu???c HS??XKT).docx');
        $file = 'M???u 01. ????N D??? TH???U (thu???c HS??XKT)_' . date("Y-m-d") . '.docx';
        $templateProcessor->setValues(array(
            'date' => $new_date ?? '[ghi ng??y th??ng n??m k?? ????n d??? th???u]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '[ghi t??n g??i th???u theo th??ng b??o m???i th???u]',
            'name_du_an' => $request->get('name_du_an') ?? '[ghi t??n d??? ??n]',
            // 'so_trich_yeu' => $request->get('so_trich_yeu') != '' ? '</w:t><w:br/><w:t>Th?? m???i th???u s???: ' . $request->get('so_trich_yeu') . '.' : '',
            'name_moi_thau' => $request->get('name_moi_thau') ?? '[ghi ?????y ????? v?? ch??nh x??c t??n c???a B??n m???i th???u]',
            'so_sua_doi' => $request->get('so_sua_doi') != '' ? 's??? ' . $request->get('so_sua_doi') : '',
            'name_nha_thau' => $request->get('name_nha_thau') ?? '____ [ghi t??n nh?? th???u]',
            'name_goi_thau1' => $request->get('name_goi_thau1') ?? '____ [ghi t??n g??i th???u]',
            'date_thuc_hien' => $request->get('date_thuc_hien') ?? '___[ghi th???i gian th???c hi???n t???t c??? c??c c??ng vi???c theo y??u c???u c???a g??i th???u]',
            'time' => $request->get('time') ?? '___',
            'd' => $d ?? '___',
            'm' => $m ?? '___',
            'y' => $y ?? '___',
            'ten_chuc_danh' => $request->get('ten_chuc_danh') ?? '[ghi t??n, ch???c danh, k?? t??n v?? ????ng d???u]'
        ));

        if ($request->get('so_trich_yeu') != '') {
            $templateProcessor->cloneBlock('block_so_trich_yeu', 0, true, false, array(
                array('so_trich_yeu' => "Th?? m???i th???u s???: $request->get('so_trich_yeu')")
            ));
        } elseif ($request->get('so_trich_yeu') == '') {
            $templateProcessor->cloneBlock('block_so_trich_yeu', 0, true, false, null);
        }

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }
    //------------------End M???u 01. ????N D??? TH???U (thu???c HS??XKT)---------------------

    // ------------------M???u 02. GI???Y ???Y QUY???N---------------------
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
                $res = '???? c???p nh???t b???n l??u';
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
                $res = '???? t???o b???n l??u';
            }
            echo json_encode($res);
        }
    }

    public function store2(Request $request)
    {
        // return $request->all();

        //Format l???i date export v??o word
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



        $templateProcessor = new TemplateProcessor('M???u 02. GI???Y ???Y QUY???N.docx');
        $file = 'M???u 02. GI???Y ???Y QUY???N_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'd' => $d2,
            'm' => $m2,
            'y' => $y2,
            'address' => $request->get('address') ?? '___',
            'thong_tin_dai_dien' => $request->get('thong_tin_dai_dien') ?? '____[ghi t??n, s??? CMND ho???c s??? h??? chi???u, ch???c danh c???a ng?????i ?????i di???n theo ph??p lu???t c???a nh?? th???u]',
            'name_nha_thau' => $request->get('name_nha_thau') ?? '____[ghi t??n nh?? th???u]',
            'dia_chi_nha_thau' => $request->get('dia_chi_nha_thau') ?? '____[ghi ?????a ch??? c???a nh?? th???u]',
            'thong_tin_nguoi_duoc_uy_quyen' => $request->get('thong_tin_nguoi_duoc_uy_quyen') ?? '____[ghi t??n, s??? CMND ho???c s??? h??? chi???u, ch???c danh c???a ng?????i ???????c ???y quy???n]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '___[ghi t??n g??i th???u]',
            'name_du_an' => $request->get('name_du_an') ?? '____[ghi t??n d??? ??n]',
            'name_moi_thau' => $request->get('name_moi_thau') ?? '____[ghi t??n B??n m???i th???u]',
            'name_nha_thau1' => $request->get('name_nha_thau') ?? '____[ghi t??n nh?? th???u]',
            'name_dai_dien' => $request->get('name_dai_dien') ?? '____[ghi t??n ng?????i ?????i di???n theo ph??p lu???t c???a nh?? th???u]',
            'name_uy_quyen' => $request->get('name_uy_quyen') ?? '____[ghi t??n ng?????i ???????c ???y quy???n]',
            'from_date' => $new_date ?? '____',
            'to_date' => $new_date1 ?? '____',
            'total' => $request->get('total') ?? '____',
            'uq_giu' => $request->get('uq_giu') ?? '____',
            'duq_giu' => $request->get('duq_giu') ?? '____',
            'moi_thau_giu' => $request->get('moi_thau_giu') ?? '____',
            'chu_ky_duq' => $request->get('chu_ky_duq') ?? '[ghi t??n, ch???c danh, k?? t??n v?? ????ng d???u (n???u c??)]',
            'chu_ky_uq' => $request->get('chu_ky_uq') ?? '[ghi t??n ng?????i ?????i di???n theo ph??p lu???t c???a nh?? th???u, ch???c danh, k?? t??n v?? ????ng d???u]',
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

    // ------------------End M???u 02. GI???Y ???Y QUY???N---------------------


    // ------------------M???u 03. TH???A THU???N LI??N DANH---------------------
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
                $res = '???? c???p nh???t b???n l??u';
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

                $res = '???? t???o b???n l??u';
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
        $templateProcessor = new TemplateProcessor('M???u 03. TH???A THU???N LI??N DANH.docx');
        $file = 'M???u 03. TH???A THU???N LI??N DANH_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'address' => $request->get('address') ?? '____',
            'd' => $d,
            'm' => $m,
            'y' => $y,
            'name_goi_thau' => $request->get('name_goi_thau') ?? '____ [ghi t??n g??i th???u] ',
            'name_du_an' => $request->get('name_du_an') ?? '____ [ghi t??n d??? ??n]',
            'can_cu' => $request->get('can_cu') ?? '__ [Lu???t ?????u th???u s??? 43/2013/QH13 ng??y 26/11/2013 c???a Qu???c h???i];',
            'can_cu1' => $request->get('can_cu1') ?? '____ [Ngh??? ?????nh s??? 63/2014/N??-CP ng??y 26/6/2014 c???a Ch??nh ph??? v??? h?????ng d???n thi h??nh Lu???t ?????u th???u v??? l???a ch???n nh?? th???u];',
            'd1' => $d1,
            'm1' => $m1,
            'y1' => $y1,
            'name_thanh_vien' => $request->get('ten_thanh_vien') ?? '____[ghi t??n t???ng th??nh vi??n li??n danh]',
            // 'uy_quyen' => $request->get('so_uy_quyen') != '' ? '</w:t><w:br/><w:t>Gi???y u??? quy???n s??? ' . $request->get('so_uy_quyen') . ' ng??y ' . $d2 . ' th??ng ' . $m2 . ' n??m ' . $y2 . '.' : '',
            'name_dai_dien' => $request->get('name_dai_dien') ?? '______________________________________________________',
            'chuc_vu' => $request->get('chuc_vu') ?? '______________________________________________________________',
            'dia_chi' => $request->get('dia_chi') ?? '_______________________________________________________________',
            'dien_thoai' => $request->get('dien_thoai') ?? '_____________________________________________________________',
            'fax' => $request->get('fax') ?? '__________________________________________________________________',
            'email' => $request->get('email') ?? '________________________________________________________________',
            'tai_khoan' => $request->get('tai_khoan') ?? '_____________________________________________________________',
            'ma_so_thue' => $request->get('ma_so_thue') ?? '____________________________________________________________',
            'name_lien_danh' => $request->get('name_lien_danh') ?? '____[ghi t??n c???a li??n danh theo th???a thu???n].',
            'hinh_thuc_khac' => $request->get('hinh_thuc_khac') != '' ? '- H??nh th???c x??? l?? kh??c ' . $request->get('hinh_thuc_khac') . '.' : '',
            'name_mot_ben' => $request->get('name_mot_ben') ?? '____[ghi t??n m???t b??n]',
            'noi_dung_khac' => $request->get('noi_dung_khac') != '' ? '- C??c c??ng vi???c kh??c tr??? vi???c k?? k???t h???p ?????ng ' . $request->get('noi_dung_khac') . '.'  : '',
            'total' => $request->get('total') ?? '___',
            'moi_ben_giu' => $request->get('moi_ben_giu') ?? '___',
            'chu_ky_dung_dau' => $request->get('chu_ky_dung_dau') ?? '[ghi t??n, ch???c danh, k?? t??n v?? ????ng d???u]',
            'chu_ky_thanh_vien' => $request->get('chu_ky_thanh_vien') ?? '[ghi t??n t???ng th??nh vi??n, ch???c danh, k?? t??n v?? ????ng d???u]',

        ));
        if ($request->get('so_uy_quyen') != '') {
            // $uy_quyen = array(
            //     'uy_quyen' => "Gi???y u??? quy???n s??? $request->get('so_uy_quyen') ng??y  $d2 th??ng $m2 n??m $y2."
            // );
            $so_uy_quyen = $request->get('so_uy_quyen');
            $templateProcessor->cloneBlock('block_uy_quyen', 0, true, false, array(
                array('uy_quyen' => "Gi???y u??? quy???n s??? $so_uy_quyen ng??y $d2 th??ng $m2 n??m $y2.")
            ));
        } elseif ($request->get('so_uy_quyen') == '') {
            $templateProcessor->cloneBlock('block_uy_quyen', 0, true, false, null);
        }

        if ($request->get('hinh_thuc_khac') != '') {
            // $uy_quyen = array(
            //     'uy_quyen' => "Gi???y u??? quy???n s??? $request->get('so_uy_quyen') ng??y  $d2 th??ng $m2 n??m $y2."
            // );
            $hinh_thuc_khac = $request->get('hinh_thuc_khac');
            $templateProcessor->cloneBlock('block_hinh_thuc_khac', 0, true, false, array(
                array('hinh_thuc_khac' => "- H??nh th???c x??? l?? kh??c $hinh_thuc_khac.")
            ));
        } elseif ($request->get('hinh_thuc_khac') == '') {
            $templateProcessor->cloneBlock('block_hinh_thuc_khac', 0, true, false, null);
        }

        if ($request->get('noi_dung_khac') != '') {
            // $uy_quyen = array(
            //     'uy_quyen' => "Gi???y u??? quy???n s??? $request->get('so_uy_quyen') ng??y  $d2 th??ng $m2 n??m $y2."
            // );
            $noi_dung_khac = $request->get('noi_dung_khac');
            $templateProcessor->cloneBlock('block_noi_dung_khac', 0, true, false, array(
                array('noi_dung_khac' => "- C??c c??ng vi???c kh??c tr??? vi???c k?? k???t h???p ?????ng $request->get('noi_dung_khac').")
            ));
        } elseif ($request->get('noi_dung_khac') == '') {
            $templateProcessor->cloneBlock('block_noi_dung_khac', 0, true, false, null);
        }

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        // dd($request->get('table_content'));
        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    // ------------------End M???u 03. TH???A THU???N LI??N DANH---------------------



    // ------------------M???u 04 (a). B???O L??NH D??? TH???U---------------------


    public function create4($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau4::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau4::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }

        return view('template.create4', compact('detail', 'temp', 'detail_id'));
    }

    public function save4(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau4::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau4::where('detail_id', $detail_id)
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
                        'name_chuc_danh' => $request->get('name_chuc_danh'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau4::create([
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
                    'name_chuc_danh' => $request->get('name_chuc_danh'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
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

        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '___[ghi ng??y ph??t h??nh b???o l??nh]';

        $date1 = $request->get('date');
        $y1 = $date1 != null ? substr($date1, 0, 4) : '___';
        $m1 = $date1 != null ? substr($date1, 5, 2) : '___';
        $d1 = $date1 != null ? substr($date1, 8, 2) : '___';

        $templateProcessor = new TemplateProcessor('M???u 04 (a). B???O L??NH D??? TH???U.docx');
        $file = 'M???u 04 (a). B???O L??NH D??? TH???U_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'thong_tin_moi_thau' => $request->get('thong_tin_moi_thau') ?? '___[ghi t??n v?? ?????a ch??? c???a B??n m???i th???u]',
            'ngay_phat_hanh' => $new_date,
            'so_trich_yeu' => $request->get('so_trich_yeu') ?? '___[ghi s??? tr??ch y???u c???a B???o l??nh d??? th???u]',
            'thong_tin_phat_hanh' => $request->get('thong_tin_phat_hanh'),
            'name_nha_thau' => $request->get('name_nha_thau') ?? '[ghi t??n nh?? th???u]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '[ghi t??n g??i th???u]',
            'name_du_an' => $request->get('name_du_an') ?? '[ghi t??n d??? ??n]',
            'so_trich_yeu1' => $request->get('so_trich_yeu1') ?? '[ghi s??? tr??ch y???u c???a Th?? m???i th???u/th??ng b??o m???i th???u]',
            'so_tien' => $request->get('so_tien') ?? '____[ghi r?? gi?? tr??? b???ng s???, b???ng ch??? v?? ?????ng ti???n s??? d???ng]',
            'time' => $request->get('time') ?? '____',
            'd' => $d1,
            'm' => $m1,
            'y' => $y1,
            'so_tien_1' => $request->get('so_tien1') ?? '[ghi b???ng ch???] [ghi b???ng s???]',
            'ten_chuc_danh' => $request->get('ten_chuc_danh') ?? '[ghi t??n, ch???c danh, k?? t??n v?? ????ng d???u]',
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
                $res = '???? c???p nh???t b???n l??u';
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
                $res = '???? t???o b???n l??u cho file';
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

        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '___[ghi ng??y ph??t h??nh b???o l??nh]';

        $date1 = $request->get('date');
        $y1 = $date1 != null ? substr($date1, 0, 4) : '___';
        $m1 = $date1 != null ? substr($date1, 5, 2) : '___';
        $d1 = $date1 != null ? substr($date1, 8, 2) : '___';

        $templateProcessor = new TemplateProcessor('M???u 04 (b). B???O L??NH D??? TH???U.docx');
        $file = 'M???u 04 (b). B???O L??NH D??? TH???U_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'thong_tin_moi_thau' => $request->get('thong_tin_moi_thau') ?? '___[ghi t??n v?? ?????a ch??? c???a B??n m???i th???u]',
            'ngay_phat_hanh' => $new_date,
            'so_trich_yeu' => $request->get('so_trich_yeu') ?? '___[ghi s??? tr??ch y???u c???a B???o l??nh d??? th???u]',
            'thong_tin_phat_hanh' => $request->get('thong_tin_phat_hanh'),
            'name_nha_thau' => $request->get('name_nha_thau') ?? '[ghi t??n nh?? th???u]',
            'name_goi_thau' => $request->get('name_goi_thau') ?? '[ghi t??n g??i th???u]',
            'name_du_an' => $request->get('name_du_an') ?? '[ghi t??n d??? ??n]',
            'so_trich_yeu1' => $request->get('so_trich_yeu1') ?? '[ghi s??? tr??ch y???u c???a Th?? m???i th???u/th??ng b??o m???i th???u]',
            'so_tien' => $request->get('so_tien') ?? '____[ghi r?? gi?? tr??? b???ng s???, b???ng ch??? v?? ?????ng ti???n s??? d???ng]',
            'time' => $request->get('time') ?? '____',
            'd' => $d1,
            'm' => $m1,
            'y' => $y1,
            'so_tien_1' => $request->get('so_tien1') ?? '[ghi b???ng ch???] [ghi b???ng s???]',
            'name_lien_danh' => $request->get('name_lien_danh') ?? '_____ [ghi ?????y ????? t??n c???a nh?? th???u li??n danh]',
            'ten_chuc_danh' => $request->get('ten_chuc_danh') ?? '[ghi t??n, ch???c danh, k?? t??n v?? ????ng d???u]',
        ));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    // ------------------End M???u 04 (b). B???O L??NH D??? TH???U---------------------


    // ------------------ M???u 05 (a). B???N K?? KHAI TH??NG TIN V??? NH?? TH???U---------------------
    public function create5($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau5::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau5::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create5', compact('detail', 'temp', 'detail_id'));
    }
    public function store5(Request $request)
    {
        // return $request->all();

        $ngay_ke_khai = $request->get('ngay_ke_khai') != null ? substr($request->get('ngay_ke_khai'), 8, 2) . '/' . substr($request->get('ngay_ke_khai'), 5, 2) . '/' . substr($request->get('ngay_ke_khai'), 0, 4) : '_______________';
        $templateProcessor = new TemplateProcessor('M???u 05 (a). B???N K?? KHAI TH??NG TIN V??? NH?? TH???U.docx');
        $file = 'M???u 05 (a). B???N K?? KHAI TH??NG TIN V??? NH?? TH???U_' . date("Y-m-d") . '.docx';
        $templateProcessor->setValues(
            array(
                'ngay_ke_khai' => $ngay_ke_khai,
                'so_hieu' => $request->get('so_hieu') != null ? $request->get('so_hieu') . ', ' . $request->get('name_goi_thau') : '__________ ,' . $request->get('name_goi_thau'),
                'trang' => $request->get('trang') ?? '_________',
                'tren_trang' => $request->get('tren_trang') ?? '________',
                'name_nha_thau' => $request->get('name_nha_thau') ?? '____________________________________',
                'dia_chi_dang_ky' => $request->get('dia_chi_dang_ky') ?? '________________________________',
                'nam_thanh_lap' => $request->get('nam_thanh_lap') ?? '____________________________________',
                'dia_chi_hop_phap' => $request->get('dia_chi_hop_phap') ?? '_________________________',
                'name' => $request->get('name') ?? '____________________________________',
                'dia_chi' => $request->get('dia_chi') ?? '__________________________________',
                'so_dien_thoai' => $request->get('so_dien_thoai') ?? '__________________________',
                'email' => $request->get('email') ?? '_____________________________',
            )
        );

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    public function save5(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau5::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau5::where('detail_id', $detail_id)
                    ->update([
                        'ngay_ke_khai' => $request->get('ngay_ke_khai'),
                        'so_hieu' => $request->get('so_hieu'),
                        'trang' => $request->get('trang'),
                        'tren_trang' => $request->get('tren_trang'),
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'dia_chi_dang_ky' => $request->get('dia_chi_dang_ky'),
                        'nam_thanh_lap' => $request->get('nam_thanh_lap'),
                        'dia_chi_hop_phap' => $request->get('dia_chi_hop_phap'),
                        'name' => $request->get('name'),
                        'dia_chi' => $request->get('dia_chi'),
                        'so_dien_thoai' => $request->get('so_dien_thoai'),
                        'email' => $request->get('email'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau5::create([
                    'detail_id' => $detail_id,
                    'ngay_ke_khai' => $request->get('ngay_ke_khai'),
                    'so_hieu' => $request->get('so_hieu'),
                    'trang' => $request->get('trang'),
                    'tren_trang' => $request->get('tren_trang'),
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'dia_chi_dang_ky' => $request->get('dia_chi_dang_ky'),
                    'nam_thanh_lap' => $request->get('nam_thanh_lap'),
                    'dia_chi_hop_phap' => $request->get('dia_chi_hop_phap'),
                    'name' => $request->get('name'),
                    'dia_chi' => $request->get('dia_chi'),
                    'so_dien_thoai' => $request->get('so_dien_thoai'),
                    'email' => $request->get('email'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

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
        // return $request->all();

        $ngay_ke_khai = $request->get('ngay_ke_khai') != null ? substr($request->get('ngay_ke_khai'), 8, 2) . '/' . substr($request->get('ngay_ke_khai'), 5, 2) . '/' . substr($request->get('ngay_ke_khai'), 0, 4) : '_______________';
        $templateProcessor = new TemplateProcessor('M???u 05 (b). B???N K?? KHAI TH??NG TIN V??? C??C TH??NH VI??N LI??N DANH.docx');
        $file = 'M???u 05 (b). B???N K?? KHAI TH??NG TIN V??? C??C TH??NH VI??N LI??N DANH_' . date("Y-m-d") . '.docx';
        $templateProcessor->setValues(
            array(
                'ngay_ke_khai' => $ngay_ke_khai,
                'so_hieu' => $request->get('so_hieu') != null ? $request->get('so_hieu') . ', ' . $request->get('name_goi_thau') : '__________ ,' . $request->get('name_goi_thau'),
                'trang' => $request->get('trang') ?? '_________',
                'tren_trang' => $request->get('tren_trang') ?? '________',
                'name_lien_danh' => $request->get('name_lien_danh') ?? '____________________________________',
                'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh') ?? '____________________________________',
                'quoc_gia_dang_ky' => $request->get('quoc_gia_dang_ky') ?? '________________________________',
                'nam_thanh_lap' => $request->get('nam_thanh_lap') ?? '____________________________________',
                'dia_chi_hop_phap' => $request->get('dia_chi_hop_phap') ?? '_________________________',
                'name_thanh_vien' => $request->get('name_thanh_vien') ?? '____________________________________',
                'dia_chi' => $request->get('dia_chi') ?? '__________________________________',
                'so_dien_thoai' => $request->get('so_dien_thoai') ?? '__________________________',
                'email' => $request->get('email') ?? '_____________________________',
            )
        );

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
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
                $res = '???? c???p nh???t b???n l??u';
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
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }


    // ------------------End M???u 05 (a). B???N K?? KHAI TH??NG TIN V??? NH?? TH???U---------------------

    // ------------------Start M???u 06. H???P ?????NG KH??NG HO??N TH??NH TRONG QU?? KH??? DO L???I C???A NH?? TH???U---------------------

    public function create6($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau6::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau6::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create6', compact('detail', 'temp', 'detail_id'));
    }

    public function save6(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau6::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau6::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                        'check' => $request->get('check'),
                        'nam' => $request->get('nam'),
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau6::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                    'check' => $request->get('check'),
                    'nam' => $request->get('nam'),
                    'table_content' => $request->get('table_content'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store6(Request $request)
    {
        // return $request->all();
        // $string1 = str_replace("<p>","</w:t><w:br/><w:t>",$request->get('table_content'));
        // $string2 = str_replace("</p>", "", $string1);
        // dd ($string2);
        // return 1;
        $date = $request->get('date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);
        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '______________________';

        $templateProcessor = new TemplateProcessor('M???u 06. H???P ?????NG KH??NG HO??N TH??NH TRONG QU?? KH??? DO L???I C???A NH?? TH???U.docx');
        $file = 'M???u 06. H???P ?????NG KH??NG HO??N TH??NH TRONG QU?? KH??? DO L???I C???A NH?? TH???U_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(
            array(
                'name_nha_thau' => $request->get('name_nha_thau') ?? '________________',
                'date' => $new_date,
                'check1' => $request->get('check') == 0 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',
                'check2' => $request->get('check') == 1 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',
                'year1' => $request->get('check') == 0 ? $request->get('nam') : '____',
                'year2' => $request->get('check') == 1 ? $request->get('nam') : '____',

            )
        );

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    public function create61($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau61::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau61::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create61', compact('detail', 'temp', 'detail_id'));
    }

    public function store61(Request $request)
    {
        // return $request->all();
        // $string1 = str_replace("<p>","</w:t><w:br/><w:t>",$request->get('table_content'));
        // $string2 = str_replace("</p>", "", $string1);
        // dd ($string2);
        // return 1;
        $date = $request->get('date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);
        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '______________________';

        $templateProcessor = new TemplateProcessor('M???u 06 (b). H???P ?????NG KH??NG HO??N TH??NH TRONG QU?? KH??? DO L???I C???A NH?? TH???U.docx');
        $file = 'M???u 06 (b). H???P ?????NG KH??NG HO??N TH??NH TRONG QU?? KH??? DO L???I C???A NH?? TH???U_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(
            array(
                'name_nha_thau' => $request->get('name_nha_thau') ?? '________________',
                'date' => $new_date,
                'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh') ?? '_________________________',
                'check1' => $request->get('check') == 0 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',
                'check2' => $request->get('check') == 1 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',
                'year1' => $request->get('check') == 0 ? $request->get('nam') : '____',
                'year2' => $request->get('check') == 1 ? $request->get('nam') : '____',

            )
        );

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    public function save61(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau61::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau61::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                        'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                        'check' => $request->get('check'),
                        'nam' => $request->get('nam'),
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau61::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                    'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                    'check' => $request->get('check'),
                    'nam' => $request->get('nam'),
                    'table_content' => $request->get('table_content'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }




    // ------------------End M???u 06. H???P ?????NG KH??NG HO??N TH??NH TRONG QU?? KH??? DO L???I C???A NH?? TH???U---------------------


    //-------------------Start M???u 07. KI???N T???NG ??ANG GI???I QUY???T

    public function create7($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau7::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau7::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }

        return view('template.create7', compact('detail', 'temp', 'detail_id'));
    }

    public function store7(Request $request)
    {
        // return $request->all();
        // $string1 = str_replace("<p>","</w:t><w:br/><w:t>",$request->get('table_content'));
        // $string2 = str_replace("</p>", "", $string1);
        // dd ($string2);
        // return 1;
        $date = $request->get('date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);
        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '______________________';

        $templateProcessor = new TemplateProcessor('M???u 07 (a). KI???N T???NG ??ANG GI???I QUY???T.docx');
        $file = 'M???u 07 (a). KI???N T???NG ??ANG GI???I QUY???T_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(
            array(
                'name_nha_thau' => $request->get('name_nha_thau') ?? '________________',
                'date' => $new_date,
                // 'ten' => $request->get('name_thanh_vien_lien_danh') ?? '_________________________',
                'check1' => $request->get('check') == 0 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',
                'check2' => $request->get('check') == 1 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',

            )
        );
        if ($request->get('name_thanh_vien_lien_danh') != '') {
            $ten_thanh_vien = $request->get('name_thanh_vien_lien_danh');

            $templateProcessor->cloneBlock('block_name', 0, true, false, array(
                array('ten' => "T??n th??nh vi??n c???a nh?? th???u li??n danh: $ten_thanh_vien")
            ));
        } elseif ($request->get('name_thanh_vien_lien_danh') == '') {
            $templateProcessor->cloneBlock('block_name', 0, true, false, null);
        }

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    public function save7(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau7::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau7::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                        'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                        'check' => $request->get('check'),
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau7::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                    'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                    'check' => $request->get('check'),
                    'table_content' => $request->get('table_content'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function create71($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau71::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau71::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }

        return view('template.create71', compact('detail', 'temp', 'detail_id'));
    }

    public function store71(Request $request)
    {
        // return $request->all();
        // $string1 = str_replace("<p>","</w:t><w:br/><w:t>",$request->get('table_content'));
        // $string2 = str_replace("</p>", "", $string1);
        // dd ($string2);
        // return 1;
        $date = $request->get('date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);
        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '______________________';

        $templateProcessor = new TemplateProcessor('M???u 07 (b). KI???N T???NG ??ANG GI???I QUY???T.docx');
        $file = 'M???u 07 (b). KI???N T???NG ??ANG GI???I QUY???T_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(
            array(
                'name_nha_thau' => $request->get('name_nha_thau') ?? '________________',
                'date' => $new_date,
                'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh') ?? '_________________________',
                'check1' => $request->get('check') == 0 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',
                'check2' => $request->get('check') == 1 ? '<w:sym w:font="Wingdings" w:char="F0FE"/>' : '<w:sym w:font="Wingdings" w:char="F0A8"/>',

            )
        );

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    public function save71(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau71::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau71::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                        'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                        'check' => $request->get('check'),
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau71::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'ngay_lam_giay' => $request->get('ngay_lam_giay'),
                    'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                    'check' => $request->get('check'),
                    'table_content' => $request->get('table_content'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }


    //-------------------End M???u 07. KI???N T???NG ??ANG GI???I QUY???T
    //-------------------Start M???u 08. H???P ?????NG T????NG T??? DO NH?? TH???U TH???C HI???N

    public function create8($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau8::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau8::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }

        return view('template.create8', compact('detail', 'temp', 'detail_id'));
    }

    public function save8(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau8::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau8::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'date' => $request->get('date'),
                        'address' => $request->get('address'),
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau8::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'date' => $request->get('date'),
                    'address' => $request->get('address'),
                    'table_content' => $request->get('table_content'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store8(Request $request)
    {
        // return $request->all();
        // $string1 = str_replace("<p>","</w:t><w:br/><w:t>",$request->get('table_content'));
        // $string2 = str_replace("</p>", "", $string1);
        // dd ($string2);
        // return 1;
        $date = $request->get('date');
        $y = $date != null ? substr($date, 0, 4) : '___';
        $m = $date != null ? substr($date, 5, 2) : '___';
        $d = $date != null ? substr($date, 8, 2) : '___';



        $templateProcessor = new TemplateProcessor('M???u 08. H???P ?????NG T????NG T??? DO NH?? TH???U TH???C HI???N.docx');
        $file = 'M???u 08. H???P ?????NG T????NG T??? DO NH?? TH???U TH???C HI???N_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(
            array(
                'name_nha_thau' => $request->get('name_nha_thau') ?? '____[ghi t??n ?????y ????? c???a nh?? th???u]',
                'd' => $d,
                'm' => $m,
                'y' => $y,
                'address' => $request->get('address') ?? '____',

            )
        );

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    //-------------------End M???u 08. H???P ?????NG T????NG T??? DO NH?? TH???U TH???C HI???N

    //-------------------Start M???u 09 (b). T??NH H??NH T??I CH??NH C???A NH?? TH???U

    public function create9($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau9::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau9::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }

        return view('template.create9', compact('detail', 'temp', 'detail_id'));
    }

    public function create91($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau91::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau91::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }

        return view('template.create91', compact('detail', 'temp', 'detail_id'));
    }
    public function save9(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau9::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau9::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'date' => $request->get('date'),
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau9::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'date' => $request->get('date'),
                    'table_content' => $request->get('table_content'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }
    public function store9(Request $request)
    {
        // return $request->all();
        // $string1 = str_replace("<p>","</w:t><w:br/><w:t>",$request->get('table_content'));
        // $string2 = str_replace("</p>", "", $string1);
        // dd ($string2);
        // return 1;
        $date = $request->get('date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);
        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '______________________';



        $templateProcessor = new TemplateProcessor('M???u 09 (a). T??NH H??NH T??I CH??NH C???A NH?? TH???U.docx');
        $file = 'M???u 09 (a). T??NH H??NH T??I CH??NH C???A NH?? TH???U_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(
            array(
                'name_nha_thau' => $request->get('name_nha_thau') ?? '________________',
                'date' => $new_date,
            )
        );

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }


    public function save91(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau91::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau91::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'date' => $request->get('date'),
                        'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau91::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'date' => $request->get('date'),
                    'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh'),
                    'table_content' => $request->get('table_content'),

                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store91(Request $request)
    {
        // return $request->all();
        // $string1 = str_replace("<p>","</w:t><w:br/><w:t>",$request->get('table_content'));
        // $string2 = str_replace("</p>", "", $string1);
        // dd ($string2);
        // return 1;
        $date = $request->get('date');
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);
        $new_date = $date != null ? $d . '/' . $m . '/' . $y : '______________________';



        $templateProcessor = new TemplateProcessor('M???u 09 (b). T??NH H??NH T??I CH??NH C???A NH?? TH???U.docx');
        $file = 'M???u 09 (b). T??NH H??NH T??I CH??NH C???A NH?? TH???U_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(
            array(
                'name_nha_thau' => $request->get('name_nha_thau') ?? '________________',
                'date' => $new_date,
                'name_thanh_vien_lien_danh' => $request->get('name_thanh_vien_lien_danh') ?? '_________________________',

            )
        );

        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    //-------------------End M???u 09 (b). T??NH H??NH T??I CH??NH C???A NH?? TH???U

    //-------------------Start M???u 10. NGU???N L???C T??I CH??NH

    public function create10($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau10::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau10::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create10', compact('temp', 'detail_id', 'detail'));
    }

    public function save10(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau10::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau10::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau10::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store10(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 10. NGU???N L???C T??I CH??NH.docx');
        $file = 'M???u 10. NGU???N L???C T??I CH??NH_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    //-------------------End M???u 10. NGU???N L???C T??I CH??NH

    //-------------------Start M???u 11. NGU???N L???C T??I CH??NH H??NG TH??NG CHO C??C H???P ?????NG ??ANG TH???C HI???N

    public function create11($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau11::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau11::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create11', compact('temp', 'detail_id', 'detail'));
    }

    public function save11(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau11::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau11::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau11::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store11(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 11. NGU???N L???C T??I CH??NH H??NG TH??NG CHO C??C H???P ?????NG ??ANG TH???C HI???N.docx');
        $file = 'M???u 11. NGU???N L???C T??I CH??NH H??NG TH??NG CHO C??C H???P ?????NG ??ANG TH???C HI???N_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }
    //-------------------End M???u 11. NGU???N L???C T??I CH??NH H??NG TH??NG CHO C??C H???P ?????NG ??ANG TH???C HI???N

    //-------------------Start M???u 12. B???NG ????? XU???T NH??N S??? CH??? CH???T

    public function create12($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau12::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau12::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create12', compact('temp', 'detail_id', 'detail'));
    }

    public function save12(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau12::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau12::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau12::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store12(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 12. B???NG ????? XU???T NH??N S??? CH??? CH???T.docx');
        $file = 'M???u 12. B???NG ????? XU???T NH??N S??? CH??? CH???T_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }
    //-------------------End M???u 12. B???NG ????? XU???T NH??N S??? CH??? CH???T

    //-------------------Start M???u 13. B???N L?? L???CH CHUY??N M??N C???A NH??N S??? CH??? CH???T

    public function create13($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau13::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau13::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create13', compact('temp', 'detail_id', 'detail'));
    }

    public function save13(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau13::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau13::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau13::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store13(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 13. B???N L?? L???CH CHUY??N M??N C???A NH??N S??? CH??? CH???T.docx');
        $file = 'M???u 13. B???N L?? L???CH CHUY??N M??N C???A NH??N S??? CH??? CH???T_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }
    //-------------------End M???u 13. B???N L?? L???CH CHUY??N M??N C???A NH??N S??? CH??? CH???T

    //-------------------Start M???u 14. B???N KINH NGHI???M CHUY??N M??N C???A NH??N S???

    public function create14($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau14::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau14::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create14', compact('temp', 'detail_id', 'detail'));
    }

    public function save14(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau14::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau14::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau14::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store14(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 14. B???N KINH NGHI???M CHUY??N M??N C???A NH??N S???.docx');
        $file = 'M???u 14. B???N KINH NGHI???M CHUY??N M??N C???A NH??N S???_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }
    //-------------------End M???u 14. B???N KINH NGHI???M CHUY??N M??N C???A NH??N S???


    //-------------------Start M???u 15. PH???M VI C??NG VI???C S??? D???NG NH?? TH???U PH???

    // 15a
    public function create151($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau151::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau151::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create15a', compact('temp', 'detail_id', 'detail'));
    }

    public function save151(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau151::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau151::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau151::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store151(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 15 (a). PH???M VI C??NG VI???C S??? D???NG NH?? TH???U PH???.docx');
        $file = 'M???u 15 (a). PH???M VI C??NG VI???C S??? D???NG NH?? TH???U PH???_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    //15b

    public function create152($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau152::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau152::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create15b', compact('temp', 'detail_id', 'detail'));
    }

    public function save152(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau152::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau152::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau152::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store152(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 15 (b). B???NG K?? KHAI NH?? TH???U PH??? ?????C BI???T.docx');
        $file = 'M???u 15 (b). B???NG K?? KHAI NH?? TH???U PH??? ?????C BI???T_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }

    //15c

    public function create153($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau153::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau153::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create15c', compact('temp', 'detail_id', 'detail'));
    }

    public function save153(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau153::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau153::where('detail_id', $detail_id)
                    ->update([
                        'table_content' => $request->get('table_content'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau153::create([
                    'detail_id' => $detail_id,
                    'table_content' => $request->get('table_content'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    public function store153(Request $request)
    {
        $templateProcessor = new TemplateProcessor('M???u 15 (c). DANH S??CH C??C C??NG TY CON, C??NG TY TH??NH VI??N.docx');
        $file = 'M???u 15 (c). DANH S??CH C??C C??NG TY CON, C??NG TY TH??NH VI??N_' . date("Y-m-d") . '.docx';


        $templateProcessor->setHtmlBlockValue('table_content', $request->get('table_content'));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");
    }
    //-------------------End M???u 15. PH???M VI C??NG VI???C S??? D???NG NH?? TH???U PH???

    //-------------------Start M???u 16. ????N D??? TH???U (thu???c HS??XTC)
    public function create161($detail_id)
    {
        $detail = $this->detailService->find($detail_id);
        $exist = Mau161::select("*")->where('detail_id', $detail_id)->exists();
        if ($exist) {
            $temp = Mau161::where('detail_id', $detail_id)->first();
        } else {
            $temp = [];
        }
        return view('template.create16a', compact('temp', 'detail_id', 'detail'));
    }

    public function save161(Request $request)
    {
        if ($request->ajax()) {
            $detail_id = $request->get('detail_id');
            $exist = Mau161::select("*")->where('detail_id', $detail_id)->exists();
            if ($exist) {
                Mau161::where('detail_id', $detail_id)
                    ->update([
                        'name_nha_thau' => $request->get('name_nha_thau'),
                        'so_trich_yeu' => $request->get('so_trich_yeu'),
                        'date' => $request->get('date'),
                        'name_moi_thau' => $request->get('name_moi_thau'),
                        'so_tien' => $request->get('so_tien'),
                        'dateStart' => $request->get('dateStart'),
                        'time' => $request->get('time'),
                        'so_sua_doi' => $request->get('so_sua_doi'),
                        'name_chuc_danh' => $request->get('name_chuc_danh'),
                    ]);
                $res = '???? c???p nh???t b???n l??u';
            } else {
                Mau161::create([
                    'detail_id' => $detail_id,
                    'name_nha_thau' => $request->get('name_nha_thau'),
                    'so_trich_yeu' => $request->get('so_trich_yeu'),
                    'date' => $request->get('date'),
                    'name_moi_thau' => $request->get('name_moi_thau'),
                    'so_tien' => $request->get('so_tien'),
                    'dateStart' => $request->get('dateStart'),
                    'time' => $request->get('time'),
                    'so_sua_doi' => $request->get('so_sua_doi'),
                    'name_chuc_danh' => $request->get('name_chuc_danh'),
                ]);
                $res = '???? t???o b???n l??u cho file';
            }
            echo json_encode($res);
        }
    }

    //-------------------End M???u 16. ????N D??? TH???U (thu???c HS??XTC)
}
