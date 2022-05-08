<?php

include('..\ConnecttoDb\my_db.php'); 

$query =  $mysqli->prepare("
		  SELECT tickets.id_ticket, tickets.ticket_title, ticket_statuses.ticket_status
		  FROM tickets
		  INNER JOIN ticket_statuses
		  ON tickets.id_ticket = ticket_statuses.tickets_id_ticket
		  ORDER BY id_ticket ASC
		 ;");

$query->execute();
$ticket_result = $query->get_result();
$row = mysqli_fetch_row($ticket_result);


if ($row != 0)
{
	$ticket_info = [];

	while($tickets = $ticket_result->fetch_assoc()){
		$ticket_info = $tickets["tickets.id_ticket"];
		$ticket_info = $tickets["tickets.ticket_title"];
		$ticket_info = $tickets["ticket_statuses.ticket_status"]; 
	}
	$_SESSION['all_ticket']=$ticket_info;

}
?>