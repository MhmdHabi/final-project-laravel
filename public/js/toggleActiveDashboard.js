document.getElementById("menu-button").addEventListener("click", function () {
    var mobileMenu = document.getElementById("mobile-menu");
    if (mobileMenu.classList.contains("hidden")) {
        mobileMenu.classList.remove("hidden");
        this.innerHTML = '<i class="fas fa-times"></i>';
    } else {
        mobileMenu.classList.add("hidden");
        this.innerHTML = '<i class="fas fa-bars"></i>';
    }
});
