const header = document.querySelector(".header")

window.addEventListener('scroll', function () {
    if (window.scrollY > 100) {
        header.classList.add("shadow");
    } else {
        header.classList.remove("shadow");
    }
});