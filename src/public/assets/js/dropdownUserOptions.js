export default function dropdownUserOptions() {
    const accountMobile = document.querySelector('#account-mobile');
    const accountDesktop = document.querySelector('#account-desktop');

    const userOptionsDesktop = document.querySelector('#user-options-desktop');
    const userOptionsMobile = document.querySelector('#user-options-mobile');

    const arrowIconDesktop = document.querySelector('#arrow-desktop');
    const arrowIconMobile = document.querySelector('#arrow-mobile');

    if (accountDesktop) {
        accountDesktop.addEventListener('click', () => {
            if (!userOptionsDesktop.classList.contains('active')) {
                arrowIconDesktop.classList.remove('fa-caret-down');
            } else {
                arrowIconDesktop.classList.add('fa-caret-down');
            }

            userOptionsDesktop.classList.toggle('active');
        });
    }

    if (accountMobile) {
        accountMobile.addEventListener('click', () => {
            if (!userOptionsMobile.classList.contains('active')) {
                arrowIconMobile.classList.remove('fa-caret-down');
            } else {
                arrowIconMobile.classList.add('fa-caret-down');
            }

            userOptionsMobile.classList.toggle('active');
        });
    }
}
