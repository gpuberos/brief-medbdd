<?php
require_once __DIR__ . '/data/doctors.data.php';
require_once __DIR__ . '/utilities/layout/header.ut.php';

?>

<!-- Section générique titre + paragraphe -->
<div class="container my-5">
    <?php displayPrimarySection($primarySection, 'home'); ?>
</div>

<?php require_once __DIR__ . '/utilities/card/doctors_card.ut.php'; ?>

<?php require_once __DIR__ . '/utilities/layout/footer.ut.php'; ?>