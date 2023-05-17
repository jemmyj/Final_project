<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificamos que se haya enviado el correo electrónico
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Validamos que el correo electrónico sea válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Invalid email format';
            exit();
        }
    }
}

// Verificamos si se ha enviado un correo electrónico antes de intentar enviarlo
if (isset($_POST['email'])) {

    $email = $_POST['email'];

    // Validamos que el correo electrónico sea válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format';
        exit();
    }

    // Creamos una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuramos los ajustes del servidor SMTP
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'localhost';
        $mail->SMTPAuth   = false;
        $mail->SMTPAutoTLS = false;
        $mail->Port       = 587;

        // Configuramos el correo electrónico
        $mail->setFrom('jemmyjin30@gmail.com', 'Jemmy'); // aquí debes poner tu correo electrónico y tu nombre
        $mail->addAddress($email); // aquí agregamos la dirección de correo electrónico del destinatario
        $mail->isHTML(true);
        $mail->Subject = 'Subscription Confirmation';
        $mail->Body    = '<p>Thank you for subscribing to our newsletter!</p>';

        // Enviamos el correo electrónico
        $mail->send();
        echo 'Message has been sent';
        $json_string = json_encode('');
        $file = 'si.json';
        file_put_contents($file, $json_string);
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
