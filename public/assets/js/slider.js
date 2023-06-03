export default function slider() {

    const controlls = document.querySelectorAll('.control')
    const selectAllImages = document.querySelectorAll('.item')

    let currentItem = 0
    let quantityImages = selectAllImages.length

    if(selectAllImages[currentItem]) {
        selectAllImages[currentItem].classList.add('current-item')
    }

    controlls.forEach((element) => {

        element.addEventListener('click', () => {

            const isLeft = element.classList.contains('arrow-left')

            if (isLeft) {

                if (currentItem <= 0) {
                    currentItem = quantityImages - 1
                } else {
                    currentItem -= 1
                }

            }

            else {

                if (currentItem === quantityImages - 1) {
                    currentItem = 0
                } else {
                    currentItem += 1
                }

            }

            selectAllImages.forEach((element) => element.classList.remove('current-item'))

            selectAllImages[currentItem].scrollIntoView({
                inline: "center", // responsável por deixar uma imagem com um foco centralizado
                behavior: "smooth" // responśavel por sauavizar a passagem de imagens
            })

            selectAllImages[currentItem].classList.add('current-item')
        })
    })

}

