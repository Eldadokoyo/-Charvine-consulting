<?php
$to = "eldadokoyo92@gmail.com";
$subject = "Test Email";
$message = "Hello, this is a test email from PHP!";
$headers = "From: noreply@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Mail sent successfully!";
} else {
    echo "Mail failed to send.";
}
?>
