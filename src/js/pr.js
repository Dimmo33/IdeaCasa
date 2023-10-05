const prAccBtns = document.querySelectorAll(".pr__chars-acc-list-item button")
if (prAccBtns[0]) {
    const prAccItems = document.querySelectorAll(".pr__chars-acc-list-item")
    const prAccLists = document.querySelectorAll(".pr__chars-acc-list-item ul")

    prAccBtns.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            const closeHeight = btn.clientHeight + 44
            const openHeight = prAccLists[index].scrollHeight + closeHeight + 22

            if (!prAccItems[index].classList.contains("active")) {
                prAccItems[index].style.height = openHeight + "px"
            } else {
                prAccItems[index].style.height = closeHeight + "px"
            }
            prAccItems[index].classList.toggle("active")
        })
    })
}

const preOrderToggle = document.querySelectorAll(".js-pre-order-popup-toggle")
if (preOrderToggle) {
    const preOrderPopup = document.querySelector(".js-pre-order")
    const preOrderClose = document.querySelector(".js-pre-order-close")
    const preOrderWa = document.querySelector(".js-pre-order-wa")
    preOrderToggle.forEach(btn => {
        btn.addEventListener("click", () => {
            preOrderPopup.classList.add("active")
            preOrderWa.setAttribute("href", `https://wa.me/79663330880?text=Здравствуйте! Меня интересует товар ${btn.dataset.name} с артикулом ${btn.dataset.sku}`)
        })
    })
    preOrderClose.addEventListener("click", () => {
        preOrderPopup.classList.remove("active")
    })

    preOrderPopup.addEventListener("click", (e) => {
        if (e.target.classList.contains("popup__content")) {
            preOrderPopup.classList.remove("active")
        }
    })
}

const popup = document.querySelector(".js-base-popup")
if (popup) {
    const popupToggle = document.querySelectorAll(".js-base-popup-toggle")
    const popupClose = document.querySelector(".js-base-popup-close")

    popupToggle.forEach(btn => {
        btn.addEventListener("click", () => {
            popup.classList.add("active")
        })
    })

    popupClose.addEventListener("click", () => {
        popup.classList.remove("active")
    })

    popup.addEventListener("click", (e) => {
        if (e.target.classList.contains("popup__content")) {
            popup.classList.remove("active")
        }
    })
}

const prCharsTitle = document.querySelectorAll(".pr__chars-title")
const prChars = document.querySelectorAll(".pr__chars")
if (prCharsTitle[0]) {
    prCharsTitle.forEach((title, i) => {
        title.addEventListener("click", () => {
            prChars[i].classList.toggle("open")
        })
    })
}
