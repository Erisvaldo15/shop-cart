import { getAllTravels, renderTravels } from './travels.js';


function filterRequest() {

    try {
        
        const requestSettings = new Request(
            `http://localhost:8000/travel/search?${filter}=${value}`,
            {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            }
        );

    } 
    
    
    catch (error) {
        // stopped here.
    }

   

    return requestSettings;
}

function loadContinentsFilter() {

    const continentsFilter = document.querySelectorAll('.continent');
    const storagedContinents = JSON.parse(window.sessionStorage.getItem('continents')) ?? [];

    continentsFilter.forEach(continentFilter => 
        storagedContinents.includes(continentFilter.getAttribute('data-continent')) ? continentFilter.classList.add('active') : ""
    );
}

async function toggleContinent() {

    const filtersOfContinents = document.querySelectorAll('.continent');

    filtersOfContinents.forEach((filterOfContinent) => {

        filterOfContinent.addEventListener('click', () => {

            filterOfContinent.classList.toggle('active');

            const nameOfContinent = filterOfContinent.getAttribute('data-continent');
            const storagedContinents = JSON.parse(window.sessionStorage.getItem('continents')) ?? [];

            if(!filterOfContinent.classList.contains('active')) {
                const keptValues = storagedContinents.filter(storagedContinent => storagedContinent !== nameOfContinent);
                window.sessionStorage.setItem('continents', JSON.stringify(keptValues));
                filterOfContinent.classList.remove('active');
            }

            else {
                storagedContinents.push(nameOfContinent);
                window.sessionStorage.setItem('continents', JSON.stringify(storagedContinents));
                filterOfContinent.classList.add('active');
            }
  
            // filterByContinent(filterOfContinent.getAttribute('data-continent'));
        });
    });

}

async function filterByTravelName(value) {
    try {
        const requestSettings = filterRequest('search', value);
        const travel = await fetch(requestSettings);
        const travels = await travel.json();

        if (travels === null) {
            getAllTravels();
            return;
        }

        renderTravels(travels);
    } catch (error) {
        console.log('Error to searching for travel', error);
    }
}

async function filterByPrice() {



}

async function filterByHotel() {
    
}

export { filterByTravelName, loadContinentsFilter, filterByContinent, filterByPrice };