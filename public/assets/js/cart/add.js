import render from "./render.js"

export default async function add(event) {

    event.preventDefault()

    if(event.target.classList.contains('add-to-cart')) {

        const buttonSlug = event.target.getAttribute('data-slug')

        const travels = (async () => {
            const addToCart = await fetch(`http://localhost:8000/cart/add/${buttonSlug}`)
            return await addToCart.json()
        })

        render(await travels())
    }
}