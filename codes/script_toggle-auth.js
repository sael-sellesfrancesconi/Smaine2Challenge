document.addEventListener("DOMContentLoaded", function () {
    
    const toggleButton = document.getElementById("toggle-auth");
    const authContainer = document.getElementById("auth-container");
    let isOriginal = true;
        
    toggleButton.addEventListener("click", function () {
        
        if (isOriginal) {
            fetch("./include_inscription.php")
            .then(response => response.text())
            .then(data => authContainer.innerHTML = data)
            .catch(error => console.error("Erreur :", error));
        } else {
            fetch("./include_connexion.php")
            .then(response => response.text())
            .then(data => authContainer.innerHTML = data)
            .catch(error => console.error("Erreur :", error));
        }
        isOriginal = !isOriginal;
    });
});