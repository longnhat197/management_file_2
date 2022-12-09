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
    nameNhaThau1 = document.getElementById('name_nha_thau1')
    nameNhaThau1.innerText = nameNhaThau.value != '' ? nameNhaThau.value : '[ghi tên nhà thầu]'
    document.getElementById('name_nha_thau11').innerText = nameNhaThau.value != '' ? nameNhaThau.value : '[ghi tên nhà thầu]'

    nameGoiThau = document.getElementById('name_goi_thau_test')
    document.getElementById('name_goi_thau1').innerHTML = nameGoiThau.value;

    nameDuAn = document.getElementById('name_du_an_test')
    nameDuAn1 = document.getElementById('name_du_an1').innerHTML = nameDuAn.value

    nameMoiThau = document.getElementById('name_moi_thau_test');
    document.getElementById('name_moi_thau1').innerHTML = nameMoiThau.value

    diaChiNhaThau = document.getElementById('dia_chi_nha_thau_test')
    document.getElementById('dia_chi_nha_thau1').innerText = diaChiNhaThau.value != '' ? diaChiNhaThau.value : '[ghi địa chỉ của nhà thầu]'

    nameDaiDien = document.getElementById('name_dai_dien_test')
    document.getElementById('name_dai_dien1').innerText = nameDaiDien.value != '' ? nameDaiDien.value : '[ghi tên người đại diện theo pháp luật của nhà thầu]'

    nameUyQuyen = document.getElementById('name_uy_quyen_test')
    document.getElementById('name_uy_quyen1').innerText = nameUyQuyen.value != '' ? nameUyQuyen.value : '[ghi tên người được ủy quyền]'

    // nameGoiThau.onchange = function () {
    //     document.getElementById('name_goi_thau_test').value = nameGoiThau.value

    //     document.getElementById('name_goi_thau_test'.replace("_test", "1")).innerText = nameGoiThau.value;
    // }


    // nameMoiThau.onchange = function () {
    //     document.getElementById('name_moi_thau_test').value = nameMoiThau.value
    //     document.getElementById('name_moi_thau_test'.replace("_test", "1")).innerText = nameMoiThau.value
    // }

    // nameNhaThau1.onchange = function () {
    //     nameNhaThau.value = nameNhaThau1.value
    //     document.getElementById('name_nha_thau11').innerText = nameNhaThau.value;
    //     document.getElementById('name_nha_thau_test'.replace("_test", "1")).innerText = nameNhaThau.value;

    //     let id = $("#name_nha_thau option:selected").attr("data-id");
    //     let url = $("#name_nha_thau option:selected").attr("data-url");

    //     $.ajaxSetup({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //     });
    //     $.ajax({
    //         url: url,
    //         method: "POST",
    //         data: {
    //             id: id
    //         },
    //         dataType: 'json',
    //         success: function (res) {
    //             document.getElementById('dia_chi_nha_thau_test').value = res.address;
    //             document.getElementById('dia_chi_nha_thau_test'.replace("_test", "1")).innerText = res.address

    //         },
    //         error: function (xhr, ajaxOption, throwError) {
    //             alert(xhr.status);
    //             alert(throwError);
    //         }
    //     })
    // }
    thongTinDaiDien = document.getElementById('thong_tin_dai_dien_test')
    document.getElementById('thong_tin_dai_dien1').innerText = thongTinDaiDien.value != '' ? thongTinDaiDien.value : '____[ghi tên, số CMND hoặc số hộ chiếu,chức danh của người đại diện theo pháp luật của nhà thầu]'
    // thongTinDaiDien.onchange =function(){
    //     let id1 = $("#thong_tin_dai_dien option:selected").attr("data-id1");
    //     let url1 = $("#thong_tin_dai_dien option:selected").attr("data-url1");

    //     $.ajaxSetup({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //     });
    //     $.ajax({
    //         url: url1,
    //         method: "POST",
    //         data: {
    //             id: id1
    //         },
    //         dataType: 'json',
    //         success: function (res) {
    //             document.getElementById('thong_tin_dai_dien_test').value = `${res.name}, ${res.cmnd}, ${res.title} `
    //             document.getElementById('thong_tin_dai_dien_test'.replace("_test", "1")).innerText = `${res.name}, ${res.cmnd}, ${res.title}`
    //             document.getElementById('name_dai_dien_test').value = res.name;
    //             document.getElementById('name_dai_dien_test'.replace("_test", "1")).innerText = res.name;
    //         },
    //         error: function (xhr, ajaxOption, throwError) {
    //             alert(xhr.status);
    //             alert(throwError);
    //         }
    //     })
    // }

    thongTinDUQ = document.getElementById('thong_tin_nguoi_duoc_uy_quyen_test')
    document.getElementById('thong_tin_nguoi_duoc_uy_quyen1').innerText = thongTinDUQ.value != '' ? thongTinDUQ.value : '[ghi tên, số CMND hoặc số hộ chiếu, chức danh của người được ủy quyền]'
    // thongTinUQ.onchange =function(){
    //     let id2 = $("#thong_tin_nguoi_duoc_uy_quyen option:selected").attr("data-id2");
    //     let url2 = $("#thong_tin_nguoi_duoc_uy_quyen option:selected").attr("data-url2");

    //     $.ajaxSetup({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //     });
    //     $.ajax({
    //         url: url2,
    //         method: "POST",
    //         data: {
    //             id: id2
    //         },
    //         dataType: 'json',
    //         success: function (res) {
    //             document.getElementById('thong_tin_nguoi_duoc_uy_quyen_test').value = `${res.name}, ${res.cmnd}, ${res.title} `
    //             document.getElementById('thong_tin_nguoi_duoc_uy_quyen_test'.replace("_test", "1")).innerText = `${res.name}, ${res.cmnd}, ${res.title}`
    //             document.getElementById('name_uy_quyen_test').value = res.name;
    //             document.getElementById('name_uy_quyen_test'.replace("_test", "1")).innerText = res.name;
    //         },
    //         error: function (xhr, ajaxOption, throwError) {
    //             alert(xhr.status);
    //             alert(throwError);
    //         }
    //     })
    // }
    detail_id = document.getElementById('detail_id');

    nameNhaThau.onkeyup = function () {
        document.getElementById('name_nha_thau11').innerText = nameNhaThau.value;
        document.getElementById('name_nha_thau_test'.replace("_test", "1")).innerText = nameNhaThau.value;
    }

    address = document.getElementById('address_test');
    document.getElementById('address1').innerText = address.value != '' ? address.value : '_____'

    total = document.getElementById('total_test')
    document.getElementById('total1').innerText = total.value != '' ? total.value : '___'

    uqGiu = document.getElementById('uq_giu_test')
    document.getElementById('uq_giu1').innerText = uqGiu.value!= '' ? uqGiu.value : '___'

    duqGiu = document.getElementById('duq_giu_test')
    document.getElementById('duq_giu1').innerText = duqGiu.value!= '' ? duqGiu.value : '___'

    moiThauGiu = document.getElementById('moi_thau_giu_test')
    document.getElementById('moi_thau_giu1').innerText = moiThauGiu.value!= '' ? moiThauGiu.value : '___'

    chuKyDUQ = document.getElementById('chu_ky_duq_test')
    document.getElementById('chu_ky_duq1').innerHTML = chuKyDUQ.value != '' ? chuKyDUQ.value : `[ghi tên, chức danh, ký tên và đóng dấu<br>
    (nếu có)]`

    chuKyUQ = document.getElementById('chu_ky_uq_test')
    document.getElementById('chu_ky_uq1').innerHTML = chuKyUQ.value != '' ? chuKyUQ.value : `[ghi tên người đại diện theo pháp luật của nhà
        <br>thầu, chức danh, ký tên và đóng dấu]`

    // nameDuAn.onchange = function () {
    //     document.getElementById('name_du_an_test').value = nameDuAn.value
    //     document.getElementById('name_du_an_test'.replace("_test", "1")).innerText = nameDuAn.value
    // }


    date = document.getElementById('date');
    date.onchange = function () {
        document.getElementById('y').innerText = String(date.value).slice(0, 4);
        document.getElementById('m').innerText = String(date.value).slice(5, 7);
        document.getElementById('d').innerText = String(date.value).slice(8, 10);
    }
    document.getElementById('y').innerText = date.value != '' ? String(date.value).slice(0, 4) : '___'
    document.getElementById('m').innerText = date.value != '' ? String(date.value).slice(5, 7) : '___'
    document.getElementById('d').innerText = date.value != '' ? String(date.value).slice(8, 10) : '___'

    date1 = document.getElementById('from_date_test');
    date1.onchange = function () {
        Str_date = String(date1.value);
        // console.log(Str_date);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('from_date_test'.replace("_test", "1")).innerText = d + '/' + m + '/' + y
    }
    document.getElementById('from_date1').innerText = date1.value != '' ?  String(date1.value).slice(8, 10) + '/' + String(date1.value).slice(5, 7) + '/' + String(date1.value).slice(0, 4) : '____'

    date2 = document.getElementById('to_date_test');
    date2.onchange = function () {
        Str_date = String(date2.value);
        // console.log(Str_date);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);

        document.getElementById('to_date_test'.replace("_test", "1")).innerText = d + '/' + m + '/' + y
    }
    document.getElementById('to_date1').innerText = date2.value != '' ?  String(date2.value).slice(8, 10) + '/' + String(date2.value).slice(5, 7) + '/' + String(date2.value).slice(0, 4) : '____'


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
        let dataList = ['#name_nha_thau', '#name_goi_thau', '#thong_tin_dai_dien', '#thong_tin_nguoi_duoc_uy_quyen',
            '#name_du_an', '#name_moi_thau'
        ];
        for (let i = 0; i < dataList.length; i++) {
            $(dataList[i]).select2();
        }
    }

    select();

    save = document.getElementById('save');
    save.onclick = function () {
        url = $('#detail_id').attr("data-url");
        data = {
            detail_id: detail_id.value,
            date: date.value,
            noi_lam_giay: address.value,
            thong_tin_dai_dien: thongTinDaiDien.value,
            name_nha_thau: nameNhaThau.value,
            dia_chi_nha_thau: diaChiNhaThau.value,
            thong_tin_nguoi_duoc_uy_quyen: thongTinDUQ.value,
            name_dai_dien: nameDaiDien.value,
            name_uy_quyen: nameUyQuyen.value,
            from_date: date1.value,
            to_date: date2.value,
            total: total.value,
            uq_giu: uqGiu.value,
            duq_giu: duqGiu.value,
            moi_thau_giu: moiThauGiu.value,
            chu_ky_duq: chuKyDUQ.value,
            chu_ky_uq: chuKyUQ.value,
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
