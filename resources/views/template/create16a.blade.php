@extends('layout.master')
@section('title','BẢN KÊ KHAI THÔNG TIN VỀ NHÀ THẦU')
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
                    ĐƠN DỰ THẦU (thuộc HSĐXTC)
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/161" method="post">
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
                                    Thông tin về đại diện hợp pháp của nhà thầu
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="datePick">Ngày ký đơn dự thầu:</label>
                                        <input class="form-control" type="text" id="datePick">
                                        <i class="date-icon date_ttld fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input type="hidden" {{ $detail->enabled == 0 ? 'disabled' : '' }} value="{{
                                        $temp != [] ? $temp->date : '' }}"
                                        name="date" id="date" class="form-control">
                                        <input type="hidden" value="{{ $detail_id }}" id="detail_id"
                                            data-url="./template/161/save">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_goi_thau_test">Tên gói thầu:</label>

                                        <input type="text" class="form-control" id="name_goi_thau_test"
                                            name="name_goi_thau" {{ $detail->enabled == 0 ? 'disabled' : '' }} value="{{
                                        $detail->name_goi_thau }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_du_an_test">Tên dự án:</label>

                                        <input type="text" class="form-control" id="name_du_an_test" {{ $detail->enabled
                                        == 0 ? 'disabled' : '' }}
                                        value="{{ $detail->name_du_an }}" name="name_du_an">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_trich_yeu_test">Thư mời thầu số:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == '0' ? 'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->so_trich_yeu : '' }}"
                                        id="so_trich_yeu_test" name="so_trich_yeu">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_moi_thau_test">Tên của Bên mời thầu:</label>
                                        {{-- <div class="btn-actions-pane-right">
                                            <div class="input-group w-50">
                                                <select required id="name_moi_thau" class="form-control">
                                                    <option value="">--Tên bên mời thầu--</option>
                                                    @foreach ($customers as $customer)
                                                    <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <input type="text" name="name_moi_thau" class="form-control" {{ $detail->enabled
                                        == 0 ? 'disabled' : '' }} id="name_moi_thau_test" value="{{
                                        $detail->name_moi_thau }}" >
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">



                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_sua_doi_test">Số của văn bản sửa đổi (nếu có):</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 ? 'disabled' :
                                        '' }} value="{{ $temp != [] ? $temp->so_sua_doi : '' }}" id="so_sua_doi_test"
                                        name="so_sua_doi">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_nha_thau_test">Tên nhà thầu:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == 0 ? 'disabled' :
                                        '' }} id="name_nha_thau_test" value="{{ $temp != [] ? $temp->name_nha_thau : ''
                                        }}" name="name_nha_thau">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_tien_test">Tổng số tiền (ghi giá trị bằng số, bằng chữ và đồng
                                            tiền dự thầu):</label>
                                        <textarea name="so_tien" {{ $detail->enabled == '0' ? 'disabled' : '' }} class="form-control" id="so_tien_test" cols="30"
                                            rows="4">{{ $temp != [] ? $temp->so_tien : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-2">
                                        <label for="time_test">Có hiệu lực trong số ngày:</label>
                                        <input type="text" value="{{ $temp != [] ? $temp->time : '' }}" {{
                                            $detail->enabled == '0' ? 'disabled' : '' }}
                                        class="form-control" id="time_test" name="time">
                                    </div>
                                    <div class="form-group date-container col-md-4">
                                        <label for="date_test">Kể từ ngày:</label>
                                        <i class="date-icon date_start fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input class="form-control" {{ $detail->enabled == '0' ? 'disabled' : '' }}
                                        type="text" id="date_start">
                                        <input type="hidden" class="form-control"
                                            value="{{ $temp != [] ? $temp->dateStart : '' }}" id="date_test"
                                            name="date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_chuc_danh_test">Đại diện hợp pháp của nhà thầu:</label>
                                        <textarea name="name_chuc_danh" {{ $detail->enabled == '0' ? 'disabled' : '' }} class="form-control" id="name_chuc_danh_test" cols="90"
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
                            style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">ĐƠN DỰ
                                THẦU</span></strong></span></p>
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong
                            style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">(thuộc
                                HSĐXTC)</span></strong></span></p>
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><em
                            style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">(&aacute;p
                                dụng trong trường hợp nh&agrave; thầu kh&ocirc;ng c&oacute; đề xuất giảm gi&aacute; hoặc
                                c&oacute; đề xuất giảm gi&aacute; trong thư giảm gi&aacute;
                                ri&ecirc;ng)</span></em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">Ng&agrave;y: <span
                            style="background: yellow; mso-highlight: yellow;" id="date1">__[ghi ng&agrave;y th&aacute;ng năm k&yacute; đơn dự
                                thầu]</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">T&ecirc;n g&oacute;i
                        thầu: <span
                                style="background: yellow; mso-highlight: yellow;" id="name_goi_thau1">__[ghi t&ecirc;n g&oacute;i thầu theo
                                th&ocirc;ng b&aacute;o mời thầu]</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">T&ecirc;n dự
                        &aacute;n: <span
                                style="background: yellow; mso-highlight: yellow;" id="name_du_an1">__[ghi t&ecirc;n dự
                                &aacute;n]</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">Thư mời thầu số:
                        <span style="background: yellow; mso-highlight: yellow;" id="so_trich_yeu1">__[ghi số tr&iacute;ch yếu của Thư mời thầu đối với
                                đấu thầu hạn chế]</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">K&iacute;nh gửi:
                        <span
                                style="background: yellow; mso-highlight: yellow;" id="name_moi_thau1">__[ghi đầy đủ v&agrave; ch&iacute;nh
                                x&aacute;c t&ecirc;n của B&ecirc;n mời thầu]</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">Sau khi nghi&ecirc;n
                        cứu hồ sơ mời thầu <span id="so_sua_doi">v&agrave; văn bản sửa đổi hồ sơ mời thầu số <span style="background: yellow; mso-highlight: yellow;" id="so_sua_doi1">____[ghi số của văn bản sửa đổi (nếu c&oacute;)]</span></span> m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; nhận được,
                        ch&uacute;ng t&ocirc;i, <span style="background: yellow; mso-highlight: yellow;" id="name_nha_thau1">____ [ghi t&ecirc;n nh&agrave; thầu]</span>, cam
                        kết thực hiện g&oacute;i thầu <span style="background: yellow; mso-highlight: yellow;" id="name_goi_thau2">____[ghi t&ecirc;n g&oacute;i thầu]</span><em
                            style="mso-bidi-font-style: normal;"> </em>theo đ&uacute;ng y&ecirc;u cầu của hồ sơ mời
                        thầu. C&ugrave;ng với Hồ sơ đề xuất về kỹ thuật, ch&uacute;ng t&ocirc;i xin gửi k&egrave;m đơn
                        n&agrave;y đề xuất về t&agrave;i ch&iacute;nh với tổng số tiền l&agrave; <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="so_tien1">____[ghi gi&aacute; trị bằng số, bằng
                                chữ v&agrave; đồng tiền dự thầu]</span></em> c&ugrave;ng với bảng tổng hợp gi&aacute; dự
                        thầu k&egrave;m theo.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">Hồ sơ đề xuất về
                        t&agrave;i ch&iacute;nh n&agrave;y c&oacute; hiệu lực trong thời gian <span
                            style="background: yellow; mso-highlight: yellow;" id="time1">___</span> ng&agrave;y, kể từ ng&agrave;y
                        <span style="background: yellow; mso-highlight: yellow;" id="d">___</span> th&aacute;ng <span
                            style="background: yellow; mso-highlight: yellow;" id="m">____</span> năm <span
                            style="background: yellow; mso-highlight: yellow;" id="y">___</span>.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span></p>
                <table class="MsoNormalTable"
                    style="border-collapse: collapse; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt;"
                    border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
                            <td style="width: 176.05pt; padding: 0in 5.4pt 0in 5.4pt;" valign="top" width="235">
                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="left"><span
                                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);">&nbsp;</span>
                                </p>
                            </td>
                            <td style="width: 282.7pt; padding: 0in 5.4pt 0in 5.4pt;" valign="top" width="377">
                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="center"><span
                                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><strong
                                            style="mso-bidi-font-weight: normal;"><span
                                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;">Đại
                                                diện hợp ph&aacute;p của nh&agrave; thầu</span></strong></span></p>
                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="center"><span
                                        style="font-family: 'times new roman', times, serif; color: rgb(0, 0, 0);"><em
                                            style="mso-bidi-font-style: normal;"><span
                                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="name_chuc_danh1">[ghi
                                                t&ecirc;n, chức danh, k&yacute; t&ecirc;n v&agrave; đ&oacute;ng
                                                dấu]</span></em></span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="MsoNormal">&nbsp;</p>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create16a.js"></script>
<script>

</script>
@endsection
