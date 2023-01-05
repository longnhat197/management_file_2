@extends('layout.master')
@section('title','BẢNG KINH NGHIỆM CHUYÊN MÔN')
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
                    BẢNG KINH NGHIỆM CHUYÊN MÔN
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/14" method="post">
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
                                    data-url="./template/14/save">
                                <div class="row">

                                    <div class="col-md-2"></div>
                                    <div class="form-group col-md-8">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border: 1pt solid #000000; color: #000000;" border="1">
                                                <tbody>
                                                <tr style="height: 119px;">
                                                <td style="width: 6.79841%; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-bottom: none; background: rgb(198, 239, 206); padding: 0in 5.4pt; height: 119px;" nowrap="nowrap" width="52">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="color: rgb(0, 0, 0);"><strong><span style="font-size: 13.0pt;">STT</span></strong></span></p>
                                                </td>
                                                <td style="width: 25.6829%; border-top: 1pt solid windowtext; border-left: none; border-bottom: none; border-right: 1pt solid windowtext; background: rgb(198, 239, 206); padding: 0in 5.4pt; height: 119px;" width="228">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="color: rgb(0, 0, 0);"><strong><span style="font-size: 13.0pt;">T&ecirc;n nh&acirc;n sự chủ chốt</span></strong></span></p>
                                                </td>
                                                <td style="width: 14.4601%; border-top: 1pt solid windowtext; border-left: none; border-bottom: none; border-right: 1pt solid windowtext; background: rgb(198, 239, 206); padding: 0in 5.4pt; height: 119px;" width="139">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="color: rgb(0, 0, 0);"><strong><span style="font-size: 13.0pt;">Từ ng&agrave;y</span></strong></span></p>
                                                </td>
                                                <td style="width: 14.3522%; border-top: 1pt solid windowtext; border-left: none; border-bottom: none; border-right: 1pt solid windowtext; background: rgb(198, 239, 206); padding: 0in 5.4pt; height: 119px;" width="139">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="color: rgb(0, 0, 0);"><strong><span style="font-size: 13.0pt;">Đến ng&agrave;y</span></strong></span></p>
                                                </td>
                                                <td style="width: 38.7401%; border-top: 1pt solid windowtext; border-left: none; border-bottom: none; border-right: 1pt solid windowtext; background: rgb(198, 239, 206); padding: 0in 5.4pt; height: 119px;" width="416">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="color: rgb(0, 0, 0);"><strong><span style="font-size: 13.0pt;">C&ocirc;ng ty/Dự &aacute;n/Chức vụ/ Kinh nghiệm chuy&ecirc;n m&ocirc;n v&agrave; quản l&yacute; c&oacute; li&ecirc;n quan </span></strong></span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 133.438px;">
                                                <td style="border: 1pt solid windowtext; padding: 0in 5.4pt; height: 237.938px; width: 6.79841%;" nowrap="nowrap" width="52">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 13pt; color: rgb(0, 0, 0);">1</span></p>
                                                </td>
                                                <td style="border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in 5.4pt; height: 237.938px; width: 25.6829%;" valign="bottom" nowrap="nowrap" width="228">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 13pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 0, 0);">[ghi t&ecirc;n nh&acirc;n sự chủ chốt 1]&nbsp;</span></p>
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 13pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="font-size: 13pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 0, 0);">&nbsp;</span></p>
                                                </td>
                                                <td style="width: 14.4601%; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in 5.4pt; height: 133.438px;" width="139">
                                                <p class="MsoNormal"><span style="color: rgb(0, 0, 0);"><em><span style="font-size: 13pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">&nbsp;&hellip;</span></em></span></p>
                                                </td>
                                                <td style="width: 14.3522%; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in 5.4pt; height: 133.438px;" width="139">
                                                <p class="MsoNormal"><span style="color: rgb(0, 0, 0);"><em><span style="font-size: 13pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">&nbsp;&hellip;</span></em></span></p>
                                                </td>
                                                <td style="width: 38.7401%; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; padding: 0in 5.4pt; height: 133.438px;" width="416">
                                                <p class="MsoNormal" style="line-height: 110%; mso-pagination: none; margin: 6.0pt 0in 6.0pt 0in;"><span style="color: rgb(0, 0, 0);"><em><span style="font-size: 13pt; line-height: 110%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">&nbsp;</span></em><span class="Table"><span style="font-size: 13pt; line-height: 110%; font-family: 'Times New Roman', serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">- C&ocirc;ng ty:</span></span></span></p>
                                                <p class="MsoNormal" style="line-height: 110%; mso-pagination: none; margin: 6.0pt 0in 6.0pt 0in;"><span class="Table" style="color: rgb(0, 0, 0);"><span style="font-size: 13pt; line-height: 110%; font-family: 'Times New Roman', serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">- Dự &aacute;n/Hợp đồng</span></span></p>
                                                <p class="MsoNormal" style="line-height: 110%; mso-pagination: none; margin: 6.0pt 0in 6.0pt 0in;"><span class="Table" style="color: rgb(0, 0, 0);"><span style="font-size: 13pt; line-height: 110%; font-family: 'Times New Roman', serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">- Chức vụ:</span></span></p>
                                                <p class="MsoNormal"><span class="Table" style="color: rgb(0, 0, 0);"><span style="font-size: 13pt; font-family: 'Times New Roman', serif; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">- Kinh nghiệm chuy&ecirc;n m&ocirc;n v&agrave; quản l&yacute; c&oacute; li&ecirc;n quan:</span></span></p>
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
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢNG KINH NGHIỆM CHUYÊN MÔN</span></strong>
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
