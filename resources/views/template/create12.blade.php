@extends('layout.master')
@section('title','BẢNG ĐỀ XUẤT NHÂN SỰ CHỦ CHỐT')
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
                    BẢNG ĐỀ XUẤT NHÂN SỰ CHỦ CHỐT
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="./template/12" method="post">
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
                                    data-url="./template/12/save">
                                <div class="row">

                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <textarea name="table_content"
                                            class="{{ $detail->enabled == 0 || Auth::user()->level == 2 ? 'disabled' : '' }}" id="table_content">

                                            @if ($temp == []  || $temp->table_content == '')
                                            <table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border: 1pt solid #000;" width="600">
                                                <tbody>
                                                <tr style="height: 47.5938px;">
                                                <td style="width: 37.3pt; border: 1pt solid rgb(0, 0, 0); background: rgb(226, 239, 217); padding: 0in 5.4pt; height: 47.5938px;" width="50">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">STT</span></strong></p>
                                                </td>
                                                <td style="width: 219.55pt; border-width: 1pt; border-style: solid solid solid none; border-image: initial; background: rgb(226, 239, 217); padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="293">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">Họ v&agrave; T&ecirc;n</span></strong></p>
                                                </td>
                                                <td style="width: 207pt; border-width: 1pt; border-style: solid solid solid none; border-image: initial; background: rgb(226, 239, 217); padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="276">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="mso-bidi-font-size: 12.0pt;">Vị tr&iacute; c&ocirc;ng việc</span></strong></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 67.1875px;">
                                                <td style="width: 37.3pt; border-width: 1pt; border-style: none solid solid; border-image: initial; padding: 0in 5.4pt; height: 67.1875px; border-color: rgb(0, 0, 0);" width="50">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 12.0pt;">1</span></p>
                                                </td>
                                                <td style="width: 219.55pt; border-width: 1pt; border-style: none solid solid none; padding: 0in 5.4pt; height: 67.1875px; border-color: rgb(0, 0, 0);" width="293">
                                                <p class="MsoNormal"><em style="mso-bidi-font-style: normal;"><span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span style="mso-spacerun: yes;">&nbsp;</span></span></em><span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">[</span><span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span class="Table"><span style="mso-ansi-font-size: 12.0pt; font-family: 'Times New Roman',serif; letter-spacing: -.1pt; mso-bidi-font-weight: bold;">ghi t&ecirc;n nh&acirc;n sự chủ chốt]</span></span></span></p>
                                                </td>
                                                <td style="width: 207pt; border-width: 1pt; border-style: none solid solid none; padding: 0in 5.4pt; height: 67.1875px; border-color: rgb(0, 0, 0);" width="276">
                                                <p class="MsoNormal"><span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">[ghi cụ thể vị tr&iacute; c&ocirc;ng việc đảm nhận trong g&oacute;i thầu] </span></p>
                                                </td>
                                                </tr>
                                                <tr style="height: 47.5938px;">
                                                <td style="width: 37.3pt; border-width: 1pt; border-style: none solid solid; border-image: initial; padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="50">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 12.0pt;">2</span></p>
                                                </td>
                                                <td style="width: 219.55pt; border-width: 1pt; border-style: none solid solid none; padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="293">&nbsp;</td>
                                                <td style="width: 207pt; border-width: 1pt; border-style: none solid solid none; padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="276">&nbsp;</td>
                                                </tr>
                                                <tr style="height: 47.5938px;">
                                                <td style="width: 37.3pt; border-width: 1pt; border-style: none solid solid; border-image: initial; padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="50">
                                                <p class="MsoNormal" style="text-align: center;" align="center"><span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">&hellip;</span></p>
                                                </td>
                                                <td style="width: 219.55pt; border-width: 1pt; border-style: none solid solid none; padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="293">
                                                <p class="MsoNormal"><em style="mso-bidi-font-style: normal;"><span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">&nbsp;</span></em></p>
                                                </td>
                                                <td style="width: 207pt; border-width: 1pt; border-style: none solid solid none; padding: 0in 5.4pt; height: 47.5938px; border-color: rgb(0, 0, 0);" width="276">
                                                <p class="MsoNormal"><em><span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">&nbsp;</span></em></p>
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
                                @if ($detail->enabled != 0 && Auth::user()->level != 2)
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
                    <strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-size: 12.0pt;">BẢNG ĐỀ XUẤT
                            NHÂN SỰ CHỦ CHỐT</span></strong>
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
