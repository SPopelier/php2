<!-------------------------------contactWithFiles.php------------------------------->

<?php
#PHP reçoit les données, vérifie le fichier, l’enregistre dans un dossier, et affiche une réponse.

$upload_dir = "upload/";
$taillemax = "10 * 1024 * 1024";

// Vérifie si un fichier est bien envoyé
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
    #tableau spécial PHP qui contient toutes les infos du fichier (nom, taille, emplacement temporaire, etc.).
$nomFichier = $_FILES['fichier']['name'];
$tailleFichier = $_FILES['fichier']['size'];
$tmpFichier = $_FILES['fichier']['tmp_name'];

// Crée le dossier s'il n'existe pas
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
        # crée le dossier upload/ s’il n’existe pas encore (important si tu veux que ça marche partout).
    }

    // Empêche l'écrasement et sécurise le nom
    $nomFichier = time() . "_" . basename($nomFichier);
    #on ajoute une horloge pour éviter d’écraser un fichier avec le même nom.


    $cheminFichier = $upload_dir . $nomFichier;

    // Déplace le fichier
    if (move_uploaded_file($tmpFichier, $cheminFichier)) {
        #la fonction magique qui déplace le fichier depuis sa cachette temporaire vers ton dossier final (upload/).
        echo "✅ Fichier envoyé avec succès : $nomFichier";
    } else {
        echo "❌ Erreur lors du transfert du fichier.";
    }
} else {
    echo "❌ Aucun fichier reçu ou erreur à l'envoi.";
}
}
?>

<main>
<h1><?php echo htmlspecialchars($page['header'] ?? 'Envoi de fichiers'); ?></h1>
<p><?php echo htmlspecialchars($page['description'] ?? 'Envoyez-nous vos fichiers en toute simplicité'); ?></p>


<form action=" " method="post" enctype="multipart/form-data">
    <label for="nom">Nom et Prénom</label>
    <input type="text" name="nom" id="nom" required>

    <label for="fichier">Joindre un fichier : (10 Mo max.)</label>
    <input type="file" name="fichier" id="fichier" value="" required>

    <input type="submit" value="Envoyer">
</form>
</main>
