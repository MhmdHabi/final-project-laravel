$(document).ready(function () {
    const togglePassword = $("#togglePassword");
    const toggleKonfirmasiPassword = $("#toggleKonfirmasiPassword");
    const password = $("#password");
    const konfirmasiPassword = $("#password_confirmation");

    togglePassword.on("click", function () {
        const $iconEye = $("#iconEye");
        if (password.attr("type") === "password") {
            password.attr("type", "text");
            iconEye.removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            password.attr("type", "password");
            iconEye.removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });

    toggleKonfirmasiPassword.on("click", function () {
        const $iconEyeKonfirmasi = $("#iconEyeKonfirmasi");
        if (konfirmasiPassword.attr("type") === "password") {
            konfirmasiPassword.attr("type", "text");
            iconEyeKonfirmasi.removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            konfirmasiPassword.attr("type", "password");
            iconEyeKonfirmasi.removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });
});
