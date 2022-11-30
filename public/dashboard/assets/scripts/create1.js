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

    date = document.getElementById('d_test');
    date.onchange = function () {
        console.log(Str_date);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('d1').innerText = d;
        document.getElementById('m1').innerText = m;
        document.getElementById('y1').innerText = y;
    }

    soTrichYeu = document.getElementById('so_trich_yeu_test');
    soSuaDoi = document.getElementById('so_sua_doi_test');
    nameNhaThau = document.getElementById('name_nha_thau_test');
    timeThucHien = document.getElementById('date_thuc_hien_test');
    timeHieuLuc = document.getElementById('time_test');
    dateStart = document.getElementById('d_test');
    detail_id = document.getElementById('detail_id');
    chucDanh = document.getElementById('ten_chuc_danh_test');

    date1 = document.getElementById('date_test');
    date1.onchange = function () {
        Str_date = String(date1.value);

        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('date_test'.replace("_test", "1")).innerText = d + '/' + m + '/' + y

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
            dateStart: dateStart.value,
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
                alertify.set('notifier','position', 'top-center');
                alertify.success(res);

            },
            error: function (xhr, ajaxOption, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        })
    }

});
