<?php

include('..\ConnecttoDb\my_db.php');
session_start();


echo 'test';
$id = $_SESSION['ID'];

$query = 
		  "SELECT tickets.id_ticket, tickets.ticket_title
		  FROM tickets
		  INNER JOIN ticket_statuses
		  ON tickets.id_ticket = ticket_statuses.tickets_id_ticket
		  WHERE ticket_statuses.ticket_status = 'Open' 
		  ORDER BY tickets.id_ticket
		 ";


$ticket_result = $mysqli->query($query);


if ($ticket_result->num_rows > 0)
{
	$ticket_info = [];

	while($tickets = $ticket_result->fetch_assoc()){
		$ticket_info[] = $tickets["id_ticket"];
		$ticket_info[]= $tickets["ticket_title"];
	}
	$_SESSION['open_ticket']=$ticket_info;
	
	$var = json_encode($ticket_info);
	echo $var;
	echo 'test';

}

else{
	$_SESSION['open_ticket']=0;
}


$query = 
		  "SELECT tickets.id_ticket, tickets.ticket_title
		  FROM tickets
		  INNER JOIN ticket_statuses
		  ON tickets.id_ticket = ticket_statuses.tickets_id_ticket
		  WHERE ticket_statuses.ticket_status = 'Closed' 
		  ORDER BY tickets.id_ticket
		 ";


$ticket_result = $mysqli->query($query);


if ($ticket_result->num_rows > 0)
{
	$ticket_info = [];

	while($tickets = $ticket_result->fetch_assoc()){
		$ticket_info[] = $tickets["id_ticket"];
		$ticket_info[]= $tickets["ticket_title"];
	}
	$_SESSION['close_ticket']=$ticket_info;
}



else{
	$_SESSION['close_ticket']=0;
}



$query = 
		  "SELECT tickets.id_ticket, tickets.ticket_title
		  FROM tickets
		  INNER JOIN ticket_statuses
		  ON tickets.id_ticket = ticket_statuses.tickets_id_ticket
		  WHERE ticket_statuses.ticket_status = 'Blocked' 
		  ORDER BY tickets.id_ticket
		 ";


$ticket_result = $mysqli->query($query);


if ($ticket_result->num_rows > 0)
{
	$ticket_info = [];

	while($tickets = $ticket_result->fetch_assoc()){
		$ticket_info[] = $tickets["id_ticket"];
		$ticket_info[]= $tickets["ticket_title"];
	}
	$_SESSION['block_ticket']=$ticket_info;
}

else{
	$_SESSION['block_ticket']=0;
}
header("Location:..\kanban.php");

?>