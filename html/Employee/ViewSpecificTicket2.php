<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];

$title = $_SESSION['ticket_title'][0];

$query = $mysqli->prepare("SELECT clients_id_client FROM tickets WHERE ticket_title = ?;");
$query->bind_param('s',$title);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$client_id = $row[0];

$query = $mysqli->prepare("SELECT * FROM clients WHERE id_client = ?;");
$query->bind_param('i', $client_id);
$query->execute();
$info = $query->get_result();


$client_info = [];

while($clients = $info->fetch_assoc()){
	$client_info[] = $clients["client_name"];
	$client_info[] = $clients["client_email"];
	$client_info[] = $clients["client_password"];
	$client_info[] = $clients["client_phone_number"];
	$client_info[] = $clients["client_company_name"];
}
$_SESSION['client'] = $client_info;



$query = $mysqli->prepare("
	SELECT id_ticket, types_id_type FROM tickets WHERE ticket_title = ?; ");
$query->bind_param('s',$title);
$query->execute();
$id_result = $query->get_result();
$row = mysqli_fetch_row($id_result);
$ticket_id = $row[0];
$type_id = $row[1];

$query = $mysqli->prepare("SELECT * FROM tickets WHERE id_ticket = ?;");
$query->bind_param('i', $ticket_id);
$query->execute();
$info = $query->get_result();

$query = $mysqli->prepare("SELECT * FROM ticket_statuses WHERE tickets_id_ticket = ?;");
$query->bind_param('i', $ticket_id);
$query->execute();
$status = $query->get_result();

$query = $mysqli->prepare("SELECT * FROM types WHERE id_type = ?;");
$query->bind_param('i', $type_id);
$query->execute();
$type = $query->get_result();

$query = $mysqli->prepare("SELECT * FROM client_replies WHERE tickets_id_ticket = ?;");
$query->bind_param('i', $ticket_id);
$query->execute();
$c_reply = $query->get_result();

$query = $mysqli->prepare("SELECT * FROM employee_replies WHERE tickets_id_ticket = ?;");
$query->bind_param('i', $ticket_id);
$query->execute();
$e_reply = $query->get_result();


$ticket_info = [];

while($tickets = $info->fetch_assoc()){
	$ticket_info[] = $tickets['ticket_title'];
	$ticket_info[] = $tickets['id_ticket'];

}
$_SESSION['ticket_title']=$ticket_info;

$ticket_status = [];

while($ticket_statuses = $status->fetch_assoc()){
	$ticket_status[] = $ticket_statuses['ticket_status']; 
}
$_SESSION['status']=$ticket_status;


$ticket_type = [];

while($types = $type->fetch_assoc()){
	$ticket_type[]=$types['hardware_type'];
}
$_SESSION['type']=$ticket_type;

$ticket_c_reply = [];

while($client_replies = $c_reply->fetch_assoc()){
	$ticket_c_reply[] = $client_replies['id_replie']; 
	$ticket_c_reply[] = $client_replies['ticket_reply'];
}


$ticket_e_reply = [];

while($employee_replies = $e_reply->fetch_assoc()){
	$ticket_e_reply[] = $employee_replies['id_employee_reply'];
	$ticket_e_reply[] = $employee_replies['ticket_reply']; 
}

$e_counter = 0;
$c_counter = 0;

$replies = [];
$users = []; 

while(count($ticket_e_reply) > $e_counter and count($ticket_c_reply) > $c_counter ){

	if ($ticket_e_reply[$e_counter] < $ticket_c_reply[$c_counter]){
		$replies[] = $ticket_e_reply[$e_counter + 1];
		$users[] = 'Employee';
		$e_counter += 2;
	}
	else if ($ticket_e_reply[$e_counter] > $ticket_c_reply[$c_counter]) {
		$replies[] = $ticket_c_reply[$c_counter + 1];
		$users[] = 'Client';
		$c_counter += 2;
	}
}

if (count($ticket_c_reply) > $c_counter) {

	while(count($ticket_c_reply) > $c_counter ){

		$replies[] = $ticket_c_reply[$c_counter + 1];
		$users[] = 'Client';

		$c_counter += 2;
	}
}
else if (count($ticket_e_reply) > $e_counter) {

	while(count($ticket_e_reply) > $e_counter ){

		$replies[] = $ticket_e_reply[$e_counter + 1];
		$users[] = 'Employee';

		$e_counter += 2;
	}
}

$_SESSION['users'] = $users;
$_SESSION['replies'] = $replies;


header("Location:../viewTicketEmployee.php");

?>