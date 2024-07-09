import { debounce } from '../helpers.js';
import renderTravels from './renderTravels.js';

async function getTravels() {
    try {
        const requestBody = {
            searchFilter: window.sessionStorage.getItem('search'),
            continentsFilter: window.sessionStorage.getItem('continents'),
            minimunValueFilter: window.sessionStorage.getItem('minimunValue'),
            maximunValueFilter: window.sessionStorage.getItem('maximunValue'),
            hotelFilter: window.sessionStorage.getItem('hotel') ?? 'false',
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

        const result = await fetch(requestSettings);
        renderTravels(await result.json());
    } catch (error) {
        console.log('Error to fetching travels data', error);
    }
}

function filterBySearch() {
    const searchField = document.querySelector('#search-bar input');

    searchField.value = window.sessionStorage.getItem('search');

    const debouncedFilter = debounce((event) => {
        window.sessionStorage.setItem('search', event.target.value);
        getTravels();
    }, 1000);

    searchField.addEventListener('input', (event) => {
        const travelsDiv = document.querySelector('.travels');

        travelsDiv.innerHTML = `
            <div class="loader-inner ball-grid-pulse">
                <div></div>
                <div></div>
                <div></div>
            </div>
        `;

        debouncedFilter(event);
    });
}

function filterByContinent() {
    const filtersOfContinents = document.querySelectorAll('.continent');

    const storagedContinents =
        JSON.parse(window.sessionStorage.getItem('continents')) ?? [];

    filtersOfContinents.forEach((continentFilter) =>
        storagedContinents.includes(
            continentFilter.getAttribute('data-continent')
        )
            ? continentFilter.classList.add('active')
            : ''
    );

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

            getTravels();
        });
    });
}

function filterByMinimunValue() {
    const minimunValueField = document.querySelector('#minimunValue');
    minimunValueField.value = window.sessionStorage.getItem('minimunValue');
    const debouncedFilter = debounce((event) => {
        window.sessionStorage.setItem('minimunValue', event.target.value);
        getTravels();
    }, 1000);
    minimunValueField.addEventListener('input', (event) => {
        const travelsDiv = document.querySelector('.travels');
        travelsDiv.innerHTML = `
                    <div class="loader-inner ball-grid-pulse">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                `;
        debouncedFilter(event);
    });
}

function filterByMaximunValue() {
    const maximunValueField = document.querySelector('#maximunValue');
    maximunValueField.value = window.sessionStorage.getItem('maximunValue');
    const debouncedFilter = debounce((event) => {
        window.sessionStorage.setItem('maximunValue', event.target.value);
        getTravels();
    }, 1000);
    maximunValueField.addEventListener('input', (event) => {
        const travelsDiv = document.querySelector('.travels');
        travelsDiv.innerHTML = `
                    <div class="loader-inner ball-grid-pulse">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                `;
        debouncedFilter(event);
    });
}

function filterByHotel() {
    const hotelField = document.querySelector('#hotel');
    const debouncedFilter = debounce((event) => {
        window.sessionStorage.setItem('hotel', event.target.checked);
        getTravels();
    }, 500);
    hotelField.checked =
        window.sessionStorage.getItem('hotel') === 'true' ? true : false;
    hotelField.addEventListener('change', (event) => {
        const travelsDiv = document.querySelector('.travels');
        travelsDiv.innerHTML = `
                    <div class="loader-inner ball-grid-pulse">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                `;
        debouncedFilter(event);
    });
}

export {
    getTravels,
    filterByContinent,
    filterBySearch,
    filterByMinimunValue,
    filterByMaximunValue,
    filterByHotel,
};
