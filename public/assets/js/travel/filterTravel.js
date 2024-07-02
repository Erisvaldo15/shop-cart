import { getAllTravels, renderTravels } from './travels.js';

function filterRequest() {



    const requestSettings = new Request(
        `http://localhost:8000/travel/search?${filter}=${value}`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        }
    );

    return requestSettings;
}

async function filterByContinent(value) {
    try {

        const getContinents = window.sessionStorage.getItem('continent');

        if(!getContinents) {
            window.sessionStorage.setItem('continent', JSON.stringify([value])); 
        }

        else {
            let updateContinents = JSON.parse(window.sessionStorage.getItem('continent'));
            updateContinents.push(value);
        }

        const requestSettings = filterRequest('continent', value);
        const travel = await fetch(requestSettings);
        const result = await travel.json();
        console.log(result);
    } catch (error) {
        console.log('Error to filtering for travel', error);
    }
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

export { filterByTravelName, filterByContinent, filterByPrice };