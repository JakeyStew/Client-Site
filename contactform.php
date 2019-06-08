<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "vendor/autoload.php";

    if(isset($_POST['submit'])) {
        require 'vendor/phpmailer/phpmailer/src/Exception.php';
        require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require 'vendor/phpmailer/phpmailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try{
            //Recipients
            $mail->setFrom($_POST['email'], $_POST['name']);
            $mail->addAddress('jakestewart95@outlook.com', 'FindFix');     // Add email of company here
            $mail->addReplyTo($_POST['email'], $_POST['name']);

            $mail->isHTML(true);
            $mail->Subject ='Customer Query: '.$_POST['subject'];
            $mail->Body = '<h3>Customer: </h3>'.$_POST['name'].'<br><h3>Email: </h3>'.$_POST['email'].'<br><h3>Message: </h3>'.$_POST['message'];

            $mail->send();
            header("Location: https://www.jakestewart.uk/contact.html"); //Change to redirect
        }
        catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>