<section id="travel">
    <div id="travel-details-wrapper">
        <img src="<?= $travel->image_path ?>" alt="Travel image">
        <div class="travel-details">
            <h2> <?= $travel->name ?> </h2>
            <p id="description" class="scrollbar-personalized"> <?= $travel->description ?> </p>
            <span class="price"> R$ <?php echo number_format($travel->price, 2, ",", ".") ?> </span>
            <div class="price-and-button">
                <form action="/checkout" method="get">
                    <input type="hidden" name="travel" value="<?= $travel->slug ?>">
                    <button type="submit">
                        <i class="fa-solid fa-bag-shopping"></i>
                        Buy now
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>