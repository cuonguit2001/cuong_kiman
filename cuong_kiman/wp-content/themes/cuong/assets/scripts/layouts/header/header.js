
$(document).ready(function () {
    handleShowMenu();
})

const handleShowMenu = () => {
    let activeMenu = false;
    $(".menu__mobile-icon").on("click", function () {
        if (!activeMenu) {
            $(".header__nav--mobile").slideDown();
            $("#line1").css({
                transform: "translateY(6px) rotate(45deg)"
            })
            $("#line2").css({
                display: "none"
            })
            $("#line3").css({
                transform: "translateY(-4px) rotate(-45deg)"
            })
            activeMenu = true;
        }else{
            $(".header__nav--mobile").slideUp();
            $("#line1").css({
                transform: "unset"
            })
            $("#line2").css({
                display: "unset"
            })
            $("#line3").css({
                transform: "unset"
            })
            activeMenu = false;
        }
       
    })
}