const header = document.querySelector(".js-header")

const headerMenuToggle = document.querySelector(".js-header-menu-toggle")

const headerClosedButton = document.querySelector(".js-header-bottom-btn")

const headerCats = document.querySelectorAll(".js-header-cats")

const headerCards = document.querySelectorAll(".js-header-cards")




window.addEventListener('scroll', function () {
    if (window.scrollY > 100) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});

headerMenuToggle.addEventListener('click', () =>{
	header.classList.toggle("open");
});

headerClosedButton.addEventListener('click', () =>{
	header.classList.remove("open");
});

header.addEventListener('click', (event) =>{
	console.log(event.target.classList)
	const classes = event.target.classList
	console.log(classes.contains("open"))
		if (classes.contains("open")) {
			header.classList.remove("open")
		}
});

headerCats.forEach((item, index) => {
	console.log(item, index)
	item.addEventListener('mouseover', () => {
		headerCats.forEach((clearItem) => {
			if (clearItem.classList.contains("active")) {
				clearItem.classList.remove("active")
			}
		})
		item.classList.add("active")
		console.log(headerCards[index])
		headerCards.forEach((clearItem) => {
			if (clearItem.classList.contains("active")) {
				clearItem.classList.remove("active")
			}
		})
			headerCards[index].classList.add("active")
	});

});



