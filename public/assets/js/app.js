import swiperRender from './library/swiperSettings.js';
import render from './cart/render.js';
import add from '../js/cart/add.js';
import toogleNavbarCart from './navbarCart.js';

window.onload = () => {

    const headerElement = document.querySelector(".scroll-header") ?? null

    const travelsInCart = async () => {
        const travels = await fetch('http://localhost:8000/cart');
        return await travels.json();
    };

    window.addEventListener("scroll", () => {
        if(window.scrollY > 0 && headerElement) headerElement?.classList.add("activate")
        else headerElement.classList.remove("activate")
    })

    render(travelsInCart);
    toogleNavbarCart();
    swiperRender();

    const buttonAddtoCart = document.querySelectorAll('.addToCart');
    buttonAddtoCart ? buttonAddtoCart.forEach((button) => add(button)) : '';
};