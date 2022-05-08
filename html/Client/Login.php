<?php

session_start();

include('..\ConnecttoDb\my_db.php'); 
$email=$password=$dID="";

$email = $_POST['client_email'];
$password = $_POST['client_password'];

$query = $mysqli->prepare("SELECT id_client, client_name FROM clients WHERE client_email = ? and client_password = ?;");
$query->bind_param('ss',$email,$password);
$query->execute();
$account_result = $query->get_result();
$row = mysqli_fetch_row($account_result);

if($account_result->num_rows == 0){

	echo "Incorrect email or/and password";

}
else{
   

	$id = $row[0];
	$name = $row[1];
	$_SESSION['ID'] = $id;
	$_SESSION['NAME'] = $name;
	echo "Loged in successfully";
	header("Location:/helpdesk/html/dashboard.php");
}

?>