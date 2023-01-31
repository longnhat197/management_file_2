@extends('layout.master')
@section('title','BẢNG GIÁ DỰ THẦU CHO CÁC DỊCH VỤ LIÊN QUAN')
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
                    BẢNG GIÁ DỰ THẦU CHO CÁC DỊCH VỤ LIÊN QUAN
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/172" method="post">
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
                                    data-url="./template/172/save">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0  ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border-width: 1pt; border-color: rgb(0, 0, 0); height: 259.938px;" border="1">
                                                <tbody>
                                                <tr style="height: 27.5938px;">
                                                <td style="width: 33.75pt; border: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="45">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">1</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">2</span></p>
                                                </td>
                                                <td style="width: 49.65pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 27.5938px;" valign="top" width="66">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">3</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">4</span></p>
                                                </td>
                                                <td style="width: 65.1pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 27.5938px;" valign="top" width="87">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">5</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">6</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">7</span></p>
                                                </td>
                                                <td style="width: 89.1pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in; height: 27.5938px;" valign="top" width="119">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">8</span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 66.7812px;">
                                                <td style="width: 33.75pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 66.7812px;" width="45">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">STT</span></strong></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 66.7812px;" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">M&ocirc; tả dịch vụ</span></strong></p>
                                                </td>
                                                <td style="width: 49.65pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 66.7812px;" width="66">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Khối lượng mời thầu</span></strong></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 66.7812px;" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Đơn vị t&iacute;nh</span></strong></p>
                                                </td>
                                                <td style="width: 65.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 66.7812px;" width="87">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Địa điểm thực hiện dịch vụ</span></strong></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 66.7812px;" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Ng&agrave;y ho&agrave;n th&agrave;nh dịch vụ</span></strong></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 66.7812px;" width="76">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Đơn gi&aacute; dự thầu</span></strong></p>
                                                </td>
                                                <td style="width: 89.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 66.7812px;" width="119">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Th&agrave;nh tiền</span></strong></p>
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">(Cột 3x7)</span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 27.5938px;">
                                                <td style="width: 33.75pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 27.5938px;" valign="top" width="45">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 49.65pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 65.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="87">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 89.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="119">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 27.5938px;">
                                                <td style="width: 33.75pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 27.5938px;" valign="top" width="45">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 49.65pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 65.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="87">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 89.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="119">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 27.5938px;">
                                                <td style="width: 33.75pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 27.5938px;" valign="top" width="45">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 49.65pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 65.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="87">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 89.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="119">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 27.5938px;">
                                                <td style="width: 33.75pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 27.5938px;" valign="top" width="45">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 49.65pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="66">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 65.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="87">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 56.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 89.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 27.5938px;" valign="top" width="119">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 55.1875px;">
                                                <td style="width: 375.3pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in; height: 55.1875px;" colspan="7" valign="top" width="500">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Tổng gi&aacute; dự thầu cho c&aacute;c dịch vụ li&ecirc;n quan đ&atilde; bao gồm thuế, ph&iacute;, lệ ph&iacute; (nếu c&oacute;)</span></strong></p>
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><em style="mso-bidi-font-style: normal;"><span style="mso-bidi-font-size: 12.0pt;">(Kết chuyển sang bảng tổng hợp gi&aacute; dự thầu)</span></em></p>
                                                </td>
                                                <td style="width: 89.1pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in; height: 55.1875px;" valign="top" width="119">
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
                                        <textarea name="name_chuc_danh" {{ $detail->enabled == '0'  ? 'disabled' : '' }} class="form-control" id="name_chuc_danh_test" cols="90"
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
                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center">
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢNG GIÁ DỰ THẦU CHO CÁC DỊCH VỤ LIÊN QUAN</span></strong>
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
