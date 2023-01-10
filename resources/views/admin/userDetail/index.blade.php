@extends('admin.layout.master')
@section('title','User')
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
                    Tình trạng công việc
                    <div class="page-title-subheading">
                        View, create, update, delete and manage.
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <a href="./admin/home/userDetail/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Create
                </a>
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

                <div class="card-header">

                    <form>
                        <div class="input-group">
                            <input type="search" name="search" id="search" value="{{ request('search') }}"
                                placeholder="Tìm kiếm tài khoản" class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>&nbsp;
                                    Search
                                </button>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tài khoản</th>
                                <th class="text-center">Dự án</th>
                                <th class="text-center">Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $k = 0;
                            @endphp
                            @foreach ($userDetails as $item)

                            <tr>
                                <td class="text-center text-muted">{{ ++$k }}</td>
                                <td class="text-center">
                                    {{ $item->user->email }}
                                </td>
                                <td class="text-center">{{ $item->detail->name_goi_thau }}</td>
                                <td class="text-center">
                                    {{ $item->created_at }}
                                </td>
                                <td class="text-center">
                                    {{-- <a href="./admin/home/userDetail/{{ $item->id }}/edit" data-toggle="tooltip" title="Edit"
                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a> --}}
                                    <form class="d-inline" action="./admin/home/userDetail/{{ $item->id }}" method="post">
                                        @csrf

                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                            type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom"
                                            onclick="return confirm('Do you really want to delete this item?')">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-trash fa-w-20"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div class="d-block card-footer">
                    {{ $userDetails->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
