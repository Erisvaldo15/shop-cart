<div class="swiper travels-slider">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        </div>
        <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1530789253388-582c481c54b0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

        </div>
        <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev control"></div>
    <div class="swiper-button-next control"></div>
</div>
<section id="travels">
    <h3 class="section-title"> KNOW ABOUT SOME PLACES BEFORE YOUR TRAVEL </h3>
    <div id="travels-wrapper">
        <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="400">
            <div id="filters">
                <div id="search-bar">
                    <input type="text" name="search" placeholder="Search by name">
                </div>
                <div id="wrapper-continents">
                    <h3> Continents: </h3>
                    <div id="continents">
                        <?php foreach ($continents as $continent) : ?>
                            <div class="continent" data-continent="<?= $continent; ?>">
                                <?= $continent; ?>
                                <i class="fa-regular fa-circle-xmark"></i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div id="wrapper-price-filter">
                    <div id="price-filter">
                        <div class="fields">
                            <label for="minimunValue"> Min </label>
                            <input type="number" name="minValue" placeholder="Minimun value" id="minimunValue">
                        </div>
                        <div class="fields">
                            <label for="maximunValue"> Max </label>
                            <input type="number" name="maxValue" placeholder="Maximum value" id="maximunValue">
                        </div>
                    </div>
                </div>
                <div id="wrapper-hotel-filter">
                    <h3> Hotel: </h3>
                    <span class="switch">
                        <input type="checkbox" name="hotel" id="hotel">
                        <label for="hotel"></label>
                    </span>
                </div>
            </div>
        </div>
        <div class="travels">
            <div class="loader-inner ball-grid-pulse">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</section>