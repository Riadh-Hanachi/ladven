<?php
class PHP_Email_Form {
    public $to = '';
    public $from_name = '';
    public $from_email = '';
    public $subject = '';
    public $messages = array();
    public $ajax = false;

    // Pour SMTP, si besoin plus tard
    public $smtp = null;

    public $error = '';

    // Ajouter un message (texte) avec un label (ex: 'From', 'Email', 'Message')
    public function add_message($message, $label = '', $maxlength = 0) {
        if ($maxlength > 0) {
            $message = substr(strip_tags(trim($message)), 0, $maxlength);
        } else {
            $message = strip_tags(trim($message));
        }
        $this->messages[] = ($label ? $label . ': ' : '') . $message;
    }

    // Valide l’email
    protected function is_valid_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Envoi du mail
    public function send() {
        if (!$this->to) {
            $this->error = 'Destinataire (to) non défini.';
            return false;
        }
        if (!$this->from_email || !$this->is_valid_email($this->from_email)) {
            $this->error = 'Email de l\'expéditeur invalide.';
            return false;
        }
        if (!$this->from_name) {
            $this->from_name = 'Formulaire de contact';
        }
        if (!$this->subject) {
            $this->subject = 'Nouveau message de contact';
        }

        $body = implode("\n", $this->messages);
        $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
        $headers .= "Reply-To: " . $this->from_email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        // Utilisation SMTP non implémentée ici, mais tu peux l’ajouter ensuite

        $success = mail($this->to, $this->subject, $body, $headers);

        if (!$success) {
            $this->error = 'Échec de la fonction mail().';
        }

        return $success;
    }
}
