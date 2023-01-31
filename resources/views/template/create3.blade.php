@extends('layout.master')
@section('title','Thoả thuận liên danh')
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
                    Thoả thuận liên danh
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/3" method="post">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active p-2" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="fas fa-clipboard p-2"></i>
                                    Tab 1
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Thông tin liên danh</a>
                                <a class="nav-item nav-link" id="nav-information-tab" data-toggle="tab"
                                    href="#nav-information" role="tab" aria-controls="nav-information"
                                    aria-selected="false">Tab 3</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="fas fa-calendar-day p-2"></i>
                                    Tab 4
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="datePick">Ngày làm thoả thuận liên danh:</label>
                                        <input class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} type="text" id="datePick">
                                        <i class="date-icon date_ttld fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input type="hidden"  value="{{
                                        $temp != [] ? $temp->ngay_lam_giay : '' }}"
                                        name="date" id="date" class="form-control">
                                        <input type="hidden" value="{{ $detail_id }}" id="detail_id"
                                            data-url="./template/3/save">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="address_test">Nơi làm thoả thuận liên danh:</label>
                                        <input type="text" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} value="{{ $temp
                                        != [] ? $temp->noi_lam_thoa_thuan : '' }}"
                                        class="form-control" id="address_test" name="address">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_goi_thau_test">Tên gói thầu:</label>

                                        <input type="text" class="form-control" id="name_goi_thau_test"
                                            name="name_goi_thau" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} value="{{
                                        $detail->name_goi_thau }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_du_an_test">Tên dự án:</label>

                                        <input type="text" class="form-control" id="name_du_an_test" {{ $detail->enabled
                                        == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $detail->name_du_an }}" name="name_du_an">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="can_cu_test">Căn cứ:</label>
                                        <input type="text" name="can_cu" class="form-control" id="can_cu_test" {{
                                            $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->can_cu : 'Luật đấu thầu số 43/2013/QH13 ngày
                                        26/11/2013 của Quốc hội' }}">
                                        {{-- <textarea style="" name="can_cu" class="form-control" id="can_cu_test"
                                            cols="90"
                                            rows="5">Luật đấu thầu số 43/2013/QH13 ngày 26/11/2013 của Quốc hội</textarea>
                                        --}}

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="can_cu1_test">Căn cứ:</label>
                                        <input type="text" name="can_cu1" class="form-control" id="can_cu1_test" {{
                                            $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->can_cu1 : 'Nghị định số 63/2014/NĐ-CP
                                        ngày 26/6/2014 của Chính phủ về hướng dẫn thi hành Luật đấu thầu về lựa chọn nhà
                                        thầu' }}"
                                        >

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="date1_test">Ngày tháng năm trên HSMT</label>
                                        <i class="date-icon date_hsmt fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input type="text" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        class="form-control" id="date_hsmt">
                                        <input type="hidden" class="form-control"
                                            value="{{ $temp != [] ? $temp->date_hsmt : '' }}" id="date1_test"
                                            name="date1">
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="ten_thanh_vien_test">Tên từng thành viên liên danh:</label>
                                        <textarea style="" name="ten_thanh_vien" {{
                                            $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} class="form-control"
                                            id="ten_thanh_vien_test" cols="90" rows="5">{{ $temp != [] ? $temp->ten_thanh_vien : '' }}</textarea>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_dai_dien">Đại diện là ông/bà:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->name_dai_dien : '' }}"
                                        name="name_dai_dien" id="name_dai_dien_test">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="chuc_vu">Chức vụ:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->chuc_vu : '' }}"
                                        name="chuc_vu" id="chuc_vu_test">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="dia_chi">Địa chỉ:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->dia_chi : '' }}"
                                        name="dia_chi" id="dia_chi_test">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="dien_thoai">Điện thoại:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->dien_thoai : '' }}"
                                        name="dien_thoai" id="dien_thoai_test">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="fax">Fax:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->fax : '' }}"
                                        name="fax" id="fax_test">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="email">E-mail:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->email : '' }}"
                                        name="email" id="email_test">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="tai_khoan">Tài khoản:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->tai_khoan : '' }}"
                                        name="tai_khoan" id="tai_khoan_test">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="ma_so_thue">Mã số thuế:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' :
                                        '' }}
                                        value="{{ $temp != [] ? $temp->ma_so_thue : '' }}"
                                        name="ma_so_thue" id="ma_so_thue_test">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-information" role="tabpanel"
                                aria-labelledby="nav-information-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-3">
                                        <label for="so_uy_quyen_test">Giấy uỷ quyền số:</label>
                                        <input type="text" class="form-control" name="so_uy_quyen" {{ $detail->enabled
                                        == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->so_uy_quyen : '' }}"
                                        id="so_uy_quyen_test">
                                    </div>
                                    <div class="form-group date-container col-md-3">
                                        <label for="date2_test">Ngày tháng năm (trường hợp được uỷ quyền)</label>
                                        <i class="date-icon date_uq fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input type="text" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        class="form-control" id="date_uq">
                                        <input type="hidden" value="{{ $temp != [] ? $temp->date_uq : '' }}"
                                            class="form-control" id="date2_test" name="date2">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_lien_danh_test">Tên của liên danh theo thoả thuận:</label>
                                        <input type="text" class="form-control" id="name_lien_danh_test" {{
                                            $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->name_lien_danh : '' }}"
                                        name="name_lien_danh">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="hinh_thuc_khac_test">Hình thức xử lý khác(nếu có)</label>
                                        <textarea name="hinh_thuc_khac" id="hinh_thuc_khac_test" class="form-control"
                                            cols="90" rows="5" placeholder="Hình thức xử lý khác" {{
                                            $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}>{{ $temp != [] ? $temp->hinh_thuc_khac : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_mot_ben_test">Tên một bên đứng đầu liên danh:</label>
                                        <input type="text" class="form-control" id="name_mot_ben_test" {{
                                            $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->name_mot_ben : '' }}"
                                        name="name_mot_ben">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="noi_dung_khac_test">Nội dung khác(nếu có)</label>
                                        <textarea name="noi_dung_khac" id="noi_dung_khac_test" class="form-control"
                                            cols="90" rows="5" {{
                                            $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} placeholder="Nhập nội dung khác nếu có">{{ $temp != [] ? $temp->noi_dung_khac : '' }}</textarea>
                                    </div>
                                </div>




                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">

                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}" id="table_content">
                                            @if ($temp == []  || $temp->table_content == '')
                                            <table style="border-collapse: collapse; font-family: 'times new roman', times, serif; width: 100%; border: 1px solid rgb(0, 0, 0); height: 134.344px;" border="1">
                                                <tbody>
                                                    <tr style="height: 44.7812px;">
                                                        <td style="width: 7%; padding-top:5px; text-align: center; border-width: 1px; border-color: rgb(0, 0, 0); height: 44.7812px;"><strong>STT</strong></td>
                                                        <td style="width: 34%; padding-top:5px; text-align: center; border-width: 1px; border-color: rgb(0, 0, 0); height: 44.7812px;"><strong>T&ecirc;n</strong></td>
                                                        <td style="width: 34%; padding-top:5px; border-width: 1px; border-color: rgb(0, 0, 0); text-align: center; height: 44.7812px;"><strong>Nội dung c&ocirc;ng việc đảm nhận</strong></td>
                                                        <td style="width: 25%; padding-top:5px; border-width: 1px; border-color: rgb(0, 0, 0); text-align: center; height: 44.7812px;"><strong>Tỷ l&ecirc; % so với tổng gi&aacute; dự thầu</strong></td>
                                                    </tr>
                                                    <tr style="height: 22.3906px;">
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); text-align: center; height: 22.3906px;">1</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">T&ecirc;n th&agrave;nh vi&ecirc;n đứng đầu</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">&nbsp;</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">&nbsp;</td>
                                                    </tr>
                                                    <tr style="height: 22.3906px;">
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); text-align: center; height: 22.3906px;">2</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">T&ecirc;n th&agrave;nh vi&ecirc;n thứ 2</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">&nbsp;</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">&nbsp;</td>
                                                    </tr>
                                                    <tr style="height: 22.3906px;">
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); text-align: center; height: 22.3906px;">&nbsp;</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">&nbsp;</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">&nbsp;</td>
                                                        <td style=" border-width: 1px; border-color: rgb(0, 0, 0); height: 22.3906px;">&nbsp;</td>
                                                    </tr>
                                                    <tr style="height: 22.3906px;">
                                                        <td style="border-width: 1px; padding-top:5px; border-color: rgb(0, 0, 0); text-align: center; height: 22.3906px;" colspan="2"><strong>Tổng cộng</strong></td>
                                                        <td style=" border-width: 1px; padding-top:5px; border-color: rgb(0, 0, 0); height: 22.3906px; text-align: center;"><strong>To&agrave;n bộ c&ocirc;ng việc của g&oacute;i thầu</strong></td>
                                                        <td style=" border-width: 1px; padding-top:5px; border-color: rgb(0, 0, 0); height: 22.3906px; text-align: center;"><strong>100%</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @else
                                            {{ $temp->table_content }}
                                            @endif

                                            </textarea>
                                    </div>


                                </div>




                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-3">
                                        <label for="total_test">Tổng số bản lập:</label>
                                        <input type="text" class="form-control"
                                        {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->total : '' }}"
                                        id="total_test" name="total">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="moi_ben_giu_test">Mỗi bên giữ:</label>
                                        <input type="text" class="form-control"
                                        {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->moi_ben_giu : '' }}"
                                        id="moi_ben_giu_test" name="moi_ben_giu">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="chu_ky_dung_dau_test">Đại diện hợp pháp của thành viên đứng đầu liên
                                            danh:</label>
                                        <textarea name="chu_ky_dung_dau" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} class="form-control" id="chu_ky_dung_dau_test"
                                            cols="30" rows="3">{{ $temp != [] ? $temp->chu_ky_dung_dau : '' }}</textarea>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="chu_ky_thanh_vien_test">Đại diện hợp pháp của thành viên liên
                                            danh:</label>
                                        <textarea name="chu_ky_thanh_vien" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} class="form-control"
                                            id="chu_ky_thanh_vien_test" cols="30" rows="3">{{ $temp != [] ? $temp->chu_ky_thanh_vien : '' }}</textarea>
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
                                @if ($detail->enabled != 0 && Auth::user()->level != 2)
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
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center">
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">THỎA THUẬN
                            LI&Ecirc;N DANH</span></strong>
                </p>
                <p class="MsoNormal" style="text-align: right; margin: 6.0pt 2.15pt .0001pt 0in;" align="right"><span
                        style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;"
                        id="address1">______</span><span style="mso-bidi-font-size: 12.0pt;">, ng&agrave;y <span
                            style="background: yellow; mso-highlight: yellow;" id="d">____</span> th&aacute;ng <span
                            style="mso-tab-count: 1;">
                        </span><span style="background: yellow; mso-highlight: yellow;" id="m">____</span> năm <span
                            style="background: yellow; mso-highlight: yellow;" id="y">____</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">G&oacute;i thầu: <span
                            style="background: yellow; mso-highlight: yellow;" id="name_goi_thau1">____ [ghi t&ecirc;n
                            g&oacute;i thầu]</span></span>
                </p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Thuộc dự &aacute;n: <span
                            style="background: yellow; mso-highlight: yellow;" id="name_du_an1">____ [ghi t&ecirc;n dự
                            &aacute;n]</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Căn cứ <span
                            style="background: yellow; mso-highlight: yellow;" id="can_cu1">__ <em
                                style="mso-bidi-font-style: normal;">[Luật đấu thầu số 43/2013/QH13 ng&agrave;y
                                26/11/2013 của Quốc hội]</em></span><em
                            style="mso-bidi-font-style: normal;">;</em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Căn cứ <span
                            style="background: yellow; mso-highlight: yellow;" id="can_cu11">____ <em
                                style="mso-bidi-font-style: normal;">[Nghị định số 63/2014/NĐ-CP ng&agrave;y 26/6/2014
                                của Ch&iacute;nh phủ về hướng dẫn thi h&agrave;nh Luật đấu thầu về lựa chọn nh&agrave;
                                thầu]</em></span><em style="mso-bidi-font-style: normal;">;</em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Căn cứ hồ sơ mời thầu g&oacute;i thầu <span
                            style="background: yellow; mso-highlight: yellow;" id="name_goi_thau5">[ghi t&ecirc;n
                            g&oacute;i thầu]</span>
                        <span style="background: yellow; mso-highlight: yellow;">ng&agrave;y <span id="d1">__</span>
                            th&aacute;ng <span id="m1">__</span> năm <span id="y1">__ [ng&agrave;y được ghi
                                tr&ecirc;n HSMT];</span> </span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Ch&uacute;ng t&ocirc;i, đại diện cho c&aacute;c b&ecirc;n
                        k&yacute; thỏa thuận li&ecirc;n danh, gồm c&oacute;:</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n
                            th&agrave;nh vi&ecirc;n li&ecirc;n danh: </span></strong><span
                        style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;"
                        id="ten_thanh_vien1">____<em style="mso-bidi-font-style: normal;">[ghi t&ecirc;n từng
                            th&agrave;nh vi&ecirc;n li&ecirc;n
                            danh]</em></span></p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">Đại diện l&agrave; &ocirc;ng/b&agrave;: <span
                            style="mso-tab-count: 1 lined;" id="name_dai_dien1">
                            ______________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">Chức vụ: <span style="mso-tab-count: 1 lined;"
                            id="chuc_vu1"> ______________________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">Địa chỉ: <span style="mso-tab-count: 1 lined;"
                            id="dia_chi1"> _______________________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">Điện thoại: <span style="mso-tab-count: 1 lined;"
                            id="dien_thoai1"> _____________________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">Fax: <span style="mso-tab-count: 1 lined;" id="fax1">
                            __________________________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">E-mail: <span style="mso-tab-count: 1 lined;" id="email1">
                            ________________________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">T&agrave;i khoản: <span style="mso-tab-count: 1 lined;"
                            id="tai_khoan1"> _____________________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal"
                    style="text-align: left; tab-stops: lined 420.0pt; margin: 6.0pt 2.15pt .0001pt 0in;" align="left">
                    <span style="mso-bidi-font-size: 12.0pt;">M&atilde; số thuế: <span style="mso-tab-count: 1 lined;"
                            id="ma_so_thue1"> ____________________________________________________________
                        </span></span>
                </p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;" id="giay_uy_quyen">Giấy ủy quyền số <span
                            style="background: yellow; mso-highlight: yellow;" id="so_uy_quyen1">____</span> ng&agrave;y
                        <span style="background: yellow; mso-highlight: yellow;" id="d2">___</span> th&aacute;ng <span
                            style="background: yellow; mso-highlight: yellow;" id="m2">____</span> năm <span
                            style="background: yellow; mso-highlight: yellow;" id="y2">___(trường hợp được ủy
                            quyền).</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">C&aacute;c b&ecirc;n (sau đ&acirc;y gọi l&agrave;
                        th&agrave;nh vi&ecirc;n) thống nhất k&yacute; kết thỏa thuận li&ecirc;n danh với c&aacute;c nội
                        dung sau:</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Điều 1.
                            Nguy&ecirc;n tắc chung</span></strong></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">1. C&aacute;c th&agrave;nh vi&ecirc;n tự nguyện h&igrave;nh
                        th&agrave;nh li&ecirc;n danh để tham dự thầu g&oacute;i thầu <span
                            style="background: yellow; mso-highlight: yellow;" id="name_goi_thau2"> ___[ghi t&ecirc;n
                            g&oacute;i thầu]</span> thuộc
                        dự &aacute;n <span style="background: yellow; mso-highlight: yellow;" id="name_du_an2">____[ghi
                            t&ecirc;n dự &aacute;n].</span></span>
                </p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">2. C&aacute;c th&agrave;nh vi&ecirc;n thống nhất t&ecirc;n
                        gọi của li&ecirc;n danh cho mọi giao dịch li&ecirc;n quan đến g&oacute;i thầu n&agrave;y
                        l&agrave;: <span style="background: yellow; mso-highlight: yellow;" id="name_lien_danh1">____<em
                                style="mso-bidi-font-style: normal;">[ghi t&ecirc;n của li&ecirc;n danh theo thỏa
                                thuận].</em></span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">3. C&aacute;c th&agrave;nh vi&ecirc;n cam kết kh&ocirc;ng
                        th&agrave;nh vi&ecirc;n n&agrave;o được tự &yacute; tham gia độc lập hoặc li&ecirc;n danh với
                        th&agrave;nh vi&ecirc;n kh&aacute;c để tham gia g&oacute;i thầu n&agrave;y. Trường hợp
                        tr&uacute;ng thầu, kh&ocirc;ng th&agrave;nh vi&ecirc;n n&agrave;o c&oacute; quyền từ chối thực
                        hiện c&aacute;c tr&aacute;ch nhiệm v&agrave; nghĩa vụ đ&atilde; quy định trong hợp đồng. Trường
                        hợp th&agrave;nh vi&ecirc;n của li&ecirc;n danh từ chối ho&agrave;n th&agrave;nh tr&aacute;ch
                        nhiệm ri&ecirc;ng của m&igrave;nh như đ&atilde; thỏa thuận th&igrave; th&agrave;nh vi&ecirc;n
                        đ&oacute; bị xử l&yacute; như sau:</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">- Bồi thường
                            thiệt hại cho c&aacute;c b&ecirc;n trong li&ecirc;n danh;</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">- Bồi thường
                            thiệt hại cho Chủ đầu tư theo quy định n&ecirc;u trong hợp đồng;</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;" id="hinhThucKhac">- H&igrave;nh thức xử l&yacute;
                        kh&aacute;c <span style="background: yellow; mso-highlight: yellow;"
                            id="hinh_thuc_khac1">____<em style="mso-bidi-font-style: normal;">[ghi r&otilde; h&igrave;nh
                                thức xử l&yacute;
                                kh&aacute;c].</em></span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Điều 2.
                            Ph&acirc;n c&ocirc;ng tr&aacute;ch nhiệm </span></strong></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">C&aacute;c th&agrave;nh vi&ecirc;n thống nhất ph&acirc;n
                        c&ocirc;ng tr&aacute;ch nhiệm để thực hiện g&oacute;i thầu <span
                            style="background: yellow; mso-highlight: yellow;" id="name_goi_thau3">___[ghi t&ecirc;n
                            g&oacute;i thầu]</span> thuộc
                        dự &aacute;n <span style="background: yellow; mso-highlight: yellow;" id="name_du_an3">____[ghi
                            t&ecirc;n dự &aacute;n]</span> đối với
                        từng th&agrave;nh vi&ecirc;n như sau: </span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">1. Th&agrave;nh vi&ecirc;n đứng đầu li&ecirc;n danh: </span>
                </p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">C&aacute;c b&ecirc;n nhất tr&iacute; ủy quyền cho <span
                            style="background: yellow; mso-highlight: yellow;" id="name_mot_ben1">____<em
                                style="mso-bidi-font-style: normal;">[ghi t&ecirc;n một b&ecirc;n]</em></span>
                        l&agrave;m th&agrave;nh vi&ecirc;n đứng đầu li&ecirc;n danh, đại diện cho li&ecirc;n danh trong
                        những phần việc sau:</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;"><span
                                style="mso-spacerun: yes;">&nbsp;</span>[- K&yacute; đơn dự thầu thuộc hồ sơ đề xuất về
                            kỹ thuật v&agrave; đơn dự thầu thuộc hồ sơ đề xuất về t&agrave;i ch&iacute;nh;</span></em>
                </p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">- K&yacute;
                            c&aacute;c văn bản, t&agrave;i liệu để giao dịch với B&ecirc;n mời thầu trong qu&aacute;
                            tr&igrave;nh tham dự thầu, kể cả văn bản đề nghị l&agrave;m r&otilde; HSMT v&agrave; văn bản
                            giải tr&igrave;nh, l&agrave;m r&otilde; HSDT hoặc văn bản đề nghị r&uacute;t HSDT, sửa đổi,
                            thay thế HSDT;</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">- Thực hiện bảo
                            đảm dự thầu cho cả li&ecirc;n danh;</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">- Tham gia
                            qu&aacute; tr&igrave;nh thương thảo, ho&agrave;n thiện hợp đồng;</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">- K&yacute; đơn
                            kiến nghị trong trường hợp nh&agrave; thầu c&oacute; kiến nghị;</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;"
                            id="noiDungKhac">- C&aacute;c
                            c&ocirc;ng việc kh&aacute;c trừ việc k&yacute; kết hợp đồng <span
                                style="background: yellow; mso-highlight: yellow;" id="noi_dung_khac1">____[ghi
                                r&otilde; nội dung
                                c&aacute;c c&ocirc;ng việc kh&aacute;c (nếu c&oacute;)].</span></span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">2. C&aacute;c th&agrave;nh vi&ecirc;n trong li&ecirc;n danh
                        thỏa thuận ph&acirc;n c&ocirc;ng tr&aacute;ch nhiệm thực hiện c&ocirc;ng việc theo bảng dưới
                        đ&acirc;y:</span></p>
                <span id="table_content_test">

                </span>

                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Điều 3. Hiệu lực
                            của thỏa thuận li&ecirc;n danh </span></strong></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">1. Thỏa thuận li&ecirc;n danh c&oacute; hiệu lực kể từ
                        ng&agrave;y k&yacute;. </span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">2. Thỏa thuận li&ecirc;n danh chấm dứt hiệu lực trong
                        c&aacute;c trường hợp sau:</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">- C&aacute;c b&ecirc;n ho&agrave;n th&agrave;nh tr&aacute;ch
                        nhiệm, nghĩa vụ của m&igrave;nh v&agrave; tiến h&agrave;nh thanh l&yacute; hợp đồng;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">- C&aacute;c b&ecirc;n c&ugrave;ng thỏa thuận chấm
                        dứt;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">- Nh&agrave; thầu li&ecirc;n danh kh&ocirc;ng tr&uacute;ng
                        thầu;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">- Hủy thầu g&oacute;i thầu <span
                            style="background: yellow; mso-highlight: yellow;" id="name_goi_thau4">____ [ghi t&ecirc;n
                            g&oacute;i thầu]</span> thuộc
                        dự &aacute;n <span style="background: yellow; mso-highlight: yellow;" id="name_du_an4">____ [ghi
                            t&ecirc;n dự &aacute;n]</span> theo
                        th&ocirc;ng b&aacute;o của B&ecirc;n mời thầu.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Thỏa thuận li&ecirc;n danh được lập th&agrave;nh <span
                            style="background: yellow; mso-highlight: yellow;" id="total1">___</span> bản, mỗi b&ecirc;n
                        giữ <span style="background: yellow; mso-highlight: yellow;" id="moi_ben_giu1">___</span> bản,
                        c&aacute;c bản thỏa thuận
                        c&oacute; gi&aacute; trị ph&aacute;p l&yacute; như nhau.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">ĐẠI DIỆN HỢP
                            PH&Aacute;P CỦA TH&Agrave;NH VI&Ecirc;N ĐỨNG ĐẦU LI&Ecirc;N DANH</span></strong></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;"><span
                            style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;"
                            id="chu_ky_dung_dau1">[ghi
                            t&ecirc;n, chức danh, k&yacute; t&ecirc;n v&agrave; đ&oacute;ng dấu]</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">ĐẠI DIỆN HỢP
                            PH&Aacute;P CỦA TH&Agrave;NH VI&Ecirc;N LI&Ecirc;N DANH</span></strong></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em
                        style="mso-bidi-font-style: normal;">
                        <pre style="font-family:&quot;Times New Roman&quot;,serif; mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;"
                            id="chu_ky_thanh_vien1">[ghi t&ecirc;n từng th&agrave;nh vi&ecirc;n, chức danh, k&yacute; t&ecirc;n v&agrave; đ&oacute;ng dấu]</pre>
                    </em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                <p class="MsoNormal">&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create3.js"></script>
@endsection
