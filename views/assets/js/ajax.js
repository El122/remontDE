document.addEventListener("DOMContentLoaded", () => {
    $("#regLogin").change(function () {
        let login = $(this).val();

        $.ajax({
            url: "/",
            method: "POST",
            data: { checkLogin: login },
            success: (res) => {
                if (res) {
                    $("#checkLoginError").fadeOut();
                    $("#regBtn").removeAttr("disabled");
                } else {
                    $("#checkLoginError").fadeIn();
                    $("#regBtn").attr("disabled", "disabled");
                }
            }
        });
    });

    $("#authForm").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();

        $.ajax({
            url: "/",
            method: "POST",
            data: data,
            success: (res) => {
                if (res) {
                    $("#loginError").fadeOut();
                    document.location.href = "/profile";
                } else {
                    $("#loginError").fadeIn();
                }
            }
        })
    });

    setInterval(() => {
        let counter = $(".counter");

        $.ajax({
            url: "/",
            method: "POST",
            data: { counter: counter.text() },
            success: (res) => {
                if (res != counter.text()) {
                    counter.fadeOut();
                    setTimeout(() => {
                        counter.text(res);
                        counter.fadeIn();
                    }, 500)
                }
            }
        })
    }, 3000)
});