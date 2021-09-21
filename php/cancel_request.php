<?php
include "connection.php";
session_start();
$user_id1 = $_SESSION['user_id'];
$user_id2 = $_GET['q'];

$query = 'SELECT * FROM friend_requests WHERE user_id1 =? AND user_id2 =?;';
$stmt = $connection->prepare($query);
$stmt->bind_param('ss', $user_id1, $user_id2);
$stmt->execute();
$result = $stmt->get_result();
$row1 = $result->fetch_assoc();


if (!empty($row1)){
    $query = 'DELETE FROM friend_requests WHERE user_id1 = ? AND user_id2 =?;';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $user_id1,$user_id2);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = "Successfully canceled";
}else{
    $message = "you already canceled this friend request";
}

$result = ['id'=>$user_id2, 'message'=>$message];
$jsonData = json_encode($result);
echo $jsonData;
?>