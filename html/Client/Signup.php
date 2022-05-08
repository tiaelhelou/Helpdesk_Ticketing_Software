<?php

include('..\ConnecttoDb\my_db.php');

$name = $_POST['client_name'];
$email = $_POST['client_email'];
$password = $_POST['client_password'];
$confirm_password = $_POST['confirm_password'];
$phone = $_POST['client_phone_number'];
$company = $_POST['client_company_name'];


if ( $password != $confirm_password) {
	echo "Passwords doesn't match";
}
else {

	$query = $mysqli->prepare("SELECT id_client FROM clients WHERE client_name = ? and client_email = ? ;");
	$query->bind_param('ss',$name, $email);
	$query->execute();
	$account_result = $query->get_result();
	$row1 = mysqli_fetch_row($account_result);

	if($account_result->num_rows != 0){

		echo "You already have an account!";

	}	
	else{

		$query = $mysqli->prepare("INSERT INTO email_statuses (email_status) VALUES ('Unverified')");
		$query->execute();

		$query = $mysqli->prepare("SELECT count(id_email_status) FROM email_statuses;");
		$query->execute();
		$email_result = $query->get_result();
		$row = mysqli_fetch_row($email_result);
		$email_id = $row[0];


		$query = $mysqli->prepare("INSERT INTO account_statuses (account_status, employees_id_employee) VALUES ('Pending', 1)");
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

		header("Location:..\login.html");
		
	}

}


?>