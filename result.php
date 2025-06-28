<?php

if (empty($_POST)) {
    header('Location: form.html');
    exit();
}

$errors = [];
$vendeurs = ["Andy", "Dwight", "Jim", "Phyllis", "Stanley"];


$companyName = isset($_POST['companyName']) && !empty($_POST['companyName']) ?
    trim($_POST['companyName']) : '';
$lastName = isset($_POST['lastName']) && !empty($_POST['lastName']) ?
    trim($_POST['lastName']) : '';
$email = isset($_POST['email']) && !empty($_POST['email']) ?
    trim($_POST['email']) : '';
$contactMessage = isset($_POST['contactMessage']) && !empty($_POST['contactMessage']) ?
    trim($_POST['contactMessage']) : '';
$vendeur = isset($_POST['contactCommercial']) && !empty($_POST['contactCommercial']) ?
    $_POST['contactCommercial'] : '';

if (empty($companyName))
    $errors[] = "Le nom de votre entreprise n'est pas renseigné.";
if (empty($lastName))
    $errors[] = "Votre nom n'est pas renseigné.";
if (empty($email))
    $errors[] = "Votre Email n'est pas renseigné.";
if (empty($contactMessage))
    $errors[] = "Votre message est vide.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors[] = "Votre email n'est pas valide.";
if (strlen($contactMessage) < 30)
    $errors[] = "Votre message est court et doit avoir 30 caractères minimum.";
if (empty($vendeur))
    $errors[] = "Vous devez choisir votre vendeur.";
if (!in_array($vendeur, $vendeurs))
    $errors[] = "Votre vendeur n'est pas valide.";


if (!empty($errors)) {
    require 'error.php';
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif - Réclamation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Nous traitons votre retour.</h1>
        <img src="images/logo_dunder.png" alt="Logo Dunder Mifflin">
    </header>

    <main>
        <div class="summary">
            <p>
                <?php
                switch ($vendeur) {
                    case "Andy":
                        echo '<img src="images/andy.webp" alt="Andy">';
                        echo "<span>Votre vendeur : $vendeur</span>";
                        break;
                        case "Dwight":
                            echo '<img src="images/dwight.webp" alt="Dwight">';
                            echo "<span>Votre vendeur : $vendeur</span>";
                            break;
                    case "Jim":
                        echo '<img src="images/jim.webp" alt="Jim">';
                        echo "<span>Votre vendeur : $vendeur</span>";

                        break;
                    case "Phyllis":
                        echo '<img src="images/phyllis.webp" alt="Phyllis">';
                        echo "<span>Votre vendeur : $vendeur</span>";

                        break;
                    case "Stanley":
                        echo '<img src="images/stanley.webp" alt="Stanley">';
                        echo "<span>Votre vendeur : $vendeur</span>";
                        break;
                }
                ?>
            </p>

            <ul>
                <li>Votre entreprise : <span><?= htmlentities($companyName) ?></span></li>
                <li>Votre nom : <span><?= htmlentities($lastName) ?></span></li>
                <li>Votre email : <span><?= htmlentities($email) ?></span></li>
                <li>Votre message :
                    <p>
                        <?= htmlentities($contactMessage) ?>
                    </p>
                </li>
            </ul>
        </div>
    </main>
</body>

</html>