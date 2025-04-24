<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mpesa_code = $_POST["mpesa_code"];

    // Save to a file (Optional)
    $file = fopen("payments.txt", "a");
    fwrite($file, "Name: $name | Email: $email | M-Pesa Code: $mpesa_code\n");
    fclose($file);

    // Send email notification using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Use Gmail SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'okeloomondi@gmail.com';
        $mail->Password = 'fouo sfwp xeaa dwbj';  
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender & Recipient
        $mail->setFrom('okeloomondi@gmail.com', 'Omondi eBook Store');  // Your email & store name
        $mail->addAddress('okeloomondi@gmail.com');  // Owner's email to receive notifications

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New M-Pesa Payment Submitted";
        $mail->Body = "Name: $name<br>Email: $email<br>M-Pesa Code: $mpesa_code";

        // Send Email
        $mail->send();
        header("Location: thank-you.html");
exit();

    } catch (Exception $e) {
        echo "Error: Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>
