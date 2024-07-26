<section id="travel">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <?php foreach ($images as $image) : ?>
                <div class="swiper-slide">
                    <img src="<?= $image->image ?>" alt="<?= $image->image_description ?>" />
                    <div class="informations">
                        <h2> 
                            <?= $travel->name; ?>
                         </h2>
                        <h1>
                            <?= $image->place; ?>
                        </h1>
                    </div>
                    <div class="details-bar">
                        <div class="place-details">
                            <div class="place-detail">
                                <i class="fa-solid fa-user"></i>
                                <div>
                                    Population
                                    <h3>
                                        <?= ($travel->population / 1000000);  ?> mi
                                    </h3>
                                </div>
                            </div>
                            <div class="place-detail">
                                <i class="fa-solid fa-globe"></i>
                                <div>
                                    Extension
                                    <h3>
                                        <?= $travel->extension; ?> mi²
                                    </h3>
                                </div>
                            </div>
                            <div class="place-detail">
                                <i class="fa-solid fa-temperature-quarter"></i>
                                <div>
                                    Weather
                                    <h3>
                                        <?= $travel->weather; ?>
                                    </h3>
                                </div>
                            </div>
                            <div class="place-detail">
                                <i class="fa-solid fa-language"></i>
                                <div>
                                    Main Language
                                    <h3>
                                        <?= $travel->nativeLanguage; ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <button type="button">
                            Buy
                            <i class="fa-solid fa-bag-shopping"></i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($images as $image) : ?>
                <div class="swiper-slide">
                    <img src="<?= $image->image ?>" alt="<?= $image->image_description ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>