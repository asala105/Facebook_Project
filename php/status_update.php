<?php
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
if (isset($_POST["new_status"]) and $_POST["new_status"] !="")
{
	$status = $_POST["new_status"];
}else{
	die("Try again next time");
}

$sql1="UPDATE users SET status = ? where id = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$status,$user_id);
$stmt1->execute();
$result = $stmt1->get_result();
$_SESSION['status'] = $status;
$new_status = ['status'=>$status];
echo json_encode($new_status);

?>