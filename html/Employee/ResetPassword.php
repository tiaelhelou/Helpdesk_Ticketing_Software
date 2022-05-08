<?php

include('..\ConnecttoDb\my_db.php');

$email = $_POST['employee_email'];
$password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

if($password != $confirm_password)
{
	echo "The passwords dont match";
}
else
{

	$query = $mysqli->prepare(
		"UPDATE employees 
		SET employee_password = ?
		WHERE employee_email = ?;"
	);
	$query->bind_param('ss',$confirm_password, $email);
	$query->execute();
	echo "Password changed !";

	header("Location:/Helpdesk/html/employeelogin.html");
}



?>