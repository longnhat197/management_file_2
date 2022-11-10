@extends('layout.master')
@section('title','Bảo lãnh dự thầu')
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
                    <form action="./template/4" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="ngay_ke_khai_test">Ngày kê khai:</label>
                                <input type="date" class="form-control" id="ngay_ke_khai_test" name="ngay_ke_khai">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_goi_thau_test">Số hiệu và tên gói thầu:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group w-50">
                                        <select required id="name_goi_thau" class="form-control">
                                            <option value="">--Tên gói thầu--</option>
                                            @foreach ($packages as $package)
                                            <option value="{{ $package->name }}">{{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="name_goi_thau_test" name="name_goi_thau">
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary">Export Word</button>
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
<script type="text/javascript" src="./dashboard/assets/scripts/create5.js"></script>
@endsection
