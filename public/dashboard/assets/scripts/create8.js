$(document).ready(function() {

    nameNhathau = document.getElementById('name_nha_thau_test')
    date = document.getElementById('date')
    address = document.getElementById('address_test')
    detail_id = document.getElementById('detail_id')

    address.onkeyup = function () {
        document.getElementById('address1').innerText = this.value
        if (this.value == '') {
            document.getElementById('address1').innerText = '___'
        }
    }
    document.getElementById('address1').innerText = address.value != '' ? address.value : '___'


    nameNhathau.onkeyup = function () {
        document.getElementById('name_nha_thau1').innerText = this.value
        if (this.value == '') {
            document.getElementById('name_nha_thau1').innerText = '____[ghi tên đầy đủ của nhà thầu]'
        }
    }
    document.getElementById('name_nha_thau1').innerText = nameNhathau.value != '' ? nameNhathau.value : '____[ghi tên đầy đủ của nhà thầu]'

    datePick = document.getElementById('datePick')
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
    document.getElementById('y').innerText = date.value != '' ? String(date.value).slice(0, 4) : '____'
    document.getElementById('m').innerText = date.value != '' ? String(date.value).slice(5, 7) : '____'
    document.getElementById('d').innerText = date.value != '' ? String(date.value).slice(8, 10) : '____'

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
            date: date.value,
            address: address.value,
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
