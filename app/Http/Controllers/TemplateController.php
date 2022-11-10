<?php

namespace App\Http\Controllers;

use App\Services\Contractor\ContractorServiceInterface;
use App\Services\Customer\CustomerServiceInterface;
use App\Services\File\FileServiceInterface;
use App\Services\ListUser\ListUserServiceInterface;
use App\Services\Package\PackageServiceInterface;
use App\Services\Project\ProjectServiceInterface;
use PhpOffice\PhpWord\Template1;
use DOCXTemplate;
use Illuminate\Http\Request;

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
    public function __construct(
        FileServiceInterface $fileService,
        ContractorServiceInterface $contractorService,
        ProjectServiceInterface $projectService,
        CustomerServiceInterface $customerService,
        PackageServiceInterface $packageService,
        ListUserServiceInterface $listUserService
    ) {
        $this->fileService = $fileService;
        $this->contractorService = $contractorService;
        $this->projectService = $projectService;
        $this->customerService = $customerService;
        $this->packageService = $packageService;
        $this->listUserService = $listUserService;
    }
    //
    public function index()
    {
        return view('template.index');
    }

    //------------------Mẫu 01. ĐƠN DỰ THẦU (thuộc HSĐXKT)---------------------
    public function create1()
    {

        $projects = $this->projectService->all();
        $packages = $this->packageService->all();
        $customers = $this->contractorService->all();
        $contractors = $this->contractorService->all();

        return view('template.create1', compact('projects', 'packages', 'customers', 'contractors'));
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
            'so_trich_yeu' => $request->get('so_trich_yeu') ?? '[ghi số trích yếu của Thư mời thầu đối với đấu thầu hạn chế]',
            'name_moi_thau' => $request->get('name_moi_thau') ?? '[ghi đầy đủ và chính xác tên của Bên mời thầu]',
            'so_sua_doi' => $request->get('so_sua_doi') ?? '___[ghi số của văn bản sửa đổi (nếu có)]',
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
    public function create2()
    {
        $d = date("d");
        $m = date("m");
        $Y = date("Y");
        $contractors = $this->contractorService->all();
        $packages = $this->packageService->all();
        $projects = $this->projectService->all();
        $customers = $this->customerService->all();

        $user_dds = $this->listUserService->getUserByType(1);
        $user_duqs = $this->listUserService->getUserByType(2);



        return view('template.create2', compact(
            'd',
            'm',
            'Y',
            'contractors',
            'user_dds',
            'user_duqs',
            'packages',
            'projects',
            'customers'
        ));
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



        $templateProcessor = new \PhpOffice\PhpWord\Template('Mẫu 02. GIẤY ỦY QUYỀN.docx');
        $file = 'Mẫu 02. GIẤY ỦY QUYỀN_' . date("Y-m-d") . '.docx';

        $templateProcessor->setValues(array(
            'd' => date("d"),
            'm' => date("m"),
            'y' => date("Y"),
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
    public function create3()
    {
        $d = date("d");
        $m = date("m");
        $Y = date("Y");
        $packages = $this->packageService->all();
        $projects = $this->projectService->all();

        return view('template.create3', compact('d', 'm', 'Y', 'packages', 'projects'));
    }

    public function store3(Request $request)
    {
        $d = date("d");
        $m = date("m");
        $Y = date("Y");

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
            'd' => $d ,
            'm' => $m ,
            'y' => $Y ,
            'name_goi_thau' => $request->get('name_goi_thau') ?? '____ [ghi tên gói thầu]',
            'name_du_an' => $request->get('name_du_an') ?? '____ [ghi tên dự án]',
            'can_cu' => $request->get('can_cu') ?? '__ [Luật đấu thầu số 43/2013/QH13 ngày 26/11/2013 của Quốc hội];',
            'can_cu1' => $request->get('can_cu1') ?? '____ [Nghị định số 63/2014/NĐ-CP ngày 26/6/2014 của Chính phủ về hướng dẫn thi hành Luật đấu thầu về lựa chọn nhà thầu];',
            'd1' => $d1 ,
            'm1' => $m1 ,
            'y1' => $y1 ,
            'name_thanh_vien' => $request->get('ten_thanh_vien') ?? '____[ghi tên từng thành viên liên danh]',
            'so_uy_quyen' => $request->get('so_uy_quyen') ?? '___',
            'd2' => $d2 ,
            'm2' => $m2 ,
            'y2' => $y2 ,
            'name_lien_danh' => $request->get('name_lien_danh') ?? '____[ghi tên của liên danh theo thỏa thuận].',
            'hinh_thuc_khac' => $request->get('hinh_thuc_khac') ?? '____[ghi rõ hình thức xử lý khác].',
            'name_mot_ben' => $request->get('name_mot_ben') ?? '____[ghi tên một bên]',
            'noi_dung_khac' => $request->get('noi_dung_khac') ?? '____[ghi rõ nội dung các công việc khác (nếu có)].',
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

        return view('template.create4',compact('customers','contractors','packages','projects'));
    }

    public function ajaxMT(Request $request){
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '0') {
                $customer = $this->customerService->find($id);
                $data = array(
                    'name' => $customer->name,
                    'address' =>$customer->address,
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

    public function store4(Request $request){

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
            'thong_tin_moi_thau' =>$request->get('thong_tin_moi_thau') ?? '___[ghi tên và địa chỉ của Bên mời thầu]',
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

    public function create4_1()
    {
        $customers = $this->customerService->all();
        $contractors = $this->contractorService->all();
        $projects = $this->projectService->all();
        $packages = $this->packageService->all();

        return view('template.create4_1',compact('customers','contractors','packages','projects'));
    }

    public function ajaxMT41(Request $request){
        if ($request->ajax()) {
            $id = $request->get('id');
            if ($id != '0') {
                $customer = $this->customerService->find($id);
                $data = array(
                    'name' => $customer->name,
                    'address' =>$customer->address,
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

    public function store4_1(Request $request){

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
            'thong_tin_moi_thau' =>$request->get('thong_tin_moi_thau') ?? '___[ghi tên và địa chỉ của Bên mời thầu]',
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
            'name_lien_danh' => $request->get('name_lien_danh') ?? '_____ [ghi đầy đủ tên của nhà thầu liên danh]',
            'ten_chuc_danh' => $request->get('ten_chuc_danh') ?? '[ghi tên, chức danh, ký tên và đóng dấu]',
        ));

        header('Content-Disposition: attachment; filename="' . $file . '"');
        $templateProcessor->saveAs("php://output");

    }

    // ------------------End Mẫu 04 (a). BẢO LÃNH DỰ THẦU---------------------


    // ------------------ Mẫu 05 (a). BẢN KÊ KHAI THÔNG TIN VỀ NHÀ THẦU---------------------

    public function create5(){

        $contractors = $this->contractorService->all();
        return view('template.create5',compact('contractors'));
    }


    // ------------------End Mẫu 05 (a). BẢN KÊ KHAI THÔNG TIN VỀ NHÀ THẦU---------------------
}
