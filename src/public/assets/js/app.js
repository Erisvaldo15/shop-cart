import swiperRender from './library/swiperSettings.js';
import render from './cart/render.js';
import add from './cart/add.js';
import remove from './cart/remove.js';
import toogleNavbarCart from './navbarCart.js';
import { increase, decrease } from './cart/edit.js';
import signIn from './user/signin.js';
import signUp from './user/signup.js';
import dropdownUserOptions from './dropdownUserOptions.js';
import sendContact from './contact.js';
import {
    filterByHotel,
    filterByMaximunValue,
    filterByMinimunValue,
    filterBySearch,
    filterByContinent,
    getTravels,
} from './travel/filterTravel.js';

window.addEventListener('DOMContentLoaded', async () => {

    AOS.init();

    const travelsInCart = async () => {
        try {
            const travels = await fetch('http://localhost:8000/cart');
            return await travels.json();
        } catch (error) {
            console.log('Error to fetching travels in cart', error);
        }
    };

    const travelsDescriptions = document.querySelectorAll(
        '.travel-content .content p'
    );

    window.addEventListener('scroll', () => {
        const headerElement = document.querySelector('.scroll-header');
        if (headerElement) {
            if (window.scrollY > 0) headerElement?.classList.add('activate');
            else headerElement?.classList.remove('activate');
        }
    });

    travelsDescriptions.forEach((description) => {
        let content = description.textContent;

        if (content.length > 150) {
            let limitedContent = content.slice(0, 150);
            description.textContent = `${limitedContent}...view more.`;
        }
    });

    render(await travelsInCart());
    toogleNavbarCart();
    swiperRender();

    const travelsDiv = document.querySelector('.travels');
    if (travelsDiv)
        travelsDiv.addEventListener('click', async (event) => add(event));

    function handleCartMainClick(event) {
        increase(event);
        decrease(event);
        remove(event);
    }

    const cartMainDiv = document.querySelector('.cart-main');
    if (cartMainDiv) {
        cartMainDiv.addEventListener('click', (event) => {
            event.preventDefault();
            handleCartMainClick(event);
        });
    }

    const buttonMenuMobile = document.querySelector('#menu-icon') ?? null;
    const menuMobile = document.querySelector('#menu-mobile') ?? null;

    if (buttonMenuMobile && menuMobile) {
        buttonMenuMobile.addEventListener('click', () => {
            buttonMenuMobile.classList.toggle('activate');
            menuMobile.classList.toggle('activate');
        });
    }

    if (window.location.pathname === '/travels') {
        filterByContinent();
        filterBySearch();
        filterByMinimunValue();
        filterByMaximunValue();
        filterByHotel();
        getTravels();
    }

    signIn();
    signUp();
    dropdownUserOptions();
    sendContact();
});
