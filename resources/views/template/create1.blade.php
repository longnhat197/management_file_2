@extends('layout.master')
@section('title','Đơn dự thầu')
@section('body')
<!-- Main -->
<div class="app-main__inner mb-md-5">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Đơn dự thầu
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/1" method="post">
                        @csrf
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active p-2" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">
                                <i class="fas fa-clipboard p-2"></i>
                                Thông tin chung
                            </a>
                            {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Project Tab 2</a> --}}
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                role="tab" aria-controls="nav-contact" aria-selected="false">
                                <i class="fas fa-calendar-day p-2"></i>
                                Thời gian
                            </a>
                        </div>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="date_test">Ngày tháng năm đăng ký đơn dự thầu:</label>
                                        <input type="date" class="form-control" value="{{ $temp != [] ? $temp->date_dang_ky : 0 }}" id="date_test" name="date">
                                        <input type="hidden" value="{{ $detail_id }}" id="detail_id" data-url="./template/1/save">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="name_goi_thau">Tên gói thầu theo thông báo mời thầu:</label>
                                        {{-- <div class="btn-actions-pane-right">
                                            <div class="input-group w-50">
                                                <select required id="name_goi_thau" class="form-control">
                                                    <option value="">--Tên gói thầu--</option>
                                                    @foreach ($packages as $package)
                                                    <option value="{{ $package->name }}">{{ $package->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <input type="text" class="form-control" id="name_goi_thau_test" value="{{ $detail->name_goi_thau }}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="name_du_an">Tên dự án:</label>
                                        {{-- <div class="btn-actions-pane-right">
                                            <div class="input-group w-50">
                                                <select required id="name_du_an" class="form-control">
                                                    <option value="">--Tên dự án--</option>
                                                    @foreach ($projects as $project)
                                                    <option value="{{ $project->name }}">{{ $project->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <input type="text" class="form-control" id="name_du_an_test" value="{{ $detail->name_du_an }}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="so_trich_yeu_test">Số trích yếu của Thư mời thầu đối với đấu thầu hạn
                                            chế:</label>
                                        <input type="text" class="form-control" id="so_trich_yeu_test" value="{{ $temp != [] ? $temp->so_trich_yeu : '' }}" name="so_trich_yeu">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
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
                                        <input type="text" class="form-control" id="name_moi_thau_test" value="{{ $detail->name_moi_thau }}" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="so_sua_doi_test">Số của văn bản sửa đổi (nếu có):</label>
                                        <input type="text" class="form-control" value="{{ $temp != [] ? $temp->so_sua_doi : '' }}" id="so_sua_doi_test" name="so_sua_doi">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="name_nha_thau_test">Tên nhà thầu:</label>
                                        {{-- <div class="btn-actions-pane-right">
                                            <div class="input-group w-50">
                                                <select required id="name_nha_thau" class="form-control">
                                                    <option value="">--Tên nhà thầu--</option>
                                                    @foreach ($contractors as $contractor)
                                                    <option value="{{ $contractor->name }}">{{ $contractor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <input type="text" class="form-control" id="name_nha_thau_test" value="{{ $temp != [] ? $temp->name_nha_thau : '' }}" name="name_nha_thau">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="date_thuc_hien_test">Thời gian thực hiện tất cả các công việc theo yêu cầu
                                            của
                                            gói thầu:</label>
                                        <input type="text" class="form-control" id="date_thuc_hien_test" value="{{ $temp != [] ? $temp->time_thuc_hien : '' }}" name="date_thuc_hien">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-3">
                                        <label for="time_test">Có hiệu lực trong thời gian:</label>
                                        <input type="text" class="form-control" value="{{ $temp != [] ? $temp->time_hieu_luc : '' }}" id="time_test" name="time">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="d_test">Kể từ ngày:</label>
                                        <input type="date" value="{{ $temp != [] ? $temp->date_start : '' }}" class="form-control" id="d_test" name="d">
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="ten_chuc_danh_test">Ghi tên, chức danh:</label>
                                        {{-- <input type="text" class="form-control" id="ten_chuc_danh_test"
                                            name="ten_chuc_danh"> --}}
                                        <textarea name="ten_chuc_danh"  class="form-control" id="ten_chuc_danh_test" cols="90"
                                            rows="5">{{ $temp != [] ? $temp->ten_chuc_danh : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_goi_thau_1_test">Tên gói thầu:</label>
                                <input type="text" class="form-control" id="name_goi_thau1_test" name="name_goi_thau1">
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-outline-primary">Export Word</button>

                            </div>
                            <div class="form-group col-md-2 text-right">
                                {{-- <button type="submit" class="btn btn-primary">Export Word</button> --}}
                                <a href="javascript:void(0)" id="save" class="btn btn-outline-primary">Lưu</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div>
                <p class="SectionVHeading2"
                    style="margin-bottom:8px; text-indent:28.35pt; text-align:center; margin-top:8px"><span
                        style="font-size:14pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="font-weight:bold"><span lang="ES-TRAD" style="line-height:110%">ĐƠN DỰ THẦU
                                        </span></span></span></span></span></p>

                <p align="center" style="margin-top:8px; margin-bottom:8px; text-align:center"><span
                        style="font-size:12pt"><span style="line-height:110%"><span style="tab-stops:right 6.25in"><span
                                    style="font-family:&quot;Times New Roman&quot;,serif"><b><span lang="IT"
                                            style="font-size:14.0pt"><span style="line-height:110%">(thuộc
                                                HSĐXKT)</span></span></b></span></span></span></span></p>

                <p style="margin-top:8px; margin-bottom:8px; text-align:justify">&nbsp;</p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span style="tab-stops:right 6.25in"><span
                                    style="font-family:&quot;Times New Roman&quot;,serif"><span lang="IT"
                                        style="font-size:14.0pt"><span style="line-height:110%">Ng&agrave;y:&nbsp; <span
                                                id="date1">[ghi ngày tháng năm ký đơn dự
                                                thầu]</span></span></span></span></span></span>
                </p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span style="tab-stops:right 6.25in"><span
                                    style="font-family:&quot;Times New Roman&quot;,serif"><span lang="IT"
                                        style="font-size:14.0pt"><span style="line-height:110%">T&ecirc;n g&oacute;i
                                            thầu:&nbsp; <span id="name_goi_thau1">[ghi tên gói thầu theo thông báo mời
                                                thầu]</span></span></span></span></span></span></span>
                </p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span style="tab-stops:right 6.25in"><span
                                    style="font-family:&quot;Times New Roman&quot;,serif"><span lang="IT"
                                        style="font-size:14.0pt"><span style="line-height:110%">T&ecirc;n dự
                                            &aacute;n:&nbsp; <span id="name_du_an1">[ghi tên dự
                                                án]</span></span></span></span></span></span></span></p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span style="tab-stops:right 6.25in"><span
                                    style="font-family:&quot;Times New Roman&quot;,serif"><span lang="IT"
                                        style="font-size:14.0pt"><span style="line-height:110%">Thư mời thầu
                                            số:&nbsp; <span id="so_trich_yeu1">___[số trích yếu của Thư mời thầu đối với
                                                đấu thầu hạn chế]</span></span></span></span></span></span></span></p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span lang="IT"
                                    style="font-size:14.0pt"><span style="line-height:110%">K&iacute;nh
                                        gửi:&nbsp; <span style="font-size: 14pt;" id="name_moi_thau1">[ghi đầy đủ và
                                            chính xác tên của Bên mời thầu]</span></span></span></span></span></span>
                </p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="line-height: 110%;"><span style="font-family: &quot;Times New Roman&quot;, serif;"><span
                                lang="IT" style=""><span style="line-height: 110%;"><span style="font-size: 14pt;">Sau
                                        khi nghi&ecirc;n cứu hồ sơ mời thầu v&agrave; văn bản sửa đổi hồ sơ mời thầu
                                        <span id="so_sua_doi1">số ___[ghi số của văn bản sửa đổi (nếu có)]</span></span><i
                                        style="font-size: 14pt;"></i><span style="font-size: 14pt;"> m&agrave;
                                        ch&uacute;ng t&ocirc;i đ&atilde; nhận được,
                                        ch&uacute;ng t&ocirc;i,&nbsp;</span><i style="font-size: 14pt;"></i><span
                                        id="name_nha_thau1" style="font-size: 14pt;">____[ghi tên nhà thầu]</span><span
                                        style="font-size: 14pt;">, cam kết thực hiện
                                        g&oacute;i thầu&nbsp;<span style="font-size: 14pt;"
                                            class="name_goi_thau11">____[ghi tên gói thầu]</span>&nbsp;theo
                                        đ&uacute;ng y&ecirc;u cầu của hồ sơ mời thầu với thời gian thực hiện hợp đồng
                                        l&agrave;</span><span style="font-size: 15.5556px;">&nbsp;</span><span
                                        style="font-size: 14pt;" id="date_thuc_hien1">___[ghi thời gian thực hiện tất cả
                                        các công việc theo yêu cầu của gói thầu]</span>.
                                    <span style="font-size: 14pt;">Hồ sơ dự thầu của
                                        ch&uacute;ng t&ocirc;i gồm c&oacute; hồ sơ đề xuất về kỹ thuật n&agrave;y
                                        v&agrave; hồ sơ đề xuất về t&agrave;i ch&iacute;nh được ni&ecirc;m phong
                                        ri&ecirc;ng biệt.</span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">Ch&uacute;ng t&ocirc;i cam
                                            kết:</span></span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">1. Chỉ tham gia trong một hồ sơ dự thầu n&agrave;y
                                            với tư c&aacute;ch l&agrave; nh&agrave; thầu
                                            ch&iacute;nh.</span></span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">2. Kh&ocirc;ng đang trong qu&aacute; tr&igrave;nh
                                            giải thể; kh&ocirc;ng bị kết luận đang l&acirc;m v&agrave;o t&igrave;nh
                                            trạng ph&aacute; sản hoặc nợ kh&ocirc;ng c&oacute; khả năng chi trả theo quy
                                            định của ph&aacute;p luật.</span></span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">3. Kh&ocirc;ng vi phạm quy định về bảo đảm cạnh
                                            tranh trong đấu thầu.</span></span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span style="font-size:14.0pt"><span
                                            style="line-height:110%">4. K</span></span><span lang="X-NONE"
                                        style="font-size:14.0pt"><span style="line-height:110%">h&ocirc;ng thực hiện
                                            c&aacute;c h&agrave;nh vi tham nhũng, hối lộ, th&ocirc;ng
                                            thầu</span></span><span style="font-size:14.0pt"><span
                                            style="line-height:110%">, cản trở v&agrave; c&aacute;c h&agrave;nh vi vi
                                            phạm quy định kh&aacute;c của ph&aacute;p luật đấu thầu</span></span><span
                                        lang="X-NONE" style="font-size:14.0pt"><span style="line-height:110%"> khi tham
                                            dự g&oacute;i thầu n&agrave;y</span></span><span
                                        style="font-size:14.0pt"><span
                                            style="line-height:110%">.</span></span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span style="font-size:14.0pt"><span
                                            style="line-height:110%">5</span></span><span lang="X-NONE"
                                        style="font-size:14.0pt"><span style="line-height:110%">. Những th&ocirc;ng tin
                                            k&ecirc; khai trong hồ sơ dự thầu l&agrave; trung thực.
                                        </span></span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">Nếu hồ sơ dự thầu của ch&uacute;ng t&ocirc;i được
                                            chấp nhận, ch&uacute;ng t&ocirc;i sẽ thực hiện biện ph&aacute;p bảo đảm thực
                                            hiện hợp đồng theo quy định tại Mục </span></span><span
                                        style="font-size:14.0pt"><span style="line-height:110%">43 </span></span><span
                                        lang="X-NONE" style="font-size:14.0pt"><span style="line-height:110%">&ndash;
                                            Chỉ dẫn nh&agrave; thầu </span></span><span style="font-size:14.0pt"><span
                                            style="line-height:110%">của</span></span><span lang="X-NONE"
                                        style="font-size:14.0pt"><span style="line-height:110%"> hồ sơ mời
                                            thầu.</span></span></span></span></span></span></p>

                <p class="MsoBodyText"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">Hồ sơ </span></span><span
                                        style="font-size:14.0pt"><span style="line-height:110%">đề xuất về kỹ thuật
                                        </span></span><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">n&agrave;y</span></span><span
                                        style="font-size:14.0pt"><span style="line-height:110%"> c&ugrave;ng với
                                            hồ</span></span> <span style="font-size:14.0pt"><span
                                            style="line-height:110%">sơ đề xuất về t&agrave;i ch&iacute;nh
                                        </span></span><span lang="X-NONE" style="font-size:14.0pt"><span
                                            style="line-height:110%">c&oacute; hiệu lực trong thời gian <span
                                                id="time1">___</span>
                                            <sup></span></span></sup><span lang="X-NONE"
                                        style="font-size:14.0pt"><span style="line-height:110%">ng&agrave;y, kể từ
                                            ng&agrave;y <span id="d1">___</span> th&aacute;ng <span id="m1">___</span>
                                            năm
                                            <span id="y1">___</span></span></span><i><span lang="X-NONE"
                                            style="font-size:14.0pt"><span
                                                style="line-height:110%">.</span></span></i></span></span></span></span>
                </p>

                <p align="right" class="MsoBodyText"
                    style="margin-top:8px; margin-right:-5px; margin-bottom:8px; text-align:right"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span
                                    style="letter-spacing:-0.2pt"><b><span lang="X-NONE" style="font-size:14.0pt"><span
                                                style="line-height:110%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                Đại diện hợp ph&aacute;p của nh&agrave; thầu</span></span></b><b>
                                    </b><sup><span lang="X-NONE" style="font-size:14.0pt"><span
                                                style="line-height:110%">(</span></span></sup><sup><span
                                            style="font-size:14.0pt"><span
                                                style="line-height:110%">5</span></span></sup><sup><span lang="X-NONE"
                                            style="font-size:14.0pt"><span
                                                style="line-height:110%">)</span></span></sup></span></span></span></span>
                </p>

                <h1 style="text-align: right;"><i><span style="font-size:14.0pt"><span
                                style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span id="ten_chuc_danh1">[ghi t&ecirc;n, chức danh, k&yacute; t&ecirc;n v&agrave;
                                    đ&oacute;ng dấu
                                    <sup>(6)</sup>]</span></span></span></i></h1>

            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create1.js"></script>
@endsection
