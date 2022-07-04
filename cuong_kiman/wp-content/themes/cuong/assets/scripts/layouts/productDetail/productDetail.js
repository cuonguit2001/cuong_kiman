
$(document).ready(()=>{
    $(".form__products").on("click",function(e){
        e.preventDefault();
      let value =  handleSubmitForm("form__products")
      if(value){
          setTimeout(() => {
            $(".container__popup.popupSuccess").show();
          }, 350);
      }
    })
})