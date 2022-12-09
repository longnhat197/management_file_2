@extends('layout.master')
@section('title','Giấy uỷ quyền')
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
                    Giấy uỷ quyền
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/2" method="post">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active p-2" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="fas fa-clipboard p-2"></i>
                                    Tab 1
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Tab 2</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="fas fa-calendar-day p-2"></i>
                                    Tab 3
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="date">Ngày làm giấy:</label>
                                        <input type="date" value="{{ $temp != [] ? $temp->date : 0 }}" name="date" id="date" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="address_test">Nơi làm giấy uỷ quyền:</label>
                                        <input type="text" class="form-control" value="{{ $temp != [] ? $temp->noi_lam_giay : '' }}" id="address_test" name="address">
                                        <input type="hidden" value="{{ $detail_id }}"  id="detail_id" data-url="./template/2/save">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="thong_tin_dai_dien_test">Tên, số CMND hoặc số hộ chiếu, chức danh
                                            của người
                                            đại diện theo pháp
                                            luật của nhà thầu:</label>

                                        <textarea style="" name="thong_tin_dai_dien" class="form-control"
                                            id="thong_tin_dai_dien_test" cols="90" rows="5">{{ $temp != [] ? $temp->thong_tin_dai_dien : '' }}</textarea>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_nha_thau_test">Tên nhà thầu:</label>

                                        <input type="text" class="form-control" value="{{ $temp != [] ? $temp->name_nha_thau : '' }}" id="name_nha_thau_test"
                                            name="name_nha_thau">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="dia_chi_nha_thau">Địa chỉ nhà thầu:</label>
                                        <input type="text" class="form-control" value="{{ $temp != [] ? $temp->dia_chi_nha_thau : '' }}" id="dia_chi_nha_thau_test"
                                            name="dia_chi_nha_thau">
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="thong_tin_nguoi_duoc_uy_quyen_test">Tên, số CMND hoặc số hộ chiếu,
                                            chức
                                            danh
                                            của người được ủy quyền:</label>

                                        <textarea style="" name="thong_tin_nguoi_duoc_uy_quyen" class="form-control"
                                            id="thong_tin_nguoi_duoc_uy_quyen_test" cols="90" rows="5">{{ $temp != [] ? $temp->thong_tin_nguoi_duoc_uy_quyen : '' }}</textarea>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_goi_thau_test">Tên gói thầu:</label>
                                        <input type="text" class="form-control" value="{{ $detail->name_goi_thau }}" id="name_goi_thau_test"
                                            name="name_goi_thau">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_du_an_test">Tên dự án:</label>
                                        <input type="text" class="form-control" value="{{ $detail->name_du_an }}" id="name_du_an_test" name="name_du_an">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_moi_thau_test">Tên của Bên mời thầu:</label>

                                        <input type="text" class="form-control" value="{{ $detail->name_moi_thau }}" id="name_moi_thau_test"
                                            name="name_moi_thau">
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="content_test">Nội dung:</label>

                                        <textarea name="content" class="form-control tabSupport" id="content_test"
                                            cols="90" rows="5">
    - Ký đơn dự thầu thuộc hồ sơ đề xuất về kỹ thuật và đơn dự thầu thuộc hồ sơ đề xuất về tài chính;
    - Ký thỏa thuận liên danh (nếu có);
    - Ký các văn bản, tài liệu để giao dịch với Bên mời thầu trong quá trình tham gia đấu thầu, kể cả văn bản đề nghị làm rõ hồ sơ mời thầu và văn bản giải trình, làm rõ hồ sơ dự thầu hoặc văn bản đề nghị rút hồ sơ dự thầu, sửa đổi, thay thế hồ sơ đề xuất về kỹ thuật, hồ sơ đề xuất về tài chính;
    - Tham gia quá trình thương thảo, hoàn thiện hợp đồng;
    - Ký đơn kiến nghị trong trường hợp nhà thầu có kiến nghị;
    - Ký kết hợp đồng với Chủ đầu tư nếu được lựa chọn
                                    </textarea>
                                    </div>
                                </div> --}}
                                {{-- <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-5">
                                        <label for="name_nha_thau1_test">Tên nhà thầu:</label>
                                        <input type="text" class="form-control" id="name_nha_thau1_test"
                                            name="name_nha_thau1">
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_dai_dien_test">Tên người đại diện theo pháp luật của nhà
                                            thầu:</label>
                                        <input type="text" class="form-control" value="{{ $temp != [] ? $temp->name_dai_dien : '' }}" id="name_dai_dien_test"
                                            name="name_dai_dien">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_uy_quyen_test">Tên người được uỷ quyền:</label>
                                        <input type="text" class="form-control" value="{{ $temp != [] ? $temp->name_uy_quyen : '' }}" id="name_uy_quyen_test"
                                            name="name_uy_quyen">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-3">
                                        <label for="from_date_test">Kể từ ngày:</label>
                                        <input type="date" name="from_date" value="{{ $temp != [] ? $temp->from_date : 0 }}" id="from_date_test" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="to_date_test">Đến ngày:</label>
                                        <input type="date" name="to_date" value="{{ $temp != [] ? $temp->to_date : 0 }}" id="to_date_test" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-3">
                                        <label for="total_test">Tổng (bản):</label>
                                        <input type="text" name="total" value="{{ $temp != [] ? $temp->total : '' }}" class="form-control" id="total_test">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="uq_giu_test">Uỷ quyền giữ (bản):</label>
                                        <input type="text" name="uq_giu" value="{{ $temp != [] ? $temp->uq_giu : '' }}" class="form-control" id="uq_giu_test">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-3">
                                        <label for="duq_giu_test">Được uỷ quyền giữ (bản):</label>
                                        <input type="text" name="duq_giu" value="{{ $temp != [] ? $temp->duq_giu : '' }}" class="form-control" id="duq_giu_test">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="moi_thau_giu_test">Mời thầu giữ (bản):</label>
                                        <input type="text" name="moi_thau_giu" value="{{ $temp != [] ? $temp->moi_thau_giu : '' }}" class="form-control"
                                            id="moi_thau_giu_test">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-3">
                                        <label for="chu_ky_duq_test">Ghi tên, chức danh người được uỷ quyền:</label>
                                        <textarea name="chu_ky_duq" class="form-control" id="chu_ky_duq_test" cols="30"
                                            rows="3">{{ $temp != [] ? $temp->chu_ky_duq : '' }}</textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="chu_ky_uq_test">Ghi tên, chức danh người uỷ quyền:</label>
                                        <textarea name="chu_ky_uq" class="form-control" id="chu_ky_uq_test" cols="30"
                                            rows="3">{{ $temp != [] ? $temp->chu_ky_uq : '' }}</textarea>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-outline-primary">Export Word</button>
                                {{-- <a href="javascript:void(0)" class="btn btn-primary">Export word</a> --}}
                            </div>
                            <div class="form-group col-md-3 text-right">
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
                                    style="font-weight:bold"><span lang="ES-TRAD" style="line-height:110%">GIẤY ỦY QUYỀN
                                        (1)</span></span></span></span></span></p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif">&nbsp; </span></span></span></p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span lang="VI"
                                    style="font-size:14.0pt"><span style="line-height:110%">H&ocirc;m nay, ng&agrave;y
                                    </span></span><span lang="VI" style="font-size:14.0pt"><span
                                        style="line-height:110%"><span id="d">___</span> th&aacute;ng <span id="m">___</span> năm <span id="y">___</span>, tại
                                        <span id="address1">____</span></span></span></span></span></span></p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify">&nbsp;</p>

                <p style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span lang="VI"
                                    style="font-size:14.0pt"><span style="line-height:110%">T&ocirc;i l&agrave; <span
                                            id="thong_tin_dai_dien1">____[ghi tên, số CMND hoặc số hộ chiếu,
                                            chức danh của người đại diện theo pháp luật của nhà thầu]</span>, l&agrave;
                                        người đại diện theo ph&aacute;p
                                        luật của <span id="name_nha_thau1">[ghi t&ecirc;n nh&agrave; thầu]</span>
                                        c&oacute; địa chỉ tại <span id="dia_chi_nha_thau1">[ghi địa
                                            chỉ của nh&agrave; thầu]</span> bằng văn bản n&agrave;y ủy quyền cho <span
                                            id="thong_tin_nguoi_duoc_uy_quyen1">[ghi
                                            t&ecirc;n, số CMND hoặc số hộ chiếu, chức danh của người được ủy
                                            quyền]</span> thực hiện
                                        c&aacute;c c&ocirc;ng việc sau đ&acirc;y trong qu&aacute; tr&igrave;nh tham dự
                                        thầu g&oacute;i thầu <span id="name_goi_thau1">[ghi t&ecirc;n g&oacute;i
                                            thầu]</span> thuộc dự
                                        &aacute;n <span id="name_du_an1">[ghi t&ecirc;n dự &aacute;n]</span> do <span
                                            id="name_moi_thau1">[ghi t&ecirc;n B&ecirc;n mời
                                            thầu]</span> tổ chức:</span></span></span></span></span></p>

                <p style="text-align: justify; font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif">
                    <span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; _ Ký đơn dự
                        thầu thuộc hồ sơ đề xuất về kỹ thuật và đơn dự thầu thuộc hồ sơ đề xuất về tài chính. <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; _ Ký thỏa thuận liên danh (nếu có); <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;_ Ký các văn bản, tài liệu để giao dịch với Bên
                        mời thầu trong
                        quá trình tham gia đấu thầu, kể cả văn bản đề nghị làm rõ hồ sơ mời thầu và văn bản giải trình,
                        làm
                        rõ hồ sơ dự thầu hoặc văn bản đề nghị rút hồ sơ dự thầu, sửa đổi, thay thế hồ sơ đề xuất về kỹ
                        thuật, hồ sơ đề xuất về tài chính; <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;_ Tham gia quá trình thương thảo, hoàn thiện hợp đồng;
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;_ Ký đơn kiến nghị trong trường hợp nhà thầu có kiến
                        nghị; <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;_ Ký kết hợp đồng với Chủ đầu tư nếu được lựa
                        chọn</span>
                </p>


                <p class="MsoBodyTextIndent"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span lang="VI"
                                    style="font-size:14.0pt"><span style="line-height:110%">Người được ủy quyền
                                        n&ecirc;u tr&ecirc;n chỉ thực hiện c&aacute;c c&ocirc;ng việc trong phạm vi ủy
                                        quyền với tư c&aacute;ch l&agrave; đại diện hợp ph&aacute;p của <span
                                            id="name_nha_thau11">[ghi
                                            t&ecirc;n nh&agrave; thầu]</span>. <span id="name_dai_dien1">[ghi t&ecirc;n
                                            người đại diện theo ph&aacute;p
                                            luật của nh&agrave; thầu]</span> chịu tr&aacute;ch nhiệm ho&agrave;n
                                        to&agrave;n về
                                        những c&ocirc;ng việc do <span id="name_uy_quyen1">[ghi t&ecirc;n người được ủy
                                            quyền]</span> thực hiện trong
                                        phạm vi ủy quyền. </span></span></span></span></span></p>

                <p class="MsoBodyTextIndent"
                    style="margin-top:8px; margin-bottom:8px; text-indent:28.35pt; text-align:justify"><span
                        style="font-size:12pt"><span style="line-height:110%"><span
                                style="font-family:&quot;Times New Roman&quot;,serif"><span lang="VI"
                                    style="font-size:14.0pt"><span style="line-height:110%">Giấy ủy quyền c&oacute; hiệu
                                        lực kể từ ng&agrave;y <span id="from_date1">____</span> đến
                                        ng&agrave;y&nbsp;<span id="to_date1">____</span><sup>(3)</sup>. Giấy ủy
                                        quyền n&agrave;y được lập th&agrave;nh <span id="total1">____</span> bản
                                        c&oacute; gi&aacute; trị
                                        ph&aacute;p l&yacute; như nhau, người ủy quyền giữ <span
                                            id="uq_giu1">____</span> bản, người được ủy quyền
                                        giữ <span id="duq_giu1">____</span> bản, B&ecirc;n mời thầu giữ <span
                                            id="moi_thau_giu1">___</span> bản.</span></span></span></span></span>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <p align="center" style="text-align: center">
                            <span style="font-size: 14pt;font-family:&quot;Times New Roman&quot;,serif ">
                                <b>Người được uỷ quyền</b><br>
                                <span id="chu_ky_duq1">[ghi tên, chức danh, ký tên và đóng dấu<br>(nếu có)]</span>

                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p align="center" style="text-align: center">
                            <span style="font-size: 14pt;font-family:&quot;Times New Roman&quot;,serif ">
                                <b>Người uỷ quyền</b><br>
                                <span id="chu_ky_uq1">[ghi tên người đại diện theo pháp luật của nhà <br>thầu, chức
                                    danh, ký tên và đóng dấu]</span>

                            </span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create2.js"></script>
@endsection
