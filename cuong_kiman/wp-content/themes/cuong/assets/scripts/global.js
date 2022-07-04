  $(function() {
  handleClickRegis();
  handleFormModalClick();
});

function debounce(func, wait) {
  var timeout;

  return function() {
    var context = this,
        args = arguments;

    var executeFunction = function() {
      func.apply(context, args);
    };

    clearTimeout(timeout);
    timeout = setTimeout(executeFunction, wait);
  };
};

const numberWithDot = (x)=>{
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function capitalizeFirstLetter(string) {
  return string.replace(/\s/g, '').charAt(0).toUpperCase() + string.slice(2);
}

const handleInputMoney = (element) => {
  var handleClick = debounce(function () {
    $(document).on("input", element , function (e) {
      let value = $(this).val();
      let valueRegex = value.toString().replace(/\./g,""); 
      if(Number(valueRegex)){
        valueDone = numberWithDot(valueRegex);
        $(this).val(valueDone);
        $(this).attr("data-value", valueRegex);
        let string = to_vietnamese(valueRegex)
        $(this).siblings(".loanWord").show()
        $(this).siblings(".loanWord").html(capitalizeFirstLetter(string))
      } else {
        $(this).siblings(".loanWord").hide()
        $(this).siblings(".loanWord").html("")
      }
    })
  }, 1000);
  handleClick()
}

const handleClickRegis = ()=>{
  $(document).on("click",".header__nav--item--button",function(e){
      e.preventDefault();
  })
  $(document).on("click",".nav__mobile--button",function(e){
    e.preventDefault();
  })
}

const handleFormModalClick = ()=>{
  $(".form__modal").on("click",function(e){
    e.preventDefault();
    let value = handleSubmitForm("form__modal")
    if(value){
      let $this_form = $('#form__modal');
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
              resetForm('form__modal');
              $('.loading').hide();
              setTimeout(() => {
                $(".container__popup.popupSuccess").show();
              }, 350);
            }
              
          }
      });  
    }
  })
}

