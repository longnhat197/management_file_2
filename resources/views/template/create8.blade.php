@extends('layout.master')
@section('title','HỢP ĐỒNG KHÔNG HOÀN THÀNH TRONG QUÁ KHỨ DO LỖI CỦA NHÀ THẦU')
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
                    HỢP ĐỒNG TƯƠNG TỰ DO NHÀ THẦU THỰC HIỆN
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/8" method="post">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active p-2" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="fas fa-clipboard p-2"></i>
                                    Thông tin
                                </a>
                                {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                    href="#nav-profile" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Project Tab 2</a> --}}
                                {{-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                    href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="fas fa-calendar-day p-2"></i>
                                    Mô tả về các vụ kiện đang giải quyết
                                </a> --}}
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_nha_thau_test">Tên nhà thầu:</label>

                                        <input type="text" class="form-control" id="name_nha_thau_test" {{
                                            $detail->enabled
                                        == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->name_nha_thau : '' }}" name="name_nha_thau">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="datePick">Ngày làm:</label>
                                        <i class="date-icon date_ttld fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input class="form-control" {{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }} type="text" id="datePick">
                                        <input type="hidden"  value="{{
                                        $temp != [] ? $temp->date : '' }}"
                                        name="date" id="date" class="form-control">
                                        <input type="hidden" value="{{ $detail_id }}" id="detail_id"
                                            data-url="./template/8/save">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="address_test">Địa chỉ làm hợp đồng:</label>
                                        <input type="text" name="address" {{ $detail->enabled == '0' || Auth::user()->level == 2 ?
                                        'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->address : '' }}"
                                        class="form-control" id="address_test">
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="width: 100%; border-collapse: collapse; border: none; color: rgb(0, 0, 0); height: 590.203px;" border="1" width="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border: 1pt solid windowtext; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">T&ecirc;n v&agrave; số hợp đồng</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 30.3906px;" colspan="3" width="469">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi t&ecirc;n đầy đủ của hợp đồng, số k&yacute; hiệu]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Ng&agrave;y k&yacute; hợp đồng</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 30.3906px;" colspan="3" width="469">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi ng&agrave;y, th&aacute;ng, năm]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Ng&agrave;y ho&agrave;n th&agrave;nh</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 30.3906px;" colspan="3" width="469">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi ng&agrave;y, th&aacute;ng, năm]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 52.7812px;">
                                                <td style="width: 167.516px; border-top: none; border-left: 1pt solid windowtext; border-bottom: none; border-right: 1pt solid windowtext; padding: 0in; height: 52.7812px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Gi&aacute; hợp đồng</span></p>
                                                </td>
                                                <td style="width: 205.516px; border-top: none; border-bottom: none; border-left: none; border-image: initial; border-right: 1pt solid windowtext; padding: 0in; height: 52.7812px;" colspan="2" width="226">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi tổng gi&aacute; hợp đồng bằng số tiền v&agrave; đồng tiền đ&atilde; k&yacute;]</span></span></p>
                                                </td>
                                                <td style="width: 220.406px; border-top: none; border-bottom: none; border-left: none; border-image: initial; border-right: 1pt solid windowtext; padding: 0in; height: 52.7812px;" valign="top" width="243">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Tương đương____ VND </span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 119.953px;">
                                                <td style="width: 167.516px; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-bottom: none; padding: 0in; height: 119.953px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Trong trường hợp l&agrave; th&agrave;nh vi&ecirc;n trong li&ecirc;n danh hoặc nh&agrave; thầu phụ, ghi gi&aacute; trị phần hợp đồng m&agrave; nh&agrave; thầu đảm nhiệm</span></p>
                                                </td>
                                                <td style="width: 106.266px; border-top: 1pt solid windowtext; border-left: none; border-bottom: none; border-right: 1pt solid windowtext; padding: 0in; height: 119.953px;" width="117">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi phần trăm gi&aacute; hợp đồng trong tổng gi&aacute; hợp đồng]</span></span></p>
                                                </td>
                                                <td style="width: 99.25px; border-top: 1pt solid windowtext; border-left: none; border-bottom: none; border-right: 1pt solid windowtext; padding: 0in; height: 119.953px;" width="109">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi số tiền v&agrave; đồng tiền đ&atilde; k&yacute;]</span></span></p>
                                                </td>
                                                <td style="width: 220.406px; border-top: 1pt solid windowtext; border-left: none; border-bottom: none; border-right: 1pt solid windowtext; padding: 0in; height: 119.953px;" valign="top" width="243">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Tương đương___ VND </span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border: 1pt solid windowtext; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">T&ecirc;n dự &aacute;n:</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 30.3906px;" colspan="3" valign="top" width="469">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi t&ecirc;n đầy đủ của dự &aacute;n c&oacute; hợp đồng đang k&ecirc; khai]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">T&ecirc;n Chủ đầu tư:</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 30.3906px;" colspan="3" valign="top" width="469">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi t&ecirc;n đầy đủ của chủ đầu tư trong hợp đồng đang k&ecirc; khai]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 91.1719px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 91.1719px;" valign="top" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Địa chỉ:</span></p>
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">Điện thoại/fax:</span></p>
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">E-mail:</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 91.1719px;" colspan="3" valign="top" width="469">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi đầy đủ địa chỉ hiện tại của chủ đầu tư]</span></span></p>
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi số điện thoại, số fax kể cả m&atilde; quốc gia, m&atilde; v&ugrave;ng, địa chỉ e-mail]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 593.438px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" colspan="4" width="652">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">M&ocirc; tả t&iacute;nh chất tương tự theo quy định tại Mục 2.1 Chương III</span></strong></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">1. Loại h&agrave;ng h&oacute;a</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 30.3906px;" colspan="3" width="469">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi th&ocirc;ng tin ph&ugrave; hợp]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">2. Về gi&aacute; trị</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 30.3906px;" colspan="3" width="469">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi số tiền bằng VND]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">3. Về quy m&ocirc; thực hiện</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 30.3906px;" colspan="3" width="469">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi quy m&ocirc; theo hợp đồng]</span></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 30.3906px;">
                                                <td style="width: 167.516px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 30.3906px;" width="184">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;">4. C&aacute;c đặc t&iacute;nh kh&aacute;c</span></p>
                                                </td>
                                                <td style="width: 425.922px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 30.3906px;" colspan="3" width="469">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif;"><span style="mso-bidi-font-size: 12.0pt;">[ghi c&aacute;c đặc t&iacute;nh kh&aacute;c nếu cần thiết]</span></span></p>
                                                </td>
                                                </tr>
                                                <!-- [if !supportMisalignedColumns]-->
                                                <tr style="height: 22.3906px;">
                                                <td style="border: none; height: 22.3906px; width: 167.516px;" width="184">&nbsp;</td>
                                                <td style="border: none; height: 22.3906px; width: 106.266px;" width="117">&nbsp;</td>
                                                <td style="border: none; height: 22.3906px; width: 99.25px;" width="109">&nbsp;</td>
                                                <td style="border: none; height: 22.3906px; width: 220.406px;" width="243">&nbsp;</td>
                                                </tr>
                                                <!--[endif]--></tbody>
                                            </table>

                                            @elseif($temp != [])
                                            {{ $temp->table_content }}
                                            @endif

                                            </textarea>
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
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span
                        style="font-family: 'times new roman', times, serif;"><strong
                            style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">HỢP ĐỒNG
                                TƯƠNG TỰ DO NH&Agrave; THẦU THỰC HIỆN</span></strong></span></p>
                <p class="MsoNormal" style="text-align: right; margin: 6.0pt 2.15pt .0001pt 0in;" align="right"><span
                        style="font-family: 'times new roman', times, serif;"><span
                            style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="address1">___</span><span
                            style="mso-bidi-font-size: 12.0pt;">, ng&agrave;y <span
                                style="background: yellow; mso-highlight: yellow;" id="d">____</span> th&aacute;ng <span
                                style="background: yellow; mso-highlight: yellow;" id="m">____</span> năm <span
                                style="background: yellow; mso-highlight: yellow;" id="y">____</span></span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif;">T&ecirc;n nh&agrave; thầu: <span
                            style="background: yellow; mso-highlight: yellow;" id="name_nha_thau1">____<em
                                style="mso-bidi-font-style: normal;">[ghi t&ecirc;n đầy đủ của nh&agrave;
                                thầu]</em></span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif;">Th&ocirc;ng tin về từng hợp đồng, mỗi hợp
                        đồng cần bảo đảm c&aacute;c th&ocirc;ng tin sau đ&acirc;y:</span></p>
                <span id="table_content_test">

                </span>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif;">Nh&agrave; thầu phải gửi k&egrave;m theo
                        bản chụp c&aacute;c văn bản, t&agrave;i liệu li&ecirc;n quan đến c&aacute;c hợp đồng đ&oacute;
                        (x&aacute;c nhận của Chủ đầu tư về hợp đồng đ&atilde; ho&agrave;n th&agrave;nh theo c&aacute;c
                        nội dung li&ecirc;n quan trong bảng tr&ecirc;n...).</span></p>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create8.js"></script>
<script>

</script>
@endsection
