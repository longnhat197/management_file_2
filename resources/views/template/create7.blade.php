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
                    KIỆN TỤNG ĐANG GIẢI QUYẾT
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/7" id="myForm" method="post">
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
                                    Mô tả về các vụ kiện đang giải quyết
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
                                        == 0  ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->name_nha_thau : '' }}" name="name_nha_thau">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="datePick">Ngày làm:</label>
                                        <i class="date-icon date_ttld fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input class="form-control" {{ $detail->enabled == 0  ? 'disabled' : '' }} type="text" id="datePick">
                                        <input type="hidden" value="{{
                                        $temp != [] ? $temp->ngay_lam_giay : '' }}"
                                        name="date" id="date" class="form-control">
                                        <input type="hidden" value="{{ $detail_id }}" id="detail_id"
                                            data-url="./template/7/save">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_thanh_vien_lien_danh_test">Tên thành viên của nhà thầu liên
                                            danh:</label>
                                        <input type="text" name="name_thanh_vien_lien_danh" {{ $detail->enabled == '0'  ?
                                        'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->name_thanh_vien_lien_danh : '' }}"
                                        class="form-control" id="name_thanh_vien_lien_danh_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="check" type="radio" value="0" id="r1"
                                                {{ $detail->enabled == '0'  ? 'disabled' : '' }}
                                            @if ($temp != [])
                                            @if ($temp->check == 0)
                                            checked
                                            @endif
                                            @endif checked >

                                            <label class="form-check-label" for="r1">
                                                Không có vụ kiện nào
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="check" type="radio" value="1" id="r2"
                                                {{ $detail->enabled == '0'  ? 'disabled' : '' }}
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

                                </div>


                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0  ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == [] || $temp->table_content == '' )
                                            <table class="MsoNormalTable" style="width: 100%; border-collapse: collapse; border: none;" border="1" width="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; page-break-inside: avoid;">
                                                <td style="width: 136.547px; border: 1pt solid windowtext; padding: 0in;" width="67">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Năm</span></strong></span></p>
                                                </td>
                                                <td style="width: 141.859px; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in;" width="339">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Vấn đề tranh chấp</span></strong></span></p>
                                                </td>
                                                <td style="width: 144.531px; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in;" width="86">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; trị vụ kiện đang giải quyết t&iacute;nh bằng VND</span></strong></span></p>
                                                </td>
                                                <td style="width: 144.531px; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in;" width="139">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Tỷ lệ của gi&aacute; trị vụ kiện đang giải quyết so với gi&aacute; trị t&agrave;i sản r&ograve;ng</span></strong></span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1; page-break-inside: avoid;">
                                                <td style="width: 136.547px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in;" valign="top" width="67">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 141.859px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in;" valign="top" width="339">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 144.531px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in;" valign="top" width="86">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 144.531px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in;" valign="top" width="139">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 2; mso-yfti-lastrow: yes; page-break-inside: avoid;">
                                                <td style="width: 136.547px; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in;" valign="top" width="67">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 141.859px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in;" valign="top" width="339">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 144.531px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in;" valign="top" width="86">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 144.531px; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in;" valign="top" width="139">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
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
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span
                        style="font-family: 'times new roman', times, serif;"><strong
                            style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">KIỆN TỤNG
                                ĐANG GIẢI QUYẾT<sup> </sup></span></strong></span></p>
                <p class="MsoNormal" style="text-align: right; margin: 6.0pt 2.15pt .0001pt 0in;" align="right"><span
                        style="font-family: 'times new roman', times, serif;">T&ecirc;n nh&agrave; thầu: <span
                            style="background: yellow; mso-highlight: yellow;" id="name_nha_thau1">________________</span><br>Ng&agrave;y:
                        <span
                            style="background: yellow; mso-highlight: yellow;" id="date1">______________________</span><br>
                            <span id="ten_thanh_vien">T&ecirc;n
                        th&agrave;nh vi&ecirc;n của nh&agrave; thầu li&ecirc;n danh: <span
                            style="background: yellow; mso-highlight: yellow;" id="name_thanh_vien_lien_danh1">________________________</span></span></span>
                </p>
                <p class="MsoNormal" style="text-align: right; margin: 6.0pt 2.15pt .0001pt 0in;" align="right">&nbsp;
                </p>
                <p class="MsoNormal" style="margin: 6pt 2.15pt 0.0001pt 0in; text-align: center;" align="right"><span
                        style="font-family: 'times new roman', times, serif;"><strong
                            style="mso-bidi-font-weight: normal;"><span style="font-size: 12pt;">C&aacute;c vụ kiện đang
                                giải quyết</span></strong></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif;"><strong
                            style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Chọn một
                                trong c&aacute;c th&ocirc;ng tin m&ocirc; tả dưới đ&acirc;y:</span></strong></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif;"><span
                            style="mso-bidi-font-size: 12.0pt; background: yellow; " id="check1">&#x2610;</span><span
                            style="mso-bidi-font-size: 12.0pt;"> Kh&ocirc;ng c&oacute; vụ kiện n&agrave;o đang giải
                            quyết.</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="right"><span
                        style="font-family: 'times new roman', times, serif;"><span style="font-size: 12pt;"><span
                                    style="mso-bidi-font-size: 12.0pt; background: yellow; " id="check2">&#x2610;</span> </span><span
                            style="mso-bidi-font-size: 12.0pt;">Dưới đ&acirc;y l&agrave; m&ocirc; tả về c&aacute;c vụ kiện đang
                            giải quyết m&agrave; nh&agrave; thầu l&agrave; một b&ecirc;n đương sự (hoặc mỗi th&agrave;nh
                            vi&ecirc;n của li&ecirc;n danh nếu l&agrave; nh&agrave; thầu li&ecirc;n danh).</span></span>
                </p><br>
                <span id="table_content_test">

                </span>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create7.js"></script>
<script>

</script>
@endsection
