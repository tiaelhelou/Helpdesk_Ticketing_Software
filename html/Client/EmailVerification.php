<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];

$query = $mysqli->prepare("SELECT email_statuses_id_email_status FROM clients WHERE id_client = ?;");
$query->bind_param('i',$id);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$eid = $row[0];


$query = $mysqli->prepare("UPDATE email_statuses SET email_status = 'Verified' WHERE id_email = ?;");
$query->bind_param('i',$email_statuses_id_email_status);
$query->execute();


echo "email verified"

?>