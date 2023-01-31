@extends('layout.master')
@section('title','TÌNH HÌNH TÀI CHÍNH CỦA NHÀ THẦU')
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
                    TÌNH HÌNH TÀI CHÍNH CỦA NHÀ THẦU
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/91" method="post">
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
                                            data-url="./template/91/save">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_thanh_vien_lien_danh_test">Tên thành viên của nhà thầu liên
                                            danh:</label>
                                        <input type="text" name="name_thanh_vien_lien_danh" {{ $detail->enabled == '0' || Auth::user()->level == 2 ?
                                        'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->name_thanh_vien_lien_danh : '' }}"
                                        class="form-control" id="name_thanh_vien_lien_danh_test">
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table style="border-collapse: collapse; width: 100%; height: 335.859px;" border="1">
                                                <tbody>
                                                <tr style="height: 44.7812px;">
                                                <td style="width: 25%; border-top:1px solid white; border-left:1px solid white; border-bottom:1px solid rgb(255, 255, 255); border-right:1px solid rgb(0, 0, 0);height: 44.7812px; border-width: 1px; text-align: center; ">&nbsp;</td>
                                                <td style="width: 75%; height: 44.7812px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;" colspan="3"><span style="font-family: 'times new roman', times, serif;"><strong><span style="font-size: 12pt;">Năm t&agrave;i ch&iacute;nh của nh&agrave; thầu từ ng&agrave;y___ th&aacute;ng___ đến ng&agrave;y___ th&aacute;ng ____ (nh&agrave; thầu điền nội dung n&agrave;y)</span></strong></span></td>
                                                </tr>
                                                <tr style="height: 22.3906px;">
                                                <td style="width: 25%; height: 22.3906px; text-align: center; border-top:1px solid white; border-left:1px solid white; border-bottom:1px solid rgb(255, 255, 255); border-right:1px solid rgb(0, 0, 0);border-width: 1px;">&nbsp;</td>
                                                <td style="width: 75%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;" colspan="3"><span style="font-family: 'times new roman', times, serif;"><strong style="mso-bidi-font-weight: normal;"><span lang="ES-TRAD" style="font-size: 12pt;">Số liệu t&agrave;i ch&iacute;nh trong c&aacute;c năm gần nhất theo y&ecirc;u cầu của HSMT</span></strong></span></td>
                                                </tr>
                                                <tr style="height: 22.3906px;">
                                                <td style="width: 25%; height: 22.3906px; text-align: center; border-width: 1px;border-top:1px solid white; border-left:1px solid white; border-bottom:1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0)">&nbsp;</td>
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><span style="font-family: 'times new roman', times, serif;">Năm 1:</span></td>
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><span style="font-family: 'times new roman', times, serif;">Năm 2:</span></td>
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><span style="font-family: 'times new roman', times, serif;">Năm 3:</span></td>
                                                </tr>
                                                <tr style="height: 22.3906px;">
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: Calibri; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Tổng t&agrave;i sản</span></strong></td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                </tr>
                                                <tr style="height: 22.3906px;">
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: Calibri; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Tổng nợ</span></strong></td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                </tr>
                                                <tr style="height: 22.3906px;">
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: Calibri; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Gi&aacute; trị t&agrave;i sản r&ograve;ng</span></strong></td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                </tr>
                                                <tr style="height: 67.1719px;">
                                                <td style="width: 25%; text-align: center; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: Calibri; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Doanh thu hằng năm (kh&ocirc;ng bao gồm thuế VAT)</span></strong></td>
                                                <td style="width: 25%; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                </tr>
                                                <tr style="height: 67.1719px;">
                                                <td style="width: 25%; text-align: center; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: Calibri; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Doanh thu b&igrave;nh qu&acirc;n hằng năm (kh&ocirc;ng bao gồm thuế VAT) </span></strong></td>
                                                <td style="width: 25%; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 67.1719px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                </tr>
                                                <tr style="height: 22.3906px;">
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; font-family: 'Times New Roman Bold',serif; mso-fareast-font-family: Calibri; mso-bidi-font-family: 'Times New Roman'; letter-spacing: -.3pt; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Lợi nhuận trước thuế</span></strong></td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                </tr>
                                                <tr style="height: 22.3906px;">
                                                <td style="width: 25%; text-align: center; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;"><strong style="mso-bidi-font-weight: normal;"><span style="font-size: 12.0pt; mso-bidi-font-size: 14.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: Calibri; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Lợi nhuận sau thuế</span></strong></td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                <td style="width: 25%; height: 22.3906px; border-color: rgb(0, 0, 0); border-style: solid; border-width: 1px;">&nbsp;</td>
                                                </tr>
                                                </tbody>
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
                        style="color: rgb(0, 0, 0); font-family: 'times new roman', times, serif;"><strong
                            style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&Igrave;NH
                                H&Igrave;NH T&Agrave;I CH&Iacute;NH CỦA NH&Agrave; THẦU</span></strong></span></p>
                <p class="MsoNormal" style="text-align: right; margin: 6.0pt 2.15pt .0001pt 0in;" align="right"><span
                        style="color: rgb(0, 0, 0); font-family: 'times new roman', times, serif;">T&ecirc;n nh&agrave;
                        thầu: <span
                            style="background: yellow; mso-highlight: yellow;" id="name_nha_thau1">________________</span><br>Ng&agrave;y:
                        <span style="background: yellow; mso-highlight: yellow;" id="date1">______________________</span></span>
                </p>
                <p class="MsoNormal" style="text-align: right; margin: 6.0pt 2.15pt .0001pt 0in;" align="right"><span
                        style="color: rgb(0, 0, 0); font-family: 'times new roman', times, serif;">T&ecirc;n
                        th&agrave;nh vi&ecirc;n của nh&agrave; thầu li&ecirc;n danh: <span
                            style="background: yellow; mso-highlight: yellow;" id="name_thanh_vien_lien_danh1">________________________</span><br
                            style="mso-special-character: line-break;"><!-- [if !supportLineBreakNewLine]--><br
                            style="mso-special-character: line-break;">
                        <!--[endif]-->
                    </span></p>
                <span id="table_content_test"></span>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create91.js"></script>
<script>

</script>
@endsection
