import render from './render.js';

const baseUrl = 'http://localhost:8000/travel/quantity/update';
const extraSettings = (travelSlug, increaseOrDecrease) => {
    return {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify([travelSlug, increaseOrDecrease]),
    };
};

async function increase(event) {
    if (event.target.classList.contains('increase-quantity')) {
        try {
            const travelSlug = event.target.getAttribute('data-slug');
            const requestSettings = new Request(
                baseUrl,
                extraSettings(travelSlug, 'increase')
            );

            let increaseResult = await fetch(requestSettings);
            increaseResult = await increaseResult.json();

            render(increaseResult);
        } catch (error) {
            console.log('Error to increase travel: ', error);
        }
    }
}

async function decrease(event) {
    if (event.target.classList.contains('decrease-quantity')) {
        try {
            const travelSlug = event.target.getAttribute('data-slug');
            const requestSettings = new Request(
                baseUrl,
                extraSettings(travelSlug, 'decrease')
            );

            let decreaseResult = await fetch(requestSettings);
            decreaseResult = await decreaseResult.json();

            render(decreaseResult);
        } catch (error) {
            console.log('Error to decrease travel: ', error);
        }
    }
}

export { increase, decrease };
