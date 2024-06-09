<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"])) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shanejk13@gmail.com';
        $mail->Password = 'ztfkhslvavrbljmr';
        $mail->SMTPSecure = 'TLS';
        $mail->Port = '587';
        $mail->setFrom('shanejk13@gmail.com');
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);
        $mail->Subject = 'Form Submission';
        $mail->Body = $_POST["message"];
        
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>