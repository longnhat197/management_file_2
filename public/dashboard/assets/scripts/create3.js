$(document).ready(function () {
    nameDaiDien = document.getElementById('name_dai_dien_test')
    chucVu = document.getElementById('chuc_vu_test')
    diaChi = document.getElementById('dia_chi_test')
    dienThoai = document.getElementById('dien_thoai_test')
    fax = document.getElementById('fax_test')
    email= document.getElementById('email_test')
    taiKhoan = document.getElementById('tai_khoan_test')
    maSoThue = document.getElementById('ma_so_thue_test')
    detail_id = document.getElementById('detail_id');
    soUyQuyen = document.getElementById('so_uy_quyen_test')
    datePick = document.getElementById('datePick')
    date = document.getElementById('date')
    can_cu = document.getElementById('can_cu_test')
    can_cu1 = document.getElementById('can_cu1_test')
    date1 = document.getElementById('date1_test')
    hinhThucKhac = document.getElementById('hinh_thuc_khac_test')
    noiDungKhac = document.getElementById('noi_dung_khac_test')
    chu_ky = document.getElementById('chu_ky_thanh_vien_test')
    nameGoiThau1 = document.getElementById('name_goi_thau_test')
    tenThanhVien = document.getElementById('ten_thanh_vien_test')
    date2 = document.getElementById('date2_test')
    nameLienDanh = document.getElementById('name_lien_danh_test')
    nameMotBen = document.getElementById('name_mot_ben_test')
    total = document.getElementById('total_test')
    moiBenGiu = document.getElementById('moi_ben_giu_test')
    chuKyDungDau = document.getElementById('chu_ky_dung_dau_test')
    noiLamGiay = document.getElementById('address_test')
    table_content = document.getElementById('table_content')




    let textareaList = ['hinh_thuc_khac_test', 'noi_dung_khac_test', 'ten_thanh_vien_test', 'chu_ky_thanh_vien_test', 'chu_ky_dung_dau_test']
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

    $("#datePick,#date_hsmt,#date_uq").datetimepicker({
        format: 'd/m/Y',
        timepicker: false,
    });
    $('.date_ttld').on('click', function () {
        $('#datePick').focus();
    })
    $('.date_hsmt').on('click', function () {
        $('#date_hsmt').focus();
    })
    $('.date_uq').on('click', function () {
        $('#date_uq').focus();
    })


    soUyQuyen.onkeyup = function () {
        document.getElementById('giay_uy_quyen').style.display = 'block';
        document.getElementById('so_uy_quyen1').innerText = soUyQuyen.value;
        if(soUyQuyen.value == ''){
            document.getElementById('giay_uy_quyen').style.display = 'none';
        }
    }

    document.getElementById('address1').innerText = noiLamGiay.value !='' ? noiLamGiay.value : '____'
    document.getElementById('can_cu1').innerText = can_cu.value !='' ? can_cu.value : '__ [Luật đấu thầu số 43/2013/QH13 ngày 26/11/2013 của Quốc hội];'
    document.getElementById('can_cu11').innerText = can_cu1.value !='' ? can_cu1.value : '____ [Nghị định số 63/2014/NĐ-CP ngày 26/6/2014 của Chính phủ về hướng dẫn thi hành Luật đấu thầu về lựa chọn nhà thầu];'
    document.getElementById('ten_thanh_vien1').innerText = tenThanhVien.value != '' ? tenThanhVien.value : '____[ghi tên từng thành viên liên danh]'
    document.getElementById('name_dai_dien1').innerText = nameDaiDien.value != '' ? nameDaiDien.value : '______________________________________________________'
    document.getElementById('chuc_vu1').innerText = chucVu.value != '' ? chucVu.value : '______________________________________________________________'
    document.getElementById('dia_chi1').innerText = diaChi.value != '' ? diaChi.value : '_______________________________________________________________'
    document.getElementById('dien_thoai1').innerText = dienThoai.value != '' ? dienThoai.value : '_____________________________________________________________'
    document.getElementById('fax1').innerText = fax.value != '' ? fax.value : '__________________________________________________________________'
    document.getElementById('email1').innerText = email.value != '' ? email.value : '________________________________________________________________'
    document.getElementById('tai_khoan1').innerText = taiKhoan.value != '' ? taiKhoan.value : '_____________________________________________________________'
    document.getElementById('ma_so_thue1').innerText = maSoThue.value!= '' ? maSoThue.value : '____________________________________________________________'
    document.getElementById('so_uy_quyen1').innerText = soUyQuyen.value != '' ? soUyQuyen.value : '____ ';
    document.getElementById('name_lien_danh1').innerText = nameLienDanh.value != '' ? nameLienDanh.value : '____[ghi tên của liên danh theo thỏa thuận].'
    document.getElementById('name_mot_ben1').innerText = nameMotBen.value != '' ? nameMotBen.value : '____[ghi tên một bên]'
    document.getElementById('total1').innerText = total.value != '' ? total.value : '__'
    document.getElementById('moi_ben_giu1').innerText = moiBenGiu.value != '' ? moiBenGiu.value : '__'
    document.getElementById('chu_ky_dung_dau1').innerText = chuKyDungDau.value != '' ? chuKyDungDau.value : '[ghi tên, chức danh, ký tên và đóng dấu]'
    document.getElementById('chu_ky_thanh_vien1').innerText = chu_ky.value != '' ? chu_ky.value : '[ghi tên từng thành viên, chức danh, ký tên và đóng dấu]'


    if(soUyQuyen.value == ""){
        document.getElementById('giay_uy_quyen').style.display = 'none';
    }else{
        document.getElementById('giay_uy_quyen').style.display = 'block';
    }






    datePick.onchange = function () {
        dP = datePick.value.substr(0, 2)
        mP = datePick.value.substr(3, 2)
        yP = datePick.value.substr(6, 4)
        // date.value = $(this).val();
        date.value = datePick.value != '' ? `${yP}-${mP}-${dP}` : '';

        document.getElementById('y').innerText = yP;
        document.getElementById('m').innerText = mP;
        document.getElementById('d').innerText = dP;

    }
    datePick.value = date.value != '' ? `${String(date.value).slice(8, 10)}/${String(date.value).slice(5, 7)}/${String(date.value).slice(0, 4)}` : ''

    date.onchange = function () {
        document.getElementById('y').innerText = String(date.value).slice(0, 4);
        document.getElementById('m').innerText = String(date.value).slice(5, 7);
        document.getElementById('d').innerText = String(date.value).slice(8, 10);


    }
    document.getElementById('y').innerText = date.value != '' ? String(date.value).slice(0, 4) : '____'
    document.getElementById('m').innerText = date.value != '' ? String(date.value).slice(5, 7) : '____'
    document.getElementById('d').innerText = date.value != '' ? String(date.value).slice(8, 10) : '____'


    load();

    document.getElementById('hinh_thuc_khac1').innerText = hinhThucKhac.value
    if(hinhThucKhac.value == ''){
        document.getElementById('hinhThucKhac').style.display = 'none'
    }else{
        document.getElementById('hinhThucKhac').style.display = 'block'
    }
    hinhThucKhac.onkeyup = function () {
        document.getElementById('hinhThucKhac').style.display = 'block'
        document.getElementById('hinh_thuc_khac1').innerText = hinhThucKhac.value
        if(hinhThucKhac.value == ''){
            document.getElementById('hinhThucKhac').style.display = 'none'
        }
    }



    document.getElementById('noi_dung_khac1').innerText = noiDungKhac.value
    if(noiDungKhac.value == ''){
        document.getElementById('noiDungKhac').style.display = 'none'
    }else{
        document.getElementById('noiDungKhac').style.display = 'block'
    }
    noiDungKhac.onkeyup = function () {
        document.getElementById('noiDungKhac').style.display = 'block'
        document.getElementById('noi_dung_khac1').innerText = noiDungKhac.value
        if(noiDungKhac.value == ''){
            document.getElementById('noiDungKhac').style.display = 'none'
        }
    }

    function load() {
        let data_list = ['address_test', 'can_cu_test', 'can_cu1_test', 'ten_thanh_vien_test',
            'name_lien_danh_test',  'name_mot_ben_test', 'chu_ky_dung_dau_test',
            'total_test', 'moi_ben_giu_test','name_dai_dien_test','chuc_vu_test', 'dia_chi_test','dien_thoai_test','fax_test',
            'email_test','tai_khoan_test','ma_so_thue_test',
        ];
        for (let i = 0; i < data_list.length; i++) {
            text_to_tem(data_list[i]);
        }
    }




    chu_ky.onkeyup = function () {
        value = $('#chu_ky_thanh_vien_test').val();
        document.getElementById('chu_ky_thanh_vien_test'.replace("_test", "1")).textContent = value;
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

    if (nameGoiThau1.value) {
        for (let i = 1; i <= 5; i++) {
            document.getElementById('name_goi_thau_test'.replace("_test", `${i}`)).innerText = nameGoiThau1.value;
        }
    }

    nameGoiThau1.onkeyup = function () {
        for (let i = 1; i <= 5; i++) {
            document.getElementById('name_goi_thau_test'.replace("_test", `${i}`)).innerText = nameGoiThau1.value;
        }
    }

    nameDuAn1 = document.getElementById('name_du_an_test')
    if (nameDuAn1.value) {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('name_du_an_test'.replace("_test", `${i}`)).innerText = nameDuAn1.value;
        }
    }

    nameDuAn1.onkeyup = function () {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('name_du_an_test'.replace("_test", `${i}`)).innerText = nameDuAn1.value;
        }
    }

    date_hsmt = document.getElementById('date_hsmt');

    date_hsmt.onchange =function(){
        dP = date_hsmt.value.substr(0,2)
        mP = date_hsmt.value.substr(3,2)
        yP = date_hsmt.value.substr(6,4)
        // date.value = $(this).val();

        date1.value = date_hsmt.value != '' ? `${yP}-${mP}-${dP}` : '';

        document.getElementById('d1').innerText = dP
        document.getElementById('m1').innerText = mP
        document.getElementById('y1').innerText = yP
    }

    document.getElementById('y1').innerText = date1.value != '' ? String(date1.value).slice(0, 4) : '____'
    document.getElementById('m1').innerText = date1.value != '' ? String(date1.value).slice(5, 7) : '____'
    document.getElementById('d1').innerText = date1.value != '' ? String(date1.value).slice(8, 10) : '____'
    date_hsmt.value = date1.value != '' ? `${String(date1.value).slice(8, 10)}/${String(date1.value).slice(5, 7)}/${String(date1.value).slice(0, 4)}` : ''


    date_uq = document.getElementById('date_uq');

    date_uq.onchange =function(){
        dP = date_uq.value.substr(0,2)
        mP = date_uq.value.substr(3,2)
        yP = date_uq.value.substr(6,4)
        // date.value = $(this).val();
        date2.value = date_uq.value != '' ? `${yP}-${mP}-${dP}`:''

        document.getElementById('d2').innerText = dP
        document.getElementById('m2').innerText = mP
        document.getElementById('y2').innerText = yP
    }

    document.getElementById('y2').innerText = date2.value != '' ? String(date2.value).slice(0, 4) : '____'
    document.getElementById('m2').innerText = date2.value != '' ? String(date2.value).slice(5, 7) : '____'
    document.getElementById('d2').innerText = date2.value != '' ? String(date2.value).slice(8, 10) : '____'
    date_uq.value = date2.value != '' ? `${String(date2.value).slice(8, 10)}/${String(date2.value).slice(5, 7)}/${String(date2.value).slice(0, 4)}` : ''


    data_table = document.getElementById('table_content_test');
    let editorChangeHandlerId;
    const tmp = tinymce.init({
        selector: 'textarea#table_content',
        height: 500,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | code' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        editor_selector: "mceEditor",
        table_use_colgroups: false,
        setup: function (editor) {
            editor.on('keyup', function () {
                data_table.innerHTML = tinyMCE.activeEditor.getContent();
            });
            editor.on('mousedown', function () {
                data_table.innerHTML = tinyMCE.activeEditor.getContent();
            });
        }
    }).then(function () {

        data_table_content = tinyMCE.get('table_content').getContent()
        data_table.innerHTML = data_table_content

    })
    if($('#table_content').hasClass('disabled')){
        tinymce.activeEditor.mode.set("readonly")
    }else{
        tinymce.activeEditor.mode.set("design")
    }
    // setTimeout(function () {
    //     data_table = document.getElementById('table_content');
    //     data_table_content = tinyMCE.get('table_content').getContent()
    //     console.log(data_table_content);
    // }, 2500)
    // date_table.onkeyup = function () {
    //     console.log(date_table);
    // }



    // function select() {
    //     let dataList = ['#name_goi_thau', '#name_du_an'];
    //     for (let i = 0; i < dataList.length; i++) {
    //         $(dataList[i]).select2();
    //     }
    // }

    // select();

    document.getElementById('save').onclick = function(){

        url = $('#detail_id').attr("data-url");
        data ={
            detail_id: detail_id.value,
            ngay_lam_giay: date.value,
            noi_lam_giay: noiLamGiay.value,
            can_cu: can_cu.value,
            can_cu1: can_cu1.value,
            date_hsmt: date1.value,
            ten_thanh_vien: tenThanhVien.value,
            name_dai_dien: nameDaiDien.value,
            chuc_vu: chucVu.value,
            dia_chi: diaChi.value,
            dien_thoai: dienThoai.value,
            fax: fax.value,
            email: email.value,
            tai_khoan: taiKhoan.value,
            ma_so_thue: maSoThue.value,
            so_uy_quyen: soUyQuyen.value,
            date_uq: date2.value,
            name_lien_danh: nameLienDanh.value,
            table_content: tinyMCE.activeEditor.getContent(),
            hinh_thuc_khac: hinhThucKhac.value,
            name_mot_ben: nameMotBen.value,
            noi_dung_khac: noiDungKhac.value,
            total: total.value,
            moi_ben_giu: moiBenGiu.value,
            chu_ky_dung_dau: chuKyDungDau.value,
            chu_ky_thanh_vien: chu_ky.value,
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
