@extends('layout.master')
@section('title','Bảo lãnh dự thầu')
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
                    Bảo lãnh dự thầu
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/4" method="post">
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
                                    Thời gian
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">

                                        <label for="thong_tin_moi_thau_test">Tên và địa chỉ của Bên mời thầu:</label>
                                        <textarea name="thong_tin_moi_thau" {{
                                            $detail->enabled == '0' ? 'disabled' : '' }} class="form-control" id="thong_tin_moi_thau_test"
                                         cols="30" rows="5">{{ $temp != [] ? $temp->thong_tin_moi_thau : '' }}</textarea>
                                        <input type="hidden" id="detail_id" name="detail_id" value="{{ $detail_id }}"
                                            data-url="./template/4/save">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="ngay_phat_hanh_test">Ngày phát hành bảo lãnh:</label>
                                        <i class="date-icon date_ttld fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input class="form-control" type="text" id="datePick">
                                        <input type="hidden" class="form-control"
                                            value="{{ $temp != [] ? $temp->ngay_phat_hanh : '' }}"
                                            id="ngay_phat_hanh_test" name="ngay_phat_hanh">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_trich_yeu_test">Số trích yếu của Bảo lãnh dự thầu:</label>
                                        <input type="text" class="form-control" {{ $detail->enabled == '0' ? 'disabled'
                                        : '' }}
                                        value="{{ $temp != [] ? $temp->so_trich_yeu : '' }}"
                                        id="so_trich_yeu_test" name="so_trich_yeu">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="thong_tin_phat_hanh_test">Tên và địa chỉ nơi phát hành (nếu chưa có
                                            trên
                                            tiêu đề):</label>
                                        <textarea name="thong_tin_phat_hanh" {{
                                            $detail->enabled == '0' ? 'disabled' : '' }} id="thong_tin_phat_hanh_test" class="form-control"
                                            cols="30" rows="4">{{ $temp != [] ? $temp->thong_tin_phat_hanh : '' }}</textarea>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_nha_thau_test">Tên nhà thầu:</label>
                                        <input type="text" {{ $detail->enabled == '0' ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->name_nha_thau : '' }}"
                                        class="form-control"
                                        id="name_nha_thau_test" name="name_nha_thau">
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
                                    <div class="form-group col-md-6">
                                        <label for="name_du_an_test">Tên dự án:</label>
                                        <input type="text" {{ $detail->enabled == '0' ? 'disabled' : '' }} value="{{
                                        $detail->name_du_an }}" class="form-control" id="name_du_an_test"
                                        name="name_du_an">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_trich_yeu1_test">Số trích yếu của Thư mời thầu/thông báo mời
                                            thầu:</label>
                                        <input type="text" class="form-control" id="so_trich_yeu1_test" {{
                                            $detail->enabled == '0' ? 'disabled' : '' }}
                                        value="{{ $temp != [] ? $temp->so_trich_yeu1 : '' }}"
                                        name="so_trich_yeu1">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_tien_test">Số tiền bảo lãnh (ghi bằng chữ, số,đồng tiền sử
                                            dụng):</label>
                                        <textarea name="so_tien" {{ $detail->enabled == '0' ? 'disabled' : '' }} class="form-control" id="so_tien_test" cols="30"
                                            rows="4">{{ $temp != [] ? $temp->so_tien_bl : '' }}</textarea>
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
                                            value="{{ $temp != [] ? $temp->from_date : '' }}" id="date_test"
                                            name="date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_tien1_test">Số tiền thanh toán tối đa (ghi bằng chữ, số):</label>
                                        <textarea name="so_tien1" {{ $detail->enabled == '0' ? 'disabled' : '' }} class="form-control" id="so_tien1_test" cols="30"
                                            rows="4">{{ $temp != [] ? $temp->so_tien_tt : '' }}</textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="ten_chuc_danh_test">Ghi tên, chức danh:</label>
                                        {{-- <input type="text" class="form-control" id="ten_chuc_danh_test"
                                            name="ten_chuc_danh"> --}}
                                        <textarea name="ten_chuc_danh" {{ $detail->enabled == '0' ? 'disabled' : '' }} class="form-control" id="ten_chuc_danh_test" cols="90"
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
                        style="color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">BẢO L&Atilde;NH DỰ THẦU</span></strong></span></p>
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span
                        style="color: rgb(0, 0, 0);"><em style="mso-bidi-font-style: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">(&aacute;p dụng đối với nh&agrave; thầu độc
                                lập)</span></em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">B&ecirc;n thụ hưởng: </span></strong><em
                            style="mso-bidi-font-style: normal;"><span
                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="thong_tin_moi_thau1">___[ghi
                                t&ecirc;n v&agrave; địa chỉ của B&ecirc;n mời thầu]</span></em><em
                            style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">
                            </span></em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">Ng&agrave;y ph&aacute;t h&agrave;nh bảo
                                l&atilde;nh<span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">:
                                </span></span></strong><em
                            style="mso-bidi-font-style: normal;"><span
                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="ngay_phat_hanh1">___[ghi
                                ng&agrave;y ph&aacute;t h&agrave;nh bảo l&atilde;nh]</span></em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">&nbsp;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">BẢO L&Atilde;NH DỰ THẦU số<span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">:
                                </span></span></strong><em
                            style="mso-bidi-font-style: normal;"><span
                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="so_trich_yeu1">___[ghi số
                                tr&iacute;ch yếu của Bảo l&atilde;nh dự thầu]</span></em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">&nbsp;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);"><strong style="mso-bidi-font-weight: normal;"><span
                                style="mso-bidi-font-size: 12.0pt;">B&ecirc;n bảo l&atilde;nh<span
                                    style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">:
                                </span></span></strong><em
                            style="mso-bidi-font-style: normal;"><span
                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="thong_tin_phat_hanh1">___[ghi
                                t&ecirc;n v&agrave; địa chỉ nơi ph&aacute;t h&agrave;nh, nếu những th&ocirc;ng tin
                                n&agrave;y chưa được thể hiện ở phần ti&ecirc;u đề tr&ecirc;n giấy
                                in]</span></em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">Ch&uacute;ng t&ocirc;i được th&ocirc;ng b&aacute;o rằng <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="name_nha_thau1">[ghi t&ecirc;n nh&agrave;
                                thầu]</span></em> (sau đ&acirc;y gọi l&agrave; "B&ecirc;n y&ecirc;u cầu bảo
                        l&atilde;nh") sẽ tham dự thầu để thực hiện g&oacute;i thầu <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="name_goi_thau1">[ghi t&ecirc;n g&oacute;i
                                thầu]</span></em> thuộc dự &aacute;n <em style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="name_du_an1">[ghi t&ecirc;n dự &aacute;n]</span>
                        </em>theo Thư mời thầu/th&ocirc;ng b&aacute;o mời thầu số <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="so_trich_yeu11">[ghi số tr&iacute;ch yếu của Thư mời
                                thầu/th&ocirc;ng b&aacute;o mời thầu]</span></em>. </span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">Ch&uacute;ng t&ocirc;i cam kết với B&ecirc;n thụ hưởng rằng
                        ch&uacute;ng t&ocirc;i bảo l&atilde;nh cho nh&agrave; thầu tham dự thầu g&oacute;i thầu
                        n&agrave;y bằng một khoản tiền l&agrave; <em style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="so_tien1">____[ghi r&otilde; gi&aacute; trị
                                bằng số, bằng chữ v&agrave; đồng tiền sử dụng].</span></em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">Bảo l&atilde;nh n&agrave;y c&oacute; hiệu lực trong <span
                            style="background: yellow; mso-highlight: yellow;" id="time1">____</span> ng&agrave;y, kể từ
                        ng&agrave;y <span style="background: yellow; mso-highlight: yellow;" id="d">____</span> th&aacute;ng
                        <span style="background: yellow; mso-highlight: yellow;" id="m">___</span> năm <span
                            style="background: yellow; mso-highlight: yellow;" id="y">___</span>.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">Theo y&ecirc;u cầu của B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh,
                        ch&uacute;ng t&ocirc;i, với tư c&aacute;ch l&agrave; B&ecirc;n bảo l&atilde;nh, cam kết chắc
                        chắn sẽ thanh to&aacute;n cho B&ecirc;n thụ hưởng một khoản tiền hay c&aacute;c khoản tiền
                        kh&ocirc;ng vượt qu&aacute; tổng số tiền l&agrave; <span
                            style="background: yellow; mso-highlight: yellow;" id="so_tien11">[ghi bằng chữ] [ghi bằng số]</span> khi
                        nhận được văn bản th&ocirc;ng b&aacute;o nh&agrave; thầu vi phạm từ B&ecirc;n thụ hưởng trong
                        đ&oacute; n&ecirc;u r&otilde;: </span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">1. Nh&agrave; thầu r&uacute;t hồ sơ dự thầu sau thời điểm
                        đ&oacute;ng thầu v&agrave; trong thời gian c&oacute; hiệu lực của hồ sơ dự thầu;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">2. Nh&agrave; thầu vi phạm ph&aacute;p luật về đấu thầu dẫn đến
                        phải hủy thầu theo quy định tại điểm d Mục 41.1 <strong
                            style="mso-bidi-font-weight: normal;">-</strong> Chỉ dẫn nh&agrave; thầu của hồ sơ mời
                        thầu;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">3. Nh&agrave; thầu kh&ocirc;ng tiến h&agrave;nh hoặc từ chối tiến
                        h&agrave;nh thương thảo hợp đồng trong thời hạn 5 ng&agrave;y l&agrave;m việc, kể từ ng&agrave;y
                        nhận được th&ocirc;ng b&aacute;o mời đến thương thảo hợp đồng của B&ecirc;n mời thầu, trừ trường
                        hợp bất khả kh&aacute;ng;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">4. Nh&agrave; thầu kh&ocirc;ng tiến h&agrave;nh hoặc từ chối tiến
                        h&agrave;nh ho&agrave;n thiện hợp đồng trong thời hạn 20 ng&agrave;y, kể từ ng&agrave;y nhận
                        được th&ocirc;ng b&aacute;o tr&uacute;ng thầu của B&ecirc;n mời thầu hoặc đ&atilde; ho&agrave;n
                        thiện hợp đồng nhưng từ chối k&yacute; hợp đồng, trừ trường hợp bất khả kh&aacute;ng;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">5. Nh&agrave; thầu kh&ocirc;ng thực hiện biện ph&aacute;p bảo đảm
                        thực hiện hợp đồng theo quy định tại Mục 43 <strong
                            style="mso-bidi-font-weight: normal;">-</strong> Chỉ dẫn nh&agrave; thầu của hồ sơ mời
                        thầu.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">Nếu B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh được lựa chọn: bảo
                        l&atilde;nh n&agrave;y sẽ hết hiệu lực ngay sau khi B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh
                        k&yacute; kết hợp đồng v&agrave; nộp Bảo l&atilde;nh thực hiện hợp đồng cho B&ecirc;n thụ hưởng
                        theo thỏa thuận trong hợp đồng đ&oacute;.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">Nếu B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh kh&ocirc;ng được lựa
                        chọn: bảo l&atilde;nh n&agrave;y sẽ hết hiệu lực ngay sau khi ch&uacute;ng t&ocirc;i nhận được
                        bản chụp văn bản th&ocirc;ng b&aacute;o kết quả lựa chọn nh&agrave; thầu từ B&ecirc;n thụ hưởng
                        gửi cho B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh; trong v&ograve;ng 30 ng&agrave;y sau khi hết
                        thời hạn hiệu lực của hồ sơ dự thầu.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">Bất cứ y&ecirc;u cầu bồi thường n&agrave;o theo bảo l&atilde;nh
                        n&agrave;y đều phải được đến tới văn ph&ograve;ng ch&uacute;ng t&ocirc;i trước hoặc trong
                        ng&agrave;y đ&oacute;. </span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="color: rgb(0, 0, 0);">&nbsp;</span></p>
                <table class="MsoNormalTable"
                    style="border-collapse: collapse; mso-yfti-tbllook: 480; mso-padding-alt: 0in 5.4pt 0in 5.4pt;"
                    border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; mso-yfti-lastrow: yes;">
                            <td style="width: 221.4pt; padding: 0in 5.4pt 0in 5.4pt;" valign="top" width="295">
                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="left"><span style="color: rgb(0, 0, 0);">&nbsp;</span></p>
                            </td>
                            <td style="width: 221.4pt; padding: 0in 5.4pt 0in 5.4pt;" valign="top" width="295">
                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="center"><span style="color: rgb(0, 0, 0);"><strong
                                            style="mso-bidi-font-weight: normal;"><span
                                                style="mso-bidi-font-size: 12.0pt;">Đại diện hợp ph&aacute;p của
                                                ng&acirc;n h&agrave;ng</span></strong></span></p>
                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="center"><span style="color: rgb(0, 0, 0);"><span
                                                style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="ten_chuc_danh1">[ghi
                                                t&ecirc;n, chức danh, k&yacute; t&ecirc;n v&agrave; đ&oacute;ng
                                                dấu]</span></span></p>
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
<script type="text/javascript" src="./dashboard/assets/scripts/create4.js"></script>
@endsection
