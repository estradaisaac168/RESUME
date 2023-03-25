<?php

namespace Helpers;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $company;
    public $recruiter;
    public $message;
    public $token;

    public function __construct($company, $recruiter, $email, $message)
    {
        $this->email = $email;
        $this->company = $company;
        $this->recruiter = $recruiter;
        $this->message = $message;
    }

    public function sendMessage()
    {

        // create a new object
        $mail = new PHPMailer(true);
        // configure an SMTP
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'c5e82287e8a99f';
        $mail->Password = 'ce29033f99a215';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        $mail->setFrom('estradaisaac168@gmail.com');
        $mail->addAddress('estradaisaac168@gmail.com', 'BienesRaices.com');
        $mail->Subject = 'Tienes un Nuevo Email';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p> . $this->company . </p>";
        $contenido .= "<p> . $this->recruiter . </p>";
        $contenido .= "<p> . $this->message . </p>";

        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}
