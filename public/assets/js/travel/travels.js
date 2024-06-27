async function getAllTravels() {
    console.log('heree');

    if (window.location.pathname === '/travels') {
        const getAllTravels = async () => {
            try {
                const travels = await fetch(
                    new Request('http://localhost:8000/get/travels', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json', // Set the Content-Type header to JSON
                        },
                    })
                );
                return await travels.json();
            } catch (error) {
                console.log('Error to fetching travels data', error);
            }
        };
        renderTravels(await getAllTravels());
    }
}

function renderTravels(travels) {
    const quantityOfTravls = travels?.length;
    const travelDiv = document.querySelector('.travels');

    travelDiv.innerHTML = '';

    travels.forEach((travel, index) => {
        const country = travel.fields.country;
        const subtitle = country
            ? `${country} - ${travel.fields.continent}`
            : travel.fields.continent;
        const startDate = travel.fields.startDate.split('-');
        const returnDate = travel.fields.returnDate.split('-');
        const isThereHotel = parseInt(travel.fields.hotel)
            ? '<i class="fa-solid fa-check"></i>'
            : '<i class="fa-solid fa-xmark"></i>';

        const travelHtml = `
            <div class="travel shadow"> 
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"/>
                <div class="travel-content">
                    <div class="travel-header"> 
                        <div class="travel-title"> 
                            <h3> ${travel.fields.name} </h3>
                            <h4> ${subtitle} </h4>
                        </div>
                        <div class="actions">
                            <a href="travel/${
                                travel.fields.slug
                            }" class="button">
                                Add Cart
                                <i class="fa-solid fa-bag-shopping"></i>
                            </a>
                        </div>
                    </div>
                    <div class="travel-description">
                        <p> ${travel.fields.description} </p>
                    </div>
                    <hr>
                    <div class="travel-data"> 
                        <div class="round-trip"> 
                            <i class="fa-solid fa-calendar-days"></i>
                            Start: ${formatterDate(
                                startDate[0],
                                startDate[1],
                                startDate[2]
                            )} |
                            Return: ${formatterDate(
                                returnDate[0],
                                returnDate[1],
                                returnDate[2]
                            )}
                        </div>
                        <div class="hotel">
                            <i class="fa-solid fa-hotel"></i> Hotel: 
                            ${isThereHotel} 
                        </div>
                       
                        <div class="travel-price"> 
                            <i class="fa-solid fa-credit-card"></i>
                            <p> R$${travel.fields.price} or 12x de R$${(
            (travel.fields.price / 12) *
            1000
        ).toFixed(2)}  </p>
                        </div>
                    </div>
                    <hr>
                    <div class="travel-extra"> 
                        <a href="travel/${travel.fields.slug}"> 
                            Explore More 
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            ${quantityOfTravls === parseInt(index) ? '<hr>' : ''}
        `;

        travelDiv.innerHTML += travelHtml;
    });

    if (!travelDiv.innerHTML)
        travelDiv.innerHTML = '<h2> No travels found. </h2>';
}

function formatterDate(year, month, day) {
    const date = new Date(year, month, day);

    let formatter = new Intl.DateTimeFormat('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });

    return formatter.format(date);
}

export { getAllTravels, renderTravels };
