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
    <div class="container">
        <section id="left" class="content_">
            <div id="auth-container">
                <label for="role-select">Je suis:</label>
                <select id="role-select">
                    <option value="">Sélectionnez</option>
                    <option value="professeur">Professeur</option>
                    <option value="eleve">Élève</option>
                    <option value="employeur">Employeur</option>
                </select>
                <div id="auth-buttons" style="display: none;">
                    <button id="inscription-button">Inscription</button>
                    <button id="connexion-button">Connexion</button>
                </div>
            </div>
        </section>
        <section id="right" class="content_">
            <div id="new-account-container">
            </div>
        </section>
    </div>
    <script src="./codes/script_toggle-mode.js"></script>
    <script src="./codes/script_toggle-password.js"></script>
    <script src="./codes/script_role_selection.js"></script>
</body>
</html>