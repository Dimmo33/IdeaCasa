// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

const phSlider = new Swiper(".js-ph-slider", {
    spaceBetween: 0,
    effect: "fade",
    loop: true,
    // autoplay: {
    //     delay: 4000,
    // },
    navigation: {
        nextEl: ".js-ph-slider .swiper-button-next",
        prevEl: ".js-ph-slider .swiper-button-prev",
    },
    pagination: {
        el: ".js-ph-slider .swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 5000,
    },
});

const phtPoints = document.querySelectorAll(".js-pht-tt-btn")
if (phtPoints[0]) {
    const phtCards = document.querySelectorAll(".js-pht-tt-card")
    const phtCardsBtnClose = document.querySelectorAll(".js-pht-tt-card-close")

    const togglePoint = (point) => {
        if (window.innerWidth <= 550) {
            const main = document.querySelector(".main")
            const card = point.nextElementSibling
            if (card) {
                main.insertAdjacentElement("afterbegin", card)
                document.querySelector("body").classList.toggle("no-scroll")
                document.querySelector(".main > .pht__tt-card").classList.add("active")
                document.querySelector(".main > .pht__tt-card").children[0].addEventListener("click", () => {
                    document.querySelector(".main > .pht__tt-card").classList.add("closed")
                    setTimeout(() => {
                        document.querySelector(".main > .pht__tt-card").classList.remove("closed")
                        document.querySelector(".main > .pht__tt-card").classList.remove("active")
                        point.insertAdjacentElement("afterend", card)
                        document.querySelector("body").classList.toggle("no-scroll")
                    }, 600)
                })
            }
        } else {
            phtPoints.forEach(btn => {
                if (btn.classList.contains("active")) {
                    btn.classList.add("closed")
                    setTimeout(() => {
                        btn.classList.remove("closed")
                        btn.classList.remove("active")
                    }, 600)
                }
            })

            point.classList.add("active")
        }

        // if (point.classList.contains("active")) {

        // } else {

        // }
    }

    phtPoints.forEach((point, index) => {
        point.addEventListener("click", () => {
            togglePoint(point)
        })

        phtCardsBtnClose[index].addEventListener("click", () => {
            togglePoint(point)
        })
    })
}