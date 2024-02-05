<div class="row row-cols-1 row-cols-md-3 m-auto justify-content-center ">
    <?php
        $products = findAllProducts($db);
        foreach ($products as $product) : 
    ?>
        <div class="card col text-center m-3 p-0 rounded-0" style="width: 300px;">
            <img src="<?= PRODUCTS_IMG_PATH . $product['product_pathimg'] ?>" class="card-img-top rounded-0" alt="$product['product_title'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $product['product_title'] ?></h5>
                <p><span class="badge rounded-pill text-bg-light"><?= $product['category_name'] ?></span></p>
                <p class="card-text"><?= $product['product_description'] ?></p>
                <p class="card-text"><small class="text-muted">Prix: <?= $product['product_price'] ?></small></p>
                <a href="./error.php" class="btn bg-blue text-white rounded-0">Acheter</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>