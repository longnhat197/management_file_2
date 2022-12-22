@extends('layout.master')
@section('title','BẢN KÊ KHAI THÔNG TIN VỀ CÁC THÀNH VIÊN CỦA
NHÀ THẦU LIÊN DANH
')
@section('my_style')
<link rel="stylesheet" href="./dashboard/assets/css/input-date.css">
@endsection
@section('body')
<!-- Main -->

<div class="app-main__inner">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Bản kê khai thông tin về các thành viên của nhà thầu liên danh
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/51" method="post">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active p-2" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="fas fa-clipboard p-2"></i>
                                    Thông tin chung
                                </a>
                                {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                    href="#nav-profile" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Project Tab 2</a> --}}
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="fas fa-calendar-day p-2"></i>
                                    Thông tin về đại diện hợp pháp của thành viên liên danh
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="ngay_ke_khai_test">Ngày kê khai:</label>
                                        <i class="date-icon date_ttld fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input class="form-control" type="text" id="datePick">
                                        <input type="hidden" class="form-control"
                                            value="{{ $temp != [] ? $temp->ngay_ke_khai : '' }}" id="ngay_ke_khai_test"
                                            name="ngay_ke_khai">
                                        <input type="hidden" value="{{ $detail_id }}" id="detail_id"
                                            data-url="./template/51/save">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_hieu">Số hiệu</label>
                                        <input type="text" {{ $detail->enabled == '0' ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->so_hieu : '' }}"
                                        class="form-control"
                                        id="so_hieu_test" name="so_hieu">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_goi_thau_test">Tên gói thầu:</label>
                                        <input type="text" {{ $detail->enabled == '0' ? 'disabled' : '' }} value="{{
                                        $detail->name_goi_thau }}" class="form-control" id="name_goi_thau_test"
                                        name="name_goi_thau">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-3">
                                        <label for="trang_test">Trang:</label>
                                        <input type="text" value="{{ $temp != [] ? $temp->trang : '' }}" {{
                                            $detail->enabled == '0' ? 'disabled' : '' }}
                                        class="form-control" id="trang_test" name="trang">
                                    </div>

                                    <div class="form-group date-container col-md-3">
                                        <label for="tren_trang_test">Trên số trang:</label>
                                        <input type="text" value="{{ $temp != [] ? $temp->tren_trang : '' }}" {{
                                            $detail->enabled == '0' ? 'disabled' : '' }}
                                        class="form-control" id="tren_trang_test" name="tren_trang">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_lien_danh_test">Tên đầy đủ nhà thầu liên danh</label>
                                        <input type="text" name="name_lien_danh" {{ $detail->enabled == '0' ? 'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->name_lien_danh : '' }}"
                                        class="form-control" id="name_lien_danh_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_thanh_vien_lien_danh_test">Tên thành viên của nhà thầu liên
                                            danh:</label>
                                        <input type="text" name="name_thanh_vien_lien_danh" {{ $detail->enabled == '0' ?
                                        'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->name_thanh_vien_lien_danh : '' }}"
                                        class="form-control" id="name_thanh_vien_lien_danh_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="quoc_gia_dang_ky_test">Quốc gia nơi đăng ký công ty của thành viên
                                            liên danh:</label>
                                        <input type="text" name="quoc_gia_dang_ky" {{ $detail->enabled == '0' ?
                                        'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->quoc_gia_dang_ky : '' }}"
                                        class="form-control" id="quoc_gia_dang_ky_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="nam_thanh_lap_test">Năm thành lập công ty của thành viên liên
                                            danh:</label>
                                        <input type="text" name="nam_thanh_lap" {{ $detail->enabled == '0' ? 'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->nam_thanh_lap : '' }}"
                                        class="form-control" id="nam_thanh_lap_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="dia_chi_hop_phap_test">Địa chỉ hợp pháp của thành viên liên danh tại
                                            quốc gia đăng ký:</label>
                                        <input type="text" name="dia_chi_hop_phap" {{ $detail->enabled == '0' ?
                                        'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->dia_chi_hop_phap : '' }}"
                                        class="form-control" id="dia_chi_hop_phap_test">
                                    </div>
                                </div>



                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_thanh_vien_test">Tên:</label>
                                        <input type="text" name="name_thanh_vien" {{ $detail->enabled == '0' ?
                                        'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->name_thanh_vien : '' }}"
                                        class="form-control" id="name_thanh_vien_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="dia_chi_test">Địa chỉ:</label>
                                        <input type="text" name="dia_chi" {{ $detail->enabled == '0' ? 'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->dia_chi : '' }}"
                                        class="form-control" id="dia_chi_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_dien_thoai_test">Số điện thoại/fax:</label>
                                        <input type="text" name="so_dien_thoai" {{ $detail->enabled == '0' ? 'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->so_dien_thoai : '' }}"
                                        class="form-control" id="so_dien_thoai_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="email_test">Địa chỉ email:</label>
                                        <input type="email" name="email" {{ $detail->enabled == '0' ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->email : '' }}"
                                        class="form-control" id="email_test">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-outline-primary">Export Word</button>
                            </div>
                            <div class="form-group col-md-3 text-right">
                                @if ($detail->enabled != 0)
                                <a href="javascript:void(0)" id="save" class="btn btn-outline-primary">Lưu</a>
                                @endif
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div>
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong
                            style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢN K&Ecirc;
                                KHAI TH&Ocirc;NG TIN VỀ C&Aacute;C TH&Agrave;NH VI&Ecirc;N CỦA <br>NH&Agrave; THẦU
                                LI&Ecirc;N DANH</span></strong></span></p>
                <p class="MsoNormal" style="text-align: right; margin: 6.0pt 2.15pt .0001pt 0in;" align="right"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">Ng&agrave;y: <span
                            style="background-color: yellow; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"
                            id="ngay_ke_khai1">_______________</span><br>Số
                        hiệu v&agrave; t&ecirc;n g&oacute;i thầu: <span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                            id="so_hieu1">_________</span>, <span id="name_goi_thau1"></span><br>Trang <span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                id="trang1" style="background-color: yellow"> _________ </span>
                            /<span style="background-color: yellow" id="tren_trang1"> ___________</span></span>
                        trang</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">&nbsp;</span></p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);">T&ecirc;n
                        nh&agrave; thầu li&ecirc;n danh: <span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                            id="name_lien_danh1"> ____________________________________</span></span></p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">T&ecirc;n
                            th&agrave;nh vi&ecirc;n của nh&agrave; thầu li&ecirc;n danh: <span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                id="name_thanh_vien_lien_danh1">
                                ____________________________________</span></span></span></p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Quốc
                                gia nơi đăng k&yacute; c&ocirc;ng ty của th&agrave;nh vi&ecirc;n li&ecirc;n danh: <span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                    id="quoc_gia_dang_ky1">
                                    ________________________________</span></span></span></span></p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Năm
                                    th&agrave;nh lập c&ocirc;ng ty của th&agrave;nh vi&ecirc;n li&ecirc;n danh: <span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                        id="nam_thanh_lap1">
                                        ____________________________________</span></span></span></span></span></p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Địa
                                        chỉ hợp ph&aacute;p của th&agrave;nh vi&ecirc;n li&ecirc;n danh tại quốc gia
                                        đăng k&yacute;: <span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                            id="dia_chi_hop_phap1">
                                            _________________________</span></span></span></span></span></span></p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Th&ocirc;ng
                                            tin về đại diện hợp ph&aacute;p của th&agrave;nh vi&ecirc;n li&ecirc;n
                                            danh</span></span></span></span></span></span></p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'Times New Roman'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">T&ecirc;n:
                                                <span
                                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                                    id="name_thanh_vien1">____________________________________</span></span></span></span></span></span></span></span>
                </p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'Times New Roman'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Địa
                                                chỉ: <span
                                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                                    id="dia_chi1">__________________________________</span></span></span></span></span></span></span></span>
                </p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'Times New Roman'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;"><span
                                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Số
                                                    điện thoại/fax: <span
                                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                                        id="so_dien_thoai1">__________________________</span></span></span></span></span></span></span></span></span>
                </p>
                <p class="MsoNormal" style="line-height: 1;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'Times New Roman'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;"><span
                                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">Địa
                                                        chỉ e-mail: <span
                                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: yellow"
                                                            id="email1">____________________________</span></span></span></span></span></span></span></span></span></span>
                </p>
                <p><span style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                style="font-size: 12pt; font-family: 'Times New Roman', serif;"><span
                                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">1.
                                                            K&egrave;m theo l&agrave; bản chụp một trong c&aacute;c
                                                            t&agrave;i liệu sau đ&acirc;y: Giấy chứng nhận đăng
                                                            k&yacute; doanh nghiệp, quyết định th&agrave;nh lập hoặc
                                                            t&agrave;i liệu c&oacute; gi&aacute; trị tương đương do cơ
                                                            quan c&oacute; thẩm quyền của nước m&agrave; nh&agrave; thầu
                                                            đang hoạt động
                                                            cấp.</span></span></span></span></span></span></span></span></span></span>
                </p>
                <p><span style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                style="font-size: 12pt; font-family: 'Times New Roman', serif;"><span
                                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                        style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'Times New Roman'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">2.
                                                                Tr&igrave;nh b&agrave;y sơ đồ tổ
                                                                chức.</span></span></span></span></span></span></span></span></span></span></span>
                </p>
                <p class="MsoNormal" style="line-height: 1;">&nbsp;</p>
                <p class="MsoNormal">&nbsp;</p>
                <p class="MsoNormal">&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create51.js"></script>
<script>

</script>
@endsection
