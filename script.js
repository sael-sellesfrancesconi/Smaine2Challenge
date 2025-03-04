document.getElementById('signupForm').addEventListener('submit', function(event) {
   event.preventDefault();
   alert('Formulaire d\'inscription soumis!');
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
   event.preventDefault();
   alert('Formulaire de connexion soumis!');
});