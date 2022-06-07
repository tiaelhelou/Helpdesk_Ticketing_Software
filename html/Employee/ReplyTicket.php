<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];
$title = $_SESSION['ticket_title'][0];

$text = $_POST['ticket_reply'];

$query = $mysqli->prepare("SELECT id_ticket FROM tickets WHERE ticket_title = ?;");
$query->bind_param('s', $title);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$tid = $row[0];

$query = $mysqli->prepare("SELECT max(id_replie) FROM client_replies WHERE tickets_id_ticket = ? ;");
$query->bind_param('i', $tid);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$c_id = $row[0];

$query = $mysqli->prepare("SELECT max(id_employee_reply) FROM employee_replies WHERE tickets_id_ticket = ? and employees_id_employee = ?;");
$query->bind_param('ii', $tid, $id);
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
else if ( $c_id == 0 and $e_id == 0 ){
	$reply_id = 0;
}

$query = $mysqli->prepare(
						  "INSERT INTO employee_replies (id_employee_reply, ticket_reply, tickets_id_ticket, employees_id_employee)
						   VALUES (?, ?, ?,?)"
						 );
$query->bind_param('ssii',$reply_id, $text, $tid, $id);
$query->execute();


$query = $mysqli->prepare("SELECT clients_id_client FROM client_replies WHERE tickets_id_ticket = ?;");
$query->bind_param('i',$tid);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$ids = $row[0];

$query = $mysqli->prepare("SELECT client_email FROM clients WHERE id_client = ?;");
$query->bind_param('i',$ids);
$query->execute();
$email_result = $query->get_result();
$row = mysqli_fetch_row($email_result);
$email = $row[0];

$_SESSION['email'] = $email;

header('Location: UpdateMail.php');


?>