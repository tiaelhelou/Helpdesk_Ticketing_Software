<?php

include('..\ConnecttoDb\my_db.php');

$query = $mysqli->prepare("SELECT employee_email FROM employees;");
$query->execute();
$email_result = $query->get_result();

$email = [];

while($employees = $email_result->fetch_assoc()){
	$email[] = $employees['employee_email']; 
}
$_SESSION['email']=$email;


?>