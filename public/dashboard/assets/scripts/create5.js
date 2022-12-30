$('document').ready(function () {
    ngayKeKhai = document.getElementById('ngay_ke_khai_test')
    soHieu = document.getElementById('so_hieu_test')
    trang = document.getElementById('trang_test')
    trenTrang = document.getElementById('tren_trang_test')
    nameNhathau = document.getElementById('name_nha_thau_test')
    diaChiDangKy = document.getElementById('dia_chi_dang_ky_test')
    namThanhLap = document.getElementById('nam_thanh_lap_test')
    diaChiHopPhap = document.getElementById('dia_chi_hop_phap_test')
    name1 = document.getElementById('name_test')
    diaChi = document.getElementById('dia_chi_test')
    soDienThoai = document.getElementById('so_dien_thoai_test')
    email = document.getElementById('email_test')


    nameGoiThau = document.getElementById('name_goi_thau_test')
    document.getElementById('name_goi_thau1').innerText = nameGoiThau.value

    $("#datePick").datetimepicker({
        format: 'd/m/Y',
        timepicker: false,
    });
    $('.date_ttld').on('click', function () {
        $('#datePick').focus();
    })
    console.log(ngayKeKhai.value);
    datePick = document.getElementById('datePick');

    datePick.onchange = function () {
        dP = datePick.value.substr(0, 2)
        mP = datePick.value.substr(3, 2)
        yP = datePick.value.substr(6, 4)
        // date.value = $(this).val();
        ngayKeKhai.value = datePick.value != '' ? `${yP}-${mP}-${dP}` : '';
        document.getElementById('ngay_ke_khai1').innerText = ngayKeKhai.value != '' ?  String(ngayKeKhai.value).slice(8, 10) + '/' + String(ngayKeKhai.value).slice(5, 7) + '/' + String(ngayKeKhai.value).slice(0, 4) : '_______________'

    }
    document.getElementById('ngay_ke_khai1').innerText = ngayKeKhai.value != '' ?  String(ngayKeKhai.value).slice(8, 10) + '/' + String(ngayKeKhai.value).slice(5, 7) + '/' + String(ngayKeKhai.value).slice(0, 4) : '_______________'
    datePick.value = ngayKeKhai.value != '' ? `${String(ngayKeKhai.value).slice(8, 10)}/${String(ngayKeKhai.value).slice(5, 7)}/${String(ngayKeKhai.value).slice(0, 4)}` : ''

    soHieu.onkeyup = function(){
        document.getElementById('so_hieu1').innerText = soHieu.value
        if(soHieu.value ==''){
            document.getElementById('so_hieu1').innerText = '_________'
        }
    }
    document.getElementById('so_hieu1').innerText = soHieu.value != '' ? soHieu.value : '_________'

    trang.onkeyup = function(){
        document.getElementById('trang1').innerText = trang.value
        if(trang.value ==''){
            document.getElementById('trang1').innerText = '_________'
        }
    }
    document.getElementById('trang1').innerText = trang.value != '' ? trang.value : '_________'

    trenTrang.onkeyup = function(){
        document.getElementById('tren_trang1').innerText = trenTrang.value
        if(trenTrang.value ==''){
            document.getElementById('tren_trang1').innerText = '___________'
        }
    }
    document.getElementById('tren_trang1').innerText = trenTrang.value != '' ? trenTrang.value : '___________'

    trenTrang.onkeyup = function(){
        document.getElementById('tren_trang1').innerText = trenTrang.value
        if(trenTrang.value ==''){
            document.getElementById('tren_trang1').innerText = '___________'
        }
    }
    document.getElementById('tren_trang1').innerText = trenTrang.value != '' ? trenTrang.value : '___________'

    nameNhathau.onkeyup = function(){
        document.getElementById('name_nha_thau1').innerText = nameNhathau.value
        if(nameNhathau.value ==''){
            document.getElementById('name_nha_thau1').innerText = '___[ghi tên nhà thầu]'
        }
    }
    document.getElementById('name_nha_thau1').innerText = nameNhathau.value != '' ? nameNhathau.value : '___[ghi tên nhà thầu]'


    diaChiDangKy.onkeyup = function(){
        document.getElementById('dia_chi_dang_ky1').innerText = diaChiDangKy.value
        if(diaChiDangKy.value ==''){
            document.getElementById('dia_chi_dang_ky1').innerText = '___[ghi tên tỉnh/thành phố nơi đăng ký kinh doanh, hoạt động]'
        }
    }
    document.getElementById('dia_chi_dang_ky1').innerText = diaChiDangKy.value != '' ? diaChiDangKy.value : '___[ghi tên tỉnh/thành phố nơi đăng ký kinh doanh, hoạt động]'

    namThanhLap.onkeyup = function(){
        document.getElementById('nam_thanh_lap1').innerText = namThanhLap.value
        if(namThanhLap.value ==''){
            document.getElementById('nam_thanh_lap1').innerText = '___[ghi năm thành lập công ty]'
        }
    }
    document.getElementById('nam_thanh_lap1').innerText = namThanhLap.value != '' ? namThanhLap.value : '___[ghi năm thành lập công ty]'

    diaChiHopPhap.onkeyup = function(){
        document.getElementById('dia_chi_hop_phap1').innerText = diaChiHopPhap.value
        if(diaChiHopPhap.value ==''){
            document.getElementById('dia_chi_hop_phap1').innerText = '__[tại nơi đăng ký]'
        }
    }
    document.getElementById('dia_chi_hop_phap1').innerText = diaChiHopPhap.value != '' ? diaChiHopPhap.value : '__[tại nơi đăng ký]'

    name1.onkeyup = function(){
        document.getElementById('name1').innerText = name1.value
        if(name1.value ==''){
            document.getElementById('name1').innerText = '____________________________________'
        }
    }
    document.getElementById('name1').innerText = name1.value != '' ? name1.value : '____________________________________'

    diaChi.onkeyup = function(){
        document.getElementById('dia_chi1').innerText = diaChi.value
        if(diaChi.value ==''){
            document.getElementById('dia_chi1').innerText = '__________________________________'
        }
    }
    document.getElementById('dia_chi1').innerText = diaChi.value != '' ? diaChi.value : '__________________________________'

    soDienThoai.onkeyup = function(){
        document.getElementById('so_dien_thoai1').innerText = soDienThoai.value
        if(soDienThoai.value ==''){
            document.getElementById('so_dien_thoai1').innerText = '__________________________'
        }
    }
    document.getElementById('so_dien_thoai1').innerText = soDienThoai.value != '' ? soDienThoai.value : '__________________________'

    email.onkeyup = function(){
        document.getElementById('email1').innerText = email.value
        if(email.value ==''){
            document.getElementById('email1').innerText = '__________________________'
        }
    }
    document.getElementById('email1').innerText = email.value != '' ? email.value : '__________________________'


    document.getElementById('save').onclick = function () {
        url = $('#detail_id').attr("data-url")
        data = {
            detail_id: detail_id.value,
            ngay_ke_khai: ngayKeKhai.value,
            so_hieu: soHieu.value,
            trang: trang.value,
            tren_trang: trenTrang.value,
            name_nha_thau: nameNhathau.value,
            dia_chi_dang_ky: diaChiDangKy.value,
            nam_thanh_lap: namThanhLap.value,
            dia_chi_hop_phap: diaChiHopPhap.value,
            name: name1.value,
            dia_chi: diaChi.value,
            so_dien_thoai: soDienThoai.value,
            email: email.value
        }
        console.log(data);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: url,
            method: "POST",
            data: data,
            dataType: 'json',
            success: function (res) {
                alertify.set('notifier','position', 'bottom-right');
                alertify.success(res);

            },
            error: function (xhr, ajaxOption, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        })
    }

})
