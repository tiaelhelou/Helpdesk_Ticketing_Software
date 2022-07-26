<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];
$title = $_SESSION['ticket_title'][0];

$text = $_POST['ticket_reply'];

$query = $mysqli->prepare("SELECT id_ticket FROM tickets WHERE ticket_title = ? and clients_id_client = ?;");
$query->bind_param('si', $title, $id);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$tid = $row[0];

$query = $mysqli->prepare("SELECT max(id_replie) FROM client_replies WHERE tickets_id_ticket = ? and clients_id_client = ?;");
$query->bind_param('ii', $tid, $id);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$c_id = $row[0];


$query = $mysqli->prepare("SELECT max(id_employee_reply) FROM employee_replies WHERE tickets_id_ticket = ?;");
$query->bind_param('i', $tid);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$e_id = $row[0];

if($c_id >= $e_id ){
	$reply_id = $c_id +1;
}
else if($c_id <= $e_id ){
	$reply_id = $e_id +1;
}




$query = $mysqli->prepare(
						  "INSERT INTO client_replies(id_replie, ticket_reply, tickets_id_ticket, clients_id_client)
						   VALUES (?, ?, ?, ?)"
						 );
$query->bind_param('ssii',$reply_id, $text, $tid, $id);
$query->execute();

header('Location: ViewSpecificTicket2.php');

?>