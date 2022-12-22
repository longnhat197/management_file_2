$('document').ready(function () {
    ngayKeKhai = document.getElementById('ngay_ke_khai_test')
    soHieu = document.getElementById('so_hieu_test')
    trang = document.getElementById('trang_test')
    trenTrang = document.getElementById('tren_trang_test')
    nameLienDanh = document.getElementById('name_lien_danh_test')
    nameThanhVienLienDanh = document.getElementById('name_thanh_vien_lien_danh_test')
    quocGiaDangKy = document.getElementById('quoc_gia_dang_ky_test')
    namThanhLap = document.getElementById('nam_thanh_lap_test')
    diaChiHopPhap = document.getElementById('dia_chi_hop_phap_test')
    nameThanhVien = document.getElementById('name_thanh_vien_test')
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

    nameLienDanh.onkeyup = function(){
        document.getElementById('name_lien_danh1').innerText = nameLienDanh.value
        if(nameLienDanh.value ==''){
            document.getElementById('name_lien_danh1').innerText = '____________________________________'
        }
    }
    document.getElementById('name_lien_danh1').innerText = nameLienDanh.value != '' ? nameLienDanh.value : '____________________________________'

    nameThanhVienLienDanh.onkeyup = function(){
        document.getElementById('name_thanh_vien_lien_danh1').innerText = nameThanhVienLienDanh.value
        if(nameThanhVienLienDanh.value ==''){
            document.getElementById('name_thanh_vien_lien_danh1').innerText = '____________________________________'
        }
    }
    document.getElementById('name_thanh_vien_lien_danh1').innerText = nameThanhVienLienDanh.value != '' ? nameThanhVienLienDanh.value : '____________________________________'

    quocGiaDangKy.onkeyup = function(){
        document.getElementById('quoc_gia_dang_ky1').innerText = quocGiaDangKy.value
        if(quocGiaDangKy.value ==''){
            document.getElementById('quoc_gia_dang_ky1').innerText = '________________________________'
        }
    }
    document.getElementById('quoc_gia_dang_ky1').innerText = quocGiaDangKy.value != '' ? quocGiaDangKy.value : '________________________________'

    namThanhLap.onkeyup = function(){
        document.getElementById('nam_thanh_lap1').innerText = namThanhLap.value
        if(namThanhLap.value ==''){
            document.getElementById('nam_thanh_lap1').innerText = '____________________________________'
        }
    }
    document.getElementById('nam_thanh_lap1').innerText = namThanhLap.value != '' ? namThanhLap.value : '____________________________________'

    diaChiHopPhap.onkeyup = function(){
        document.getElementById('dia_chi_hop_phap1').innerText = diaChiHopPhap.value
        if(diaChiHopPhap.value ==''){
            document.getElementById('dia_chi_hop_phap1').innerText = '_________________________'
        }
    }
    document.getElementById('dia_chi_hop_phap1').innerText = diaChiHopPhap.value != '' ? diaChiHopPhap.value : '_________________________'

    nameThanhVien.onkeyup = function(){
        document.getElementById('name_thanh_vien1').innerText = nameThanhVien.value
        if(nameThanhVien.value ==''){
            document.getElementById('name_thanh_vien1').innerText = '____________________________________'
        }
    }
    document.getElementById('name_thanh_vien1').innerText = nameThanhVien.value != '' ? nameThanhVien.value : '____________________________________'

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
            name_lien_danh: nameLienDanh.value,
            name_thanh_vien_lien_danh: nameThanhVienLienDanh.value,
            quoc_gia_dang_ky: quocGiaDangKy.value,
            nam_thanh_lap: namThanhLap.value,
            dia_chi_hop_phap: diaChiHopPhap.value,
            name_thanh_vien: nameThanhVien.value,
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
