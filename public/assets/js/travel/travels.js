export default function renderTravels(travels) {
    const travelDiv = document.querySelector('.travels');

    travelDiv.innerHTML = '';

    travels.forEach((travel) => {
        const travelHtml = `
            <div class="travel shadow"> 
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"/>
                <div class="travel-content">
                    <div class="travel-header"> 
                        <div class="travel-title"> 
                            <h3> ${travel.fields.name} </h3>
                            <h4> Subtitle </h4>
                        </div>
                        <div class="actions">
                            <a href="travel/${travel.fields.slug}" class="button">
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
            <hr>
        `;

        travelDiv.innerHTML += travelHtml;
    });

    if (!travelDiv.innerHTML)
        travelDiv.innerHTML = '<h2> No travels found. </h2>';
}
