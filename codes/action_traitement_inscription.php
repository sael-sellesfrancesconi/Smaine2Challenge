<?php
// Vérif de la méthode POST et du token CSRF
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        $_SESSION['error'] = "Accès non autorisé.";
        header("Location: ../index.php");
        exit();
    }

    // Récup et sécurisation des données
    $id = trim($_POST["id"]);
    $id = filter_var($id, FILTER_SANITIZE_STRING); // Sanitize l'identifiant

    $mdp1 = $_POST["mdp2"];
    $mdp2 = $_POST["mdp3"];
    $role = $_POST["role"];

    // Vérif de l'encodage ASCII
    if (!mb_check_encoding($id, 'ASCII') || !mb_check_encoding($mdp1, 'ASCII')) {
        $_SESSION['error'] = "Obligation d'utiliser des caractères ASCII (non-étendu).";
        header("Location: ../index.php");
        exit();
    }

    // Vérif des champs requis
    if (empty($id) || empty($mdp1) || empty($mdp2)) {
        $_SESSION['error'] = "Champs requis.";
        header("Location: ../index.php");
        exit();
    }

    // Vérif de la longueur de l'ID
    if (strlen($id) > 24) {
        $_SESSION['error'] = "Identifiant trop long (max 24 caractères).";
        header("Location: ../index.php");
        exit();
    }

    // Vérif de la longueur du mot de passe
    if (strlen($mdp1) < 6) {
        $_SESSION['error'] = "Mot de passe trop court (min 6 caractères).";
        header("Location: ../index.php");
        exit();
    } else if (strlen($mdp1) > 24) {
        $_SESSION['error'] = "Mot de passe trop long (max 24 caractères).";
        header("Location: ../index.php");
        exit();
    }

    // Vérif que les mots de passe correspondent
    if ($mdp1 !== $mdp2) {
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
        header("Location: ../index.php");
        exit();
    }

    // Hashage du mot de passe
    $hashed_password = password_hash($mdp1, PASSWORD_DEFAULT);
    try {
        // Connexion à la base de données
        $pdo = new PDO(
            "mysql:host=localhost;dbname=u211312457_TrouverUnStage",
            getenv("DB_USER"),
            getenv("DB_PASS"),
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );

        // Vérif du nombre total de comptes
        $stmt = $pdo->query("SELECT COUNT(*) FROM users");
        $count = $stmt->fetchColumn();

        if ($count >= 100) {
            $_SESSION['error'] = "Limite de comptes atteinte (100).";
            header("Location: ../index.php");
            exit();
        }

        // Vérif si l'identifiant est déjà pris
        $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
        $stmt->execute([$id]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = "Identifiant déjà pris.";
            header("Location: ../index.php");
            exit();
        }

        // Génération d'un ID unique pour les professeurs
        $professeur_id = null;
        if ($role === 'professeur') {
            $professeur_id = bin2hex(random_bytes(8)); // Génère un ID unique de 16 caractères hexadécimaux
        }

        // Insertion du nouvel utilisateur
        $stmt = $pdo->prepare("INSERT INTO users (id, password, role, professeur_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$id, $hashed_password, $role, $professeur_id]);

        $_SESSION['success'] = "Compte créé avec succès.";
        header("Location: ./space.php");
        sleep(2); // Réduit le risque de spam les créations de compte
        exit();

    } catch (PDOException $e) {
        // Gestion des erreurs en cas d'exception PDO
        $_SESSION['error'] = "Erreur serveur.";
        header("Location: ../index.php");
        exit();
    }
}
?>