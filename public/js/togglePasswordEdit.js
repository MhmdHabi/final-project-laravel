document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector("#togglePassword");
    const toggleKonfirmasiPassword = document.querySelector(
        "#toggleKonfirmasiPassword"
    );
    const password = document.querySelector("#password");
    const konfirmasiPassword = document.querySelector("#konfirmasi_password");

    togglePassword.addEventListener("click", function () {
        const iconEye = document.querySelector("#iconEye");
        if (password.type === "password") {
            password.type = "text";
            iconEye.classList.remove("fa-eye-slash");
            iconEye.classList.add("fa-eye");
        } else {
            password.type = "password";
            iconEye.classList.remove("fa-eye");
            iconEye.classList.add("fa-eye-slash");
        }
    });
});
