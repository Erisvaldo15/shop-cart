import remove from "./remove.js";

export default async function render(travels) {

    const travelsInCart = await travels()

    const quantityInTheCart = travelsInCart.quantity

    const title = document.querySelector('.title')
    const infoProduct = document.querySelector('.cart-main');
    const total = document.querySelector('.total-price')

    if(!title || !infoProduct || !total) {
        return
    }

    if (quantityInTheCart > 0) {

        const cart = travelsInCart.cart

        infoProduct.innerHTML = ""

        for (const key in cart) {

            if (Object.hasOwnProperty.call(cart, key)) {

                const travel = cart[key];

                const contentProduct = document.createElement('div')
                const imageProductCart = document.createElement('img')
                const name = document.createElement('div')
                const h4 = document.createElement('h4')
                const span = document.createElement('span')
                const trashIcon = document.createElement('i')
                const input = document.createElement('input')
    
                infoProduct.appendChild(contentProduct);
                contentProduct.className = `travelInCart`;
    
                contentProduct.appendChild(imageProductCart)
                imageProductCart.src = travel.image
                imageProductCart.id = 'image-travel-cart'
    
                name.appendChild(h4)
                h4.id = 'travel-name'
                h4.textContent = travel.name
    
                contentProduct.appendChild(name);
                name.className = `travel-name`;
    
                name.textContent = `${travel.name[0].toUpperCase()}${travel.name.substr(1)}`
    
                name.appendChild(span)
                span.id = 'price-travel-cart'
                span.textContent = `1x - ${travel.price}`
    
                name.appendChild(input)
                input.value = travel.quantity
    
                contentProduct.appendChild(trashIcon);
    
                trashIcon.classList.add('fa-solid')
                trashIcon.classList.add('fa-trash')
                trashIcon.id = "remove"
    
                trashIcon.setAttribute('data-slug', travel.slug)
    
                total.textContent = `R$ ${travelsInCart.total}`

                const buttonDeleteFromCart = document.querySelectorAll('#remove')
                buttonDeleteFromCart.forEach((button) => remove(button))
            }
        }

    }

    else {
        title.textContent = "Your cart is empty"
        infoProduct.innerHTML = "No product in your cart."
        total.textContent = "R$ 0"
    }

}