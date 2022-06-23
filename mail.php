<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("vendor/autoload.php");

$mail = new PHPMailer(true);

    function SendMail($subject, $body, $email, $name, $html = false){

        try {
        //Configuración inicial del servidor de correos
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $phpmailer->Port = 465;
        $phpmailer->Username = 'gcantutrevino@gmail.com';
        //Contraseñas de aplicaciones gmal
        $phpmailer->Password = 'ztuuvfsfqdwoszlq';

        //Añadiendo Destinatarios
        $phpmailer->setFrom('mark@facebook.com', 'Mark Zuckerberg');
        $phpmailer->addAddress($email, $name);

        //Definiendo el contenido de mi email
        $phpmailer->isHTML(true);
        $phpmailer->Subject = $subject;
        $phpmailer->Body = $body;
        
        //Mandar el correo
        $phpmailer->send();
   
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$e}";
        }
        
    }

?>