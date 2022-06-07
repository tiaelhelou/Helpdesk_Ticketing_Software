
<?php

include('..\ConnecttoDb\my_db.php');
session_start();

$query = $mysqli->prepare("SELECT employee_email FROM employees;");
$query->execute();
$email_result = $query->get_result();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file. */
//require 'C:\xampp\composer\vendor\autoload.php';

/* If you installed PHPMailer without Composer do this instead: */
require 'C:\xampp\htdocs\Helpdesk\html\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Helpdesk\html\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Helpdesk\html\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(TRUE);


while($employees = $email_result->fetch_assoc()){

   try {

      $mail->setFrom('helpdeskchip@gmail.com', 'CHIP');
      $mail->addAddress($employees['employee_email'], ' ');
      $mail->Subject = 'New Ticket';
      $mail->Body = 'One of the client has issued a ticket log to the website and help him/her out' ;

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
}

header("Location:..\dashboard.php");

?>