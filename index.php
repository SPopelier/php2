<!-------------------------------index.php------------------------------->
<?php

include 'data.php';

// Récupérer la route depuis l'URL
$route = $_GET['page'] ?? 'page-accueil';

// Obtenir les données de la page
$page = getpageData($route);

// Inclure le header
include 'header.php';


// Charger la bonne page
switch ($route) {
    case 'page-contact': include 'contact.php'; break;
    case 'page-contactWithFiles': include 'contactWithFiles.php'; break;
    default: include 'accueil.php'; break;
}

// Inclure le footer
include 'footer.php';
?>


