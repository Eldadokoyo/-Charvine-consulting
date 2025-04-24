<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'okeloomondi@gmai.com';  // Replace with your Gmail
        $mail->Password = 'fouo sfwp xeaa dwbj';  // Replace with your Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender & Recipient
        $mail->setFrom($email, $name);  
        $mail->addAddress('okeloomondi@gmail.com');  // Email where messages will be sent

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Message";
        $mail->Body = "<strong>Name:</strong> $name<br>
                       <strong>Email:</strong> $email<br>
                       <strong>Message:</strong><br>$message";

        // Send Email
        $mail->send();
        echo "<p style='color: green;'>Your message has been sent successfully!</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: Email could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
    }
} else {
    echo "<p style='color: red;'>Invalid request.</p>";
}
?>
