<?php 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailfrom = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "jakestewart95@outlook.com";
    $headers = "From: ".$mailfrom;
    $txt = "You have recieved an email from ".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: http://www.google.com/");
}