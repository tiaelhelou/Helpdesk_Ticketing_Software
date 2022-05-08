<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];
$ticket_title = $_SESSION['title'];

$text = $_POST['ticket_reply'];
$title = $ticket_title;

$query = $mysqli->prepare("SELECT id_ticket FROM tickets WHERE ticket_title = ? and id_client = ?;");
$query->bind_param('si', $title, $id);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$tid = $row[0];

$query = $mysqli->prepare("SELECT max(id_replie) FROM client_replies WHERE ticket_title = ? and id_client = ?;");
$query->bind_param('si', $title, $id);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$c_id = $row[0];


$query = $mysqli->prepare("SELECT max(id_employee_replie) FROM employee_replies WHERE ticket_title = ? and id_client = ?;");
$query->bind_param('si', $title, $id);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$e_id = $row[0];

if($c_id > $e_id ){
	$reply_id = $c_id +1;
}
else if($c_id < $e_id ){
	$reply_id = $e_id +1;
}


$query = $mysqli->prepare(
						  "INSERT INTO client_replies(id_replie, ticket_reply, tickets_id_ticket, clients_id_client)
						   VALUES (?, ?, ?, ?)"
						 );
$query->bind_param('ssii',$reply_id, $title, $tid, $id);
$query->execute();

header('Location: viewSpecificTicket.php');

?>