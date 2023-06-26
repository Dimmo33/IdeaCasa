const prAccBtns = document.querySelectorAll(".pr__chars-acc-list-item button")
if (prAccBtns[0]) {
    const prAccItems = document.querySelectorAll(".pr__chars-acc-list-item")
    const prAccLists = document.querySelectorAll(".pr__chars-acc-list-item ul")

    prAccBtns.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            const closeHeight = btn.clientHeight + 44
            const openHeight = prAccLists[index].scrollHeight + closeHeight

            if (!prAccItems[index].classList.contains("active")) {
                prAccItems[index].style.height = openHeight + "px"
            } else {
                prAccItems[index].style.height = closeHeight + "px"
            }
            prAccItems[index].classList.toggle("active")
        })
    })
}