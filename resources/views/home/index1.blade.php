@extends('layout.master')
@section('title','Home')
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
                    Home
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div >
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header header-center">
                                    <a href="./file" style="text-decoration: none; color:inherit ">
                                        Số lượng file
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5>{{ $files->count() }}</h5>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Templete</h5>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header header-center">
                                    <a href="./contractor" style="text-decoration: none; color:inherit ">
                                        Danh sách nhà thầu
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5>{{ $contractors->count() }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header header-center">
                                    <a href="./template" style="text-decoration: none; color:inherit ">
                                        Danh sách mẫu thầu
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5>11</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header header-center">
                                    <a href="./project" style="text-decoration: none; color:inherit ">
                                        Danh sách dự án
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5>{{ $projects->count() }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header header-center">
                                    <a href="./customer" style="text-decoration: none; color:inherit ">
                                        Danh sách khách hàng
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5>{{ $customers->count() }}</h5>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header header-center">
                                    <a href="./package" style="text-decoration: none; color:inherit ">
                                        Danh sách gói thầu
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5>{{ $packages->count() }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="card">

                                <div class="card-header header-center">
                                    <a href="./user" style="text-decoration: none; color:inherit ">
                                        Người uỷ quyền và được uỷ quyền
                                    </a>
                                </div>
                                <div class="card-body text-center">
                                    <h5>{{ $listUsers->count() }}</h5>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
