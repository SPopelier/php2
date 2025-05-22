<!-------------------------------contact.php------------------------------->
<?php

session_start(); // démarre une session PHP

$errors = []; //pour stocker les erreurs
$success = false; // pour savoir si tout s'est bien passé
function valid_donnees($data) {
    //fonction de nettoyage
    $data = trim($data);
    //supprime les espaces
    $data = stripslashes($data);
    //supprime les antislashs
    $data = htmlspecialchars($data);
    //convertit les caractères spéciaux
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //on récupère les valeurs entrées par l'utilisateur :
    $civility = isset($_POST['select-civility']) ? valid_donnees($_POST['select-civility']) : '';
    $nom = isset($_POST['nom']) ? valid_donnees($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? valid_donnees ($_POST['prenom']) : '';
    $email = isset($_POST['email']) ? valid_donnees ($_POST['email']) : '';
    $raison = isset($_POST['raison']) ? valid_donnees ($_POST['raison']) : '';
    $message = isset($_POST['message']) ?valid_donnees ($_POST['message']) : '';
    //avec isset vérifie que la requête est en POST

    if (empty($civility)) {
        $errors['select-civility'] = "Veuillez séléctionner votre civilité";
    }
    if (empty($nom)) {
        $errors['nom'] = "Veuillez enter un nom";
    }
    if (empty($prenom)) {
        $errors['prenom'] = "Veuillez enter un prénom";
    }
    if (empty($email)) {
        $errors['email'] = "Veuillez enter un email";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Veuillez entrer un email valide";
    }
    if (empty($raison)) {
        $errors['raison'] = "Veuillez entrer une raison";
    }
    if (strlen($message) <5) {
        $errors['message'] = "Veuillez entrer un message d'au moins 5 lettres";
    }
    if (empty($errors)) {
        $success = true;

        $data = [
            'civility' => $civility,
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'raison' => $raison,
            'message' => $message,
        ];

        $line = implode(' | ', $data) . "\n";
        // implode transforme $data [] en string
        file_put_contents('formulaire.txt', $line, FILE_APPEND);
        //crée le fichier .txt, $line écrit dedans la string, file_append ajoute à la fin

    } else {
        $_SESSION['form_data'] = $_POST; // enregistre les données dans $_SESSION
    }
}

?>

    <main>
        <h1><?php echo htmlspecialchars($page['header'] ?? '💪 Bienvenue à l\'entraînement !'); ?></h1>
        <p><?php echo htmlspecialchars($page['description'] ?? 'Des exercices, des défis, et un soupçon de style 🎀✨'); ?></p>

        <form action="" method="post">
            <?php if (!empty($errors)): ?>
                <!--si le tableau des erreurs n'est pas vide-->

                <div class="errors">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <!--boucle qui parcourt toutes les erreurs-->
                            <li><?= $error ?></li>
                            <!--chaque erreur est affichée dans une liste-->
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php elseif ($success) : ?>
                <!--si il n'y a pas d'erreur-->
                <div class="success">
                    <p>🎉 Merci pour votre message, il a bien été envoyé !</p>
                </div>
            <?php endif; ?>

            <fieldset>
                <div>
                    <select name="select-civility" id="select-civility">
                        <option value="mr" <?= (isset($_POST['select-civility']) && $_POST['select-civility'] === 'mr') ? 'selected' : '' ?>>Monsieur</option>
                        <option value="mme" <?= (isset($_POST['select-civility']) && $_POST['select-civility'] === 'mme') ? 'selected' : '' ?>>Madame</option>
                        <option value="mlle" <?= (isset($_POST['select-civility']) && $_POST['select-civility'] === 'mlle') ? 'selected' : '' ?>>Mademoiselle</option>
                    </select>

                    <input type="text" name="nom" id="name" placeholder="Nom"  value="<?= isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ?>"> <!--placeholder pour indiquer le nom de l'input-->
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom"  value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '' ?>"> <!--value = pour ne pas perdre les infos saisies-->
                    <input type="email" name="email" id="email" placeholder="Email"  value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">

                    <legend>Raison du contact</legend>
                    <input type="radio" name="raison" id="renseignement" value="renseignement" <?= (isset($_POST['raison']) && $_POST['raison'] === 'renseignement') ? 'checked' : '' ?>>
                    <label for="renseignement">Un renseignement ?</label>
                    <input type="radio" name="raison" id="rdv" value="rdv" <?= (isset($_POST['raison']) && $_POST['raison'] === 'rdv') ? 'checked' : '' ?>>
                    <label for="rdv">Un RDV ?</label>

                    <textarea id="message" name="message" placeholder="Précisez votre demande."><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>

                    <input type="submit" name="valider" value="Envoyer">
                </div>
            </fieldset>
        </form>
    </main>


