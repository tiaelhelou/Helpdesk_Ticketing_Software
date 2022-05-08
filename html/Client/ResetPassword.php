<?php

include('..\ConnecttoDb\my_db.php');

$email = $_POST['client_email'];
$password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];


if($password != $confirm_password)
{
	echo "The passwords dont match";
}
else
{
	$query = $mysqli->prepare("SELECT id_client FROM clients WHERE client_email = ?;");
	$query->bind_param('s',$email);
	$query->execute();
	$account_result = $query->get_result();
	$row = mysqli_fetch_row($account_result);

	if($row == 0){

		echo "Incorrect email";

	}
	else{
		$query = $mysqli->prepare(
			"UPDATE clients 
			SET client_password = ?
			WHERE client_email = ?;"
		);
		$query->bind_param('ss',$confirm_password, $email);
		$query->execute();

		echo "Password changed !";

		header("Location:..\login.html");

	}	
}

?>