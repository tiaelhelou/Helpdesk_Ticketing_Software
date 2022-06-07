<?php

include('..\ConnecttoDb\my_db.php');
session_start();
$id = $_SESSION['ID'];

$query =   "SELECT tickets.id_ticket, tickets.ticket_title
		  FROM tickets
		  INNER JOIN ticket_statuses
		  ON tickets.id_ticket = ticket_statuses.tickets_id_ticket
		  WHERE ticket_statuses.ticket_status = 'Open' 
		  ORDER BY id_ticket ASC
		 ";
$ticket_result = $mysqli->query($query);

if ($ticket_result->num_rows > 0)
{
	$ticket_info = [];

	while($tickets = $ticket_result->fetch_assoc()){
		$ticket_info[] = $tickets["id_ticket"];
		$ticket_info[]= $tickets["ticket_title"];
		$ticket_info[] = 'Open'; 
	}
	$_SESSION['oall_ticket']=$ticket_info;
	
	header("Location:..\listViewOpenEmployee.php");
	$var = json_encode($ticket_info);
    echo $var;

	
}

else{


		$_SESSION['oall_ticket'] = 0;
	header("Location:..\listViewOpenEmployee.php");}
	


?>