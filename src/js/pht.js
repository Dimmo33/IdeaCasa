const phtPoints = document.querySelectorAll(".js-pht-tt-btn")
if (phtPoints[0]) {
    const phtCards = document.querySelectorAll(".js-pht-tt-card")
    const phtCardsBtnClose = document.querySelectorAll(".js-pht-tt-card-close")

    const togglePoint = (point) => {
        if (point.classList.contains("active")) {
            point.classList.add("closed")
            setTimeout(() => {
                point.classList.remove("closed")
                point.classList.remove("active")
            }, 600)
        } else {
            point.classList.toggle("active")
        }
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