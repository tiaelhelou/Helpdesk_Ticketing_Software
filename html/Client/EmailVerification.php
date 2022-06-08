<?php

include('..\ConnecttoDb\my_db.php');

$email = $_POST['client_email'];



$query = $mysqli->prepare("SELECT email_statuses_id_email_status FROM clients WHERE client_email = ?;");
$query->bind_param('s',$email);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$eid = $row[0];


$query = $mysqli->prepare("UPDATE email_statuses SET email_status = 'Verified' WHERE id_email_status = ?;");
$query->bind_param('i',$eid);
$query->execute();


echo "email verified";

header("Location:..\Login.html");

?>