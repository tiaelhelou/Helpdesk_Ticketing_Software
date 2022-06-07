
<?php

session_start();

$email = $_SESSION['email'];
$password = $_SESSION['pass'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file. */
//require 'C:\xampp\composer\vendor\autoload.php';

/* If you installed PHPMailer without Composer do this instead: */
require 'C:\xampp\htdocs\Helpdesk\html\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Helpdesk\html\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Helpdesk\html\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(TRUE);

try {
   
   $mail->setFrom('helpdeskchip@gmail.com', 'CHIP');
   $mail->addAddress($email, ' ');
   $mail->Subject = 'CHIP Account';
   $mail->Body = 'An account has been created for you please use the following credentials to login. Email: '. $email. ' Password: '. $password. ' and do  not forget to change your password';
   
   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.gmail.com.';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'TLS';
   
   /* SMTP authentication username. */
   $mail->Username = 'helpdeskchip@gmail.com';
   
   /* SMTP authentication password. */
   $mail->Password = 'P@ssw0rd@2022';
   
   /* Set the SMTP port. */
   $mail->Port = 587;
   
   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}

header("Location:..\generateAccount.php");


?>



