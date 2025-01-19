<?php
use PHPMailer\PHPMailer\PHPMailer;


if (isset($_SESSION["tituloEmail"])) {
    $titulo = $_SESSION["tituloEmail"];
    $mensaje = $_SESSION["mensajeEmail"];
    $email = $_SESSION["emailEnviar"];
    unset($_SESSION["tituloEmail"]);
    unset($_SESSION["mensajeEmail"]);
    unset($_SESSION["emailEnviar"]);
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail ->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "natalyurribarri23@gmail.com";
    $mail->Password = "vdzj mbuo ynxl iemc";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;

    $mail->setFrom("natalyurribarri23@gmail.com");
    $mail->addAddress($email); // correo al que enviaremos
    $mail->isHTML(true);
    $mail->Subject = $titulo;
    $mail->Body = '<h1>'.$mensaje.'</h1>';
    $mail ->send();

}
?>