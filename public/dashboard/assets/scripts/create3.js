$(document).ready(function () {
    let textareaList = ['hinh_thuc_khac_test', 'noi_dung_khac_test', 'ten_thanh_vien_test','chu_ky_thanh_vien_test','chu_ky_dung_dau_test']
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


    load();

    function load() {
        let data_list = ['address_test', 'can_cu_test', 'can_cu1_test', 'name_lien_danh_test', 'so_uy_quyen_test', 'ten_thanh_vien_test',
            'name_lien_danh_test', 'noi_dung_khac_test', 'hinh_thuc_khac_test', 'name_mot_ben_test','chu_ky_dung_dau_test',
            'total_test', 'moi_ben_giu_test',
        ];
        for (let i = 0; i < data_list.length; i++) {
            text_to_tem(data_list[i]);
        }
    }

    chu_ky = document.getElementById('chu_ky_thanh_vien_test');
    chu_ky.onkeyup = function(){
        value = $('#chu_ky_thanh_vien_test').val();
        console.log(value);
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
    nameGoiThau = document.getElementById('name_goi_thau')
    nameGoiThau1 = document.getElementById('name_goi_thau_test')
    nameGoiThau.onchange = function () {
        nameGoiThau1.value = nameGoiThau.value
        for (let i = 1; i <= 5; i++) {
            document.getElementById('name_goi_thau_test'.replace("_test", `${i}`)).innerText = nameGoiThau1.value;
        }
    }
    nameGoiThau1.onkeyup = function () {
        for (let i = 1; i <= 5; i++) {
            document.getElementById('name_goi_thau_test'.replace("_test", `${i}`)).innerText = nameGoiThau1.value;
        }
    }

    nameDuAn = document.getElementById('name_du_an')
    nameDuAn1 = document.getElementById('name_du_an_test')
    nameDuAn.onchange = function () {
        nameDuAn1.value = nameDuAn.value
        for (let i = 1; i <= 4; i++) {
            document.getElementById('name_du_an_test'.replace("_test", `${i}`)).innerText = nameDuAn1.value;
        }
    }
    nameDuAn1.onkeyup = function () {
        for (let i = 1; i <= 4; i++) {
            document.getElementById('name_du_an_test'.replace("_test", `${i}`)).innerText = nameDuAn1.value;
        }
    }


    date1_test = document.getElementById('date1_test');
    date1_test.onchange = function () {
        Str_date = String(date1_test.value);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);
        document.getElementById('d1').innerText = d
        document.getElementById('m1').innerText = m
        document.getElementById('y1').innerText = y

    }

    date2_test = document.getElementById('date2_test');
    date2_test.onchange = function () {
        Str_date = String(date2_test.value);
        y = Str_date.slice(0, 4);
        m = Str_date.slice(5, 7);
        d = Str_date.slice(8, 10);
        document.getElementById('d2').innerText = d
        document.getElementById('m2').innerText = m
        document.getElementById('y2').innerText = y

    }

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
        editor_selector : "mceEditor",
        table_use_colgroups: false,
        setup: function(editor) {
            editor.on('keyup', function () {
                console.group();
                console.log(tinyMCE.activeEditor.getContent());
                console.groupEnd();

                data_table.innerHTML = tinyMCE.activeEditor.getContent();

            });
        }
    }).then(function () {

        data_table_content = tinyMCE.get('table_content').getContent()
        data_table.innerHTML = data_table_content

    })
    // setTimeout(function () {
    //     data_table = document.getElementById('table_content');
    //     data_table_content = tinyMCE.get('table_content').getContent()
    //     console.log(data_table_content);
    // }, 2500)
    // date_table.onkeyup = function () {
    //     console.log(date_table);
    // }



    function select() {
        let dataList = ['#name_goi_thau','#name_du_an'];
        for (let i = 0; i < dataList.length; i++) {
            $(dataList[i]).select2();
        }
    }

    select();
});
