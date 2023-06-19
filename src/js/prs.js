// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

const prs = document.querySelectorAll(".js-prs")
if (prs[0]) {
    prs.forEach(block => {
        const prsSliderLastClass = block.classList[block.classList.length - 1]

        const prsSlider = new Swiper(`.${prsSliderLastClass} .js-prs-slider`, {
            spaceBetween: 40,
            slidesPerView: 1,
            navigation: {
                nextEl: `.${prsSliderLastClass} .swiper-button-next`,
                prevEl: `.${prsSliderLastClass} .swiper-button-prev`,
            },
            pagination: {
                el: `.${prsSliderLastClass} .js-prs-fraction`,
                type: 'fraction',
            },
            breakpoints: {
                // when window width is >= 320px
                550: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                780: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
            }
        });
    })
}