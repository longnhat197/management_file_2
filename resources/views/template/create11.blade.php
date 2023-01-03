@extends('layout.master')
@section('title','NGUỒN LỰC TÀI CHÍNH HÀNG THÁNG CHO CÁC HỢP ĐỒNG ĐANG THỰC HIỆN')
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
                    NGUỒN LỰC TÀI CHÍNH HÀNG THÁNG CHO CÁC HỢP ĐỒNG ĐANG THỰC HIỆN
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/11" method="post">
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
                                    data-url="./template/11/save">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 600px; border: 1pt solid #000000;" border="1" width="600">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; page-break-inside: avoid;">
                                                <td style="width: 39.05pt; border: 1pt solid rgb(0, 0, 0); padding: 0in;" width="52">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">STT</span></strong></p>
                                                </td>
                                                <td style="width: 49.6pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="66">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n hợp đồng</span></strong></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="113">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Người li&ecirc;n hệ của Chủ đầu tư (địa chỉ, điện thoại, fax)</span></strong></p>
                                                </td>
                                                <td style="width: 1in; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="96">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Ng&agrave;y ho&agrave;n th&agrave;nh hợp đồng</span></strong></p>
                                                </td>
                                                <td style="width: 67.5pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="90">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Thời hạn c&ograve;n lại của hợp đồng t&iacute;nh bằng th&aacute;ng (A)</span></strong></p>
                                                </td>
                                                <td style="width: 73.15pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="98">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; trị hợp đồng chưa thanh to&aacute;n, bao gồm cả thuế (B)</span></strong></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="113">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Y&ecirc;u cầu về nguồn lực t&agrave;i ch&iacute;nh h&agrave;ng th&aacute;ng (B/A)</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1; page-break-inside: avoid;">
                                                <td style="width: 39.05pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="52">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">1</span></p>
                                                </td>
                                                <td style="width: 49.6pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 1in; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="96">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 67.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="90">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 73.15pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="98">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 2; page-break-inside: avoid;">
                                                <td style="width: 39.05pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="52">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">2</span></p>
                                                </td>
                                                <td style="width: 49.6pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 1in; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="96">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 67.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="90">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 73.15pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="98">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 3; page-break-inside: avoid;">
                                                <td style="width: 39.05pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="52">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">3</span></p>
                                                </td>
                                                <td style="width: 49.6pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 1in; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="96">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 67.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="90">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 73.15pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="98">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 4; page-break-inside: avoid;">
                                                <td style="width: 39.05pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="52">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&hellip;</span></p>
                                                </td>
                                                <td style="width: 49.6pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 1in; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="96">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 67.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="90">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 73.15pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="98">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 5; mso-yfti-lastrow: yes; page-break-inside: avoid;">
                                                <td style="width: 386.35pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" colspan="6" width="515">
                                                <p class="MsoNormal" style="margin: 6.0pt 2.15pt .0001pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Tổng y&ecirc;u cầu về nguồn lực t&agrave;i ch&iacute;nh h&agrave;ng th&aacute;ng cho c&aacute;c hợp đồng đang thực hiện (ĐTH).</span></strong></p>
                                                </td>
                                                <td style="width: 85.05pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" width="113">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
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
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">NGUỒN LỰC TÀI CHÍNH HÀNG THÁNG CHO CÁC HỢP ĐỒNG ĐANG THỰC HIỆN</span></strong></p>
                <p>&nbsp;</p>
                <span id="table_content_test"></span>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create11.js"></script>
<script>

</script>
@endsection
