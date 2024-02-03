<div class="row row-cols-1 row-cols-md-3 m-auto justify-content-center ">
    <?php foreach ($products as $product) : ?>
        <div class="card col text-center m-3 p-0 rounded-0" style="width: 300px;">
            <img src="/assets/img/products/<?= $product['picture'] ?>" class="card-img-top rounded-0" alt="<?= $product['title'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $product['title'] ?></h5>
                <p class="card-text"><?= $product['desc'] ?></p>
                <p class="card-text"><small class="text-muted">Prix: <?= $product['price'] ?></small></p>
                <a href="./error.php" class="btn bg-blue text-white rounded-0">Acheter</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>