$(document).ready(function () {
    let textareaList = ['ten_chuc_danh_test', 'so_tien_test', 'so_tien1_test']
    for (let i = 0; i < textareaList.length; i++) {
        const textarea = document.getElementById(textareaList[i])
        if (!textarea) {
            console.log(textarea);
            return;
        }
        textarea.addEventListener('keydown', (e) => {
            if (e.keyCode === 9) {
                e.preventDefault()

                textarea.setRangeText(
                    '  ',
                    textarea.selectionStart,
                    textarea.selectionStart,
                    'end'
                )
            }
        })
    }




    thongTinMoiThau1 = document.getElementById('thong_tin_moi_thau_test')
    dateBaolanh = document.getElementById('ngay_phat_hanh_test')
    soTrichYeu = document.getElementById('so_trich_yeu_test')
    thongTinPhatHanh = document.getElementById('thong_tin_phat_hanh_test')
    tenNhaThau = document.getElementById('name_nha_thau_test')
    soTrichYeu1 = document.getElementById('so_trich_yeu1_test')
    so_tien_bl = document.getElementById('so_tien_test')
    so_tien_tt = document.getElementById('so_tien1_test')
    time = document.getElementById('time_test')
    fromDate = document.getElementById('date_test')
    tenChucDanh = document.getElementById('ten_chuc_danh_test')
    detail_id = document.getElementById('detail_id')

    thongTinMoiThau1.onkeyup = function (){
        document.getElementById('thong_tin_moi_thau1').innerText = thongTinMoiThau1.value
        if(thongTinMoiThau1.value == ''){
            document.getElementById('thong_tin_moi_thau1').innerText = '___[ghi tên và địa chỉ của Bên mời thầu]'
        }
    }
    document.getElementById('thong_tin_moi_thau1').innerText = thongTinMoiThau1.value != '' ? thongTinMoiThau1.value : '___[ghi tên và địa chỉ của Bên mời thầu]'

    soTrichYeu.onkeyup = function (){
        document.getElementById('so_trich_yeu1').innerText = soTrichYeu.value
        if(soTrichYeu.value == ''){
            document.getElementById('so_trich_yeu1').innerText = '___[ghi số trích yếu của Bảo lãnh dự thầu]'
        }
    }
    document.getElementById('so_trich_yeu1').innerText = soTrichYeu.value != '' ? soTrichYeu.value : '___[ghi số trích yếu của Bảo lãnh dự thầu]'

    soTrichYeu1.onkeyup = function (){
        document.getElementById('so_trich_yeu11').innerText = soTrichYeu1.value
        if(soTrichYeu1.value == ''){
            document.getElementById('so_trich_yeu11').innerText = '[ghi số trích yếu của Thư mời thầu/thông báo mời thầu]'
        }
    }
    document.getElementById('so_trich_yeu11').innerText = soTrichYeu1.value != '' ? soTrichYeu1.value : '[ghi số trích yếu của Thư mời thầu/thông báo mời thầu]'

    thongTinPhatHanh.onkeyup = function (){
        document.getElementById('thong_tin_phat_hanh1').innerText = thongTinPhatHanh.value
        if(thongTinPhatHanh.value == ''){
            document.getElementById('thong_tin_phat_hanh1').innerText = '___[ghi tên và địa chỉ nơi phát hành, nếu những thông tin này chưa được thể hiện ở phần tiêu đề trên giấy in]'
        }
    }
    document.getElementById('thong_tin_phat_hanh1').innerText = thongTinPhatHanh.value != '' ? thongTinPhatHanh.value : '___[ghi tên và địa chỉ nơi phát hành, nếu những thông tin này chưa được thể hiện ở phần tiêu đề trên giấy in]'

    tenNhaThau.onkeyup = function (){
        document.getElementById('name_nha_thau1').innerText = tenNhaThau.value
        if(tenNhaThau.value == ''){
            document.getElementById('name_nha_thau1').innerText = '[ghi tên nhà thầu]'
        }
    }
    document.getElementById('name_nha_thau1').innerText = tenNhaThau.value != '' ? tenNhaThau.value : '[ghi tên nhà thầu]'


    so_tien_bl.onkeyup = function (){
        document.getElementById('so_tien1').innerText = so_tien_bl.value
        if(so_tien_bl.value == ''){
            document.getElementById('so_tien1').innerText = '____ [ghi rõ giá trị bằng số, bằng chữ và đồng tiền sử dụng].'
        }
    }
    document.getElementById('so_tien1').innerText = so_tien_bl.value != '' ? so_tien_bl.value : '____ [ghi rõ giá trị bằng số, bằng chữ và đồng tiền sử dụng].'


    so_tien_tt.onkeyup = function (){
        document.getElementById('so_tien11').innerText = so_tien_tt.value
        if(so_tien_tt.value == ''){
            document.getElementById('so_tien11').innerText = '[ghi bằng chữ] [ghi bằng số]'
        }
    }
    document.getElementById('so_tien11').innerText = so_tien_tt.value != '' ? so_tien_tt.value : '[ghi bằng chữ] [ghi bằng số]'


    time.onkeyup = function (){
        document.getElementById('time1').innerText = time.value
        if(time.value == ''){
            document.getElementById('time1').innerText = '___'
        }
    }
    document.getElementById('time1').innerText = time.value != '' ? time.value : '___'




    tenChucDanh.onkeyup = function (){
        document.getElementById('ten_chuc_danh1').innerText = tenChucDanh.value
        if(tenChucDanh.value == ''){
            document.getElementById('ten_chuc_danh1').innerText = '_____ [ghi đầy đủ tên của nhà thầu liên danh]'
        }
    }
    document.getElementById('ten_chuc_danh1').innerText = tenChucDanh.value != '' ? tenChucDanh.value : '_____ [ghi đầy đủ tên của nhà thầu liên danh]'




    tenGoiThau = document.getElementById('name_goi_thau_test')
    document.getElementById('name_goi_thau1').innerText = tenGoiThau.value

    tenDuAn = document.getElementById('name_du_an_test')
    document.getElementById('name_du_an1').innerText = tenDuAn.value



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
        dateBaolanh.value = date_ph.value != '' ? `${yP}-${mP}-${dP}` : ''
        document.getElementById('ngay_phat_hanh1').innerText = dateBaolanh.value != '' ?  String(dateBaolanh.value).slice(8, 10) + '/' + String(dateBaolanh.value).slice(5, 7) + '/' + String(dateBaolanh.value).slice(0, 4) : '___[ghi ngày phát hành bảo lãnh]'

    }
    document.getElementById('ngay_phat_hanh1').innerText = dateBaolanh.value != '' ?  String(dateBaolanh.value).slice(8, 10) + '/' + String(dateBaolanh.value).slice(5, 7) + '/' + String(dateBaolanh.value).slice(0, 4) : '___[ghi ngày phát hành bảo lãnh]'
    date_ph.value = dateBaolanh.value != '' ? `${String(dateBaolanh.value).slice(8, 10)}/${String(dateBaolanh.value).slice(5, 7)}/${String(dateBaolanh.value).slice(0, 4)}` : ''

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


    load();

    function load() {
        let data_list = ['name_goi_thau_test', 'name_du_an_test'];
        for (let i = 0; i < data_list.length; i++) {
            text_to_tem(data_list[i]);
        }
    }

    function text_to_tem(data) {
        var data1 = document.getElementById(data);
        if (!data1) {
            console.log(data);
            return;
        }
        data1.onkeyup = function () {
            document.getElementById(data.replace("_test", "1")).innerText = data1.value;
        }

        data1.onchange = function () {
            document.getElementById(data.replace("_test", "1")).innerText = data1.value;
        }

    }

    document.getElementById('save').onclick = function () {
        url = $('#detail_id').attr("data-url")
        data = {
            detail_id: detail_id.value,
            thong_tin_moi_thau: thongTinMoiThau1.value,
            ngay_phat_hanh: dateBaolanh.value,
            so_trich_yeu: soTrichYeu.value,
            thong_tin_phat_hanh: thongTinPhatHanh.value,
            name_nha_thau: tenNhaThau.value,
            so_trich_yeu1: soTrichYeu1.value,
            so_tien_bl : so_tien_bl.value,
            time: time.value,
            from_date: fromDate.value,
            so_tien_tt: so_tien_tt.value,
            name_chuc_danh: tenChucDanh.value
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


});
