@extends('layout.master')
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
                    Danh sách dự án đã đóng
                    <div class="page-title-subheading">
                        Các dự án đã qua thời gian đóng thầu
                    </div>
                </div>
            </div>

            {{-- <div class="page-title-actions">
                <a href="./home/add" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Create
                </a>
            </div> --}}
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
            @if (count($details)!=0)
            <div class="main-card mb-3 card">

                <div class="card-header">

                    <form>
                        <div class="input-group">
                            <input type="search" name="search" id="search" value="{{ request('search') }}"
                                placeholder="Search by name" class="form-control">
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
                                <th>Hình thức tham dự</th>
                                <th>Hình thức thầu</th>
                                <th>Chủ đầu tư</th>
                                <th>Người tạo</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $k = 0;
                            @endphp
                            @foreach ($details as $detail)
                            <tr>
                                <td class="text-center text-muted">{{ ++$k }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">
                                                    {{ $detail->name_goi_thau}}
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
                                                <div class="widget-heading">
                                                    @if ($detail->hinh_thuc_tham_du == 0)
                                                    Độc lập
                                                    @else
                                                    Liên danh
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">
                                                    @if ($detail->hinh_thuc_thau == 0)
                                                    E-HSDT
                                                    @else
                                                    HSDT
                                                    @endif
                                                </div>
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

                                                <div class="widget-heading">{{ $detail->userDetails[0]->user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @if ($detail->user_id == Auth::user()->id || Auth::user()->level == 0)
                                        @if($detail->enabled == 1)
                                        <a href="./home/show/n{{ $detail->id }}/edit" data-toggle="tooltip" title="Edit"
                                            data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-edit fa-w-20"></i>
                                            </span>
                                        </a>
                                        @endif
                                    <form class="d-inline" action="./home/show/{{ $detail->id }}/delete" method="post">
                                        @csrf
                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                            type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom"
                                            onclick="return confirm('Bạn có chắc chắn muốn xoá dự án này ?')">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-trash fa-w-20"></i>
                                            </span>
                                        </button>
                                    </form>
                                    @endif

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
            @else
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <img src="img/empty/empty.png" alt="">
                    <h4 style="color: rgba(0,0,0,.4);">Chưa được thêm vào dự án nào hoặc chưa tạo dự án</h4>

                </div>

            </div>
            @endif


        </div>
    </div>
</div>
<!-- End Main -->
@endsection
