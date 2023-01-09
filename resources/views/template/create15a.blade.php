@extends('layout.master')
@section('title','PHẠM VI CÔNG VIỆC SỬ DỤNG NHÀ THẦU PHỤ')
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
                    PHẠM VI CÔNG VIỆC SỬ DỤNG NHÀ THẦU PHỤ
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/151" method="post">
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
                                    data-url="./template/151/save">
                                <div class="row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border-width: 1pt; border-color: #000000;" border="1">
                                                <tbody>
                                                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">
                                                <td style="width: 42.55pt; border: 1pt solid rgb(0, 0, 0); padding: 0in;" width="57">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">STT</span></strong></p>
                                                </td>
                                                <td style="width: 85.4pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="114">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">T&ecirc;n nh&agrave; thầu phụ</span></strong></p>
                                                </td>
                                                <td style="width: 70.5pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="94">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Phạm vi c&ocirc;ng việc</span></strong></p>
                                                </td>
                                                <td style="width: 78pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="104">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Khối lượng c&ocirc;ng việc</span></strong></p>
                                                </td>
                                                <td style="width: 77.95pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="104">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Gi&aacute; trị % ước t&iacute;nh</span></strong></p>
                                                </td>
                                                <td style="width: 134.65pt; border-width: 1pt; border-style: solid solid solid none; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" width="180">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">Hợp đồng hoặc văn bản thỏa thuận với nh&agrave; thầu phụ</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 1;">
                                                <td style="width: 42.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="57">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">1</span></p>
                                                </td>
                                                <td style="width: 85.4pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="114">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 70.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="94">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 78pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 77.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 134.65pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="180">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 2;">
                                                <td style="width: 42.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="57">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">2</span></p>
                                                </td>
                                                <td style="width: 85.4pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="114">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 70.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="94">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 78pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 77.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 134.65pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="180">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 3;">
                                                <td style="width: 42.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="57">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">3</span></p>
                                                </td>
                                                <td style="width: 85.4pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="114">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 70.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="94">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 78pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 77.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 134.65pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="180">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 4;">
                                                <td style="width: 42.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="57">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">4</span></p>
                                                </td>
                                                <td style="width: 85.4pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="114">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 70.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="94">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 78pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 77.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 134.65pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="180">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                </tr>
                                                <tr style="mso-yfti-irow: 5; mso-yfti-lastrow: yes;">
                                                <td style="width: 42.55pt; border-width: 1pt; border-style: none solid solid; border-color: rgb(0, 0, 0); border-image: initial; padding: 0in;" valign="top" width="57">
                                                <p class="MsoNormal" style="text-align: center; margin: 6.0pt 2.15pt .0001pt 0in;" align="center"><span style="mso-bidi-font-size: 12.0pt;">&hellip;</span></p>
                                                </td>
                                                <td style="width: 85.4pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="114">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 70.5pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="94">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 78pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 77.95pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="104">
                                                <p class="MsoNormal" style="text-align: left; margin: 6.0pt 2.15pt .0001pt 0in;" align="left"><span style="mso-bidi-font-size: 12.0pt;">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 134.65pt; border-width: 1pt; border-style: none solid solid none; border-color: rgb(0, 0, 0); padding: 0in;" valign="top" width="180">
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
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">PHẠM VI CÔNG VIỆC SỬ DỤNG NHÀ THẦU PHỤ</span></strong>
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
