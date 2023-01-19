@extends('layout.master')
@section('title','BẢNG TỔNG HỢP GIÁ DỰ THẦU')
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
                    BẢNG TỔNG HỢP GIÁ DỰ THẦU
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/17" method="post">
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
                                    data-url="./template/17/save">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border-width: 1pt; border-color: #000000;" border="1">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">
                                                <td style="width: 36.55pt; border: 1pt solid rgb(0, 0, 0); padding: 0in;" width="49">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">STT</span></strong></p>
                                                </td>
                                                <td style="width: 296.95pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="396">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Nội dung</span></strong></p>
                                                </td>
                                                <td style="width: 109.3pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="146">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; dự thầu</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1;">
                                                <td style="width: 36.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="49">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">1</span></p>
                                                </td>
                                                <td style="width: 296.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="396">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; ch&agrave;o cho h&agrave;ng h&oacute;a </span></p>
                                                </td>
                                                <td style="width: 109.3pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="146">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 2;">
                                                <td style="width: 36.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="49">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">2</span></p>
                                                </td>
                                                <td style="width: 296.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="396">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">Dịch vụ li&ecirc;n quan</span></p>
                                                </td>
                                                <td style="width: 109.3pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="146">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 3; mso-yfti-lastrow: yes;">
                                                <td style="width: 36.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="49">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 296.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="396">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Tổng cộng gi&aacute; dự thầu</span></strong></p>
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><em style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">(Kết chuyển sang đơn dự thầu)</span></em></p>
                                                </td>
                                                <td style="width: 109.3pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="146">
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
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center">
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢNG TỔNG
                            HỢP GIÁ DỰ THẦU</span></strong>
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
