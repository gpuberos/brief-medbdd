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

// Fonction qui récupère tous les docteurs de la base de données.
function findAllDoctors($db)
{
    // Prépare la requête SQL pour sélectionner tous les docteurs.
    // La requête SQL est stockée dans la variable $sql.
    $sql = "SELECT id, doctor_name, doctor_description, doctor_pathimg FROM doctors";

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
    $doctors = $sth->fetchAll();

    // Retourne les docteurs récupérés.
    // La fonction retourne le tableau associatif $doctors qui contient tous les docteurs récupérés de la base de données.
    return $doctors;
}

// Fonction qui récupère tous les produits de la base de données.
function findAllProducts($db)
{
    // Prépare la requête SQL pour sélectionner tous les produits.
    // La requête SQL est stockée dans la variable $sql.
    $sql = "SELECT products.*, product_category.category_name 
            FROM products 
            INNER JOIN product_category ON products.product_category_id = product_category.id";

    // Prépare la requête SQL pour l'exécution.
    // La méthode prepare() est utilisée pour préparer la requête SQL pour l'exécution.
    // Elle retourne un objet PDOStatement qui est stocké dans la variable $sth.
    $sth = $db->prepare($sql);

    // Exécute la requête SQL.
    // La méthode execute() est utilisée pour exécuter la requête SQL préparée.
    $sth->execute();

    // Récupère tous les résultats de la requête SQL et les stocke dans $products.
    // La méthode fetchAll() est utilisée pour récupérer tous les résultats de la requête SQL.
    // Elle retourne un tableau associatif de tous les résultats qui sont stockés dans la variable $products.
    $products = $sth->fetchAll();

    // Retourne les docteurs récupérés.
    // La fonction retourne le tableau associatif $products qui contient tous les produits récupérés de la base de données.
    return $products;
}
