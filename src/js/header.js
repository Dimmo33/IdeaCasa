const header = document.querySelector(".js-header")

if (header) {
    const headerMenuToggle = document.querySelector(".js-header-menu-toggle")
    const headerClosedButton = document.querySelector(".js-header-bottom-btn")
    const headerCats = document.querySelectorAll(".js-header-cats")
    const headerCards = document.querySelectorAll(".js-header-cards")
    const headerBottomBack = document.querySelectorAll(".js-header-bottom-back")

    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });

    headerMenuToggle.addEventListener('click', () => {
        header.classList.toggle("open");
    });

    headerClosedButton.addEventListener('click', () => {
        header.classList.remove("open");
    });

    header.addEventListener('click', (event) => {
        console.log(event.target.classList)
        const classes = event.target.classList
        console.log(classes.contains("open"))
        if (classes.contains("open")) {
            header.classList.remove("open")
        }
    });


    headerBottomBack.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            headerCards[index].classList.remove("open")
        })
    })


    headerCats.forEach((item, index) => {
        console.log(item, index)
        if (window.innerWidth <= 920) {
            item.addEventListener('click', () => {
                // headerCats.forEach((clearItem) => {
                //     if (clearItem.classList.contains("open")) {
                //         clearItem.classList.remove("open")
                //     }
                // })
                // headerCards.forEach((clearItem) => {
                //     if (clearItem.classList.contains("open")) {
                //         clearItem.classList.remove("open")
                //     }
                // })
                headerCards[index].classList.add("open")
            });
        } else {
            item.addEventListener('mouseover', () => {
                headerCats.forEach((clearItem) => {
                    if (clearItem.classList.contains("active")) {
                        clearItem.classList.remove("active")
                    }
                })
                item.classList.add("active")
                headerCards.forEach((clearItem) => {
                    if (clearItem.classList.contains("active")) {
                        clearItem.classList.remove("active")
                    }
                })
                headerCards[index].classList.add("active")
            });
        }
    });

    const barBtn = document.querySelector(".bar__list-item-btn--menu")
    barBtn.addEventListener("click", () => {
        header.classList.toggle("open");
    })
}