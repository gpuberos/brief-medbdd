<section>
    <div class="row row-cols-1 row-cols-md-4 row-gap-4">
        <?php
        // La requête SQL est stockée dans la variable $productsQuery puis est passé en paramètre dans la fonction findAllDatas.
        $productsQuery = "SELECT products.*, product_category.category_name FROM products INNER JOIN product_category ON products.product_category_id = product_category.id";
        $products = findAllDatas($db, $productsQuery);

        foreach ($products as $product) :
        ?>
            <div class="col">
                <div class="card h-100 text-center rounded-0">
                    <img src="<?= PRODUCTS_IMG_PATH . $product['product_pathimg'] ?>" class="card-img-top rounded-0" alt="$product['product_title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['product_title'] ?></h5>
                        <p><span class="badge rounded-pill text-bg-light"><?= $product['category_name'] ?></span></p>
                        <p class="card-text"><?= $product['product_description'] ?></p>
                    </div>
                    <div class="card-footer pb-4">
                        <p class="card-text"><strong>Prix : <?= $product['product_price'] ?> €</strong></p>
                        <a href="#" class="btn bg-blue text-white rounded-0">Acheter</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>