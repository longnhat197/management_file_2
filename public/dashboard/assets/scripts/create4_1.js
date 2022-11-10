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



    thongTinMoiThau = document.getElementById('thong_tin_moi_thau')
    thongTinMoiThau1 = document.getElementById('thong_tin_moi_thau_test')
    thongTinMoiThau.onchange = function () {
        let id = $('#thong_tin_moi_thau option:selected').attr("data-id")
        let url = $('#thong_tin_moi_thau option:selected').attr("data-url")

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: url,
            method: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            success: function (res) {
                thongTinMoiThau1.value = `${res.name}, ${res.address}`
                document.getElementById('thong_tin_moi_thau_test'.replace("_test", "1")).innerText = `${res.name}, ${res.address}`

            },
            error: function (xhr, ajaxOption, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        })

    }

    nameNhaThau = document.getElementById('name_nha_thau')
    nameNhaThau.onchange = function () {
        document.getElementById('name_nha_thau_test').value = nameNhaThau.value
        document.getElementById('name_nha_thau1').innerText = nameNhaThau.value
    }

    nameGoiThau = document.getElementById('name_goi_thau')
    nameGoiThau.onchange = function () {
        document.getElementById('name_goi_thau_test').value = nameGoiThau.value
        document.getElementById('name_goi_thau1').innerText = nameGoiThau.value
    }

    nameDuan = document.getElementById('name_du_an')
    nameDuan.onchange = function () {
        document.getElementById('name_du_an_test').value = nameDuan.value
        document.getElementById('name_du_an1').innerText = nameDuan.value
    }

    dateBaolanh = document.getElementById('ngay_phat_hanh_test')
    dateBaolanh.onchange = function () {
        Str_date = String(dateBaolanh.value);

        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('ngay_phat_hanh_test'.replace("_test", "1")).innerText = d + '/' + m + '/' + y
    }

    date = document.getElementById('date_test');
    date.onchange = function () {
        Str_date = String(date.value);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);
        document.getElementById('d').innerText = d
        document.getElementById('m').innerText = m
        document.getElementById('y').innerText = y

    }


    function select() {
        let dataList = ['#name_nha_thau', '#thong_tin_moi_thau', '#name_goi_thau', '#name_du_an'];
        for (let i = 0; i < dataList.length; i++) {
            $(dataList[i]).select2();
        }
    }

    load();

    function load() {
        let data_list = ['thong_tin_moi_thau_test', 'so_trich_yeu_test', 'so_trich_yeu1_test', 'thong_tin_phat_hanh_test', 'name_nha_thau_test', 'name_goi_thau_test', 'name_du_an_test', 'time_test', 'so_tien_test',
            'so_tien1_test', 'time_test', 'ten_chuc_danh_test','name_lien_danh_test'
        ];
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

    select();

});
