<!-------------------------------header.php------------------------------->
<?php

// Vérifier que la variable $page existe
if (!isset($page) || !is_array($page)) {
    $page = [];
}

// Liste des index qui doivent exister dans la variable $page sur ce template :
$templateIndexes = array('index', 'page-accueil', 'header', 'page-header', 'footer', 'page-footer','contact', 'page-contact', 'contactWithFiles', 'page-contactWithFiles');

// Vérifier que tous les index existent, sinon mettre des valeurs vides à la place.
foreach( $templateIndexes as $index ){
    if( !isset($page[$index]) ){
        $page[$index] = '';
    }
}
// Appliquer htmlspecialchars sur toutes les valeurs (sécurité).
$page = array_map('htmlspecialchars', $page);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page['header']; ?></title>
    <meta name="description" content="<?php echo $page['page-header']; ?>">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Crafty+Girls&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <a href="index.php?page=page-accueil">Accueil</a>
        <a href="index.php?page=page-contact">Contact</a>
        <a href="index.php?page=page-contactWithFiles">Contact avec fichiers</a>
    </nav>
    <h1><?php echo htmlspecialchars($page['header'] ?? 'Bienvenue !'); ?></h1>
</header>