
$(document).ready(function () {
    let x = screen.width;
    if(x > 768){
        $(window).on("scroll", function (e) {
            let screenHeight = screen.height;
            let heightParent = $(".product__main").outerHeight() - screenHeight;
            let heightContainer = $(".header__container").outerHeight();
            let heightTitle = $(".product__title")?.outerHeight();
            let breadCrumbHeight = $(".breadCrumb").outerHeight()
            let y = document.documentElement.scrollTop;
            let top = y - heightTitle - breadCrumbHeight - heightContainer;
            if(y <= heightParent){
                $(".form__sticky").css({
                    top : `${top}px`
                })
                if(y === 0){
                    $(".form__sticky").css({
                        top : `${y}px`
                    })
                }
            }
            else{
                $(".form__sticky").css({
                    top : `unset`,
                    bottom : '0'
                })
            }
        })
        $(".form__sticky").on("scroll",function(e){
            e.stopPropagation();
        })
    }
})