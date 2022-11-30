@extends('admin.layout.master')
@section('title','Project Create')
@section('body')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Thêm dự án cho người dùng
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="admin/home/userDetail/create" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="user_id"
                                    class="col-md-3 text-md-right col-form-label">Tài khoản</label>
                                <div class="col-md-6">
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">-- email --</option>
                                        @foreach ($users as $user)
                                            <option value={{ $user->id }}>
                                                {{ $user->email }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="detail_id"
                                    class="col-md-3 text-md-right col-form-label">Dự án</label>
                                <div class="col-md-6 ">
                                    <select name="detail_id" id="detail_id" class="form-control">
                                        <option value="">-- Dự án --</option>
                                        @foreach ($details as $detail)
                                            <option value={{ $detail->id }}>
                                                {{ $detail->name_goi_thau }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="javascript:history.back()" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
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



