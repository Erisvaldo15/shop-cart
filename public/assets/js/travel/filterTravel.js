import { debounce } from '../helpers.js';
import { getAllTravels, renderTravels } from './travels.js';

function filter() {
    try {
        const requestBody = {
            searchFilter: window.sessionStorage.getItem('search'),
            continentsFilter: window.sessionStorage.getItem('continents'),
            minimunValueFilter: window.sessionStorage.getItem('minimunValue'),
            maximunValueFilter: window.sessionStorage.getItem('maximunValue'),
            hotelFilter: window.sessionStorage.getItem('hotel'),
        };

        const requestSettings = new Request(
            'http://localhost:8000/travel/search',
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(requestBody),
            }
        );
    } catch (error) {

    }
}

function loadFilters() {

    const searchField = document.querySelector('#search-bar input');
    const continentsFilter = document.querySelectorAll('.continent');

    searchField.value = window.sessionStorage.getItem('search');

    const storagedContinents =
        JSON.parse(window.sessionStorage.getItem('continents')) ?? [];

    continentsFilter.forEach((continentFilter) =>
        storagedContinents.includes(
            continentFilter.getAttribute('data-continent')
        )
            ? continentFilter.classList.add('active')
            : ''
    );
}

function filterBySearch() {
    const searchField = document.querySelector('#search-bar input');

    if (searchField) {
        searchField.addEventListener('input', event => {
            const travelsDiv = document.querySelector('.travels');

            travelsDiv.innerHTML = `
                <div class="loader-inner ball-grid-pulse">
                <div></div>
                <div></div>
                <div></div>
            </div>
            `;

            window.sessionStorage.setItem('search', event.target.value);
            debounce(() => filter(), 1000)
        });
    }
}

function toggleContinent() {
    const filtersOfContinents = document.querySelectorAll('.continent');

    filtersOfContinents.forEach((filterOfContinent) => {
        filterOfContinent.addEventListener('click', () => {
            filterOfContinent.classList.toggle('active');

            const nameOfContinent =
                filterOfContinent.getAttribute('data-continent');
            const storagedContinents =
                JSON.parse(window.sessionStorage.getItem('continents')) ?? [];

            if (!filterOfContinent.classList.contains('active')) {
                const keptValues = storagedContinents.filter(
                    (storagedContinent) => storagedContinent !== nameOfContinent
                );
                window.sessionStorage.setItem(
                    'continents',
                    JSON.stringify(keptValues)
                );
                filterOfContinent.classList.remove('active');
            } else {
                storagedContinents.push(nameOfContinent);
                window.sessionStorage.setItem(
                    'continents',
                    JSON.stringify(storagedContinents)
                );
                filterOfContinent.classList.add('active');
            }

            filter();
        });
    });
}

function filterByMinimunValue() {



}

function filterByMaximunValue() {


    
}

async function filterByPrice() {

    const minimunValueField = document.querySelector('#minimunValue');
    const maximunValueField = document.querySelector('#maximunValue');

    minimunValueField.addEventListener('input', event => {

    })

    maximunValueField.addEventListener('input', event => {

    })

}

async function filterByHotel() {}

export { filterBySearch, loadFilters, toggleContinent };