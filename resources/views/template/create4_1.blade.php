@extends('layout.master')
@section('title','Bảo lãnh dự thầu')
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
                    Bảo lãnh dự thầu(áp dụng nhà thầu liên danh)
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/4_1" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">

                                <label for="thong_tin_moi_thau_test">Tên và địa chỉ của Bên mời thầu:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group w-50">
                                        <select required id="thong_tin_moi_thau" class="form-control">
                                            <option value="" data-id="0" data-url="./template/4_1/ajaxMT41">--Tên bên
                                                mời
                                                thầu--</option>
                                            @foreach ($customers as $customer)
                                            <option data-id="{{ $customer->id }}" data-url="./template/4_1/ajaxMT41"
                                                value="{{ $customer->name }}">{{ $customer->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="thong_tin_moi_thau_test"
                                    name="thong_tin_moi_thau">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="ngay_phat_hanh_test">Ngày phát hành bảo lãnh:</label>
                                <input type="date" class="form-control" id="ngay_phat_hanh_test" name="ngay_phat_hanh">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="so_trich_yeu_test">Số trích yếu của Bảo lãnh dự thầu:</label>
                                <input type="text" class="form-control" id="so_trich_yeu_test" name="so_trich_yeu">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="thong_tin_phat_hanh_test">Tên và địa chỉ nơi phát hành (nếu chưa có trên
                                    tiêu đề):</label>
                                <textarea name="thong_tin_phat_hanh" id="thong_tin_phat_hanh_test" class="form-control"
                                    cols="30" rows="4"></textarea>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_nha_thau_test">Tên nhà thầu:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group w-50">
                                        <select required id="name_nha_thau" class="form-control">
                                            <option value="" data-id="0" data-url="./template/2/ajax">--Tên nhà thầu--
                                            </option>
                                            @foreach ($contractors as $contractor)
                                            <option data-id="{{ $contractor->id }}" data-url="./template/2/ajax"
                                                value="{{ $contractor->name }}">{{ $contractor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="name_nha_thau_test" name="name_nha_thau">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_goi_thau_test">Tên gói thầu:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group w-50">
                                        <select required id="name_goi_thau" class="form-control">
                                            <option value="">--Tên gói thầu--</option>
                                            @foreach ($packages as $package)
                                            <option value="{{ $package->name }}">{{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="name_goi_thau_test" name="name_goi_thau">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_du_an_test">Tên dự án:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group w-50">
                                        <select required id="name_du_an" class="form-control">
                                            <option value="">--Tên dự án--</option>
                                            @foreach ($projects as $project)
                                            <option value="{{ $project->name }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="name_du_an_test" name="name_du_an">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="so_trich_yeu1_test">Số trích yếu của Thư mời thầu/thông báo mời
                                    thầu:</label>
                                <input type="text" class="form-control" id="so_trich_yeu1_test" name="so_trich_yeu1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="so_tien_test">Số tiền bảo lãnh (ghi bằng chữ, số,đồng tiền sử dụng):</label>
                                <textarea name="so_tien" class="form-control" id="so_tien_test" cols="30"
                                    rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-2">
                                <label for="time_test">Có hiệu lực trong số ngày:</label>
                                <input type="text" class="form-control" id="time_test" name="time">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="date_test">Kể từ ngày:</label>
                                <input type="date" class="form-control" id="date_test" name="date">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="so_tien1_test">Số tiền thanh toán tối đa (ghi bằng chữ, số):</label>
                                <textarea name="so_tien1" class="form-control" id="so_tien1_test" cols="30"
                                    rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_lien_danh_test">Tên đầy đủ nhà thầu liên danh</label>
                                <input type="text" name="name_lien_danh" class="form-control" id="name_lien_danh_test">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="ten_chuc_danh_test">Ghi tên, chức danh:</label>
                                {{-- <input type="text" class="form-control" id="ten_chuc_danh_test"
                                    name="ten_chuc_danh"> --}}
                                <textarea name="ten_chuc_danh" class="form-control" id="ten_chuc_danh_test" cols="90"
                                    rows="5"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                {{-- <button type="" class="btn btn-primary">Export Word</button> --}}
                                <a href="javascript:void(0)" class="btn btn-primary">Export word</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div>
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center">
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢO
                            L&Atilde;NH DỰ THẦU</span></strong></p>
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">(&aacute;p dụng
                            đối với nh&agrave; thầu li&ecirc;n danh)</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">B&ecirc;n thụ
                            hưởng: </span></strong><em
                        style="mso-bidi-font-style: normal;"><span
                            style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="thong_tin_moi_thau1">___[ghi
                            t&ecirc;n v&agrave; địa chỉ của B&ecirc;n mời thầu]</span></em><em
                        style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;"> </span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Ng&agrave;y
                            ph&aacute;t h&agrave;nh bảo l&atilde;nh: </span></strong><em
                        style="mso-bidi-font-style: normal;"><span
                            style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="ngay_phat_hanh1">___[ghi
                            ng&agrave;y ph&aacute;t h&agrave;nh bảo l&atilde;nh]</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢO L&Atilde;NH
                            DỰ THẦU số: </span></strong><em
                        style="mso-bidi-font-style: normal;"><span
                            style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="so_trich_yeu1">___[ghi số
                            tr&iacute;ch yếu của Bảo l&atilde;nh dự thầu]</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong
                        style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">B&ecirc;n bảo
                            l&atilde;nh: </span></strong><em
                        style="mso-bidi-font-style: normal;"><span
                            style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;" id="thong_tin_phat_hanh1">___[ghi
                            t&ecirc;n v&agrave; địa chỉ nơi ph&aacute;t h&agrave;nh, nếu những th&ocirc;ng tin
                            n&agrave;y chưa được thể hiện ở phần ti&ecirc;u đề tr&ecirc;n giấy in]</span></em></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Ch&uacute;ng t&ocirc;i được th&ocirc;ng b&aacute;o rằng <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="name_nha_thau1">[ghi t&ecirc;n nh&agrave;
                                thầu]</span></em><sup> </sup>(sau đ&acirc;y gọi l&agrave; "B&ecirc;n y&ecirc;u cầu bảo
                        l&atilde;nh") sẽ tham dự thầu để thực hiện g&oacute;i thầu <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="name_goi_thau1">[ghi t&ecirc;n g&oacute;i
                                thầu]</span> </em>thuộc dự &aacute;n <em style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="name_du_an1">[ghi t&ecirc;n dự &aacute;n]</span>
                        </em>theo Thư mời thầu/th&ocirc;ng b&aacute;o mời thầu số <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="so_trich_yeu11">[ghi số tr&iacute;ch yếu của Thư mời
                                thầu/th&ocirc;ng b&aacute;o mời thầu]</span>. </em></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Ch&uacute;ng t&ocirc;i cam kết với B&ecirc;n thụ hưởng rằng
                        ch&uacute;ng t&ocirc;i bảo l&atilde;nh cho nh&agrave; thầu tham dự thầu g&oacute;i thầu
                        n&agrave;y bằng một khoản tiền l&agrave; <span
                            style="background: yellow; mso-highlight: yellow;" id="so_tien1">____ <[ghi r&otilde; gi&aacute; trị bằng số, bằng chữ
                                v&agrave; đồng tiền sử dụng].</span></span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Bảo l&atilde;nh n&agrave;y c&oacute; hiệu lực trong <span
                            style="background: yellow; mso-highlight: yellow;" id="time1">____</span> ng&agrave;y, kể từ
                        ng&agrave;y_<span style="background: yellow; mso-highlight: yellow;" id="$d">___</span> th&aacute;ng <span
                            style="background: yellow; mso-highlight: yellow;" id="$m">___</span> năm <span
                            style="background: yellow; mso-highlight: yellow;" id="$y">___</span>.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Theo y&ecirc;u cầu của B&ecirc;n y&ecirc;u cầu bảo
                        l&atilde;nh, ch&uacute;ng t&ocirc;i, với tư c&aacute;ch l&agrave; B&ecirc;n bảo l&atilde;nh, cam
                        kết chắc chắn sẽ thanh to&aacute;n cho B&ecirc;n thụ hưởng một khoản tiền hay c&aacute;c khoản
                        tiền kh&ocirc;ng vượt qu&aacute; tổng số tiền l&agrave; <em
                            style="mso-bidi-font-style: normal;"><span
                                style="background: yellow; mso-highlight: yellow;" id="so_tien11">[ghi bằng chữ] [ghi bằng số]</span>
                        </em>khi nhận được văn bản th&ocirc;ng b&aacute;o nh&agrave; thầu vi phạm từ B&ecirc;n thụ hưởng
                        trong đ&oacute; n&ecirc;u r&otilde;: </span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">1. Nh&agrave; thầu r&uacute;t hồ sơ dự thầu sau thời điểm
                        đ&oacute;ng thầu v&agrave; trong thời gian c&oacute; hiệu lực của hồ sơ dự thầu;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">2. Nh&agrave; thầu vi phạm ph&aacute;p luật về đấu thầu dẫn
                        đến phải hủy thầu theo quy định tại điểm d Mục 41.1 <strong
                            style="mso-bidi-font-weight: normal;">-</strong> Chỉ dẫn nh&agrave; thầu của hồ sơ mời
                        thầu;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">3. Nh&agrave; thầu kh&ocirc;ng tiến h&agrave;nh hoặc từ chối
                        tiến h&agrave;nh thương thảo hợp đồng trong thời hạn 5 ng&agrave;y l&agrave;m việc, kể từ
                        ng&agrave;y nhận được th&ocirc;ng b&aacute;o mời đến thương thảo hợp đồng của B&ecirc;n mời
                        thầu, trừ trường hợp bất khả kh&aacute;ng;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">4. Nh&agrave; thầu kh&ocirc;ng tiến h&agrave;nh hoặc từ chối
                        tiến h&agrave;nh ho&agrave;n thiện hợp đồng trong thời hạn 20 ng&agrave;y, kể từ ng&agrave;y
                        nhận được th&ocirc;ng b&aacute;o tr&uacute;ng thầu của B&ecirc;n mời thầu hoặc đ&atilde;
                        ho&agrave;n thiện hợp đồng nhưng từ chối k&yacute; hợp đồng, trừ trường hợp bất khả
                        kh&aacute;ng;</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">5. Nh&agrave; thầu kh&ocirc;ng thực hiện biện ph&aacute;p
                        bảo đảm thực hiện hợp đồng theo quy định tại Mục 43 <strong
                            style="mso-bidi-font-weight: normal;">-</strong> Chỉ dẫn nh&agrave; thầu của hồ sơ mời
                        thầu.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Nếu bất kỳ th&agrave;nh vi&ecirc;n n&agrave;o trong
                        li&ecirc;n danh <span style="background: yellow; mso-highlight: yellow;" id="name_lien_danh1">_____ [ghi đầy đủ t&ecirc;n của nh&agrave; thầu
                                li&ecirc;n danh]</span><em style="mso-bidi-font-style: normal;"> </em>vi phạm quy
                        định của ph&aacute;p luật dẫn đến kh&ocirc;ng được ho&agrave;n trả bảo đảm dự thầu theo quy định
                        tại Mục 19.5 <strong style="mso-bidi-font-weight: normal;">-</strong> Chỉ dẫn nh&agrave; thầu
                        của hồ sơ mời thầu th&igrave; bảo đảm dự thầu của tất cả th&agrave;nh vi&ecirc;n trong
                        li&ecirc;n danh sẽ kh&ocirc;ng được ho&agrave;n trả.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Nếu B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh được lựa chọn:
                        bảo l&atilde;nh n&agrave;y sẽ hết hiệu lực ngay sau khi B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh
                        k&yacute; kết hợp đồng v&agrave; nộp Bảo l&atilde;nh thực hiện hợp đồng cho B&ecirc;n thụ hưởng
                        theo thỏa thuận trong hợp đồng đ&oacute;.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Nếu B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh kh&ocirc;ng được
                        lựa chọn: bảo l&atilde;nh n&agrave;y sẽ hết hiệu lực ngay sau khi ch&uacute;ng t&ocirc;i nhận
                        được bản chụp văn bản th&ocirc;ng b&aacute;o kết quả lựa chọn nh&agrave; thầu từ B&ecirc;n thụ
                        hưởng gửi cho B&ecirc;n y&ecirc;u cầu bảo l&atilde;nh; trong v&ograve;ng 30 ng&agrave;y sau khi
                        hết thời hạn hiệu lực của hồ sơ dự thầu.</span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">Bất cứ y&ecirc;u cầu bồi thường n&agrave;o theo bảo
                        l&atilde;nh n&agrave;y đều phải được đến tới văn ph&ograve;ng ch&uacute;ng t&ocirc;i trước hoặc
                        trong ng&agrave;y đ&oacute;. </span></p>
                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span
                        style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
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
                                    align="center"><strong style="mso-bidi-font-weight: normal;"><span
                                            style="mso-bidi-font-size: 12.0pt;">Đại diện hợp ph&aacute;p của ng&acirc;n
                                            h&agrave;ng</span></strong></p>
                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;"
                                    align="center"><em style="mso-bidi-font-style: normal;"><span
                                            style="mso-bidi-font-size: 12.0pt; background: yellow; mso-highlight: yellow;">[ghi
                                            t&ecirc;n, chức danh, k&yacute; t&ecirc;n v&agrave; đ&oacute;ng
                                            dấu]</span></em></p>
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
<script type="text/javascript" src="./dashboard/assets/scripts/create4_1.js"></script>
@endsection
