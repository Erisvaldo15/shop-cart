import render from "./cart/render.js"
import add from "../js/cart/add.js"
import slider from "./slider.js"
import toogleNavbarCart from "./navbarCart.js"

window.onload = () => {

    const travelsInCart = async () => {
        const travels = await fetch('http://localhost:9000/cart')
        return await travels.json()
    }

    render(travelsInCart)
    slider()
    toogleNavbarCart()

    const buttonAddtoCart = document.querySelectorAll('.addToCart')
    buttonAddtoCart ?  buttonAddtoCart.forEach((button) => add(button)) : ''
}