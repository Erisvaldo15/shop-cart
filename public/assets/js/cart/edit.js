function increase(event) {

    if (event.target.classList.contains('increase-quantity')) {

        try {

            const increaseResult = fetch("http://localhost:8000")

        } catch (error) {
            console.log('Error to increase travel: ', error);
        }
    }
}

function decrease(event) {

    if (event.target.classList.contains('decrease-quantity')) {

        try {

            

        } catch (error) {
            console.log('Error to decrease travel: ', error);
        }
    }
}

export { increase, decrease };
