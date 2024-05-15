export default function render(travels) {

    const quantityInTheCart = travels.quantity

    const infoProduct = document.querySelector('.cart-main');
    const total = document.querySelector('.total-price')

    if(!infoProduct || !total) {
        return
    }

    if (quantityInTheCart > 0) {

        const moneyFormatter = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL',
        });

        const cart = travels.cart

        infoProduct.innerHTML = ''

        for (const key in cart) {

            if (Object.hasOwnProperty.call(cart, key)) {

                const travel = cart[key];

                const travelInCart = document.createElement('div')
                const imageProductCart = document.createElement('img')
                const travelData = document.createElement('div')
                const h4 = document.createElement('h4')
                const priceAndQuantity = document.createElement('div')
                const travelPrice = document.createElement('span')
                const decreaseQuantityIcon = document.createElement('i')
                const quantityOfTravel = document.createElement('span')
                const increaseQuantityIcon = document.createElement('i')
                const trashIcon = document.createElement('i')
    
                infoProduct.appendChild(travelInCart);
                travelInCart.className = `travel-in-cart`;
    
                travelInCart.appendChild(imageProductCart)
                travelInCart.appendChild(travelData)
                travelData.className = 'travel-data'
                imageProductCart.src = travel.image
    
                travelData.appendChild(h4)
                h4.textContent = travel.name

                travelData.appendChild(priceAndQuantity)
                priceAndQuantity.classList.add('price-and-quantity')

                priceAndQuantity.appendChild(travelPrice)
                travelPrice.textContent = moneyFormatter.format(travel.price)

                priceAndQuantity.appendChild(decreaseQuantityIcon)
                priceAndQuantity.appendChild(quantityOfTravel)
                priceAndQuantity.appendChild(increaseQuantityIcon)
                priceAndQuantity.appendChild(trashIcon)

                increaseQuantityIcon.classList.add('fa-solid', 'fa-plus', 'increase-quantity')
                decreaseQuantityIcon.classList.add('fa-solid', 'fa-minus', 'decrease-quantity')
                
                quantityOfTravel.textContent = travel.quantity;
                trashIcon.classList.add('fa', 'fa-trash', 'remove');

                [increaseQuantityIcon, decreaseQuantityIcon, trashIcon].forEach(icon => {
                    icon.setAttribute('data-slug', travel.slug);
                })
            }
        }

    }

    else {
        infoProduct.innerHTML = 'No product in your cart.'
        total.textContent = 'R$ 0'
    }

}