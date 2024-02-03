<?php

// Fonction qui retourne le chemin du script en cours d'exécution.
function getCurrentScriptPath()
{
    return $_SERVER['SCRIPT_NAME'];
}

// Fonction qui retourne les informations de la page correspondant à l'URL courante.
function getPageInfo($pages, $section)
{
    // On récupère le chemin du script courant.
    $currentScriptPath = getCurrentScriptPath();

    // On parcourt chaque page dans la section spécifiée.
    foreach ($pages[$section] as $page) {
        // On vérifie si l'URL courante est trouvée dans l'URL de la page ou dans l'URL de la page suivie de 'index.php'.
        // Cela permet de gérer le cas où l'utilisateur saisit directement 'index.php' dans son URL.
        if (strpos($page['url'], $currentScriptPath) !== false || strpos($page['url'] . 'index.php', $currentScriptPath) !== false) {
            // Si une correspondance est trouvée, on retourne les informations de cette page.
            return $page;
        }
    }

    // Si aucune page ne correspond à l'URL courante, on retourne les informations de la page d'accueil par défaut.
    // Cela permet d'éviter une erreur ou une page vide si l'URL ne correspond à aucune page.
    return $pages[$section]['index_page'];
}

// Fonction qui génère un tableau de liens de navigation pour la section spécifiée (navbar, footernav ...).
// Chaque lien contient le titre de la page, son URL et met la class active si le lien est actif et ne met rien s'il est inactif.
function generateNavLinks($pages, $section)
{
    // Création d'un tableau vide pour stocker les liens de navigation
    $navlinks = [];

    // Obtention du chemin du script courant
    $currentScriptPath = getCurrentScriptPath();

    // Parcours de chaque page dans la section spécifiée
    foreach ($pages[$section] as $page) {

        // Vérification si l'URL de la page est dans le chemin du script courant
        if (strpos($page['url'], $currentScriptPath) !== false || strpos($page['url'] . 'index.php', $currentScriptPath) !== false) {

            // Si c'est le cas, le lien est actif tu ajoutes active à la class
            $activeLink = 'active';
        } else {

            // Sinon, le lien n'est pas actif tu n'ajoutes rien
            $activeLink = '';
        }

        // Ajout d'un nouveau tableau associatif au tableau des liens de navigation
        // Ce tableau contient le titre du lien, l'URL du lien et l'état actif du lien
        $navlinks[] = [
            'link_title' => $page['title'],
            'link_url' => $page['url'],
            'link_active' => $activeLink
        ];
    }

    // Retour du tableau des liens de navigation
    return $navlinks;
}

// Fonction qui affiche la section principale de la page courante
function displayPrimarySection($primarySection, $currentPage)
{
    // On vérifie si la section principale de la page courante existe.
    if (isset($primarySection[$currentPage])) {
        // Si elle existe, on récupère les informations de cette section.
        $section = $primarySection[$currentPage];

        // On affiche la section en utilisant echo. La section est composée d'un titre (h2) et d'un contenu (p).
        // Le titre et le contenu sont récupérés à partir du tableau $section.
        echo '<section>
    <h2 class="d-flex justify-content-center fs-1">' . $section["title"] . '</h2>
    <p class="fs-22">' . $section["content"] . '</p>
</section>';
    } else {
        // Si la section n'existe pas, on affiche un message d'erreur.
        echo 'La section n\'existe pas.';
    }
}
