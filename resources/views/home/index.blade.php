@extends('layout.master')
@section('title','Thông tin chung')
@section('my_style')
<link rel="stylesheet" href="./dashboard/assets/css/create2.css">
@endsection
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
                    Bản kê khai thông tin về nhà thầu
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form onsubmit="return checkform();" action="./home/add" method="post">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true">Thông tin gói thầu</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Hình thức</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Thời gian</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="nguoi_thuc_hien">Người thực hiện:</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                            id="nguoi_thuc_hien" disabled>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_goi_thau">Tên gói thầu:</label>
                                        <input type="text" class="form-control" id="name_goi_thau" name="name_goi_thau"
                                            value="{{ old('name_goi_thau') }}">
                                        @if ($errors->has('name_goi_thau'))
                                        <span class="text-danger">{{ $errors->first('name_goi_thau') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_du_an">Tên dự án:</label>
                                        <input type="text" class="form-control" value="{{ old('name_du_an') }}"
                                            id="name_du_an" name="name_du_an">
                                        @if ($errors->has('name_du_an'))
                                        <span class="text-danger">{{ $errors->first('name_du_an') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="customer">Chủ đầu tư:</label>
                                        <div class="btn-actions-pane-right">
                                            <div class="input-group ">
                                                <select value="{{ old('customer') }}" id="customer" name="customer"
                                                    class="form-control">
                                                    <option value="">--Tên chủ đầu tư--</option>
                                                    @foreach ($customers as $customer)
                                                    <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="so_tbmt">Số thông báo mời thầu:</label>
                                        <input type="text" class="form-control" value="{{ old('so_tbmt') }}"
                                            id="so_tbmt" name="so_tbmt">
                                        @if ($errors->has('so_tbmt'))
                                        <span class="text-danger">{{ $errors->first('so_tbmt') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_moi_thau">Bên mời thầu:</label>
                                        <input type="text" class="form-control" value="{{ old('name_moi_thau') }}"
                                            id="name_moi_thau" name="name_moi_thau">
                                        @if ($errors->has('name_moi_thau'))
                                        <span class="text-danger">{{ $errors->first('name_moi_thau') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" class="form-control" value="{{ old('address') }}"
                                            id="address" name="address">
                                        @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label><strong>Hình thức thầu:</strong></label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hinh_thuc_thau"
                                                    id="hinh_thuc_thau1" checked value="0">
                                                <label class="form-check-label" for="hinh_thuc_thau1">HSDT</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hinh_thuc_thau"
                                                    id="hinh_thuc_thau2" value="1">
                                                <label class="form-check-label" for="hinh_thuc_thau2">E-HSDT</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label><strong>Hình thức tham dự:</strong></label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hinh_thuc_tham_du"
                                                    id="hinh_thuc_tham_du1" checked value="0">
                                                <label class="form-check-label" for="hinh_thuc_tham_du1">Độc lập</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hinh_thuc_tham_du"
                                                    id="hinh_thuc_tham_du2" value="1">
                                                <label class="form-check-label" for="hinh_thuc_tham_du2">Liên
                                                    danh</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label><strong>Nhà thầu có uỷ quyền:</strong></label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="uy_quyen"
                                                    id="uy_quyen1" checked value="1">
                                                <label class="form-check-label" for="uy_quyen1">Có</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="uy_quyen"
                                                    id="uy_quyen2" value="0">
                                                <label class="form-check-label" for="uy_quyen2">Không</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="time_phat_hanh">Thời gian phát hành hồ sơ:</label>
                                        <input class="form-control" type="text" id="datePick">
                                        <i class="date-icon date-icon1 fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input type="hidden" name="time_phat_hanh" id="time_phat_hanh" class="form-control">



                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="time_mo_thau">Thời gian mở thầu:</label>
                                        <input type="hidden" value="{{ old('time_mo_thau') }}"
                                            class="form-control" id="time_mo_thau" name="time_mo_thau">
                                        <i class="date-icon date-icon2 fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input type="text" class="form-control" id="time_mo_thau_pick" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group date-container col-md-6">
                                        <label for="time_dong_thau">Thời gian đóng thầu:</label>
                                        <input type="hidden" value="{{ old('time_dong_thau') }}"
                                            class="form-control" id="time_dong_thau" name="time_dong_thau">
                                        <i class="date-icon date-icon3 fas fa-calendar-alt" aria-hidden="true"></i>
                                        <input type="text" class="form-control" id="time_dong_thau_pick" >
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <label><strong>Nhà thầu tham dự:</strong></label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="nha_thau_tham_du"
                                            id="nha_thau_tham_du1" checked value="0">
                                        <label class="form-check-inline" for="nha_thau_tham_du1">Sản xuất</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="nha_thau_tham_du"
                                            id="nha_thau_tham_du2" value="1">
                                        <label class="form-check-label" for="nha_thau_tham_du2">Thương mại</label>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div>

            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/home-add.js"></script>


@endsection
