<?php

require("mail.php");

$messageSuccess = "SUCCESS";
$messageFailure = "FAILURE";
$status="";
function Validate($name, $email, $subject, $message, $form){

return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

if (isset($_POST["form"])) {
    
    if (Validate($_POST["name"], $_POST["email"], $_POST["subject"], $_POST["message"], $_POST["form"])) {
        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $body = "$name <$email> te envia el siguiente mensaje: <br><br> $message";
        //Mandar el correo
        sendMail($subject, $body, $email, $name, true);
      
        $status = $messageSuccess;
    }
    else {
        $status = $messageFailure;
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario de contacto</title>
</head>

<body>

<?php if($status==$messageSuccess): ?>

    <div class="alert-success">
    <span>¡Mensaje enviado con éxito!</span>
    </div>

<?php endif ?>

<?php if($status==$messageFailure): ?>

<div class="alert-failure">
    <span>Surgió un problema</span>
</div>

<?php endif ?>

    <form action="./" method="POST">

        <h1>¡Contactanos!</h1>

        <div class="input-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="input-group">
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="input-group">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="input-group">
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </div>

        <div class="button-container">
            <button name="form" type="submit">Enviar</button>
        </div>

        <div class="contact-info">
            <span>
                13 Saw Mille Circle, North Olmested.
            </span>
        </div>

        <div class="info">
            <span>
                +1 123 456 7890
            </span>
        </div>
    </form>

</body>

</html>