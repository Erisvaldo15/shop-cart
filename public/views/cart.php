<?php

use app\classes\Cart;
use app\classes\CartProducts;

$cartProducts = new CartProducts;
$products = $cartProducts->products(new Cart);

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
                        <a class="btn btn-light nav-link active" aria-current="page" href="?page=home">
                            Voltar para página inicial.
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="d-flex justify-content-center flex-wrap p-4">
    <div class="container-fluid table-responsive">
        <h3 class="text-light text-center"> My list of products: </h3>
        <?php if (!$products['products']) : ?>
            <h4 class="text-light text-center"> Not exists cart. </h4>
        <?php else : ?>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th class="text-light" scope="col"> N° </th>
                        <th class="text-light" scope="col">Name</th>
                        <th class="text-light" scope="col">Price</th>
                        <th class="text-light" scope="col">Quantity</th>
                        <th class="text-light" scope="col"> Subtotal </th>
                        <th class="text-light" scope="col"> Remove </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products['products'] as $product) : ?>
                        <tr>
                            <th class="text-light" scope="row"> <?= $product['id'];  ?> </th>
                            <td class="text-light"> <?= $product['product']; ?> </td>
                            <td class="text-light">
                                R$ <?= number_format($product['price'], 2, ",", "."); ?>
                            </td>
                            <td>
                            <form action="quantity.php" method="get">
                                
                                    <input type="number" name="qty" value="<?= $product['qty'] ?>">
                                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                                
                            </form>
                            </td>
                            <td class="text-light">
                                R$ <?= number_format($product['subtotal'], 2, ',', '.') ?>
                            </td>
                            <td>
                                <a href=" <?= "remove.php?id={$product['id']}" ?>" class="btn btn-danger"> Remove </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?>
    </div>
    <div class="card text-center bg-success" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-light">Total:</h5>
            <p class="text-light rounded">
                R$ <?= number_format($products['total'], 2, ".", ","); ?>
            </p>
            <a href="clear.php" class="btn btn-danger"> Clear all </a>
        </div>
    </div>

</section>