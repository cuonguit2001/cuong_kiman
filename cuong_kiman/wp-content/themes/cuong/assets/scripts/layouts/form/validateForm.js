
const errorArr = {
    name : "Vui lòng nhập họ tên !",
    phonenumber : "Vui lòng nhập số điện thoại   !",
    yourJob : "Vui lòng chọn nghề nghiệp !",
    yourProduct : "Vui lòng nhập mặt hàng kinh doanh !",
    yourCountry : "Vui lòng chọn địa chỉ kinh doanh !",
    yourAddress : "Vui lòng nhập số nhà và tên đường !",
    yourCurrent : "Vui lòng chọn !",
    loanValue : "Vui lòng nhập số tiền cần vay !",
    termValue : "Vui lòng chọn thời hạn !",
}

const validateForm = (formID)=>{
    const arrFiel = ["name","phonenumber","yourJob","yourProduct","yourAddress","yourCurrent","loanValue","termValue"];

    let input = $(`#${formID} input`);
    let select = $(`#${formID} select`)
    
    let arrInput = Array.from(input);
    let arrSelect = Array.from(select);

    for (let i = 0; i < arrInput.length; i++) {
        let name = $(arrInput[i]).attr("name");
        let value = $(arrInput[i]).val();
        if(!value){
            $(arrInput[i]).addClass("error");
            $(arrInput[i]).next().next().css({
                top : "30%"
              })
            $(arrInput[i]).next('.noty__error').text(errorArr[name]).show();
            return false;
        }else{
            $(arrInput[i]).removeClass("error");
            $(arrInput[i]).next('.noty__error').text("").hide();
        }
    }

    for (let i = 0; i < arrSelect.length; i++) {
        let name = $(arrSelect[i]).attr("name");
        let value = $(arrSelect[i]).val();
        if(!value){
            $(arrSelect[i]).next().find(".select2-selection__rendered").addClass("error");
            $(arrSelect[i]).parent().find(".noty__error").text(errorArr[name]).show();
            return false;
        }else{
            $(arrSelect[i]).next().find(".select2-selection__rendered").removeClass("error");
            $(arrSelect[i]).parent().find(".noty__error").text("").hide();
        }
    }

    let inputValue =  arrInput.map( item=>{
        let value = $(item).val();
        let name = $(item).attr("name");
        return {
            [name] : value
        }
    } ) 

    let selectValue = arrSelect.map(item=>{
        let value = $(item).val();
        let name = $(item).attr("name");
        return {
            [name] : value
        }
    })
    return inputValue.concat(selectValue);
}


const resetErr = (formID)=>{
    let input = $(`#${formID} input`);
    let select = $(`#${formID} select`)
    input.each( function(item){
       $(this).on("change",function(){
        $(this).removeClass("error");
        $(this).next('.noty__error').text("").hide();
       })
    })
    select.each(function(item){
        $(this).on("change",function(){
            $(this).next().find(".select2-selection__rendered").removeClass("error");
            $(this).parent().find(".noty__error").text("").hide();
        })
    })
}

const resetForm = (formID)=>{
    document.querySelector(`#${formID}`).reset();
    $(".form__select--process-item").eq(0).trigger("click");
    $(`#${formID} select`).each( function(){
        $(this).select2('val', 0)
    } )
}