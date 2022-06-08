<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];
$ticket_title = $_SESSION['ticket_title'][0];

$title = $ticket_title;

$query = $mysqli->prepare("SELECT id_ticket FROM tickets WHERE ticket_title = ? and clients_id_client = ?;");
$query->bind_param('si',$title, $id);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$tid = $row[0];



$query = $mysqli->prepare("UPDATE ticket_statuses SET ticket_status = 'Canceled', status_reason = 'none' WHERE tickets_id_ticket = ?;");
$query->bind_param('i', $tid);
$query->execute();


echo "ticket canceled";

header("Location:../dashboard.php");

?>