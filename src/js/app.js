import '../scss/app.scss';
import './header';
import "./intro";
import "./pht";
import "./prs";
import './map';
import "./pr";
/* Your JS Code goes here */
import smoothscroll from 'smoothscroll-polyfill'
import IMask from 'imask';

const tel = document.querySelectorAll('input[name="tel"]');
const maskOptions = {
    mask: '+{7} (000) 000-00-00'
};

if (tel[0]) {
    tel.forEach(input => {
        const mask = IMask(input, maskOptions);
    })
}

// ordering
const orderingMethods = document.querySelectorAll(".ordering__delivery-list-item")
if (orderingMethods[0]) {
    const orderingMethodsName = document.querySelectorAll(".ordering__delivery-list-item-content-subtitle")
    let selectedDelivery = ""
    let selectedPayment = ""

    orderingMethods.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            orderingMethods.forEach(item => {
                item.classList.remove("active")
            })
            btn.classList.add("active")

        })
    })

    const orderingPaymentBtn = document.querySelectorAll(".ordering__payment-btn")
    const orderingPaymentBtnText = document.querySelectorAll(".ordering__payment-btn-text")
    orderingPaymentBtn.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            orderingPaymentBtn.forEach(item => {
                item.classList.remove("active")
            })
            btn.classList.add("active")

        })
    })

    const name = document.querySelector("[name='d-name']")
    const email = document.querySelector("[name='d-email']")
    const tel = document.querySelector("[name='d-tel']")


    // Проверка на ошибки
    const errorCheck = (element) => {
        if (element.classList.contains("error")) {
            element.classList.remove("error")
            element.nextElementSibling.remove()
        }
    }

    // Имя
    name.addEventListener("keyup", () => {
        errorCheck(name)
    })

    const checkName = () => {
        if (name.value.length === 0) {
            let warning = "Заполните поле"

            if (!name.classList.contains("error")) {
                name.parentElement.insertAdjacentHTML("beforeend", `<span class='text text-sm'>${warning}</span>`)
                console.log(name)
            }

            name.classList.add("error")

            return false
        } else {
            return true
        }
    }

    // Email
    email.addEventListener("keyup", () => {
        errorCheck(email)
    })

    const checkEmail = () => {
        const validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!email.value.match(validRegex)) {
            let warning = "Неверный Email"

            if (!email.classList.contains("error")) {
                email.parentElement.insertAdjacentHTML("beforeend", `<span class='text text-sm'>${warning}</span>`)
            }

            email.classList.add("error")

            return false
        } else {
            return true
        }
    }

    // Tel
    tel.addEventListener("keyup", () => {
        errorCheck(tel)
    })

    const maskOptions = {
        mask: '+{7} (000) 000-00-00'
    };
    const mask = IMask(tel, maskOptions);

    const checkTel = () => {
        if (tel.value.length < 18) {
            let warning = "Номер телефона должен быть в формате <br> +7 (XXX) XXX-XX-XX"

            if (!tel.classList.contains("error")) {
                tel.parentElement.insertAdjacentHTML("beforeend", `<span class='text text-sm'>${warning}</span>`)
            }

            tel.classList.add("error")

            return false
        } else {
            return true
        }
    }

    const smScroll = () => {
        const scrollTarget = document.querySelector('#order-who');
        const topOffset = 200;
        const elementPosition = scrollTarget.getBoundingClientRect().top;
        const offsetPosition = elementPosition - topOffset;

        window.scrollBy({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }

    const orderingSubmit = document.querySelector(".ordering__price-btn")
    orderingSubmit.addEventListener("click", () => {
        const checkers = [checkName(), checkEmail(), checkTel()]
        if (!checkers.includes(false)) {
            selectedDelivery = document.querySelector(".ordering__delivery-list-item.active .ordering__delivery-list-item-content-subtitle").innerText
            selectedPayment = document.querySelector(".ordering__payment-btn.active .ordering__payment-btn-text").innerText

            const orderingAdressInputs = [...document.querySelectorAll("[name='d-address']")]
            const comment = document.querySelector("[name='d-comment']").value

            const billingName = document.querySelector('[name="billing_first_name"]')
            const billingEmail = document.querySelector('[name="billing_email"]')
            const billingTel = document.querySelector('[name="billing_phone"]')
            const billingComment = document.querySelector('[name="order_comments"]')
            const billingAddress = document.querySelector('[name="billing_address_1"]')

            const addressVal = orderingAdressInputs.map((input, i) => {
                if (i === 1) {
                    return "квартира/офис " + input.value
                } else if (i === 2) {
                    return "подъезд " + input.value
                } else if (i === 3) {
                    return "этаж " + input.value
                } else if (i === 4) {
                    return "домофон " + input.value
                } else if (i === 0) {
                    return input.value
                }
            }).filter(val => val).join(", ")

            billingName.value = name.value
            billingEmail.value = email.value
            billingTel.value = tel.value
            billingAddress.value = addressVal
            billingComment.value = `Способ доставки: ${selectedDelivery}
Способ оплаты: ${selectedPayment}

Комментарий: ${comment}`

            setTimeout(() => {
                document.querySelector("[name='woocommerce_checkout_place_order']").click()
            }, 500)
        } else {
            smScroll()
        }
    })
}

// Плавный скролл для страницы. Предустановка npm install smoothscroll-polyfill для safari
document.querySelectorAll('a[href^="#"').forEach(link => {

    link.addEventListener('click', function (e) {
        e.preventDefault();

        let href = this.getAttribute('href').substring(1);

        const scrollTarget = document.getElementById(href);

        const topOffset = document.querySelector('.header').offsetHeight + 20;
        // const topOffset = 130; // если не нужен отступ сверху, либо число в px
        const elementPosition = scrollTarget.getBoundingClientRect().top;
        const offsetPosition = elementPosition - topOffset;

        window.scrollBy({
            top: offsetPosition,
            behavior: 'smooth'
        });
    });
});

const catalogFilterBtn = document.querySelector(".catalog__filter-btn")

if (catalogFilterBtn) {
    const catalogFilter = document.querySelector(".catalog__filter")
    catalogFilterBtn.addEventListener("click", () => {
        catalogFilter.classList.add("active")
    })

    const catalogFilterBtnClose = document.querySelector(".catalog__filter-top-close")
    catalogFilterBtnClose.addEventListener("click", () => {
        catalogFilter.classList.remove("active")
    })

    catalogFilter.addEventListener("click", (e) => {
        if (e.target.classList.contains("active")) {
            catalogFilter.classList.remove("active")
        }
    })

    // const catalogSortBtn = document.querySelector(".js-select-current")
    // const catalogSortBtns = document.querySelectorAll(".js-select-sort")
    // const catalogSort = document.querySelector(".js-dropdown")
    // catalogSortBtn.addEventListener("click", () => {
    //     catalogSort.classList.toggle("active")
    // })

    let dropdowns = document.querySelectorAll(".js-dropdown")

    if (dropdowns) {
        dropdowns.forEach(dropdown => {
            const btn = dropdown.children[0]
            const menu = dropdown.children[1]
            const menuItems = Array.from(menu.children)

            dropdown.addEventListener("click", (e) => {
                if (e.target.classList.contains("active")) {
                    dropdown.classList.remove("active")
                }
            })

            btn.addEventListener("click", () => {
                dropdown.classList.toggle("active")
                console.log(menu)
            })

            menuItems.forEach((item, index) => {
                const listBtn = item.children[0]

                listBtn.addEventListener("click", () => {
                    if (btn.children[0].innerText !== listBtn.innerText) {
                        const sortFilters = document.querySelectorAll("[data-filter-type='wpfSortBy'] input")

                        if (sortFilters.length !== 0) {
                            sortFilters[index].click()
                        }

                        btn.children[0].innerHTML = listBtn.innerText
                        menuItems.forEach(btn => {
                            btn.children[0].classList.remove("disabled")
                        })
                        listBtn.classList.add("disabled")
                    }

                    dropdown.classList.toggle("active")
                })

                if (document.querySelectorAll("[data-filter-type='wpfSortBy'] input").length !== 0) {
                    if (document.querySelectorAll("[data-filter-type='wpfSortBy'] input")[index].checked) {
                        btn.children[0].innerHTML = listBtn.innerHTML
                    }
                }
            })
        })
    }
}