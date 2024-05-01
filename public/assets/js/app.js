import render from './cart/render.js';
import add from '../js/cart/add.js';
import slider from './slider.js';
import toogleNavbarCart from './navbarCart.js';

window.onload = () => {
    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    const headerElement = document.querySelector(".scroll-header") ?? null

    window.addEventListener("scroll", () => {
        if(window.scrollY > 0 && headerElement) headerElement?.classList.add("activate")
        else headerElement.classList.remove("activate")
    })

    // const travelsInCart = async () => {
    //     const travels = await fetch('http://localhost:9000/cart');
    //     return await travels.json();
    // };

    // render(travelsInCart);
    // slider();
    // toogleNavbarCart();

    // swiper.slideNext()

    // const buttonAddtoCart = document.querySelectorAll('.addToCart');
    // buttonAddtoCart ? buttonAddtoCart.forEach((button) => add(button)) : '';
};