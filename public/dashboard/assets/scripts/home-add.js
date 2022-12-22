$(document).ready(function (){
    var b,c;
    dateTimeStart = document.getElementById('time_mo_thau');
    endTime = document.getElementById('time_dong_thau')
    nameGoiThau = document.getElementById('name_goi_thau')
    nameDuAn = document.getElementById('name_du_an')
    SoTBMT = document.getElementById('so_tbmt')
    nameMoiThau = document.getElementById('name_moi_thau')
    address = document.getElementById('address')
    a = document.getElementById('time_phat_hanh')
    PickTimeStart = document.getElementById('time_mo_thau_pick');
    PickTimeEnd = document.getElementById('time_dong_thau_pick');
    datePick = document.getElementById('datePick');

    var time2 = new Date(endTime.value)
    var time = dateTimeStart.value

    // dateTimeStart.onchange = function(){
    //     c = new Date(dateTimeStart.value).getTime()
    //     if(b < c ){
    //         alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
    //         endTime.value = 0
    //     }
    // }
    // endTime.onchange = function(){
    //     b = new Date(endTime.value).getTime()
    //     if(b < c ){
    //         alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
    //         endTime.value = 0
    //     }
    //     else if(b - c > 3600000){
    //         alertify.error('Thời gian đóng thầu so với mở thầu nhỏ hơn 1 tiếng')
    //         endTime.value = 0
    //     }

    // }

    if(!PickTimeStart.value){
        console.log('Không có dữ liệu')
    }

    $('#time_mo_thau_pick').datetimepicker({
        format: 'd/m/Y H:i',
        step:1

    });

    $('#time_dong_thau_pick').datetimepicker({
        format: 'd/m/Y H:i',
        step:1

    });
    $('#datePick').datetimepicker({
        format: 'd/m/Y',
        timepicker: false,
    });



    PickTimeStart.onchange = function(){
        dP = PickTimeStart.value.substr(0,2)
        mP = PickTimeStart.value.substr(3,2)
        yP = PickTimeStart.value.substr(6,4)
        hP = PickTimeStart.value.substr(11,2)
        iP = PickTimeStart.value.substr(14,2)
        //2022-12-13T09:58
        dateTimeStart.value = `${yP}-${mP}-${dP}T${hP}:${iP}`

        c = new Date(dateTimeStart.value).getTime()
        console.log(`c`, c);
        if(b < c ){
            alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
            endTime.value = 0
            PickTimeEnd.value =''
        }

    }

    PickTimeEnd.onchange = function(){
        dP = PickTimeEnd.value.substr(0,2)
        mP = PickTimeEnd.value.substr(3,2)
        yP = PickTimeEnd.value.substr(6,4)
        hP = PickTimeEnd.value.substr(11,2)
        iP = PickTimeEnd.value.substr(14,2)
        //2022-12-13T09:58
        endTime.value = `${yP}-${mP}-${dP}T${hP}:${iP}`

        b = new Date(endTime.value).getTime()
        if(b < c ){
            alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
            endTime.value = 0
            PickTimeEnd.value =''
        }
        else if(b - c > 3600000){
            alertify.error('Thời gian đóng thầu so với mở thầu nhỏ hơn 1 tiếng')
            endTime.value = 0
            PickTimeEnd.value =''
        }
    }


    datePick.onchange = function() {
        dP = datePick.value.substr(0,2)
        mP = datePick.value.substr(3,2)
        yP = datePick.value.substr(6,4)
        // date.value = $(this).val();
        a.value = `${yP}-${mP}-${dP}`;

    }

    $('.date-icon1').on('click', function() {
        $('#datePick').focus();
    })

    $('.date-icon2').on('click', function() {
        $('#time_mo_thau_pick').focus();
    })

    $('.date-icon3').on('click', function() {
        $('#time_dong_thau_pick').focus();
    })

});

function checkform(){

    if(!nameGoiThau.value){
        alertify.error('Không được để trống tên gói thầu')
        return false
    }else if(!nameDuAn.value){
        alertify.error('Không được để trống tên dự án')
        return false
    }else if(!nameMoiThau.value){
        alertify.error('Không được để trống tên bên mời thầu')
        return false
    }else if(!address.value){
        alertify.error('Không được để trống địa chỉ')
        return false
    }else if(!datePick.value){
        alertify.error('Không được để trống thời gian phát hành')
        return false
    }else if(!PickTimeStart.value){
        alertify.error('Không được để trống thời gian mở thầu')
        return false
    }else if(!PickTimeEnd.value){
        alertify.error('Không được để trống thời gian đóng thầu')
        return false
    }
}

