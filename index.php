<?php
    session_start();
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="https://marvinfm.fr/assets/images/icon.png">
    <title>Accueil // Trouver un stage </title>
    <link rel="stylesheet" href="./codes/styles_default.css">
</head>
<body>
    <header>
        <div>
            <h1> Trouver un stage </h1>
        </div>
        <div id="centre_header">
            <h3><a href="./"> Accueil </a></h3>
            <h3><a href="./index.php?page=recherche_stage"> Rechercher stage </a></h3>
            <h3><a href="./index.php?page=auth"> Connexion / Inscription </a></h3>
        </div>
        <div id="droite_header">
            <button id="toggle-mode"><i class="fa-solid fa-moon"></i></button>
		    <a href="https://marvinfm.fr"><i class="fa-solid fa-house"></i></a>
		</div>
    </header>
    <div class="container">
        <?php
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'auth') {
                include('./codes/include_auth.php');
            }
        }
        ?>
    </div>
    <script src="./codes/script_toggle-mode.js"></script>
    <script src="./codes/script_toggle-password.js"></script>
    <script src="./codes/script_role_selection.js"></script>
</body>
</html>