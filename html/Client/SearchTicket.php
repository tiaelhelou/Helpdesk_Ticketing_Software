<?php

include('..\ConnecttoDb\my_db.php');

session_start();
$id = $_SESSION['ID'];

$word = $_POST['search_keyword'];

$query = $mysqli->prepare("SELECT ticket_title FROM tickets WHERE ticket_title = ? and id_client = ?
	;");
$query->bind_param('si',$word, $id);
$query->execute();
$result1 = $query->get_result();
$row1 = mysqli_fetch_row($account_result);

$query = $mysqli->prepare(" SELECT id_type FROM types where hardware_type = ? and id_type = 
	SELECT types_id_type FROM tickets WHERE id_client = ?;");
$query->bind_param('si',$word, $id);
$query->execute();
$result = $query->get_result();
$type_row = mysqli_fetch_row($account_result);
$type_id = $type_row[0];

$query = $mysqli->prepare("SELECT ticket_title FROM tickets WHERE types_id_type = ? and id_client = ?
	;");
$query->bind_param('si',$type_id, $id);
$query->execute();
$result2 = $query->get_result();

if ($row1 == 0 and $type_row == 0){

	echo "Nothing Foud! Please make sure you entered the right word";
}
else{

	$ticket = [];

	while($tickets = $result1->fetch_assoc()){
		$ticket[] = $tickets['ticket_title']; 
	}
	$_SESSION['title1']=$ticket;

	$tickett = [];

	while($tickets = $result2->fetch_assoc()){
		$tickett[] = $tickets['ticket_title']; 
	}
	$_SESSION['title2']=$tickett;
}


?>