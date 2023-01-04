@extends('layout.master')
@section('title','BẢN LÝ LỊCH CHUYÊN MÔN CỦA NHÂN SỰ CHỦ CHỐT')
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
                    BẢN LÝ LỊCH CHUYÊN MÔN CỦA NHÂN SỰ CHỦ CHỐT
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/13" method="post">
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
                                    data-url="./template/13/save">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border: 1pt solid #000000;" border="1">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 49.5pt;">
                                                <td style="width: 46.331%; border: 1pt solid rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 49.5pt;" colspan="6" width="456">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">Th&ocirc;ng tin nh&acirc;n sự</span></strong></p>
                                                </td>
                                                <td style="width: 0.639386%; border-width: 1pt; border-style: solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 49.5pt;" valign="top" width="76">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></strong></p>
                                                </td>
                                                <td style="width: 52.998%; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 49.5pt;" colspan="6" nowrap="nowrap" width="457">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">C&ocirc;ng việc hiện tại</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1; height: 46.5pt;">
                                                <td style="width: 3.58357%; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="40">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">Stt</span></strong></p>
                                                </td>
                                                <td style="width: 6.78319%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n</span></strong></p>
                                                </td>
                                                <td style="width: 6.33524%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="84">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">Căn cước c&ocirc;ng d&acirc;n/Hộ chiếu</span></strong></p>
                                                </td>
                                                <td style="width: 5.63132%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="68">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">Vị tr&iacute;</span></strong></p>
                                                </td>
                                                <td style="width: 6.59121%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="82">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span class="Table"><strong style="mso-bidi-font-weight: normal;"><span style="mso-ansi-font-size: 12.0pt; mso-bidi-font-size: 12.0pt; font-family: 'Times New Roman',serif; letter-spacing: -.1pt;">Ng&agrave;y, th&aacute;ng, năm sinh</span></strong></span></p>
                                                </td>
                                                <td style="width: 17.4064%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="78">
                                                <p class="MsoNormal" style="text-align: center; line-height: 110%; mso-pagination: none; margin: 6.0pt 0in 6.0pt 0in;" align="center"><span class="Table"><strong style="mso-bidi-font-weight: normal;"><span style="mso-ansi-font-size: 12.0pt; mso-bidi-font-size: 12.0pt; line-height: 110%; font-family: 'Times New Roman',serif; letter-spacing: -.1pt;">Chứng chỉ/Tr&igrave;nh độ chuy&ecirc;n m&ocirc;n</span></strong></span></p>
                                                </td>
                                                <td style="width: 13.3222%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" colspan="2" width="84">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n người sử dụng lao động</span></strong></p>
                                                </td>
                                                <td style="width: 9.21489%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="105">
                                                <p class="MsoNormal" style="text-align: center; line-height: 110%; mso-pagination: none; margin: 6.0pt 0in 6.0pt 0in;" align="center"><span class="Table"><strong style="mso-bidi-font-weight: normal;"><span style="mso-ansi-font-size: 12.0pt; mso-bidi-font-size: 12.0pt; line-height: 110%; font-family: 'Times New Roman',serif; letter-spacing: -.1pt;">Địa chỉ của người sử dụng lao động</span></strong></span></p>
                                                </td>
                                                <td style="width: 9.72683%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="60">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">Chức danh</span></strong></p>
                                                </td>
                                                <td style="width: 7.16714%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="109">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span class="Table"><strong style="mso-bidi-font-weight: normal;"><span style="mso-ansi-font-size: 12.0pt; mso-bidi-font-size: 12.0pt; font-family: 'Times New Roman',serif; letter-spacing: -.1pt;">Số năm l&agrave;m việc cho người sử dụng lao động hiện tại</span></strong></span></p>
                                                </td>
                                                <td style="width: 7.93505%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span class="Table"><strong style="mso-bidi-font-weight: normal;"><span style="mso-ansi-font-size: 12.0pt; mso-bidi-font-size: 12.0pt; font-family: 'Times New Roman',serif; letter-spacing: -.1pt;">Người li&ecirc;n lạc (trưởng ph&ograve;ng / c&aacute;n bộ phụ tr&aacute;ch nh&acirc;n sự)</span></strong></span></p>
                                                </td>
                                                <td style="width: 6.27125%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); background: rgb(234, 241, 221); padding: 0in 5.4pt; height: 46.5pt;" width="72">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span class="Table"><strong style="mso-bidi-font-weight: normal;"><span style="mso-ansi-font-size: 12.0pt; mso-bidi-font-size: 12.0pt; font-family: 'Times New Roman',serif; letter-spacing: -.1pt;">Điện thoại/ Fax/ Email</span></strong></span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 2; height: 46.5pt;">
                                                <td style="width: 3.58357%; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in 5.4pt; height: 46.5pt;" width="40">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 12.0pt;">1</span></p>
                                                </td>
                                                <td style="width: 6.78319%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal">&nbsp;</p>
                                                </td>
                                                <td style="width: 6.33524%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="84">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 5.63132%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="68">&nbsp;</td>
                                                <td style="width: 6.59121%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="82">&nbsp;</td>
                                                <td style="width: 17.4064%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="78">&nbsp;</td>
                                                <td style="width: 13.3222%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" colspan="2" nowrap="nowrap" width="84">&nbsp;</td>
                                                <td style="width: 9.21489%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="105">&nbsp;</td>
                                                <td style="width: 9.72683%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="60">&nbsp;</td>
                                                <td style="width: 7.16714%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="109">&nbsp;</td>
                                                <td style="width: 7.93505%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 6.27125%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="72">&nbsp;</td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 3; height: 46.5pt;">
                                                <td style="width: 3.58357%; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in 5.4pt; height: 46.5pt;" width="40">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 12.0pt;">2</span></p>
                                                </td>
                                                <td style="width: 6.78319%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal">&nbsp;</p>
                                                </td>
                                                <td style="width: 6.33524%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="84">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 5.63132%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="68">&nbsp;</td>
                                                <td style="width: 6.59121%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="82">&nbsp;</td>
                                                <td style="width: 17.4064%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="78">&nbsp;</td>
                                                <td style="width: 13.3222%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" colspan="2" nowrap="nowrap" width="84">&nbsp;</td>
                                                <td style="width: 9.21489%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="105">&nbsp;</td>
                                                <td style="width: 9.72683%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="60">&nbsp;</td>
                                                <td style="width: 7.16714%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="109">&nbsp;</td>
                                                <td style="width: 7.93505%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 6.27125%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="72">&nbsp;</td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 4; height: 46.5pt;">
                                                <td style="width: 3.58357%; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in 5.4pt; height: 46.5pt;" width="40">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&hellip;</span></p>
                                                </td>
                                                <td style="width: 6.78319%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal">&nbsp;</p>
                                                </td>
                                                <td style="width: 6.33524%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="84">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 5.63132%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="68">&nbsp;</td>
                                                <td style="width: 6.59121%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="82">&nbsp;</td>
                                                <td style="width: 17.4064%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="78">&nbsp;</td>
                                                <td style="width: 13.3222%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" colspan="2" nowrap="nowrap" width="84">&nbsp;</td>
                                                <td style="width: 9.21489%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="105">&nbsp;</td>
                                                <td style="width: 9.72683%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="60">&nbsp;</td>
                                                <td style="width: 7.16714%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="109">&nbsp;</td>
                                                <td style="width: 7.93505%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 6.27125%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="72">&nbsp;</td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 5; mso-yfti-lastrow: yes; height: 46.5pt;">
                                                <td style="width: 3.58357%; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in 5.4pt; height: 46.5pt;" width="40">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 12.0pt;">n</span></p>
                                                </td>
                                                <td style="width: 6.78319%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal">&nbsp;</p>
                                                </td>
                                                <td style="width: 6.33524%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="84">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 5.63132%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="68">&nbsp;</td>
                                                <td style="width: 6.59121%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="82">&nbsp;</td>
                                                <td style="width: 17.4064%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="78">&nbsp;</td>
                                                <td style="width: 13.3222%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" colspan="2" nowrap="nowrap" width="84">&nbsp;</td>
                                                <td style="width: 9.21489%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="105">&nbsp;</td>
                                                <td style="width: 9.72683%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="60">&nbsp;</td>
                                                <td style="width: 7.16714%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="109">&nbsp;</td>
                                                <td style="width: 7.93505%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" width="104">
                                                <p class="MsoNormal" style="text-align: left;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 6.27125%; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in 5.4pt; height: 46.5pt;" nowrap="nowrap" width="72">&nbsp;</td>
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
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢN LÝ LỊCH
                            CHUYÊN MÔN CỦA NHÂN SỰ CHỦ CHỐT</span></strong>
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
