import render from "./render.js"

export default function add(button) {

    button.addEventListener('click', async (event) => {

        event.preventDefault()

        const buttonSlug = button.getAttribute('data-slug')

        const travels = (async () => {
            const addToCart = await fetch(`http://localhost:9000/cart/add/${buttonSlug}`)
            return await addToCart.json()
        })

        render(travels)
    })
}