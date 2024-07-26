export default function toogleNavbarCart() {
    const navbarCart = document.querySelector('.travels-in-cart') ?? null;
    const closeCartIcon =
        document.querySelector('#not-view-travel-in-cart') ?? null;
    const iconCartDesktop =
        document.querySelector('#icon-cart-desktop') ?? null;
    const bodyElement = document.querySelector('body');
    const iconCartMobile = document.querySelector('#icon-cart-mobile') ?? null;

    if (!navbarCart || !iconCartDesktop || !closeCartIcon) return;

    iconCartDesktop.addEventListener('click', () =>
        navbarCart.classList.add('active')
    );

    iconCartMobile.addEventListener('click', () => {
        navbarCart.classList.add('active');
        bodyElement.style.overflow = 'hidden';
    });

    closeCartIcon.addEventListener('click', () => {
        navbarCart.classList.remove('active');
        bodyElement.style.overflow = '';
    });
}
