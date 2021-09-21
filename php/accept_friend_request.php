<?php
header('Access-Control-Allow-Origin: *');
include "connection.php";
session_start();
$user_id2 = $_SESSION['user_id'];
$user_id1 = $_GET['q'];


$query = 'SELECT * FROM friend_requests WHERE user_id1 =? AND user_id2 =?;';
$stmt = $connection->prepare($query);
$stmt->bind_param('ss', $user_id1, $user_id2);
$stmt->execute();
$result = $stmt->get_result();
$row1 = $result->fetch_assoc();

if ($row1['pending'] == 1){
    $query = 'UPDATE friend_requests SET pending = 0 WHERE user_id1 = ? AND user_id2 =?;';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $user_id1,$user_id2);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = "Now you are friends";
}else{
    $message = "you already accepted this friend request";
}

$accept = ['message' => $message, 'id' => $user_id1];
$jsonData = json_encode($accept);
echo $jsonData;
?>