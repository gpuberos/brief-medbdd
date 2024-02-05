<!-- Section Médecins titre + cards -->
<section>
    <div class="row row-cols-1 row-cols-md-2 m-auto justify-content-center ">

        <?php
        // La requête SQL est stockée dans la variable $doctorsQuery puis est passé en paramètre dans la fonction findAllDatas.
        $doctorsQuery = "SELECT id, doctor_name, doctor_description, doctor_pathimg FROM doctors";
        $doctors = findAllDatas($db, $doctorsQuery);

        foreach ($doctors as $doctor) :
        ?>
            <div class="card col-6 text-center m-3 p-0 rounded-0" style="width: 300px;">
                <img src="<?= DOCTORS_IMG_PATH . $doctor['doctor_pathimg'] ?>" class="card-img-top rounded-0" alt="<?= $doctor['doctor_name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $doctor['doctor_name'] ?></h5>
                    <p class="card-text"><?= $doctor['doctor_description'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>

</section>