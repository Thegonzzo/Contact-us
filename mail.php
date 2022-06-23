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
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '7c8d5aa60a8b7c';
        $phpmailer->Password = 'd9ad7329f3cd5c';

        //Añadiendo Destinatarios
        $phpmailer->setFrom('contact@miempresa.com','Mi empresa');
        $phpmailer->addAddress($email,$name);

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