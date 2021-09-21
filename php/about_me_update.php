<?php
header('Access-Control-Allow-Origin: *');
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
if (isset($_POST["new_about"]) and $_POST["new_about"] !="")
{
	$n_about = $_POST["new_about"];
}else{
	die("Try again next time");
}

$sql1="UPDATE users SET about_me = ? where id = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$n_about,$user_id);
$stmt1->execute();
$result = $stmt1->get_result();
$_SESSION['about_me'] = $n_about;
$new_about = ['about_me' => $n_about];

echo json_encode($new_about);

?>