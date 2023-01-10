$(document).ready(function () {
    nameMoiThau = document.getElementById('name_moi_thau_test')
    soTrichYeu = document.getElementById('so_trich_yeu_test')
    dateDuThau = document.getElementById('date')
    soSuaDoi = document.getElementById('so_sua_doi_test')
    soTien = document.getElementById('so_tien_test')
    time = document.getElementById('time_test')
    fromDate = document.getElementById('date_test')
    nameChucDanh = document.getElementById('name_chuc_danh_test')
    detail_id = document.getElementById('detail_id')
    nameNhaThau = document.getElementById('name_nha_thau_test')

    soTrichYeu.onkeyup = function (){
        document.getElementById('so_trich_yeu1').innerText = soTrichYeu.value
        if(soTrichYeu.value == ''){
            document.getElementById('so_trich_yeu1').innerText = '__[ghi số trích yếu của Thư mời thầu đối với đấu thầu hạn chế]'
        }
    }
    document.getElementById('so_trich_yeu1').innerText = soTrichYeu.value != '' ? soTrichYeu.value : '__[ghi số trích yếu của Thư mời thầu đối với đấu thầu hạn chế]'

    nameNhaThau.onkeyup = function (){
        document.getElementById('name_nha_thau1').innerText = nameNhaThau.value
        if(nameNhaThau.value == ''){
            document.getElementById('name_nha_thau1').innerText = '____ [ghi tên nhà thầu]'
        }
    }
    document.getElementById('name_nha_thau1').innerText = nameNhaThau.value != '' ? nameNhaThau.value : '____ [ghi tên nhà thầu]'

    nameMoiThau.onkeyup = function (){
        document.getElementById('name_moi_thau1').innerText = nameMoiThau.value
        if(nameMoiThau.value == ''){
            document.getElementById('name_moi_thau1').innerText = '__[ghi đầy đủ và chính xác tên của Bên mời thầu]'
        }
    }
    document.getElementById('name_moi_thau1').innerText = nameMoiThau.value != '' ? nameMoiThau.value : '__[ghi đầy đủ và chính xác tên của Bên mời thầu]'

    document.getElementById('so_sua_doi1').innerText = soSuaDoi.value
    if(soSuaDoi.value == ''){
        document.getElementById('so_sua_doi').style.display = 'none'
    }else{
        document.getElementById('so_sua_doi').style.display = 'inline'
    }
    soSuaDoi.onkeyup = function () {
        document.getElementById('so_sua_doi').style.display = 'inline'
        document.getElementById('so_sua_doi1').innerText = soSuaDoi.value
        if(soSuaDoi.value == ''){
            document.getElementById('so_sua_doi').style.display = 'none'
        }
    }

    soTien.onkeyup = function (){
        document.getElementById('so_tien1').innerText = soTien.value
        if(soTien.value == ''){
            document.getElementById('so_tien1').innerText = '____[ghi giá trị bằng số, bằng chữ và đồng tiền dự thầu]'
        }
    }
    document.getElementById('so_tien1').innerText = soTien.value != '' ? soTien.value : '____[ghi giá trị bằng số, bằng chữ và đồng tiền dự thầu]'

    time.onkeyup = function (){
        document.getElementById('time1').innerText = time.value
        if(time.value == ''){
            document.getElementById('time1').innerText = '___'
        }
    }
    document.getElementById('time1').innerText = time.value != '' ? time.value : '___'

    nameChucDanh.onkeyup = function (){
        document.getElementById('name_chuc_danh1').innerText = nameChucDanh.value
        if(nameChucDanh.value == ''){
            document.getElementById('name_chuc_danh1').innerText = '[ghi tên, chức danh, ký tên và đóng dấu]'
        }
    }
    document.getElementById('name_chuc_danh1').innerText = nameChucDanh.value != '' ? nameChucDanh.value : '[ghi tên, chức danh, ký tên và đóng dấu]'

    $("#datePick,#date_start").datetimepicker({
        format: 'd/m/Y',
        timepicker: false,
    })
    $('.date_ttld').on('click', function () {
        $('#datePick').focus();
    })
    $('.date_start').on('click', function () {
        $('#date_start').focus();
    })

    date_ph = document.getElementById('datePick')
    date_ph.onchange = function () {
        dP = date_ph.value.substr(0, 2)
        mP = date_ph.value.substr(3, 2)
        yP = date_ph.value.substr(6, 4)
        // date.value = $(this).val();
        dateDuThau.value = date_ph.value != '' ? `${yP}-${mP}-${dP}` : ''
        document.getElementById('date1').innerText = dateDuThau.value != '' ?  String(dateDuThau.value).slice(8, 10) + '/' + String(dateDuThau.value).slice(5, 7) + '/' + String(dateDuThau.value).slice(0, 4) : '__[ghi ngày tháng năm ký đơn dự thầu]'
    }
    document.getElementById('date1').innerText = dateDuThau.value != '' ?  String(dateDuThau.value).slice(8, 10) + '/' + String(dateDuThau.value).slice(5, 7) + '/' + String(dateDuThau.value).slice(0, 4) : '__[ghi ngày tháng năm ký đơn dự thầu]'
    date_ph.value = dateDuThau.value != '' ? `${String(dateDuThau.value).slice(8, 10)}/${String(dateDuThau.value).slice(5, 7)}/${String(dateDuThau.value).slice(0, 4)}` : ''

    date_start = document.getElementById('date_start')
    date_start.onchange = function () {
        dP = date_start.value.substr(0, 2)
        mP = date_start.value.substr(3, 2)
        yP = date_start.value.substr(6, 4)
        // date.value = $(this).val();
        fromDate.value = date_start.value != '' ? `${yP}-${mP}-${dP}` : ''
        document.getElementById('d').innerText = fromDate.value != '' ? dP : '__'
        document.getElementById('m').innerText = fromDate.value != '' ? mP : '__'
        document.getElementById('y').innerText = fromDate.value != '' ? yP : '__'
    }
    date_start.value = fromDate.value != '' ? `${String(fromDate.value).slice(8, 10)}/${String(fromDate.value).slice(5, 7)}/${String(fromDate.value).slice(0, 4)}` : ''
    document.getElementById('y').innerText = fromDate.value != '' ? String(fromDate.value).slice(0, 4) : '___'
    document.getElementById('m').innerText = fromDate.value != '' ? String(fromDate.value).slice(5, 7) : '___'
    document.getElementById('d').innerText = fromDate.value != '' ? String(fromDate.value).slice(8, 10) : '___'

    tenDuAn = document.getElementById('name_du_an_test')
    document.getElementById('name_du_an1').innerText = tenDuAn.value

    tenGoiThau = document.getElementById('name_goi_thau_test')
    document.getElementById('name_goi_thau1').innerText = tenGoiThau.value
    document.getElementById('name_goi_thau2').innerText = tenGoiThau.value


    save = document.getElementById('save');
    save.onclick = function () {
        url = $('#detail_id').attr("data-url");
        data = {
            so_trich_yeu: soTrichYeu.value,
            so_sua_doi: soSuaDoi.value,
            name_nha_thau: nameNhaThau.value,
            date: date.value,
            time: time.value,
            dateStart: fromDate.value,
            detail_id: detail_id.value,
            name_chuc_danh: nameChucDanh.value,
            so_tien:soTien.value,
            name_moi_thau: nameMoiThau.value,
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

