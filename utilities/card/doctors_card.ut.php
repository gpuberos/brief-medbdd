<!-- Section Médecins titre + cards -->
<section>
    <div class="row row-cols-1 row-cols-md-2 m-auto justify-content-center ">

        <?php foreach ($doctors as $doctor) : ?>
            <div class="card col-6 text-center m-3 p-0 rounded-0" style="width: 300px;">
                <img src="/assets/img/doctors/<?= $doctor['picture'] ?>" class="card-img-top rounded-0" alt="<?= $doctor['title'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $doctor['title'] ?></h5>
                    <p class="card-text"><?= $doctor['desc'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>

</section>