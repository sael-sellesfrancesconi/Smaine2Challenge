
        <form id="form" method="post" action="./codes/action_traitement_connexion.php">
            
             
            <h2> Connexion </h2>
            <br>  
            <h3> Identifiant </h3>
            <input type="text" name="id" required>
            <br>      
            <br>  
            <h3>Mot de passe</h3>
            <div class="barre">
                <input type="password" name="mdp1" id="mdp1" required>
                <button type="button" class="aff" id="aff1" onclick="togglePassword('mdp1')">Aff</button>
            </div>
                    
            <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8'); ?>">
            <input type="submit" name="connexion" value="Se connecter">
        </form>