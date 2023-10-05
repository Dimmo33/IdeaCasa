// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

const introSwiper = new Swiper(".js-intro-slider", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    navigation: {
        nextEl: ".js-intro-slider .swiper-button-next",
        prevEl: ".js-intro-slider .swiper-button-prev",
    },
    pagination: {
        el: ".js-intro-slider .swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 4000,
    },
});

// all
if (window.innerWidth <= 550) {
    const cats2Swiper = new Swiper(".js-cats-slider", {
        spaceBetween: 20,
        slidesPerView: 2,
        navigation: {
            nextEl: ".js-cats-slider .swiper-button-next",
            // prevEl: ".js-intro-slider .swiper-button-prev",
        },
        // pagination: {
        //     el: ".js-intro-slider .swiper-pagination",
        //     clickable: true,
        // },
    });

    const intro = document.querySelector(".intro")
    if (intro) {
        intro.style.height = window.innerHeight - 60 + "px"
    }
}