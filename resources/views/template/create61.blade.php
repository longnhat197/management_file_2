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
                    Bản kê khai thông tin về các thành viên của nhà thầu liên danh
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/61" id="myForm" method="post">
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
                                    <div class="form-group col-md-6">
                                        <label for="name_nha_thau_test">Tên nhà thầu:</label>

                                        <input type="text" class="form-control" id="name_nha_thau_test" {{
                                            $detail->enabled
                                        == 0 ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->name_nha_thau : '' }}" name="name_nha_thau">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="datePick">Ngày làm:</label>
                                        <i class="date-icon date_ttld fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input class="form-control" type="text" id="datePick">
                                        <input type="hidden" {{ $detail->enabled == 0 ? 'disabled' : '' }} value="{{
                                        $temp != [] ? $temp->ngay_lam_giay : '' }}"
                                        name="date" id="date" class="form-control">
                                        <input type="hidden" value="{{ $detail_id }}" id="detail_id"
                                            data-url="./template/61/save">
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
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3 form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="check" type="radio" value="0" id="r1"
                                                {{ $detail->enabled == '0' ? 'disabled' : '' }}
                                            @if ($temp != [])
                                                @if ($temp->check == 0)
                                                checked
                                                @endif
                                            @elseif ($temp == [])
                                            checked
                                            @endif
                                            >
                                            <label class="form-check-label" for="r1">
                                                Không có hợp đồng không hoàn thành
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="check" type="radio" value="1" id="r2"
                                                {{ $detail->enabled == '0' ? 'disabled' : '' }}
                                            @if ($temp != [])
                                            @if ($temp->check == 1)
                                            checked
                                            @endif
                                            @endif
                                            >
                                            <label class="form-check-label" for="r2">
                                                Có hợp đồng không hoàn thành
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-3 form-group">

                                        <label for="nam_test">Năm:</label>
                                        <input type="text" name="nam" {{ $detail->enabled == '0' ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->nam : '' }}"
                                        class="form-control" id="nam_test">

                                    </div>
                                </div>


                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 ? 'disabled' : '' }}" id="table_content" >

                                            @if ($temp == [] || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 600px; border: 1pt solid #000;" width="600">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">
                                                <td style="width: 45pt; border: 1px solid rgb(0, 0, 0);" width="60">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Năm</span></strong></span></p>
                                                </td>
                                                <td style="width: 70.3pt; border: 1px solid rgb(0, 0, 0);" width="94">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Phần việc hợp đồng kh&ocirc;ng ho&agrave;n th&agrave;nh</span></strong></span></p>
                                                </td>
                                                <td style="width: 202.35pt; border: 1px solid rgb(0, 0, 0);" width="270">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">M&ocirc; tả hợp đồng</span></strong></span></p>
                                                </td>
                                                <td style="width: 114.5pt; border: 1px solid rgb(0, 0, 0);" width="153">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Tổng gi&aacute; trị hợp đồng (gi&aacute; trị hiện tại, đơn vị tiền tệ, tỷ gi&aacute; hối đo&aacute;i, gi&aacute; trị tương đương bằng VND)</span></strong></span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1; mso-yfti-lastrow: yes;">
                                                <td style="width: 45pt; border: 1px solid rgb(0, 0, 0);" valign="top" width="60">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;&nbsp;</span></p>
                                                </td>
                                                <td style="width: 70.3pt; border-color: rgb(0, 0, 0); border-width: 1px; border-style: solid;" valign="top" width="94">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;&nbsp;</span></p>
                                                </td>
                                                <td style="width: 202.35pt; border-color: rgb(0, 0, 0); border-width: 1px; border-style: solid;" valign="top" width="270">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">M&ocirc; tả hợp đồng: </span></p>
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">T&ecirc;n Chủ đầu tư: </span></p>
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">Địa chỉ: </span></p>
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">Nguy&ecirc;n nh&acirc;n kh&ocirc;ng ho&agrave;n th&agrave;nh hợp đồng: </span></p>
                                                </td>
                                                <td style="width: 114.5pt; border-color: rgb(0, 0, 0); border-width: 1px; border-style: solid;" valign="top" width="153">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                </tbody>
                                                </table>

                                            @else
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
                        style="color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">HỢP ĐỒNG KH&Ocirc;NG HO&Agrave;N TH&Agrave;NH DO LỖI
                                CỦA </span></strong></span></p>
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span
                        style="color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">NH&Agrave; THẦU TRONG QU&Aacute;
                                KHỨ</span></strong></span></p>
                <p style="text-align: right;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);">T&ecirc;n
                        nh&agrave; thầu: <span style="background: yellow; mso-highlight: yellow;"
                            id="name_nha_thau1">________________</span><br>Ng&agrave;y:
                        <span style="background: yellow; mso-highlight: yellow;"
                            id="date1">_____________________</span><br>T&ecirc;n
                        th&agrave;nh vi&ecirc;n của nh&agrave; thầu li&ecirc;n danh: <span
                            style="background: yellow; mso-highlight: yellow;"
                            id="name_thanh_vien_lien_danh1">_________________________</span></span>
                </p>
                <p style="text-align: right;">&nbsp;</p>
                <p style="text-align: left;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">C&aacute;c
                            hợp đồng kh&ocirc;ng ho&agrave;n th&agrave;nh do lỗi của nh&agrave; thầu trong qu&aacute;
                            khứ theo quy định tại Mục 2.1 Chương III</span></span></p>
                <p style="text-align: left;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'MS Mincho'; background: yellow; mso-highlight: yellow; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;"
                                id="check1">&#x2610;</span><span
                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'MS Mincho'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">
                            </span>Kh&ocirc;ng c&oacute; hợp đồng kh&ocirc;ng ho&agrave;n th&agrave;nh do lỗi của
                            nh&agrave; thầu kể từ ng&agrave;y 01 th&aacute;ng 01 năm <span
                                style="background: yellow; mso-highlight: yellow;" id="nam1"> __ [ghi năm]</span> theo
                            quy định
                            tại
                            ti&ecirc;u ch&iacute; đ&aacute;nh gi&aacute; 1 trong Bảng ti&ecirc;u chuẩn đ&aacute;nh
                            gi&aacute; về năng lực v&agrave; kinh nghiệm thuộc Mục 2.1 Chương III.</span></span></p>
                <p style="text-align: left;"><span
                        style="font-size: 12pt; font-family: 'Times New Roman', serif; color: rgb(0, 0, 0);"><span
                            style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span
                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'MS Mincho'; background: yellow; mso-highlight: yellow; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;"
                                id="check2">&#x2610;</span><span
                                style="font-size: 12.0pt; font-family: 'Times New Roman',serif; mso-fareast-font-family: 'MS Mincho'; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">
                            </span>C&oacute; hợp đồng kh&ocirc;ng ho&agrave;n th&agrave;nh do lỗi của nh&agrave; thầu
                            t&iacute;nh từ ng&agrave;y 01 th&aacute;ng 01 năm <span
                                style="background: yellow; mso-highlight: yellow;" id="nam2"> ___ [ghi năm]</span> theo
                            quy định
                            tại Bảng ti&ecirc;u chuẩn đ&aacute;nh gi&aacute; về năng lực v&agrave; kinh nghiệm thuộc Mục
                            2.1 Chương III.</span></span></p>
                <span id="table_content_test">

                </span>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create61.js"></script>
<script>

</script>
@endsection
