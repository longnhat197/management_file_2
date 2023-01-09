@extends('layout.master')
@section('title','BẢNG KÊ KHAI CÔNG TY CON, CÔNG TY THÀNH VIÊN')
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
                    BẢNG KÊ KHAI CÔNG TY CON, CÔNG TY THÀNH VIÊN
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/153" method="post">
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
                                    data-url="./template/153/save">
                                <div class="row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border: 1pt solid #000000;" border="1">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 72.3pt;">
                                                <td style="width: 38.3pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #E0E0E0; padding: 0in 5.4pt 0in 5.4pt; height: 72.3pt;" width="51">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">STT</span></strong></p>
                                                </td>
                                                <td style="width: 125.8pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #E0E0E0; padding: 0in 5.4pt 0in 5.4pt; height: 72.3pt;" width="168">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">T&ecirc;n c&ocirc;ng ty con, c&ocirc;ng ty th&agrave;nh vi&ecirc;n<sup>(2)</sup></span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #E0E0E0; padding: 0in 5.4pt 0in 5.4pt; height: 72.3pt;" width="154">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">C&ocirc;ng việc đảm nhận trong g&oacute;i thầu<sup>(3)</sup></span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #E0E0E0; padding: 0in 5.4pt 0in 5.4pt; height: 72.3pt;" width="154">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">Gi&aacute; trị % so với gi&aacute; dự thầu<sup>(4)</sup></span></strong></p>
                                                </td>
                                                <td style="width: 72.15pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #E0E0E0; padding: 0in 5.4pt 0in 5.4pt; height: 72.3pt;" width="96">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">Ghi ch&uacute;</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1; height: 28.5pt;">
                                                <td style="width: 38.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 28.5pt;" valign="top" width="51">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><span style="mso-bidi-font-size: 14.0pt;">1</span></p>
                                                </td>
                                                <td style="width: 125.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 28.5pt;" valign="top" width="168">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 28.5pt;" valign="top" width="154">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 28.5pt;" valign="top" width="154">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 72.15pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 28.5pt;" valign="top" width="96">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 2; height: 29.55pt;">
                                                <td style="width: 38.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="51">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><span style="mso-bidi-font-size: 14.0pt;">2</span></p>
                                                </td>
                                                <td style="width: 125.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="168">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="154">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="154">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 72.15pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="96">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 3; mso-yfti-lastrow: yes; height: 29.55pt;">
                                                <td style="width: 38.3pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="51">
                                                <p class="MsoNormal" style="text-align: center; line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;" align="center"><span style="mso-bidi-font-size: 14.0pt;">&hellip;</span></p>
                                                </td>
                                                <td style="width: 125.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="168">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="154">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 115.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="154">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 72.15pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; padding: 0in 5.4pt 0in 5.4pt; height: 29.55pt;" valign="top" width="96">
                                                <p class="MsoNormal" style="line-height: 21.0pt; mso-line-height-rule: exactly; mso-pagination: none; margin: 4.0pt 0in 4.0pt 0in;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 14.0pt;">&nbsp;</span></strong></p>
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
                            <div class="col-md-2"></div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-outline-primary">Export Word</button>
                            </div>
                            <div class="form-group col-md-4 text-right">
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
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢNG KÊ KHAI CÔNG TY CON, CÔNG TY THÀNH VIÊN</span></strong>
                </p>
                <p>&nbsp;</p>
                <span id="table_content_test"></span>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/create12.js"></script>
<script>

</script>
@endsection
