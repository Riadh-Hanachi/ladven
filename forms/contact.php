

<?php
include('../assets/vendor/php-email-form/php-email-form.php');

$contact = new PHP_Email_Form;

// Configuration SMTP - à mettre **avant** $contact->send()
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'riadhanachi@gmail.com',
  'password' => '1212121212', // ⚠️ À remplacer par un mot de passe d'application Gmail
  'port' => '587',
  'encryption' => 'tls'
);

$contact->to = 'riadhanachi@gmail.com';
$contact->from_name = $_POST['name'] ?? 'Anonyme';
$contact->from_email = $_POST['email'] ?? '';
$contact->subject = $_POST['subject'] ?? 'Formulaire de contact';

$contact->add_message($_POST['name'] ?? '', 'Nom');
$contact->add_message($_POST['email'] ?? '', 'Email');
$contact->add_message($_POST['message'] ?? '', 'Message', 1000);

if ($contact->send()) {
    echo 'Message envoyé avec succès !';
} else {
    echo 'Erreur lors de l\'envoi : ' . $contact->error;
}
?>



