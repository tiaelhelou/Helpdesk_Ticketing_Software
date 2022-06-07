<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID']; 

$name = $_POST['client_name'];
$email = $_POST['client_email'];
$password = $_POST['client_password'];
$phone = $_POST['client_phone_number'];
$company = $_POST['client_company_name'];

if (empty($name) || empty($email) || empty($password) || empty($phone) || empty($company)){

	echo "Empty field(s)";
}
else{

	
	$query = $mysqli->prepare("INSERT INTO email_statuses (email_status) VALUES ('Verified')");
	$query->execute();

	$query = $mysqli->prepare("SELECT count(id_email_status) FROM email_statuses;");
	$query->execute();
	$email_result = $query->get_result();
	$row = mysqli_fetch_row($email_result);
	$email_id = $row[0];


	$query = $mysqli->prepare("INSERT INTO account_statuses (account_status, employees_id_employee) VALUES ('Approved', 1)");
	$query->execute();

	$query = $mysqli->prepare("SELECT count(id_account_status) FROM account_statuses;");
	$query->execute();
	$account_result = $query->get_result();
	$row = mysqli_fetch_row($account_result);
	$account_id = $row[0];


	$query = $mysqli->prepare("INSERT INTO clients (client_name, client_email, client_password, client_phone_number, client_company_name, email_statuses_id_email_status, account_statuses_id_account_status, employees_id_employee) VALUES (?, ?, ?, ?, ?, ?, ?, 1)");
	$query->bind_param("sssssii", $name , $email , $password , $phone , $company, $email_id, $account_id);
	$query->execute();

	echo "Account created successfully";
	
	$_SESSION['email'] = $email;
	$_SESSION['pass'] = $password;

	header("Location:AccountMail.php");

}


?>