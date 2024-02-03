<?php

// Fonction qui retourne le chemin du script en cours d'exécution
function getCurrentScriptPath()
{
    return $_SERVER['SCRIPT_NAME'];
}

// Fonction qui retourne les informations de la page correspondant à l'URL courante.
function getPageInfo($pages, $section)
{
    $currentScriptPath = getCurrentScriptPath();
    foreach ($pages[$section] as $page) {
        // Si l'URL courante est trouvée dans l'URL de la page ou dans l'URL de la page suivie de 'index.php'
        // On gère le cas ou l'utilisateur saisi directement index.php dans son URL
        if (strpos($page['url'], $currentScriptPath) !== false || strpos($page['url'] . 'index.php', $currentScriptPath) !== false) {
            return $page;
        }
    }
    // Si aucune page ne correspond à l'URL, on retourne les informations de la page d'accueil par défaut pour éviter une erreur ou une page vide
    return $pages[$section]['index_page'];
}

// Fonction qui génère un tableau de liens de navigation pour la section spécifiée (navbar, footernav ...).
// Chaque lien contient le titre de la page, son URL et met la class active si le lien est actif et ne met rien s'il est inactif.
function generateNavLinks($pages, $section)
{
    $navlinks = array();
    $currentScriptPath = getCurrentScriptPath();
    foreach ($pages[$section] as $page) {
        if (strpos($page['url'], $currentScriptPath) !== false || strpos($page['url'] . 'index.php', $currentScriptPath) !== false) {
            $activeLink = 'active';
        } else {
            $activeLink = '';
        }
        $navlinks[] = array(
            'link_title' => $page['title'],
            'link_url' => $page['url'],
            'link_active' => $activeLink
        );
    }
    return $navlinks;
}

// Fonction qui affiche la section principale de la page courante
function displayPrimarySection($primarySection, $currentPage)
{
    if (isset($primarySection[$currentPage])) {
        $section = $primarySection[$currentPage];

        echo '<section>
    <h2 class="d-flex justify-content-center fs-1">' . $section["title"] . '</h2>
    <p class="fs-22">' . $section["content"] . '</p>
</section>';
    } else {
        // Si la section n'existe pas, affiche un message d'erreur.
        echo 'La section n\'existe pas.';
    }
}
