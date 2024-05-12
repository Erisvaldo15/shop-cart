import render from "./render.js"

export default async function remove(button) {

    button.addEventListener('click', async (event) => {

        event.preventDefault()

        const travelId = button.getAttribute('data-id')

        const travels = (async () => {
            const removeFromCart = await fetch(`http://localhost:8000/cart/remove/${travelId}`)
            return await removeFromCart.json()
        })

        render(await travels())
    })

}