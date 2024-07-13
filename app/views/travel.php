<section id="travel">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <?php foreach ($images as $image) : ?>
                <div class="swiper-slide">
                    <img src="<?= $image->image ?>" alt="<?= $image->image_description ?>" />
                    <div class="informations">
                        <h2>Take a Glimpse Into The Beautiful Country Of:</h2>
                        <h1>Caribbean</h1>
                    </div>
                    <div class="details-bar">

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