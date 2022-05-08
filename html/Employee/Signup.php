<?php

include('..\ConnecttoDb\my_db.php');

$name = $_POST['employee_name'];
$email = $_POST['employee_email'];
$password = $_POST['employee_password'];
$confirm_password = $_POST['confirm_password'];

if ( $password != $confirm_password) {
	echo "Passwords doesn't match";
}
else {

	$query = $mysqli->prepare("SELECT employee_email FROM employees WHERE  employee_email = ? Limit 1;");
	$query->bind_param('s' , $email);
	$query->execute();
	$account_result = $query->get_result();
	$row1 = mysqli_fetch_row($account_result);

	if($account_result->num_rows != 0){

		echo "You already have an account!";
		

	}	
	else{

		$query = $mysqli->prepare("INSERT INTO employees (employee_name, employee_email, employee_password) VALUES (?, ?, ?)");
		$query->bind_param("sss", $name , $email , $password);
		$query->execute();

		echo "Account created successfully";

		header("Location: /Helpdesk/html/employeelogin.html");
		
		
	}

}


?>