import renderTravels from './travels.js';

export default async function searchTravel(value) {
    const requestSettings = new Request(
        `http://localhost:8000/travel/search?text=${value}`,
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        }
    );

    const searchedValue = async () => {
        try {
            const travel = await fetch(requestSettings);
            const result = await travel.json();
            renderTravels(result);
        } catch (error) {
            console.log('Error to searching for travel', error);
        }
    };

    return searchedValue();
}