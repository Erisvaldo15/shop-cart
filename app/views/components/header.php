<header>
    <div class="logo">
        <img src="/assets/img/icons/logo.svg" alt="Website icon">
        <a href="/"> Diary </a>
    </div>
    <nav id="menu">
        <ul>
            <li>
                <a href=<?= "/" ?>> Home </a>
            </li>
            <li>
                <a href=<?= "/travels"?>> Travels </a>
            </li>
            <li>
                <a href=<?="/contact"?>> Contact </a>
            </li>
            <li>
                <a href=<?="/about"?>> About </a>
            </li>
            <li class="user">
                <a href="/signup"> Sign Up </a>
            </li>
            <li class="user">
                <a href="/signin"> Sign In </a>
            </li>
            <li>
                <span id="count-products-in-cart"> </span>
                <i class="fa-solid fa-basket-shopping" id="view-cart"></i>
            </li>
        </ul>
    </nav>
    <div class="menu-icon hidden">
        <i class="fa-solid fa-bars icon-menu"></i>
    </div>
</header>