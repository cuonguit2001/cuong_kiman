$(document).ready(()=>{
    $(".btn__ontop").on("click",function(){
        $(window).scrollTop(0);
    })
})
var btn = $(".btn__ontop");
$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});