import render from './render.js';

export default async function remove(event) {

    event.preventDefault();

    const button = event.target;

    if (button.classList.contains('remove')) {
        
        const travelSlug = event.target.getAttribute('data-slug');

        try {
            const requestSettings = new Request(
                `http://localhost:8000/cart/remove/${travelSlug}`,
                {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                }
            );

            const removeFromCart = await fetch(requestSettings);
            render(await removeFromCart.json());
        } catch (error) {
            console.log('Error to remove travel from cart', error);
        }
    }
}
