<?php

// Fonction qui retourne le chemin du script en cours d'exécution.
function getCurrentScriptPath()
{
    return $_SERVER['SCRIPT_NAME'];
}

// Fonction qui retourne les informations de la page correspondant à l'URL courante.
function getPageInfo($db)
{
    // On récupère le chemin du script courant.
    $currentScriptPath = getCurrentScriptPath();

    // Prépare la requête SQL
    $sql = "SELECT * FROM pages";

    // Prépare la requête SQL pour l'exécution.
    $sth = $db->prepare($sql);

    // Exécute la requête SQL.
    $sth->execute();

    // Récupère tous les résultats de la requête SQL et les stockes dans $pages.
    $pages = $sth->fetchAll();

    // On parcourt chaque page dans la section spécifiée.
    foreach ($pages as $page) {
        // On vérifie si l'URL courante est trouvée dans l'URL de la page ou dans l'URL de la page suivie de 'index.php'.
        // Cela permet de gérer le cas où l'utilisateur saisit directement 'index.php' dans son URL.
        if (strpos($page['page_url'], $currentScriptPath) !== false || strpos($page['page_url'] . 'index.php', $currentScriptPath) !== false) {
            // Si une correspondance est trouvée, on retourne les informations de cette page.
            return $page;
        }
    }
}

function generateNavLinks($db, $navName)
{
    // Obtention du chemin du script courant
    $currentScriptPath = getCurrentScriptPath();

    // Prépare la requête SQL
    $sql = "SELECT pages.*, nav_category.nav_name FROM pages 
    INNER JOIN nav_category ON pages.nav_category_id = nav_category.id
    WHERE nav_category.nav_name = :navName";

    // Prépare la requête SQL pour l'exécution.
    $sth = $db->prepare($sql);

    // Lie la valeur de $navName au paramètre nommé dans la requête SQL
    $sth->bindParam(':navName', $navName);

    // Exécute la requête SQL.
    $sth->execute();

    // Récupère tous les résultats de la requête SQL et les stockes dans $games.
    $pages = $sth->fetchAll();

    // On parcourt chaque page dans la section spécifiée.
    foreach ($pages as $page) {
        // On vérifie si l'URL courante est trouvée dans l'URL de la page ou dans l'URL de la page suivie de 'index.php'.
        // Cela permet de gérer le cas où l'utilisateur saisit directement 'index.php' dans son URL.
        if (strpos($page['page_url'], $currentScriptPath) !== false || strpos($page['page_url'] . 'index.php', $currentScriptPath) !== false) {
            // Si une correspondance est trouvée, on retourne les informations de cette page.
            $activeLink = 'active';
        } else {
            // Sinon, le lien n'est pas actif tu n'ajoutes rien
            $activeLink = '';
        }

        // Ajout d'un nouveau tableau associatif au tableau des liens de navigation
        // Ce tableau contient le titre du lien, l'URL du lien et l'état actif du lien
        $navLinks[] = [
            'link_title' => $page['page_title'],
            'link_url' => $page['page_url'],
            'link_active' => $activeLink
        ];
    }

    // Retour du tableau des liens de navigation
    return $navLinks;
}

// Fonction qui affiche la section principale de la page courante
function displaySection($db, $sectionCategory)
{
    // Prépare la requête SQL
    $sql = "SELECT sections.* FROM sections 
    INNER JOIN section_category ON sections.section_category_id = section_category.id
    WHERE section_category.section_category_name = :category";

    // Prépare la requête SQL pour l'exécution.
    $sth = $db->prepare($sql);

    // Lie la valeur de $sectionCategory au paramètre nommé dans la requête SQL
    $sth->bindParam(':category', $sectionCategory);

    // Exécute la requête SQL.
    $sth->execute();

    // Récupère tous les résultats de la requête SQL et les stockes dans $games.
    $sections = $sth->fetchAll();

    // On vérifie si la section principale de la page courante existe.
    if (!empty($sections)) {
        // Si elle existe, on récupère les informations de cette section.
        foreach ($sections as $section) {
            // On affiche la section en utilisant echo. La section est composée d'un titre (h2) et d'un contenu (p).
            // Le titre et le contenu sont récupérés à partir du tableau $section.
            echo '
            <section>
                <h2 class="d-flex justify-content-center fs-1">' . $section['section_title'] . '</h2>
                <p class="fs-22">' . $section['section_description'] . '</p>
            </section>
            ';
        }
    } else {
        // Si la section n'existe pas, on affiche un message d'erreur.
        echo 'La section n\'existe pas.';
    }
}
