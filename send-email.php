<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
if (isset ($_POST['submit'])) {
    $mail = new PHPMailer(true);
    $mail ->isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail ->SMTPAuth = true;
    $mail ->Username = 'shanejk13@gmail.com';
    $mail ->Password = 'utaw jumz iqxb epjn ';
    $mail ->SMTPSecure = 'ssl';
    $mail ->Port = 465;
    $mail ->setFrom('shanejk13@gmail.com');
    $mail ->addReplyTo($_POST['email']);
    $mail -> addAddress('shanejk13@gmail.com');
    $mail ->isHTMl(true);
    $mail ->Subject = 'Form Submission';
    $mail ->Body = $_POST['message'];
    try {
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    echo "<script>alert('Message has been sent'); document.location.href='index.html'</script>";
}
?>