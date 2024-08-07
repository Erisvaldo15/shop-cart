import { formatterDate } from '../helpers.js';

export default function renderTravels(travels) {
    const quantityOfTravls = travels?.length;
    const travelDiv = document.querySelector('.travels');

    travelDiv.innerHTML = '';

    if (travels.length > 0) {
        travelDiv.style.placeItems = '';
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
            const total = travel.fields.price;
            const installments = (total / 12).toFixed(2);

            const travelHtml = `
                <div class="travel"> 
                    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"/>
                    <div class="travel-content">
                        <div class="travel-header"> 
                            <div class="travel-title"> 
                                <h3> ${travel.fields.name} </h3>
                                <h4> ${subtitle} </h4>
                            </div>
                            <div class="actions">
                                <a class="add-to-cart" data-slug="${
                                    travel.fields.slug
                                }">
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
                                <p> 
                                    USD $${
                                        travel.fields.price
                                    } | 12x de USD $${installments}  
                                </p>
                            </div>
                        </div>
                        <hr/>
                        <div class="travel-extra"> 
                            <a href="/travel/${travel.fields.slug}"> 
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
    } else {
        travelDiv.style.placeItems = 'center';
        travelDiv.innerHTML = `<img style="width: 30rem; max-width: 100%;" src="../assets/img/data_not_found.svg">`;
    }
}