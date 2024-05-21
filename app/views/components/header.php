<?php if (isset($scrollHeader) && $scrollHeader === true) : ?>
    <header id="header" class="scroll-header">
    <?php else : ?>
        <header id="header">
        <?php endif; ?>
        <div class="logo">
            <img src="/assets/img/icons/logo.svg" alt="Website icon">
            <a href="/"> Diary </a>
        </div>
        <nav>
            <ul id="menu">
                <li>
                    <a href=<?= "/" ?>> Home </a>
                </li>
                <li>
                    <a href=<?= "/travels" ?>> Travels </a>
                </li>
                <li>
                    <a href=<?= "/contact" ?>> Contact </a>
                </li>
                <li>
                    <a href=<?= "/about" ?>> About </a>
                </li>
            </ul>
        </nav>
        <div id="cart">
            <li>
                <span id="total-products-in-cart">0</span>
                <i class="fa-solid fa-basket-shopping" id="view-cart"></i>
            </li>
            <li id="account">
                <i class="fa-regular fa-user"></i>
                <i class="arrow fa-solid fa-caret-up fa-caret-down"></i>
                <div id="user-options">
                    <a href="/signin"> 
                        Sign In 
                    </a>
                    <a href="/signup"> 
                        Sign Up
                    </a>
                </div>
            </li>
        </div>
        <div class="menu-icon">
            <i class="fa-solid fa-bars icon-menu"></i>
        </div>
        </header>