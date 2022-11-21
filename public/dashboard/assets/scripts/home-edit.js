var b,c;
    dateTimeStart = document.getElementById('time_mo_thau');
    endTime = document.getElementById('time_dong_thau')
    nameGoiThau = document.getElementById('name_goi_thau')
    nameDuAn = document.getElementById('name_du_an')
    SoTBMT = document.getElementById('so_tbmt')
    nameMoiThau = document.getElementById('name_moi_thau')
    address = document.getElementById('address')
    a = document.getElementById('time_phat_hanh')


    var time2 = new Date(endTime.value)
    var time = new Date(dateTimeStart.value)

    dateTimeStart.onchange = function(){
        c = new Date(dateTimeStart.value).getTime()
        if(b < c ){
            alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
            endTime.value = 0
        }
    }
    endTime.onchange = function(){
        b = new Date(endTime.value).getTime()
        if(b < c ){
            alertify.error('Thời gian đóng thầu không được nhỏ hơn thời gian mở thầu')
            endTime.value = 0
        }
        else if(b - c > 3600000){
            alertify.error('Thời gian đóng thầu so với mở thầu nhỏ hơn 1 tiếng')
            endTime.value = 0
        }

    }


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
        }
    }
