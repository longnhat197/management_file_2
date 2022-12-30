$(document).ready(function () {
    nameNhathau = document.getElementById('name_nha_thau_test')
    ngayLam = document.getElementById('date')
    nameThanhVienLienDanh = document.getElementById('name_thanh_vien_lien_danh_test')

    detail_id = document.getElementById('detail_id')
    var current = 0


    $('input[type="radio"]').on('click', function (e) {
        current = e.target.value
        if (current == 0) {
            document.getElementById('check1').innerHTML = '&#x2611;'
            document.getElementById('check2').innerHTML = '&#x2610;'

        } else {
            document.getElementById('check1').innerHTML = '&#x2610;'
            document.getElementById('check2').innerHTML = '&#x2611;'
        }
    });

    check = document.querySelector('input[name="check"]:checked').value != '' ? document.querySelector('input[name="check"]:checked').value : 0
    if (check != '') {
        if (check == 0) {
            document.getElementById('check1').innerHTML = '&#x2611;'
            document.getElementById('check2').innerHTML = '&#x2610;'
        } else {
            document.getElementById('check1').innerHTML = '&#x2610;'
            document.getElementById('check2').innerHTML = '&#x2611;'
        }
    }


    nameNhathau.onkeyup = function () {
        document.getElementById('name_nha_thau1').innerText = this.value
        if (this.value == '') {
            document.getElementById('name_nha_thau1').innerText = '________________'
        }
    }
    document.getElementById('name_nha_thau1').innerText = nameNhathau.value != '' ? nameNhathau.value : '________________'

    if(nameThanhVienLienDanh.value == ''){
        document.getElementById('ten_thanh_vien').style.display = 'none'
    }else{
        document.getElementById('ten_thanh_vien').style.display = 'block'
    }
    nameThanhVienLienDanh.onkeyup = function () {
        console.log(nameThanhVienLienDanh.value);
        document.getElementById('ten_thanh_vien').style.display = 'block'
        document.getElementById('name_thanh_vien_lien_danh1').innerText = nameThanhVienLienDanh.value
        if(nameThanhVienLienDanh.value == ''){
            document.getElementById('ten_thanh_vien').style.display = 'none'
        }
    }

    document.getElementById('name_thanh_vien_lien_danh1').innerText = nameThanhVienLienDanh.value != '' ? nameThanhVienLienDanh.value : '________________'

    datePick = document.getElementById('datePick')
    datePick.onchange = function () {
        dP = datePick.value.substr(0, 2)
        mP = datePick.value.substr(3, 2)
        yP = datePick.value.substr(6, 4)
        // date.value = $(this).val();
        ngayLam.value = datePick.value != '' ? `${yP}-${mP}-${dP}` : '';
        document.getElementById('date1').innerText = ngayLam.value != '' ? String(ngayLam.value).slice(8, 10) + '/' + String(ngayLam.value).slice(5, 7) + '/' + String(ngayLam.value).slice(0, 4) : '_____________________'

    }

    document.getElementById('date1').innerText = ngayLam.value != '' ? String(ngayLam.value).slice(8, 10) + '/' + String(ngayLam.value).slice(5, 7) + '/' + String(ngayLam.value).slice(0, 4) : '_____________________'
    datePick.value = ngayLam.value != '' ? `${String(ngayLam.value).slice(8, 10)}/${String(ngayLam.value).slice(5, 7)}/${String(ngayLam.value).slice(0, 4)}` : ''

    $("#datePick").datetimepicker({
        format: 'd/m/Y',
        timepicker: false,
    })
    $('.date_ttld').on('click', function () {
        $('#datePick').focus();
    })







    data_table = document.getElementById('table_content_test')
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
        content_style: 'body { font-family:Times New Roman,Times,serif; font-size:16px }',
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
    if ($('#table_content').hasClass('disabled')) {
        tinymce.activeEditor.mode.set("readonly")
    } else {
        tinymce.activeEditor.mode.set("design")
    }

    document.getElementById('save').onclick = function () {
        url = $('#detail_id').attr("data-url")
        data = {
            detail_id: detail_id.value,
            name_nha_thau: nameNhathau.value,
            name_thanh_vien_lien_danh: nameThanhVienLienDanh.value,
            ngay_lam_giay: ngayLam.value,
            check: $('input[name=check]:checked', '#myForm').val(),
            table_content: tinyMCE.activeEditor.getContent(),
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
