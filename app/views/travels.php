<section id="travels">
    <div class="travels">
        <div class="title">
            <h2 class="title"> Travels in highlights: </h2>
        </div>
        <?php if ($travels) : ?>
            <div class="gallery-wrapper">
                <button class="arrow arrow-left control"> < </button>
                <button class="arrow arrow-right control"> > </button>
                <div class="gallery">
                    <?php foreach ($travels as $travel) : ?>
                        <div class="travel">
                            <img class="item" src="<?=$travel->image?>" alt="imagem de <?= $travel->name ?> ">
                            <div class="overlay">
                                <h2> <?= $travel->name ?> </h2>
                                <button class="addToCart" data-slug=<?= $travel->slug ?>>
                                    <i class="fa-solid fa-cart-plus"></i>
                                    Add to cart
                                </button>
                                <a class="viewMore" href="/travel/<?=$travel->slug?>">
                                    <i class="fa-solid fa-eye"></i>
                                    View more
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else : ?>
            <span> Does not exist</span>
        <?php endif; ?>
    </div>
</section>
<hr>