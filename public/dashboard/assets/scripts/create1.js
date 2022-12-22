$(document).ready(function () {
    const textarea = document.querySelector('textarea')

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

    function select() {
        let dataList = ['#name_goi_thau', '#name_du_an', '#name_moi_thau', '#name_nha_thau'];
        for (let i = 0; i < dataList.length; i++) {
            $(dataList[i]).select2();
        }
    }

    select();
    load();

    function load() {
        let data_list = ['name_du_an_test', 'name_moi_thau_test', 'so_trich_yeu_test', 'so_sua_doi_test',
            'name_nha_thau_test', 'date_thuc_hien_test', 'time_test', 'ten_chuc_danh_test'
        ];
        for (let i = 0; i < data_list.length; i++) {
            text_to_tem(data_list[i]);
        }
    }
    nameGoiThau1 = document.getElementById('name_goi_thau_test')

    document.querySelector('.name_goi_thau11').innerText = nameGoiThau1.value;
    document.getElementById('name_goi_thau_test'.replace("_test", "1")).innerText = nameGoiThau1.value



    nameGoiThau1.onkeyup = function () {
        document.querySelector('.name_goi_thau11').innerText = nameGoiThau1.value;
        document.getElementById('name_goi_thau_test'.replace("_test", "1")).innerText = nameGoiThau1.value

    }

    $("#datePick,#date_start").datetimepicker({
        format: 'd/m/Y',
        timepicker: false,
    });
    $('.date_ttld').on('click', function () {
        $('#datePick').focus();
    })
    $('.date_start').on('click', function () {
        $('#date_start').focus();
    })

    date = document.getElementById('d_test');
    dateStart = document.getElementById('date_start');
    dateStart.onchange = function () {
        dP = dateStart.value.substr(0, 2)
        mP = dateStart.value.substr(3, 2)
        yP = dateStart.value.substr(6, 4)
        // date.value = $(this).val();
        date.value = dateStart.value != '' ? `${yP}-${mP}-${dP}` : '';
        document.getElementById('d1').innerText = dP
        document.getElementById('m1').innerText = mP
        document.getElementById('y1').innerText = yP


    }
    document.getElementById('y1').innerText = date.value != '' ? String(date.value).slice(0, 4) : '____'
    document.getElementById('m1').innerText = date.value != '' ? String(date.value).slice(5, 7) : '____'
    document.getElementById('d1').innerText = date.value != '' ? String(date.value).slice(8, 10) : '____'
    dateStart.value = date.value != '' ? `${String(date.value).slice(8, 10)}/${String(date.value).slice(5, 7)}/${String(date.value).slice(0, 4)}` : ''



    date.onchange = function () {
        Str_date = String(date.value);
        console.log(Str_date);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('d1').innerText = d;
        document.getElementById('m1').innerText = m;
        document.getElementById('y1').innerText = y;
    }

    soTrichYeu = document.getElementById('so_trich_yeu_test');
    document.getElementById('so_trich_yeu1').innerHTML = soTrichYeu.value != '' ? soTrichYeu.value : '[ghi số trích yếu của Thư mời thầu đối với đấu thầu hạn chế]'

    soSuaDoi = document.getElementById('so_sua_doi_test');


    nameNhaThau = document.getElementById('name_nha_thau_test');
    document.getElementById('name_nha_thau1').innerText = nameNhaThau.value != ''
        ? nameNhaThau.value : '____[ghi tên nhà thầu]'


    timeThucHien = document.getElementById('date_thuc_hien_test');
    document.getElementById('date_thuc_hien1').innerText = timeThucHien.value != '' ? timeThucHien.value : '___'

    timeHieuLuc = document.getElementById('time_test');
    document.getElementById('time1').innerText = timeHieuLuc.value != '' ? timeHieuLuc.value : '___'


    document.getElementById('m1').innerText = date.value != '' ? String(date.value).slice(5, 7) : '___'
    document.getElementById('y1').innerText = date.value != '' ? String(date.value).slice(0, 4) : '___'
    document.getElementById('d1').innerText = date.value != '' ? String(date.value).slice(8, 10) : '___'


    detail_id = document.getElementById('detail_id');
    chucDanh = document.getElementById('ten_chuc_danh_test');

    date1 = document.getElementById('date_test');
    datePick = document.getElementById('datePick');
    datePick.onchange = function () {
        dP = datePick.value.substr(0, 2)
        mP = datePick.value.substr(3, 2)
        yP = datePick.value.substr(6, 4)
        // date.value = $(this).val();
        date1.value = datePick.value != '' ? `${yP}-${mP}-${dP}` : '';
        document.getElementById('date1').innerText = date1.value != '' ?  String(date1.value).slice(8, 10) + '/' + String(date1.value).slice(5, 7) + '/' + String(date1.value).slice(0, 4) : '[ghi ngày tháng năm ký đơn dự thầu]'


    }
    datePick.value = date1.value != '' ? `${String(date1.value).slice(8, 10)}/${String(date1.value).slice(5, 7)}/${String(date1.value).slice(0, 4)}` : ''
    document.getElementById('date1').innerText = date1.value != '' ?  String(date1.value).slice(8, 10) + '/' + String(date1.value).slice(5, 7) + '/' + String(date1.value).slice(0, 4) : '[ghi ngày tháng năm ký đơn dự thầu]'

    if(soSuaDoi.value == ''){
        document.getElementById('so_sua_doi').style.display = 'none'
    }else{
        document.getElementById('so_sua_doi').style.display = 'inline'
    }

    soSuaDoi.onkeyup = function(){
        document.getElementById('so_sua_doi').style.display = 'inline'
        document.getElementById('so_sua_doi1').innerText = soSuaDoi.value
        if(soSuaDoi.value == ''){
            document.getElementById('so_sua_doi').style.display = 'none'
        }
    }


    if(soTrichYeu.value == ''){
        document.getElementById('so_trich_yeu').style.display = 'none'
    }else{
        document.getElementById('so_trich_yeu').style.display = 'block'
    }
    soTrichYeu.onkeyup = function(){
        document.getElementById('so_trich_yeu').style.display = 'block'
        document.getElementById('so_trich_yeu1').innerText = soTrichYeu.value
        if(soTrichYeu.value == ''){
            document.getElementById('so_trich_yeu').style.display = 'none'
        }
    }

    nameDuAn = document.getElementById('name_du_an_test');
    document.getElementById('name_du_an_test'.replace("_test", "1")).innerText = nameDuAn.value
    nameDuAn.onchange = function () {
        document.getElementById('name_du_an_test').value = nameDuAn.value
        document.getElementById('name_du_an_test'.replace("_test", "1")).innerText = nameDuAn.value
    }

    nameMoiThau = document.getElementById('name_moi_thau_test');
    document.getElementById('name_moi_thau_test'.replace("_test", "1")).innerText = nameMoiThau.value



    function text_to_tem(data) {
        var data1 = document.getElementById(data);
        if (!data1) {
            console.log(data);
            return;
        }

        data1.onchange = function () {
            document.getElementById(data.replace("_test", "1")).innerText = data1.value;

        }
        data1.onkeyup = function () {
            document.getElementById(data.replace("_test", "1")).innerText = data1.value;

        }

        // data1.keyup(function(){
        //     document.getElementById(data1.replace("_test","1").text(data1.value));
        // })
    }
    save = document.getElementById('save');
    save.onclick = function () {
        url = $('#detail_id').attr("data-url");
        data = {
            date1: date1.value,
            soTrichYeu: soTrichYeu.value,
            soSuaDoi: soSuaDoi.value,
            nameNhaThau: nameNhaThau.value,
            timeThucHien: timeThucHien.value,
            timeHieuLuc: timeHieuLuc.value,
            dateStart: date.value,
            detail_id: detail_id.value,
            chucDanh: chucDanh.value,
        }

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
