<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "vendor/autoload.php";

    if(isset($_POST['submit'])) {
        require 'path/to/PHPMailer/src/Exception.php';
        require 'path/to/PHPMailer/src/PHPMailer.php';
        require 'path/to/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try{
            //Recipients
            $mail->setFrom($_POST['email'], $_POST['name']);
            $mail->addAddress('jakestewart95@outlook.com', 'Jake Stewart');     // Add email of company here
            $mail->addReplyTo($_POST['email'], $_POST['name']);

            $mail->isHTML(true);
            $mail->Subject ='Form Submission: '.$_POST['subject'];
            $mail->Body = '<h1 align=center>Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].'</h1>';

            $mail->send();
            echo 'Message has been sent';
            header("Location: contact.html");
        }
        catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>