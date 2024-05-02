export default function toogleNavbarCart() {

    const navbarCart = document.querySelector('.travels-in-cart')
    const cartIcon = document.querySelector('#view-cart')
    const closeCartIcon = document.querySelector('#not-view-travel-in-cart')

    if(!navbarCart || !cartIcon || !closeCartIcon) {
        return
    }

    cartIcon.addEventListener('click', () => navbarCart.classList.add('active'));
    closeCartIcon.addEventListener('click', () => navbarCart.classList.remove('active'));
}