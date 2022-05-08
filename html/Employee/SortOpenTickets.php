<?php

include('..\ConnecttoDb\my_db.php');

$query = $mysqli->prepare("
		  SELECT tickets.id_ticket, tickets.ticket_title
		  FROM tickets
		  INNER JOIN ticket_statuses
		  ON tickets.id_ticket = ticket_statuses.tickets_id_ticket
		  WHERE ticket_statuses.ticket_status = 'Open' 
		  ORDER BY tickets.id_ticket ASC
		 ;" );
$query->execute();
$ticket_result = $query->get_result();
$row = mysqli_fetch_row($ticket_result);


if ($row != 0)
{
	$ticket_info = [];

	while($tickets = $ticket_result->fetch_assoc()){
		$ticket_info = $tickets["tickets.id_ticket"];
		$ticket_info = $tickets["tickets.ticket_title"];
		
	}
	$_SESSION['open_ticket']=$ticket_info;

}
?>