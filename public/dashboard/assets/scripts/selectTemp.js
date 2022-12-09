$(document).ready(function () {
    cancel = $('#cancel');

    cancel.onclick = function () {
        url = $('#detail_id').attr("data-url");
        detail_id = $('#detail_id').val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: url,
            method: "POST",
            data: {
                detail_id: detail_id
            },
            dataType: 'json',
            success: function (res) {
                if(res == 'true'){

                }
            },
            error: function (xhr, ajaxOption, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        })
    }
})
