$(document).ready(function () {
    $(".regist-form").hide();

    $("#btn-dont-have").click(function () {
        $(".login-form").fadeOut();
        $(".regist-form").fadeIn("slow");
    });
    $("#btn-have").click(function () {
        $(".regist-form").fadeOut();
        $(".login-form").fadeIn("slow");
    });
});
