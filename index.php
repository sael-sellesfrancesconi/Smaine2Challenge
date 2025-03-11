<?php
    session_start();
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("../../assets/includes/include_default_head.html"); ?>
    
    <title>Accueil // Trouver un stage </title>
    <link rel="stylesheet" href="./codes/styles_default.css">
</head>
<body>
    <header class="content_">
        <h1> Trouver un stage </h1>
        <div class="barre">
            <a> Accueil </a>
            <a> Rechercher stage </a>
            <a> Voir employeurs </a>
            <a> Espace compte </a>
        </div>
        <button id="toggle-mode"><i class="fa-solid fa-moon"></i></button>
		<a href="https://marvinfm.fr"><i class="fa-solid fa-house"></i></a>
    </header>
    <!--
    <div class="container">
        <section id="left" class="content_">
            <div id="auth-container">
            <?php 
            include("./codes/include_connexion.php");
            ?>
            </div>
            <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']); // Supprimer l'erreur après affichage
                }
                if (isset($_SESSION['success'])) {
                    echo "<p style='color:green;'>" . $_SESSION['success'] . "</p>";
                    unset($_SESSION['success']); // Supprimer le message de succès après affichage
                }
            ?>
        </section>
        <section id="right" class="content_">
            <div id="new-account-container">
            <?php 
            include("./codes/include_inscription.php"); 
            ?>
            </div>
            <?php
                if (isset($_SESSION['error'])) {
                    echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']); // Supprimer l'erreur après affichage
                }
                if (isset($_SESSION['success'])) {
                    echo "<p style='color:green;'>" . $_SESSION['success'] . "</p>";
                    unset($_SESSION['success']); // Supprimer le message de succès après affichage
                }
            ?>
        </section>
        -->
    </div>
    <script src="./codes/script_toggle-mode.js"></script>
    <script src="./codes/script_toggle-password.js"></script>
</body>
</html>