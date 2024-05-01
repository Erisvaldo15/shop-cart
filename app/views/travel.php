<section id="travel">
    <div class="content">
        <img src="<?=$travel->image ?>" alt="Travel image">
        <div class="travel-data">
            <h2> <?= $travel->name ?> </h2>
            <p id="description" class="scrollbar-personalized"> <?= $travel->description ?> </p>
            <div class="price-and-button">
                <span class="price"> R$ <?php echo number_format($travel->price, 2, ",", ".") ?> </span>
                <form action="/checkout" method="get">
                    <input type="hidden" name="travel" value="<?= $travel->slug ?>">
                    <button type="submit" class="btn-buy-now">
                        <i class="fa-solid fa-bag-shopping"></i>
                        Buy now
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>