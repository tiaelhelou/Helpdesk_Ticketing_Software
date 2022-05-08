<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];

$name = $_POST['client_name'];


$query = $mysqli->prepare("SELECT account_statuses_id_account_status FROM clients WHERE client_name = ?;");
$query->bind_param('s',$name);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$a_id = $row[0];


$query = $mysqli->prepare("UPDATE account_statuses SET account_status = 'Approved', employees_id_employee = ? WHERE id_account = ?;");
$query->bind_param('i',$a_id, $id );
$query->execute();

$query = $mysqli->prepare("SELECT client_email FROM clients WHERE client_name = ?;");
$query->bind_param('s',$name);
$query->execute();
$email_result = $query->get_result();
$row = mysqli_fetch_row($email_result);
$email = $row[0];


header("Location:..\listClient.php");

?>