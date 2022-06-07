<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];


$query =   "SELECT clients.client_name, clients.client_email, clients.client_company_name
		  FROM clients
		  INNER JOIN account_statuses
		  ON clients.account_statuses_id_account_status = account_statuses.id_account_status
		  WHERE account_statuses.account_status = 'Pending' 
		
		 ";


$client_result = $mysqli->query($query);


if ($client_result->num_rows > 0)
{
	$clients_info = [];

	while($clients = $client_result->fetch_assoc()){
		$clients_info[] = $clients["client_name"];
		$clients_info[]= $clients["client_email"];
		$clients_info[] = $clients["client_company_name"]; 
	}


	$_SESSION['client_info'] = $clients_info;
	header("Location:..\approveAccount.php");

}
else{


	$_SESSION['client_info'] = 0;
	header("Location:..\approveAccount.php");}
	

?>