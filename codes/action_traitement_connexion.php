<?php
session_start();

// Vérif POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérif CSRF
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        sleep(5); // Fait perdre du temps
        $_SESSION['error'] = "Accès non autorisé.";
        header("Location: https://trouver-stage.marvinfm.fr");
        exit();
    }

    // Récup des champs
    $id = $_POST['id'] ?? '';
    $mdp1 = $_POST['mdp1'] ?? '';

    // Vérif des champs
    if (empty($id) || empty($mdp1)) {
        $_SESSION['error'] = "Champs requis";
        header("Location: https://trouver-stage.marvinfm.fr");
        exit();
    }
    try {
        // Connexion à la bdd
        $pdo = new PDO(
            "mysql:host=localhost;dbname=u211312457_marvinfm_users",
            getenv("DB_USER"),
            getenv("DB_PASS"),
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        
        // Récupe les infos
        $db_query = $pdo->prepare("SELECT id, password, status FROM users WHERE id = ?");
        $db_query->execute([$id]);
        $user = $db_query->fetch();

        // Vérif si l'utilisateur existe et que le mdp est correct
        if ($user && password_verify($mdp1, $user['password'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['status'] ?? 'user';
            header("Location: https://trouver-stage.marvinfm.fr/space"); // En cas de succès d'auth
            exit();
            
        } else {
            sleep(5); // Fait perdre du temps, et réduit le risque de bruteforce
            $_SESSION['error'] = "Mot de passe ou utilisateur invalide.";
            header("Location: https://trouver-stage.marvinfm.fr");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Erreur serveur";
        header("Location: https://trouver-stage.marvinfm.fr");
        exit();
    }
}

?>
