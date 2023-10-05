const mapFrame = document.querySelectorAll(".js-map-frame")

const mapToggle = document.querySelectorAll(".js-map-toggle")

const mapCard = document.querySelectorAll(".js-map-card")


mapToggle.forEach((item, index) => {
    item.addEventListener('click', () => {
        item.classList.add("active")
        console.log(mapFrame[index])
        mapFrame.forEach((clearItem) => {
            if (clearItem.classList.contains("active")) {
                clearItem.classList.remove("active")
            }
        })
        item.classList.add("active")
        console.log(mapCard[index])
        mapCard.forEach((clearItem) => {
            if (clearItem.classList.contains("active")) {
                clearItem.classList.remove("active")
            }
        })
        mapFrame[index].classList.add("active")
        mapCard[index].classList.add("active")
    });
});