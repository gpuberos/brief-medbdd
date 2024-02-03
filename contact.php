<?php require_once __DIR__ . '/utilities/layout/header.ut.php'; ?>

<?php

// var_dump(getCurrentUrl());
// var_dump($_SERVER['REQUEST_URI']);
// var_dump($_SERVER['SCRIPT_NAME']);

?>

<div class="container my-5 text-white">
    <div class="container text-center">
        <!-- Section générique titre + paragraphe -->
        <?php displaySection($db, 'contact'); ?>
    </div>
    <?php require_once __DIR__ . '/utilities/form/contact_form.ut.php'; ?>
</div>

<?php require_once __DIR__ . '/utilities/layout/footer.ut.php'; ?>