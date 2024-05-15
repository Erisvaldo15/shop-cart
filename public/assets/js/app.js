import swiperRender from './library/swiperSettings.js';
import render from './cart/render.js';
import add from './cart/add.js';
import remove from './cart/remove.js';
import toogleNavbarCart from './navbarCart.js';
import renderTravels from './travel/travels.js';
import searchTravel from './travel/searchTravel.js';
import { increase, decrease } from './cart/edit.js';

window.addEventListener('DOMContentLoaded', async () => {
    const headerElement = document.querySelector('.scroll-header') ?? null;

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

    const searchField = document.querySelector('#search-bar input');

    if (searchField) {
        searchField.addEventListener(
            'input',
            debounce(() => searchTravel(searchField.value), 1000)
        );
    }

    window.addEventListener('scroll', () => {
        if (window.scrollY > 0 && headerElement)
            headerElement?.classList.add('activate');
        else headerElement.classList.remove('activate');
    });

    travelsDescriptions.forEach((description) => {
        let content = description.textContent;

        if (content.length > 150) {
            let limitedContent = content.slice(0, 150);
            description.textContent = `${limitedContent}...view more.`;
        }
    });

    if (window.location.pathname === '/travels') {
        const getAllTravels = async () => {
            try {
                const travels = await fetch(
                    new Request('http://localhost:8000/get/travels', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json', // Set the Content-Type header to JSON
                        },
                    })
                );
                return await travels.json();
            } catch (error) {
                console.log('Error to fetching travels data', error);
            }
        };
        renderTravels(await getAllTravels());
    }

    function debounce(func, timeout = 300) {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(this, args);
            }, timeout);
        };
    }

    render(await travelsInCart());
    toogleNavbarCart();
    swiperRender();

    const travelsDiv = document.querySelector('.travels');
    if (travelsDiv) travelsDiv.addEventListener('click', (event) => add(event));

    function handleCartMainClick(event) {
        increase(event);
        decrease(event);
        remove(event)
    }

    const cartMainDiv = document.querySelector('.cart-main');
    if (cartMainDiv) {
        cartMainDiv.addEventListener('click', event => {
            event.preventDefault();
            handleCartMainClick(event);
        });
    }
});
