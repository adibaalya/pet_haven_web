<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

header('Content-Type: application/json');

if (isset($_POST['submit'])) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shanejk13@gmail.com';
        $mail->Password = 'hkxx vmtf stbl fzxe ';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('shanejk13@gmail.com', $_POST['name']);
        $mail->addReplyTo($_POST['email']);
        $mail->addAddress('shanejk13@gmail.com');
        $mail->isHTMl(true);
        $mail->Subject = 'Pet Haven: Contact Form';
        $mail->Body = '
            <h1>Pet Haven Contact Form</h1>
            <p>' . $_POST['message'] . '</p>
            <br>
            <p>Best regards,</p>
            <p>' . $_POST['name'] . '</p>'; 
        if ($mail->send()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $mail->ErrorInfo]);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    }
}