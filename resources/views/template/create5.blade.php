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
                    <form name="Namheo" onsubmit="return checkform();" action="./template/5" method="post">
                        @csrf

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
                            <div class="form-group col-md-5">
                                <label for="hinh_thuc_thau">Hình thức thầu:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group">
                                        <select required id="hinh_thuc_thau" name="hinh_thuc_thau" class="form-control">
                                            <option value="0">HSDT</option>
                                            <option value="1">E-HSDT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="hinh_thuc_tham_du">Hình thức tham dự:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group">
                                        <select required id="hinh_thuc_tham_du" name="hinh_thuc_tham_du"
                                            class="form-control">
                                            <option value="0">Độc lập</option>
                                            <option value="1">Liên danh</option>
                                        </select>
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





                        {{-- <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-5">
                                <label for="name_goi_thau_test">Số hiệu và tên gói thầu:</label>
                                <div class="btn-actions-pane-right">
                                    <div class="input-group w-50">
                                        <select required id="name_goi_thau" class="form-control">
                                            <option value="">--Tên gói thầu--</option>
                                            @foreach ($packages as $package)
                                            <option value="{{ $package->name }}">{{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="name_goi_thau_test" name="name_goi_thau">
                            </div>
                        </div> --}}

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
