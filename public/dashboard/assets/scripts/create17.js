$(document).ready(function () {

    detail_id = document.getElementById('detail_id')
    nameChucDanh = document.getElementById('name_chuc_danh_test')

    nameChucDanh.onkeyup = function (){
        document.getElementById('name_chuc_danh1').innerText = nameChucDanh.value
        if(nameChucDanh.value == ''){
            document.getElementById('name_chuc_danh1').innerText = '[ghi tên, chức danh, ký tên và đóng dấu]'
        }
    }
    document.getElementById('name_chuc_danh1').innerText = nameChucDanh.value != '' ? nameChucDanh.value : '[ghi tên, chức danh, ký tên và đóng dấu]'

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
        content_style: 'body { font-family:Times New Roman,Times,serif; font-size:14px }',
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
            table_content: tinyMCE.activeEditor.getContent(),
            name_chuc_danh: nameChucDanh.value,
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
