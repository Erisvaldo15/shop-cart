<?php if (isset($scrollHeader) && $scrollHeader === true) : ?>
    <header id="header" class="scroll-header">
    <?php else : ?>
        <header id="header">
        <?php endif; ?>
        <div class="logo">
            <img src="/assets/img/icons/logo.svg" alt="Website icon">
            <a href="/"> Diary </a>
        </div>
        <nav role="navigation">
            <ul id="menu">
                <li>
                    <a href=<?= "/" ?> class="link-menu"> Home </a>
                </li>
                <li>
                    <a href=<?= "/travels" ?> class="link-menu"> Travels </a>
                </li>
                <li>
                    <a href=<?= "/contact" ?> class="link-menu"> Contact </a>
                </li>
                <li>
                    <a href=<?= "/about" ?> class="link-menu"> About </a>
                </li>
            </ul>
        </nav>
        <div class="user-actions">
            <li>
                <span class="total-products-in-cart">0</span>
                <i class="view-cart fa-solid fa-basket-shopping" id="icon-cart-desktop"></i>
            </li>
            <li class="account" id="account-desktop">
                <?php if (!isset($_SESSION["logged"])) : ?>
                    <i class="fa-regular fa-user"></i>
                <?php else : ?>
                    <span>Hello, <?= $_SESSION["logged"]["name"]; ?> </span>
                <?php endif; ?>
                <i class="fa-solid fa-caret-up fa-caret-down" id="arrow-desktop"></i>
                <div class="user-options" id="user-options-desktop">
                    <?php if ((!isset($_SESSION["logged"]))) : ?>
                        <div class="option">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <a href="/signin">
                                Sign In
                            </a>
                        </div>
                        <div class="option">
                            <i class="fa-regular fa-address-card"></i>
                            <a href="/signup">
                                Sign Up
                            </a>
                        </div>
                    <?php else : ?>
                        <form action="/logout" method="POST">
                            <button> Logout </button>
                        </form>
                    <?php endif; ?>
                </div>
            </li>
        </div>
        <div id="menu-icon">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
        <nav id="menu-mobile" role="navigation">
            <ul>
                <li>
                    <a href=<?= "/" ?> class="link-menu"> Home </a>
                </li>
                <li>
                    <a href=<?= "/travels" ?> class="link-menu"> Travels </a>
                </li>
                <li>
                    <a href=<?= "/contact" ?> class="link-menu"> Contact </a>
                </li>
                <li>
                    <a href=<?= "/about" ?> class="link-menu"> About </a>
                </li>
                <hr>
                <div class="user-actions">
                    <li>
                        <span class="total-products-in-cart">0</span>
                        <i class="view-cart fa-solid fa-basket-shopping" id="icon-cart-mobile"></i>
                    </li>
                    <li class="account" id="account-mobile">
                        <?php if (!isset($_SESSION["logged"])) : ?>
                            <i class="fa-regular fa-user"></i>
                        <?php else : ?>
                            <span>Hello, <?= $_SESSION["logged"]["name"]; ?> </span>
                        <?php endif; ?>
                        <i class="fa-solid fa-caret-up fa-caret-down" id="arrow-mobile"></i>
                        <div class="user-options" id="user-options-mobile">
                            <?php if ((!isset($_SESSION["logged"]))) : ?>
                                <div class="option">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <a href="/signin">
                                        Sign In
                                    </a>
                                </div>
                                <div class="option">
                                    <i class="fa-regular fa-address-card"></i>
                                    <a href="/signup">
                                        Sign Up
                                    </a>
                                </div>
                            <?php else : ?>
                                <form action="/logout" method="POST">
                                    <button> Logout </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </li>
                </div>
            </ul>
        </nav>
        </header>