<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="../assets/img/wonderland-pharma.png" alt="logo" class="w-75"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav fs-3">
                <?php
                $navbarLinks = generateNavLinks($pages, 'navbar');
                foreach ($navbarLinks as $key => $value) :
                ?>
                    <li class="nav-item">
                        <a href="<?= $value['link_url'] ?>" class="nav-link text-center <?= $value['link_active'] ?>"><?= $value['link_title'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>