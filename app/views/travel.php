<section id="travel">
    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="400">
        <div id="travel-details-wrapper">
            <img src="<?= $travel->image_path ?>" alt="Travel image">
            <div class="travel-details">
                <div class="travel-title">
                    <h3> <?= $travel->name ?> </h3>
                    <h4> <?= "{$travel->country} -" ?? "" ?> <?= $travel->continent ?> </h4>
                </div>
                <p id="description" class="scrollbar-personalized"> <?= $travel->description ?> </p>
                <p>
                    <span> Hotel: </span> <?= $travel->hotel === "1" ? "Include in the package." : "There isn't" ?>
                </p>
                <p>
                    <span> Start: </span>
                    <?= date("d-m-Y", strtotime($travel->startDate)); ?>
                    |
                    <span> Return: </span>
                    <?= date("d-m-Y", strtotime($travel->startDate)); ?>
                </p>
                <p class="price">
                    <span>
                        Price:
                    </span>
                    USD $<?= number_format($travel->price, 3, ",", ".") ?>
                    |
                    12x USD $<?= number_format((($travel->price / 12) * 1000), 2) ?>
                </p>
                <div class="price-and-button">
                    <form action="/checkout" method="get">
                        <input type="hidden" name="travel" value="<?= $travel->slug ?>">
                        <button type="submit">
                            <i class="fa-solid fa-bag-shopping"></i>
                            Buy now
                        </button>
                        <button type="submit">
                            <i class="fa-solid fa-bag-shopping"></i>
                            Buy now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>