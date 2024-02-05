<?php

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

// Fonction qui récupère tous les datas de la base de données.
function findAllDatas($db, $sql)
{
    // Prépare la requête SQL pour l'exécution.
    // La méthode prepare() est utilisée pour préparer la requête SQL pour l'exécution.
    // Elle retourne un objet PDOStatement qui est stocké dans la variable $sth.
    $sth = $db->prepare($sql);

    // Exécute la requête SQL.
    // La méthode execute() est utilisée pour exécuter la requête SQL préparée.
    $sth->execute();

    // Récupère tous les résultats de la requête SQL et les stocke dans $doctors.
    // La méthode fetchAll() est utilisée pour récupérer tous les résultats de la requête SQL.
    // Elle retourne un tableau associatif de tous les résultats qui sont stockés dans la variable $doctors.
    $result = $sth->fetchAll();

    // Retourne les docteurs récupérés.
    // La fonction retourne le tableau associatif $doctors qui contient tous les docteurs récupérés de la base de données.
    return $result;
}
