<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];

$query =  $mysqli->prepare("
	SELECT tickets.id_ticket, tickets.ticket_title, ticket_statuses.ticket_status
	FROM tickets
	INNER JOIN ticket_statuses
	ON tickets.id_ticket = ticket_statuses.tickets_id_ticket
	WHERE  tickets.clients_id_client = ?
	ORDER BY id_ticket ASC
	;");

$query->bind_param('i',$id);
$query->execute();
$ticket_result = $query->get_result();
$row = mysqli_fetch_row($ticket_result);


if ($row != 0 )
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