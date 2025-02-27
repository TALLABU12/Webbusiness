document.getElementById('contact-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupérer les valeurs des champs du formulaire
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  // Effectuer une validation basique des champs (facultatif)
  if (!name || !email || !message) {
    alert('Tous les champs sont obligatoires.');
    return;
  }

  // Envoyer le formulaire avec EmailJS
  const templateParams = {
    name: name,
    email: email,
    message: message
  };

  emailjs.send('service_jkpta1e', 'template_5ej0ior', templateParams)
    .then(function(response) {
      console.log('Succès!', response.status, response.text);
      document.getElementById('formResponse').innerText = 'Formulaire envoyé avec succès !';
    }, function(error) {
      console.error('Erreur:', error);
      document.getElementById('formResponse').innerText = 'Une erreur est survenue.';
    });

  // Réinitialiser le formulaire (facultatif)
  document.getElementById('contact-form').reset();
});

// Toggling Menu
const showMenu = (toggleId, navId) => {
  const toggle = document.getElementById(toggleId);
  const nav = document.getElementById(navId);

  if (toggle && nav) {
    toggle.addEventListener("click", () => {
      nav.classList.toggle("show");
    });
  }
};

showMenu("nav-toggle",
