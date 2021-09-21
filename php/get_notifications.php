<?php
header('Access-Control-Allow-Origin: *');
include "connection.php";
session_start();

$user_id = $_SESSION['user_id'];

$sql1="Select * from notification where user_id=? order by is_read"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$user_id);
$stmt1->execute();
$result = $stmt1->get_result();
$notifications = array();
while ($row = $result->fetch_assoc()){
    $notifications[] = $row;
}

$jsonData = json_encode($notifications);
echo $jsonData;

?>