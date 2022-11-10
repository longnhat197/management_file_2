$(document).ready(function () {
    //Tab cho textarea
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



    nameNhaThau = document.getElementById('name_nha_thau_test')
    nameNhaThau1 = document.getElementById('name_nha_thau')
    nameGoiThau = document.getElementById('name_goi_thau')
    nameDuAn = document.getElementById('name_du_an')
    nameMoiThau = document.getElementById('name_moi_thau');

    nameGoiThau.onchange = function () {
        document.getElementById('name_goi_thau_test').value = nameGoiThau.value

        document.getElementById('name_goi_thau_test'.replace("_test", "1")).innerText = nameGoiThau.value;
    }


    nameMoiThau.onchange = function () {
        document.getElementById('name_moi_thau_test').value = nameMoiThau.value
        document.getElementById('name_moi_thau_test'.replace("_test", "1")).innerText = nameMoiThau.value
    }

    nameNhaThau1.onchange = function () {
        nameNhaThau.value = nameNhaThau1.value
        document.getElementById('name_nha_thau11').innerText = nameNhaThau.value;
        document.getElementById('name_nha_thau_test'.replace("_test", "1")).innerText = nameNhaThau.value;

        let id = $("#name_nha_thau option:selected").attr("data-id");
        let url = $("#name_nha_thau option:selected").attr("data-url");

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
                document.getElementById('dia_chi_nha_thau_test').value = res.address;
                document.getElementById('dia_chi_nha_thau_test'.replace("_test", "1")).innerText = res.address

            },
            error: function (xhr, ajaxOption, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        })
    }
    thongTinDaiDien = document.getElementById('thong_tin_dai_dien')
    thongTinDaiDien.onchange =function(){
        let id1 = $("#thong_tin_dai_dien option:selected").attr("data-id1");
        let url1 = $("#thong_tin_dai_dien option:selected").attr("data-url1");

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: url1,
            method: "POST",
            data: {
                id: id1
            },
            dataType: 'json',
            success: function (res) {
                document.getElementById('thong_tin_dai_dien_test').value = `${res.name}, ${res.cmnd}, ${res.title} `
                document.getElementById('thong_tin_dai_dien_test'.replace("_test", "1")).innerText = `${res.name}, ${res.cmnd}, ${res.title}`
                document.getElementById('name_dai_dien_test').value = res.name;
                document.getElementById('name_dai_dien_test'.replace("_test", "1")).innerText = res.name;
            },
            error: function (xhr, ajaxOption, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        })
    }

    thongTinUQ = document.getElementById('thong_tin_nguoi_duoc_uy_quyen')
    thongTinUQ.onchange =function(){
        let id2 = $("#thong_tin_nguoi_duoc_uy_quyen option:selected").attr("data-id2");
        let url2 = $("#thong_tin_nguoi_duoc_uy_quyen option:selected").attr("data-url2");

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: url2,
            method: "POST",
            data: {
                id: id2
            },
            dataType: 'json',
            success: function (res) {
                document.getElementById('thong_tin_nguoi_duoc_uy_quyen_test').value = `${res.name}, ${res.cmnd}, ${res.title} `
                document.getElementById('thong_tin_nguoi_duoc_uy_quyen_test'.replace("_test", "1")).innerText = `${res.name}, ${res.cmnd}, ${res.title}`
                document.getElementById('name_uy_quyen_test').value = res.name;
                document.getElementById('name_uy_quyen_test'.replace("_test", "1")).innerText = res.name;
            },
            error: function (xhr, ajaxOption, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        })
    }


    nameNhaThau.onkeyup = function () {
        document.getElementById('name_nha_thau11').innerText = nameNhaThau.value;
        document.getElementById('name_nha_thau_test'.replace("_test", "1")).innerText = nameNhaThau.value;
    }


    nameDuAn.onchange = function () {
        document.getElementById('name_du_an_test').value = nameDuAn.value
        document.getElementById('name_du_an_test'.replace("_test", "1")).innerText = nameDuAn.value
    }

    date1 = document.getElementById('from_date_test');
    date1.onchange = function () {
        Str_date = String(date1.value);
        console.log(Str_date);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('from_date_test'.replace("_test", "1")).innerText = d + '/' + m + '/' + y
    }

    date2 = document.getElementById('to_date_test');
    date2.onchange = function () {
        Str_date = String(date2.value);
        console.log(Str_date);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('to_date_test'.replace("_test", "1")).innerText = d + '/' + m + '/' + y
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

        // data1.keyup(function(){
        //     document.getElementById(data1.replace("_test","1").text(data1.value));
        // })
    }

    load();

    function load() {
        let data_list = ['name_uy_quyen_test', 'name_dai_dien_test', 'name_moi_thau_test', 'name_du_an_test',
            'name_goi_thau_test', 'thong_tin_nguoi_duoc_uy_quyen_test', 'dia_chi_nha_thau_test',
            'thong_tin_dai_dien_test', 'address_test', 'chu_ky_duq_test', 'chu_ky_uq_test',
            'total_test', 'uq_giu_test', 'duq_giu_test', 'moi_thau_giu_test'
        ];
        for (let i = 0; i < data_list.length; i++) {
            text_to_tem(data_list[i]);
        }
    }

    function select() {
        let dataList = ['#name_nha_thau', '#name_goi_thau','#thong_tin_dai_dien','#thong_tin_nguoi_duoc_uy_quyen',
                        '#name_du_an','#name_moi_thau'];
        for (let i = 0; i < dataList.length; i++) {
            $(dataList[i]).select2();
        }
    }

    select();

});
