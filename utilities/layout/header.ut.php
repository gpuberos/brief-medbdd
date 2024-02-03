<?php

require_once dirname(dirname(__DIR__)) . '/data/pages_infos.data.php';
require_once dirname(dirname(__DIR__)) . '/data/primary_section.data.php';

require_once dirname(dirname(__DIR__)) . '/function/header.fn.php';

$pageInfo = getPageInfo($pages, 'navbar');
$title = $pageInfo['title'];
$metaDesc = $pageInfo['metaDesc'];
$bodyId = $pageInfo['bodyId'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- CSS Custom -->
    <link rel="stylesheet" href="/assets/css/styles.css">

    <title><?= $title ?></title>
    <meta name="description" content="<?= $metaDesc ?>">
</head>

<body id="<?= $bodyId ?>">
    <header>
        <?php require_once dirname(dirname(__DIR__)) . '/utilities/nav/header_nav.ut.php'; ?>
    </header>

    <main>