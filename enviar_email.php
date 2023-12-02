<?php
//Envio de Formulário PhpMailer
require_once "./index.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


$mail = new PHPMailer(true);


try {
    
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '***';                     
    $mail->Password   = '***';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                    

    
    $mail->setFrom('loureirogabrieloficial@gmail.com', 'Gabriel');
    $mail->addAddress($email, 'Gabriel');     

  
    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Mensagem enviada para ' . $nome;
    $mail->Body    = $mensagem;

    $mail->send();
    echo "Email enviado";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
