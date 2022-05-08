<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];
$ticket_title = $_SESSION['title'];


$title = $_POST['ticket_title'];
$reason = $_POST['status_reason'];

$query = $mysqli->prepare("SELECT id_ticket FROM tickets WHERE ticket_title = ?;");
$query->bind_param('s',$title);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$tid = $row[0];


$query = $mysqli->prepare("UPDATE ticket_statuses SET ticket_status = 'Blocked', status_reason = ? WHERE tickets_id_ticket = ? and employees_id_employee = ?;");
$query->bind_param('sii',$reason, $tid, $id);
$query->execute();

header("Location:..\dashboardemployee.php");

?>