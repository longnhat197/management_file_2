@extends('admin.layout.master')
@section('title','Edit details')
@section('body')
<!-- Main -->
<div class="app-main__inner">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Sửa dự án {{ $detail->name_du_an }}
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success col-lg-12 col-md-12 col-sm-12">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger col-lg-12 col-md-12 col-sm-12">
        {{ session('error') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form onsubmit="return checkform();" action="./admin/home/detail/edit" method="post">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active p-2" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="fas fa-clipboard p-2"></i>
                                    Thông tin chung
                                </a>
                                {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Project Tab 2</a> --}}
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="fas fa-calendar-day p-2"></i>
                                    Thời gian
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="nguoi_thuc_hien">Người thực hiện:</label>
                                        <input type="text" class="form-control" value="{{ $detail->userDetails[0]->user->email }}"
                                            id="nguoi_thuc_hien" disabled>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        {{-- <label for="name_goi_thau">Tên gói thầu:</label> --}}
                                        <input type="text" class="form-control" id="name_goi_thau"
                                            placeholder="Tên gói thầu" name="name_goi_thau" value="{{ $detail->name_goi_thau }}">
                                        @if ($errors->has('name_goi_thau'))
                                            <span class="text-danger">{{ $errors->first('name_goi_thau') }}</span>
                                        @endif
                                        <input type="hidden" name="id" value="{{ $detail->id }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_du_an">Tên dự án:</label>
                                        <input type="text" class="form-control" id="name_du_an" name="name_du_an" value="{{ $detail->name_du_an }}">
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
                                                    <option {{ $detail->customer == $customer->name ? 'selected' : '' }} value="{{ $customer->name }}">{{ $customer->name }}</option>
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
                                        <input type="text" class="form-control" id="so_tbmt" name="so_tbmt" value="{{ $detail->so_thong_bao }}">
                                        @if ($errors->has('so_tbmt'))
                                            <span class="text-danger">{{ $errors->first('so_tbmt') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="name_moi_thau">Bên mời thầu:</label>
                                        <input type="text" class="form-control" id="name_moi_thau" name="name_moi_thau" value="{{ $detail->name_moi_thau }}">
                                        @if ($errors->has('name_moi_thau'))
                                            <span class="text-danger">{{ $errors->first('name_moi_thau') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $detail->address }}">
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                        <label><strong>Hình thức thầu:</strong></label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hinh_thuc_thau"
                                                    id="hinh_thuc_thau1" {{ $detail->hinh_thuc_thau == 0 ? 'checked' : '' }} value="0">
                                                <label class="form-check-label" for="hinh_thuc_thau1">HSDT</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" {{ $detail->hinh_thuc_thau == 1 ? 'checked' : '' }} type="radio" name="hinh_thuc_thau"
                                                    id="hinh_thuc_thau2" value="1">
                                                <label class="form-check-label" for="hinh_thuc_thau2">E-HSDT</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                        <label><strong>Hình thức tham dự:</strong></label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hinh_thuc_tham_du"
                                                    id="hinh_thuc_tham_du1" {{ $detail->hinh_thuc_tham_du == 0 ? 'checked' : '' }} value="0">
                                                <label class="form-check-label" for="hinh_thuc_tham_du1">Độc lập</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hinh_thuc_tham_du"
                                                    id="hinh_thuc_tham_du2" {{ $detail->hinh_thuc_tham_du == 1 ? 'checked' : '' }} value="1">
                                                <label class="form-check-label" for="hinh_thuc_tham_du2">Liên
                                                    danh</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5">
                                        <label><strong>Nhà thầu có uỷ quyền:</strong></label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="uy_quyen"
                                                    id="uy_quyen1" {{ $detail->uy_quyen == 0 ? 'checked' : '' }} value="0">
                                                <label class="form-check-label" for="uy_quyen1">Có</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="uy_quyen"
                                                    id="uy_quyen2" {{ $detail->uy_quyen == 1 ? 'checked' : '' }} value="1">
                                                <label class="form-check-label" for="uy_quyen2">Không</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> --}}
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="time_phat_hanh">Thời gian phát hành hồ sơ:</label>
                                        <input type="date" class="form-control" id="time_phat_hanh"
                                            name="time_phat_hanh" value="{{ $detail->time_phat_hanh }}">
                                        @if ($errors->has('time_phat_hanh'))
                                            <span class="text-danger">{{ $errors->first('time_phat_hanh') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="time_mo_thau">Thời gian mở thầu:</label>
                                        <input type="datetime-local" class="form-control" id="time_mo_thau"
                                            name="time_mo_thau" value="{{ $detail->time_mo_thau }}">
                                        @if ($errors->has('time_mo_thau'))
                                            <span class="text-danger">{{ $errors->first('time_mo_thau') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="form-group col-md-6">
                                        <label for="time_dong_thau">Thời gian đóng thầu:</label>
                                        <input type="datetime-local" class="form-control" id="time_dong_thau"
                                            name="time_dong_thau" value="{{ $detail->time_dong_thau }}">
                                        @if ($errors->has('time_dong_thau'))
                                            <span class="text-danger">{{ $errors->first('time_dong_thau') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
@section('script')
<script type="text/javascript" src="./dashboard/assets/scripts/home-edit.js"></script>
@endsection
