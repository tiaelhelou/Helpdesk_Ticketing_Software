<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];

$word = $_POST['search_keyword'];

$query = "SELECT ticket_title FROM tickets WHERE ticket_title = $word and id_client = $id
	";

$ticket_result = $mysqli->query($query);

if ($ticket_result->num_rows > 0){

	$ticket_info = [];

	while($tickets = $result1->fetch_assoc()){
		$ticket_info[] = $tickets["id_ticket"];
		$ticket_info[]= $tickets["ticket_title"];
		$ticket_info[] = $tickets["ticket_status"];
	}
	$_SESSION['vall_ticket']=$ticket_info;


}

header("Location:..\listViewAllEmployee.php");


?>