
const innitSelect = (idForm)=>{
    let select_multi = $(`#${idForm} .form__select--item`);
    let index = 0;
    let checkShowSelect = false;
    $(document).on("click",`#${idForm} .input__readonly`,function(){
        if(!checkShowSelect){
            $(`#${idForm} .form__select-multi`).show();
            checkShowSelect = true;
        }else{
            $(`#${idForm} .form__select-multi`).hide();
            checkShowSelect = false;
        }
    })
    $(document).on("click", `#${idForm} .form__select--city`, function () {
        $(`#${idForm} .form__select--process-item`).eq(1).addClass("active");
        $(`#${idForm} .form__select--city`).removeClass("active");
        $(this).addClass("active");
        let province_code = $(this).data('id');
        $.ajax({
            type: 'get',
            url: kiman.site_url + '/wp-admin/admin-ajax.php',
            data: {
                action: 'get_list_city',
                province_code: province_code
            },
            dataType: 'html',
            beforeSend: function() {
            },
            success: function(data) {
                $(`#${idForm} .form_select_district`).html(data);
                select_multi.css({
                    transform: "translateX(-100%)"
                })
                $(`#${idForm} .line-process`).css({
                    width : `${100 / 3 * 2}%`
                })
                index++;
            }
        });
    })
    $(document).on("click", `#${idForm} .form__select--district`, function () {
        $(`#${idForm} .form__select--process-item`).eq(2).addClass("active")
        $(`#${idForm} .form__select--district`).removeClass("active");
        $(this).addClass("active");
        let district_code = $(this).data('id');
        $.ajax({
            type: 'get',
            url: kiman.site_url + '/wp-admin/admin-ajax.php',
            data: {
                action: 'get_list_town',
                district_code: district_code
            },
            dataType: 'html',
            beforeSend: function() {
            },
            success: function(data) {
                $(`#${idForm} .form_select_village`).html(data);
                select_multi.css({
                    transform: "translateX(-200%)"
                })
                $(`#${idForm} .line-process`).css({
                    width : `100%`
                })
                index++;
            }
        });
        
    })
    $(document).on("click", `#${idForm} .form__select--village`, function () {
        $(`#${idForm} .form__select--village`).removeClass("active");
        $(this).addClass("active");
        $(`#${idForm} .form__select-multi`).hide();
        checkShowSelect = false;
    })
    $(document).on("click", `#${idForm} .form__select--process-item`, function () {
        let i = $(this).index();
        switch (i) {
            case 0:
                select_multi.css({
                    transform: `translateX(0)`
                })
                $(".line-process").css({
                    width : `${100 / 3}%`
                })
                $(`#${idForm} .form__select--process-item`).removeClass("active");
                $(`#${idForm} .form__select--district`).removeClass("active");
                $(`#${idForm} .form__select--village`).removeClass("active");
                $(this).addClass("active");
                index = 0;
                break;
            case 1:
                if(index !==0 ){
                    select_multi.css({
                        transform: "translateX(-100%)"
                    })
                    $(`#${idForm} .form__select--process-item`).eq(2).removeClass("active");
                    $(`#${idForm} .form__select--village`).removeClass("active");
                    $(`#${idForm} .line-process`).css({
                        width : `${100 / 3 * 2}%`
                    })
                    index = 1;
                }
                break;
            default:
                break;
        }
    })
}

const  proto__getData = (element)=>{
    let id = $(element).attr("data-id");
    let value = $(element).attr("data-value");
    $(element).parent().prev().val(value);
    return {
        id, 
        value
    }
}

const proto__getDataIInput = (idForm)=>{
    let data = $(`#${idForm} input.fomr__select--value`);
    let dataShow = Array.from(data).map( item=> {
        return $(item).val();
    } ).join(" , ")
    $(`#${idForm} #yourCountry`).removeClass("error");
    $(`#${idForm} #yourCountry`).next('.noty__error').text("").hide();
    $(`#${idForm} #yourCountry`).next().next().css({
        top : "50%"
      })
    $(`#${idForm} #yourCountry`).val(dataShow);
    return dataShow;
}

const setDataInput = (idForm)=>{
    $(document).on("click", `#${idForm} .form__select--city`, function () {
        let value = proto__getData(this);
    })
    $(document).on("click", `#${idForm}  .form__select--district`, function () {
        let value = proto__getData(this);
    })
    $(document).on("click", `#${idForm}  .form__select--village`, function () {
        let value = proto__getData(this);
        let parent = $(this).closest();
        proto__getDataIInput(idForm);
    })
}


handleInputMoney(".loanValue");


