<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Valider les données
    $errors = [];

    // Vérifier que le nom n'est pas vide
    if (empty($name)) {
        $errors[] = "Le nom est requis.";
    }

    // Vérifier que l'email est valide
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Une adresse email valide est requise.";
    }

    // Vérifier que le message n'est pas vide
    if (empty($message)) {
        $errors[] = "Le message est requis.";
    }

    // Si il y a des erreurs, les afficher
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        // Traitement des données (par exemple, envoyer un email)
        $to = "tallaboubacar165@gmail.com";
        $subject = "Nouveau message de contact de $name";
        $email_message = "Nom: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email";

        if (mail($to, $subject, $email_message, $headers)) {
            echo "Merci de nous avoir contactés. Nous vous répondrons bientôt.";
        } else {
            echo "Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer.";
        }
    }
}
?>
