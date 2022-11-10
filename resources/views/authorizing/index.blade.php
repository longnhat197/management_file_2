@extends('layout.master')
@section('title','List files')
@section('body')
<!-- Main -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-folder icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    File
                    <div class="page-title-subheading">
                        View, create, update, delete and manage.
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <a href="./file/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Create File
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">

                <div class="card-header">

                    <form style="width: 100%">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="search" name="search" id="search" value="{{ request('search') }}"
                                        placeholder="Search everything" class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" onclick="this.form.submit();" class="btn btn-primary">
                                            <i class="fa fa-search"></i>&nbsp;
                                            Search
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="btn-actions-pane-right">
                                    <div class="input-group">
                                        <select required name="s_contractor" onchange="this.form.submit();"
                                            id="contractor" class="form-control">
                                            <option value="">--Contractor--</option>
                                            @foreach ($contractors as $contractor)
                                                <option value="{{ $contractor->id }}" {{ request('s_contractor') == $contractor->id ? 'selected' : '' }}>{{ $contractor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </form>


                </div>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>File Name</th>
                                <th class="text-center">Contractor</th>
                                <th class="text-center">Updated up</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td class="text-center text-muted">#{{ $file->id }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">

                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">

                                                    <a style="color: #495057" href="./file/{{ $file->id }}">{{ $file->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $file->contractor->name }}</td>
                                <td class="text-center">
                                    {{ $file->updated_at }}
                                </td>
                                <td class="text-center">
                                    <a href="./file/{{ $file->id }}"
                                        class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                        Details
                                    </a>
                                    <a href="./file/{{ $file->id }}/edit" data-toggle="tooltip" title="Edit"
                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    <form class="d-inline" action="./file/{{ $file->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
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
                    {{-- {{ $files->links() }} --}}
                </div>

            </div>
        </div>
    </div>
</div>

<!-- End Main -->
@endsection
