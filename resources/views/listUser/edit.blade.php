@extends('layout.master')
@section('title','Project Edit')
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
                        Sửa gói thầu
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
                        <form method="post" action="user/{{ $user->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="cmnd" class="col-md-3 text-md-right col-form-label">Số CMND hoặc hộ chiếu</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="cmnd" id="cmnd" type="text"
                                        class="form-control" value="{{ $user->cmnd }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="title" class="col-md-3 text-md-right col-form-label">Chức danh</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="title" id="title" type="text"
                                        class="form-control" value="{{ $user->title }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="type_user" class="col-md-3 text-md-right col-form-label">Loại</label>
                                <div class="col-md-9 col-xl-8">
                                    <select class="form-control" name="type_user" id="type_user">
                                        <option value="1" {{ $user->type_user == '1' ? 'selected' : '' }}>Người đại diện</option>
                                        <option value="2" {{ $user->type_user == '2' ? 'selected' : ''}}>Người được uỷ quyền</option>
                                    </select>
                                    {{-- <input required name="type_user" id="type_user" placeholder="Chức danh" type="text"
                                        class="form-control" value=""> --}}
                                </div>
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



