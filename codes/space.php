<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

try {
    // Connexion à la base de données
    $pdo = new PDO(
        "mysql:host=localhost;dbname=u211312457_TrouverUnStage",
        getenv("DB_USER"),
        getenv("DB_PASS"),
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );

    // Récupération des informations de l'utilisateur
    $stmt = $pdo->prepare("SELECT id, role, professeur_id FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    if (!$user) {
        $_SESSION['error'] = "Utilisateur non trouvé.";
        header("Location: ../index.php");
        exit();
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Erreur serveur.";
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations du compte</title>
</head>
<body>
    <h1>Informations du compte</h1>
    <p>ID: <?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?></p>
    <p>Rôle: <?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8') ?></p>
    <?php if ($user['role'] === 'professeur'): ?>
        <p>ID unique: <?= htmlspecialchars($user['professeur_id'], ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
</body>
</html>