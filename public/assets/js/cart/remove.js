import render from "./render.js"

export default function remove(button) {

    button.addEventListener('click', async (event) => {

        event.preventDefault()

        const buttonSlug = button.getAttribute('data-slug')

        const travels = (async () => {
            const removeFromCart = await fetch(`http://localhost:9000/cart/remove/${buttonSlug}`)
            return await removeFromCart.json()
        })

        render(travels)
    })

}