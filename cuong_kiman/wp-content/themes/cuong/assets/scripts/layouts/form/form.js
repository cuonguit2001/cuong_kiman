
$(document).ready(function(){
    innitForm();
    $(".form__main").on("click",function(e){
        let value = handleSubmitForm("form__main")
        if(value){
            let $this = $(`#${idForm}`);
            $.ajax({
                type: 'get',
                url: kiman.site_url + '/wp-admin/admin-ajax.php',
                data: {
                    action: 'add_form_contact',
                    data: $this.serialize()
                },
                dataType: 'html',
                beforeSend: function() {
                },
                success: function(data) {
                    setTimeout(() => {
                      $(".container__popup.popupSuccess").show();
                    }, 350);
                }
            });
            
        }
    })
})

const innitForm = ()=>{
    let classList = $(".form__register").attr("class").split(" ");
    if(classList.includes("widgets")){
        $(".widgets .form-group").children().each(function(index , value){
            $(this).removeClass("col-sm-12 col-md-6 col-lg-6")
        })
    }
    $(".form__register").each( function (){
        let idForm = $(this).attr("id");
        innitSelect(idForm);
        setDataInput(idForm);
        resetErr(idForm)
    } )
}

const handleSubmitForm = (idForm)=>{
    let check = validateForm(idForm);
    if(check){
       return check;
    }
}