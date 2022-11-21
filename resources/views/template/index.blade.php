@extends('layout.master')
@section('title','Template')
@section('my_style')
<link rel="stylesheet" href="./dashboard/assets/css/checkbox.css">
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
                    Template
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="./template" method="POST" >
                            @csrf
                            <div class="card-header">
                                <h4>Checklist test</h4>
                            </div>
                            <input type="hidden" name="detail_id" value="{{ $id }}">
                            <input type="hidden" name="type" value="{{ $type }}">
                            <ul id="check-list" class="list-group list-group-flush ">
                                @foreach ($templates as $tem)
                                <li class="list-group-item">
                                    {{ $tem->name }}
                                    <label class="checkbox">
                                        <input name="list_tem[]" type="checkbox" value="{{ $tem->id }}"/>
                                        <span class="primary"></span>
                                    </label>
                                </li>
                                @endforeach

                            </ul>
                            <button type="submit" class="btn btn-primary mb-4 mt-2">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection
