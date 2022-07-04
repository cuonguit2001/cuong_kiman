$(document).ready(()=>{
    $(".form__products").on("click",function(e){
    e.preventDefault();
    let value =  handleSubmitForm("form__products");
    if(value){
      let $this_form = $('#form__products');
      $.ajax({
          type: 'post',
          url: kiman.site_url + '/wp-admin/admin-ajax.php',
          data: {
            action: 'add_form_contact',
            name_value: $this_form.find('input[name="name"]').val(),
            phonenumber_value: $this_form.find('input[name="phonenumber"]').val(),
            yourJob_value: $this_form.find('select[name="yourJob"]').val(),
            yourProduct_value: $this_form.find('input[name="yourProduct"]').val(),
            city_value: $this_form.find('input[name="city"]').val(),
            district_value: $this_form.find('input[name="district"]').val(),
            village_value: $this_form.find('input[name="village"]').val(),
            yourAddress_value: $this_form.find('input[name="yourAddress"]').val(),
            yourCurrent_value: $this_form.find('select[name="yourCurrent"]').val(),
            loanValue_value: $this_form.find('input[name="loanValue"]').val(),
            termValue_value: $this_form.find('select[name="termValue"]').val()
          },
          dataType: 'json',
          beforeSend: function() {
            $('.loading').show();
          },
          success: function(data) {
            if(data) {
              resetForm('form__products');
              $('.loading').hide();
              setTimeout(() => {
                $(".container__popup.popupSuccess").show();
              }, 350);
            }
              
          }
      });  
    }
  })
})