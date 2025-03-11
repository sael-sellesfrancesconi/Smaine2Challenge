<?php
session_start();
?>

<form method="post" action="./codes/action_traitement_inscription.php">
    <h2> Créer un compte </h2>
    <h3> Nom </h3>
    <input type="text" name="nom" required>
    <h3> Prénom </h3>
    <input type="text" name="prenom" required>
    <h3> Adresse Email </h3>
    <input type="email" name="email" required>
    <h3>Mot de passe</h3>
    <div class="barre">
        <input type="password" name="mdp2" id="mdp2" required>
        <button type="button" class="aff" id="aff2" onclick="togglePassword('mdp2')">Aff</button>
    </div>
    <h3>Confirmez</h3>
    <div class="barre">
        <input type="password" name="mdp3" id="mdp3">
        <button type="button" class="aff" id="aff3" onclick="togglePassword('mdp3')">Aff</button>
    </div>
    <div id="student-options" style="display: none;">
        <h3>Êtes-vous un élève avec un professeur référent?</h3>
        <input type="radio" name="professeur_referent" value="oui" id="professeur_referent_oui">
        <label for="professeur_referent_oui">Oui</label>
        <input type="radio" name="professeur_referent" value="non" id="professeur_referent_non">
        <label for="professeur_referent_non">Non</label>
        <div id="professeur-key" style="display: none;">
            <h3>Clé d'ID du professeur</h3>
            <input type="text" name="professeur_key">
        </div>
    </div>
    <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" name="creer" value="Créer le compte">
</form>