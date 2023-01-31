@extends('layout.master')
@section('title','BẢNG KÊ KHAI CHI PHÍ SẢN XUẤT TRONG NƯỚC ĐỐI VỚI
HÀNG HÓA ĐƯỢC HƯỞNG ƯU ĐÃI
')
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
                    BẢNG KÊ KHAI CHI PHÍ SẢN XUẤT TRONG NƯỚC ĐỐI VỚI
HÀNG HÓA ĐƯỢC HƯỞNG ƯU ĐÃI

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/18" method="post">
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

                                <input type="hidden" value="{{ $detail_id }}" id="detail_id"
                                    data-url="./template/18/save">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0  ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border-width: 1pt; border-color: #000000;" border="1">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">STT</span></strong></p>
                                                </td>
                                                <td style="width: 222.95pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n h&agrave;ng h&oacute;a</span></strong></p>
                                                </td>
                                                <td style="width: 203.55pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; trị</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">1</span></strong></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n h&agrave;ng h&oacute;a thứ nhất</span></strong></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 2;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; ch&agrave;o của h&agrave;ng h&oacute;a trong HSDT </span></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 3;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; trị thuế c&aacute;c loại (trong đ&oacute; bao gồm thuế nhập khẩu đối với c&aacute;c linh kiện, thiết bị cấu th&agrave;nh h&agrave;ng h&oacute;a nhập khẩu, thuế VAT v&agrave; c&aacute;c loại thuế kh&aacute;c phải trả cho h&agrave;ng h&oacute;a) </span></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 4;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">K&ecirc; khai c&aacute;c chi ph&iacute; nhập ngoại trong h&agrave;ng h&oacute;a bao gồm c&aacute;c loại ph&iacute;, lệ ph&iacute; (nếu c&oacute;)<span style="mso-spacerun: yes;">&nbsp; </span></span></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 5;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">Chi ph&iacute; sản xuất trong nước </span></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 6;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Tỷ lệ % chi ph&iacute; sản xuất trong nước </span></strong></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 7;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">2</span></strong></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n h&agrave;ng h&oacute;a thứ hai</span></strong></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" valign="bottom" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 8;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" valign="bottom" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&hellip;</span></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" valign="bottom" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 9; mso-yfti-lastrow: yes;">
                                                <td style="width: 37.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" width="50">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">n</span></strong></p>
                                                </td>
                                                <td style="width: 222.95pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" valign="bottom" width="297">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n h&agrave;ng h&oacute;a thứ n</span></strong></p>
                                                </td>
                                                <td style="width: 203.55pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 0in 0in 0in;" valign="bottom" width="271">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                </tr>
                                                </tbody>
                                                </table>
                                            @elseif($temp != [])
                                            {{ $temp->table_content }}
                                            @endif
                                            </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_chuc_danh_test">Đại diện hợp pháp của nhà thầu:</label>
                                        <textarea name="name_chuc_danh" {{ $detail->enabled == '0'  ? 'disabled' : '' }} class="form-control" id="name_chuc_danh_test" cols="90"
                                            rows="5">{{ $temp != [] ? $temp->name_chuc_danh : '' }}</textarea>
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
                                @if ($detail->enabled != 0 )
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
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢNG KÊ KHAI CHI PHÍ SẢN XUẤT TRONG NƯỚC ĐỐI VỚI
                        HÀNG HÓA ĐƯỢC HƯỞNG ƯU ĐÃI
                        </span></strong>
                </p>
                <p>&nbsp;</p>
                <span id="table_content_test"></span>
                <table class="MsoNormalTable"
                    style="border-collapse: collapse; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt;"
                    border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
                            <td style="width: 221.4pt; padding: 0in 5.4pt 0in 5.4pt;" valign="top" width="295">
                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                            </td>
                            <td style="width: 221.4pt; padding: 0in 5.4pt 0in 5.4pt;" valign="top" width="295">
                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="center"><span style="color: rgb(0, 0, 0);"><strong
                                            style="mso-bidi-font-weight: normal;"><span
                                                style="mso-bidi-font-size: 12.0pt;">Đại diện hợp ph&aacute;p của
                                                nh&agrave; thầu</span></strong></span></p>
                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="center"><span style="color: rgb(0, 0, 0);"><em
                                            style="mso-bidi-font-style: normal;"><span
                                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="name_chuc_danh1">[ghi
                                                t&ecirc;n, chức danh, k&yacute; t&ecirc;n v&agrave; đ&oacute;ng
                                                dấu]</span></em></span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create17.js"></script>
<script>

</script>
@endsection
