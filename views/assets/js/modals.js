document.addEventListener("DOMContentLoaded", () => {
    $(".close").click(function () {
        $("body").css("overflowY", "scroll");
        $(".modal").fadeOut();
    });

    $("#regPass2").change(function () {
        let pass1 = $("#regPass").val();
        let pass2 = $(this).val();

        if (pass1 != pass2) {
            $("#passError").fadeIn();
            $("#regBtn").attr("disabled", "disabled");
        } else {
            $("#passError").fadeOut();
            $("#regBtn").removeAttr("disabled");
        }
    });
});

function openModal(modal) {
    $(".modal").hide();
    $("#" + modal).fadeIn();
    $("#" + modal).css("overflowY", "scroll");
}

function delOrder(orderId) {
    openModal("delOrderModal");

    $("#delOrderModal input").val(orderId);
}

function delCat(orderId) {
    openModal("delCatModal");

    $("#delCatModal input").val(orderId);
}

function editOrder(orderId, stat) {
    openModal("editOrderModal");
    $("#newStat").change(function () {
        switch ($(this).val()) {
            case "Ремонтируется":
                $("#finishedPriceContainer").show();
                $("#finishedPrice").attr("required", "required");
                $("#finishedPhotoContainer").hide();
                $("#finishedPhoto").removeAttr("required");
                break;
            case "Отремонтировано":
                $("#finishedPhotoContainer").show();
                $("#finishedPhoto").attr("required", "required");
                $("#finishedPriceContainer").hide();
                $("#finishedPrice").removeAttr("required");
                break;
            default:
                $("#finishedPhotoContainer").hide();
                $("#finishedPhoto").removeAttr("required");
                $("#finishedPriceContainer").hide();
                $("#finishedPrice").removeAttr("required");
        }
    })

    $("#editOrderId").val(orderId);
    switch (stat) {
        case "Новая":
            document.querySelector("#newStat").innerHTML = `<option value="Новая">Новая</option>
        <option value="Ремонтируется">Ремонтируется</option>
        <option value="Отремонтировано">Отремонтировано</option>`;
            break;
        case "Ремонтируется":
            document.querySelector("#newStat").innerHTML = '<option value="Ремонтируется">Ремонтируется</option>';
            break;
        case "Отремонтировано":
            document.querySelector("#newStat").innerHTML = '<option value="Отремонтировано">Отремонтировано</option>';
            break;
    }

}