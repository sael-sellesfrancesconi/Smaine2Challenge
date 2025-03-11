
        <form method="post" action="./codes/action_traitement_inscription.php">
            
            <h2> Créer un compte </h2>
            <h3> Identifiant </h3>
            <input type="text" name="id" required>
                    
            <h3> Mot de passe </h3>
            <div class="barre">
                <input type="password" name="mdp2" id="mdp2" required>
                <button type="button" class="aff" id="aff2" onclick="togglePassword('mdp2')">Aff</button>
            </div>
                    
            <h3> Confirmez </h3>
            <div class="barre">
                <input type="password" name="mdp3" id="mdp3">
                <button type="button" class="aff" id="aff3" onclick="togglePassword('mdp3')">Aff</button>
            </div>

            <h3> Je suis: </h3>
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
            <br>
            <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8'); ?>">
            <input type="submit" name="creer" value="Créer le compte">
        </form>
        