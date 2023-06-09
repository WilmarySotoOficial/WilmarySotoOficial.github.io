<?php
// Incluir la biblioteca de PHPMailer
require 'assets\vendor\php-email-form\PHPMailer.php';
require 'assets\vendor\php-email-form\SMTP.php';
require 'assets\vendor\php-email-form\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $mensaje = $_POST["message"];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer();

    // Configurar el servidor SMTP y las credenciales
    $mail->isSMTP();
    $mail->Host = 'smtp.tu-servidor-smtp.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tu-email@example.com';
    $mail->Password = 'tu-contraseña';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configurar el remitente y el destinatario
    $mail->setFrom('tu-email@example.com', 'Tu Nombre');
    $mail->addAddress('destinatario@example.com', 'Nombre del Destinatario');

    // Configurar el contenido del mensaje
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje de contacto';
    $mail->Body = "<h2>Datos enviados:</h2>
                    <p>Nombre: $nombre</p>
                    <p>Email: $email</p>
                    <p>Mensaje: $mensaje</p>";

    // Enviar el correo electrónico
    if ($mail->send()) {
        echo "¡El mensaje se ha enviado correctamente!";
    } else {
        echo "Hubo un error al enviar el mensaje. Por favor, intenta nuevamente más tarde.";
    }
}
?>