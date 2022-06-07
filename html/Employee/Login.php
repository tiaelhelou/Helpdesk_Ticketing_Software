<?php
session_start();
include('..\ConnecttoDb\my_db.php');
$email=$password=$dID="";

$email = $_POST['employee_email'];
$password = $_POST['employee_password'];



$query = $mysqli->prepare("SELECT id_employee, employee_name FROM employees WHERE employee_email = ? and employee_password = ?;");
$query->bind_param('ss',$email,$password);
$query->execute();
$account_result = $query->get_result();
$row = mysqli_fetch_row($account_result);

if($account_result->num_rows == 0){
	echo "Incorrect email or/and password";

}
else{
   

	$id = $row[0];
	$name = $row[1];
	$_SESSION['ID'] = $id;
	$_SESSION['NAME'] = $name;
	echo "Loged in successfully";
	header("Location:..\dashboardemployee.php");
}



?>



