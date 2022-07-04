
$(document).ready(function(){
    $(".popup_close , .popup__overlay").on("click",function(){
        $(".container__popup").hide();
    })
    $(".popup_btn-backhome").on("click", function() {
        window.location.href = "/"
    })
})