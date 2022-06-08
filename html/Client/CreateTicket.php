<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];

$title = $_POST['ticket_title'];
$description = $_POST['ticket_description'];
$type = $_POST['hardware_type'];

$query = $mysqli->prepare(
						  "INSERT INTO types(hardware_type)
						   VALUES (?)"
						 );
$query->bind_param('s',$type);
$query->execute();

$query = $mysqli->prepare("SELECT id_type FROM types WHERE hardware_type = ?;");
$query->bind_param('s',$type);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$type_id = $row[0];

$query = $mysqli->prepare(
						  "INSERT INTO tickets(ticket_title, ticket_description, types_id_type, clients_id_client)
						   VALUES (?, ?, ?, ?)"
						 );
$query->bind_param('ssii',$title, $description, $type_id, $id);
$query->execute();

$query = $mysqli->prepare("SELECT max(id_ticket) FROM tickets;");
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$ticket_id = $row[0];

$query = $mysqli->prepare(
						  "INSERT INTO ticket_statuses(ticket_status, status_reason, tickets_id_ticket, employees_id_employee)
						   VALUES ('Open','none',?,1)"
						 );
$query->bind_param('i', $ticket_id);
$query->execute();


echo "created succefully";

header("Location:SupportMail.php");

?>