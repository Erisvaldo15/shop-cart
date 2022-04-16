<?php

use app\classes\Cart;
use app\database\models\Read;

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php"> Buy Fast </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-light nav-link active" aria-current="page" href="?page=cart">
                            <img src="assets/img/cart.svg" alt="Image of cart">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<h2 class="text-light text-center">
    Products In Cart: <?= count($productsInCart = (new Cart)->cart()); ?>
</h2>
<section>
    <div class="d-flex justify-content-center flex-wrap container-s">
        <?php if ($products = (new Read)->findAll('product')) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-body d-flex align-items-center flex-column">
                        <h5 class="card-title text-center"> <?= $product->name; ?> </h5>
                        <h6 class="card-subtitle mb-2 text-danger"> R$ <?= number_format($product->price, 2, ".", ","); ?> </h6>
                        <p class="card-text"> <?= $product->description; ?> </p>
                        <a href="add.php?id=<?= "$product->id;" ?> " class="btn btn-primary">Add to cart </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h2 class="text-warning"> Produtos esgotados! </h2>
        <?php endif; ?>
    </div>
</section>