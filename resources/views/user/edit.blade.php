@extends('layout.master')
@section('title','User Edit')
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
                    User
                    <div class="page-title-subheading">
                        Thông tin tài khoản
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
                <div class="card-body">
                    <form method="post" action="user/edit/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                            <div class="col-md-6 ">
                                <img style="height: 250px; cursor: pointer; aspect-ratio: 1 / 1; border-radius: 50%; object-fit: cover;" class="thumbnail"
                                    data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                    src="img/user/{{ $user->avatar ?? '_default-user.png' }}" alt="Avatar">
                                <input name="image" type="file" onchange="changeImg(this)"
                                    class="image form-control-file" style="display: none;" value="">
                                <input type="hidden" name="image_old" value="{{ $user->avatar }}">
                                <small class="form-text text-muted">
                                    Click on the image to change (required)
                                </small>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Tên hiển thị</label>
                            <div class="col-md-6">
                                <input required name="name" id="name" placeholder="Name" type="text"
                                    class="form-control" value="{{ $user->name }}">
                                {{-- <input type="hidden" name="id" value="{{ $user->id }}"> --}}
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="address" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-6">
                                <input readonly id="address" type="text" class="form-control"
                                    value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="address" class="col-md-3 text-md-right col-form-label">Level</label>
                            <div class="col-md-6 ">
                                <input readonly id="address" type="text" class="form-control"
                                    value="{{ \App\Utilities\Constant::$user_level[$user->level]}}">
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-6 offset-md-2">
                                <a href="javascript:history.back()" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Cancel</span>
                                </a>

                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
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
@section('script')
<script>
    function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function (e) {
            //Thay đổi đường dẫn ảnh
            $(input).siblings('.thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//Khi click #thumbnail thì cũng gọi sự kiện click #image
// $(document).ready(function () {
//     $('.thumbnail').click(function () {
//         $(this).siblings('.image').click();
//     });
// });
</script>

@endsection
