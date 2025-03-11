document.addEventListener("DOMContentLoaded", function () {
    const roleSelect = document.getElementById("role-select");
    const authButtons = document.getElementById("auth-buttons");
    const inscriptionButton = document.getElementById("inscription-button");
    const connexionButton = document.getElementById("connexion-button");
    const authContainer = document.getElementById("auth-container");

    roleSelect.addEventListener("change", function () {
        if (roleSelect.value) {
            authButtons.style.display = "block";
        } else {
            authButtons.style.display = "none";
        }
    });

    inscriptionButton.addEventListener("click", function () {
        fetch("./codes/include_inscription.php")
            .then(response => response.text())
            .then(data => {
                authContainer.innerHTML = data;
                if (roleSelect.value === "eleve") {
                    document.getElementById("student-options").style.display = "block";
                    const referentOui = document.getElementById("professeur_referent_oui");
                    const referentNon = document.getElementById("professeur_referent_non");
                    const professeurKey = document.getElementById("professeur-key");

                    referentOui.addEventListener("change", function () {
                        professeurKey.style.display = "block";
                    });

                    referentNon.addEventListener("change", function () {
                        professeurKey.style.display = "none";
                    });
                }
            })
            .catch(error => console.error("Erreur :", error));
    });

    connexionButton.addEventListener("click", function () {
        fetch("./codes/include_connexion.php")
            .then(response => response.text())
            .then(data => authContainer.innerHTML = data)
            .catch(error => console.error("Erreur :", error));
    });
});