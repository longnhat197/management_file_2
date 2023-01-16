

var b,c;
    dateTimeStart = document.getElementById('time_mo_thau');
    endTime = document.getElementById('time_dong_thau')
    nameGoiThau = document.getElementById('name_goi_thau')
    nameDuAn = document.getElementById('name_du_an')
    SoTBMT = document.getElementById('so_tbmt')
    nameMoiThau = document.getElementById('name_moi_thau')
    address = document.getElementById('address')
    a = document.getElementById('time_phat_hanh')

    c = new Date(dateTimeStart.value).getTime()
    b = new Date(endTime.value).getTime()


    var time2 = endTime.value
    var time = dateTimeStart.value

    dateTimeStart.onchange = function(){
        c = new Date(dateTimeStart.value).getTime()
        if(b < c ){
            alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
            endTime.value = 0
            PickTimeEnd.value =''
        }
    }
    var time_condition= Date.now() - b


    endTime.onchange = function(){


        b = new Date(endTime.value).getTime()
        if(b < c ){
            alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
            endTime.value = 0
            PickTimeEnd.value = ''
        }
        else if(b - c > 3600000){
            alertify.error('Thời gian đóng thầu so với mở thầu nhỏ hơn 1 tiếng')
            endTime.value = 0
            PickTimeEnd.value = ''
        }

    }
    PickTimeStart = document.getElementById('time_mo_thau_pick');
    PickTimeEnd = document.getElementById('time_dong_thau_pick');
    datePick = document.getElementById('datePick');

    datePick.value = a.value != '' ? `${String(a.value).slice(8, 10)}/${String(a.value).slice(5, 7)}/${String(a.value).slice(0, 4)}` : ''
    PickTimeStart.value = time != '' ? `${String(time).slice(8, 10)}/${String(time).slice(5, 7)}/${String(time).slice(0, 4)} ${String(time).slice(11,13)}:${String(time).slice(14,16)}` : ''
    PickTimeEnd.value = time2 != '' ? `${String(time2).slice(8, 10)}/${String(time2).slice(5, 7)}/${String(time2).slice(0, 4)} ${String(time2).slice(11,13)}:${String(time2).slice(14,16)}` : ''
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

    $('.date-icon1').on('click', function() {
        $('#datePick').focus();
    })

    $('.date-icon2').on('click', function() {
        $('#time_mo_thau_pick').focus();
    })

    $('.date-icon3').on('click', function() {
        $('#time_dong_thau_pick').focus();
    })

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
        }else if(!a.value){
            alertify.error('Không được để trống thời gian phát hành')
            return false
        }else if(!dateTimeStart.value){
            alertify.error('Không được để trống thời gian mở thầu')
            return false
        }else if(!endTime.value){
            alertify.error('Không được để trống thời gian đóng thầu')
            return false
        }else if(time_condition > 0){
            alertify.error('Đã quá thời gian đóng thầu không update được')
            return false
        }
    }
