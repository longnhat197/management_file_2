@extends('admin.layout.master')
@section('title','Contractor')
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
                        Danh sách dự án
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
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

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" value="{{ request('search') }}"
                                    placeholder="Search" class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>&nbsp;
                                        Search
                                    </button>
                                </span>
                            </div>
                        </form>

                        {{-- <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="btn btn-focus">This week</button>
                                <button class="active btn btn-focus">Anytime</button>
                            </div>
                        </div> --}}
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th>Tên gói thầu</th>
                                    <th>Tên dự án</th>
                                    <th>Tên bên mời thầu</th>
                                    <th>Chủ đầu tư</th>
                                    <th>Người tạo</th>
                                    <th class="text-center">Tình trạng</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $k =0;
                                @endphp
                                @foreach ($details as $detail)
                                    <tr>
                                        <td class="text-center text-muted">{{ ++$k }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">
                                                            <a style="color: #495057" href="./detail/{{ $detail->id }}/edit">{{ $detail->name_goi_thau}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $detail->name_du_an }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $detail->name_moi_thau }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $detail->customer }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $detail->user->email }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {!! $detail->enabled == 0 ? '<a href="javascript:void(0)"
                                                class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i></a>' : '<a
                                                href="javascript:void(0)" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-check-circle"></i></a>' !!}
                                        </td>
                                        <td class="text-center">
                                            @if ($detail->enabled == 1)
                                            <a href="./admin/home/detail/{{ $detail->id }}/edit" data-toggle="tooltip" title="Edit"
                                                data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            @endif
                                            <form class="d-inline" action="./admin/home/detail/{{ $detail->id }}/delete" method="post">
                                                @csrf
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xoá dự án này?')">
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
                        {{ $details->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection


