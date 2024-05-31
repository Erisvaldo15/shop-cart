export default function renderTravels(travels) {
    const travelDiv = document.querySelector('.travels');

    travelDiv.innerHTML = '';

    travels.forEach((travel) => {
        const travelHtml = `
            <div class="travel shadow"> 
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"/>
                <div class="travel-content">
                    <h3> ${travel.fields.name} </h3>
                    <div class="content">
                        <p> ${travel.fields.description} </p>
                        <div class="actions">
                        <button class="add-to-cart" data-slug="${travel.fields.slug}">
                            Add to cart
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                        <a href="travel/${travel.fields.slug}" id="view-more">
                            Details
                            <i class="fa-solid fa-bag-shopping"></i>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        `;

        travelDiv.innerHTML += travelHtml;
    });

    if (!travelDiv.innerHTML)
        travelDiv.innerHTML = '<h2> No travels found. </h2>';
}
