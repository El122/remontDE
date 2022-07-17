document.addEventListener("DOMContentLoaded", () => {
    // анимация для изображений на главной странице
    $("#finishedOrders .imgBox").hover(function () {
        $(this).find($(".img1")).animate({
            top: "-=200"
        }, 1500)
        $(this).find($(".img2")).animate({
            top: "-=200"
        }, 1500)
    }, function () {
        $(this).find($(".img1")).animate({
            top: "+=200"
        }, 1500)
        $(this).find($(".img2")).animate({
            top: "+=200"
        }, 1500)
    })
    // анимация для изображений в личном кабинете
    $("#orders .imgBox.boxAnimate").hover(function () {
        $(this).find($(".img1")).animate({
            top: "-=230"
        }, 1500)
        $(this).find($(".img2")).animate({
            top: "-=230"
        }, 1500)
    }, function () {
        $(this).find($(".img1")).animate({
            top: "+=230"
        }, 1500)
        $(this).find($(".img2")).animate({
            top: "+=230"
        }, 1500)
    })

    // фильтр заказов

    $("#filter").change(function () {
        let toShow = $(this).val();
        $(".card").hide();
        $(".card." + toShow).fadeIn();
        if (toShow == "all") {
            $(".card").fadeIn();
        }
    })
});