@extends('layout.master')
@section('title','Thông tin chung')
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
                    <form name="Namheo" onsubmit="return checkform();" action="./home/create" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="nguoi_thuc_hien">Người thực hiện:</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                    id="nguoi_thuc_hien" name="nguoi_thuc_hien" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_goi_thau">Tên gói thầu:</label>
                                <input type="text" class="form-control" id="name_goi_thau" name="name_goi_thau">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_du_an">Tên dự án:</label>
                                <input type="text" class="form-control" id="name_du_an" name="name_du_an">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="so_tbmt">Số thông báo mời thầu:</label>
                                <input type="text" class="form-control" id="so_tbmt" name="so_tbmt">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_moi_thau">Bên mời thầu:</label>
                                <input type="text" class="form-control" id="name_moi_thau" name="name_moi_thau">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <label><strong>Hình thức thầu:</strong></label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hinh_thuc_thau" id="hinh_thuc_thau1" checked value="0">
                                        <label class="form-check-label" for="hinh_thuc_thau1">HSDT</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hinh_thuc_thau" id="hinh_thuc_thau2" value="1">
                                        <label class="form-check-label" for="hinh_thuc_thau2">E-HSDT</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <label ><strong>Hình thức tham dự:</strong></label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hinh_thuc_tham_du" id="hinh_thuc_tham_du1" checked
                                            value="0">
                                        <label class="form-check-label" for="hinh_thuc_tham_du1">Độc lập</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hinh_thuc_tham_du" id="hinh_thuc_tham_du2" value="1">
                                        <label class="form-check-label" for="hinh_thuc_tham_du2">Liên danh</label>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label ><strong>Nhà thầu có uỷ quyền:</strong></label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="uy_quyen" id="uy_quyen1" checked value="0">
                                        <label class="form-check-label" for="uy_quyen1">Có</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="uy_quyen" id="uy_quyen2" value="1">
                                        <label class="form-check-label" for="uy_quyen2">Không</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <label><strong>Nhà thầu tham dự:</strong></label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="nha_thau_tham_du" id="nha_thau_tham_du1" checked
                                            value="0">
                                        <label class="form-check-inline" for="nha_thau_tham_du1">Có</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="nha_thau_tham_du" id="nha_thau_tham_du2" value="1">
                                        <label class="form-check-label" for="nha_thau_tham_du2">Không</label>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="time_phat_hanh">Thời gian phát hành hồ sơ:</label>
                                <input type="date" class="form-control" id="time_phat_hanh" name="time_phat_hanh">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="time_mo_thau">Thời gian mở thầu:</label>
                                <input type="datetime-local" class="form-control" id="time_mo_thau" name="time_mo_thau">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="time_dong_thau">Thời gian đóng thầu:</label>
                                <input type="datetime-local" class="form-control" id="time_dong_thau"
                                    name="time_dong_thau">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <button type="submit" class="btn btn-primary">Add</button>
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
<script>
    var a =2
    var b,c;
    dateTimeStart = document.getElementById('time_mo_thau');
    endTime = document.getElementById('time_dong_thau')
    var time2 = new Date(endTime.value)
    var time = new Date(dateTimeStart.value)

    dateTimeStart.onchange = function(){
        c = new Date(dateTimeStart.value).getTime()

    }
    endTime.onchange = function(){
        b = new Date(endTime.value).getTime()
        if(b < c ){
            alert('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
            endTime.value = 0
        }
        else if(b - c > 3600000){
            alert('Thời gian đóng thầu so với mở thầu nhỏ hơn 1 tiếng')
            endTime.value = 0
        }

    }




    function checkform(){
        console.log(b -c);
        if(!b || !c ){
            alert('Không được để trống ')
            return false
        }
    }
</script>
@endsection
