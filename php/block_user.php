<?php
header('Access-Control-Allow-Origin: *');
include "connection.php";
session_start();
$blocked_user_id = $_GET['q'];
$user_id = $_SESSION['user_id'];
// I am checking if there is any request from the account that the user wants to be friends with
$query = 'SELECT * FROM friend_requests WHERE (user_id1 = ? AND user_id2 =?);';
$stmt = $connection->prepare($query);
$stmt->bind_param('ss', $blocked_user_id,$user_id);
$stmt->execute();
$result = $stmt->get_result();
$row1 = $result->fetch_assoc();

$query2 = 'SELECT * FROM friend_requests WHERE (user_id2 = ? AND user_id1 =?);';
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param('ss', $blocked_user_id, $user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();

if (!empty($row1)){
    $query = 'DELETE FROM friend_requests WHERE user_id1 = ? AND user_id2 =?;';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $blocked_user_id,$user_id);
    $stmt->execute();
    $result = $stmt->get_result();


}else if(!empty($row2)){
    $query = 'DELETE FROM friend_requests WHERE user_id2 = ? AND user_id1 =?;';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $blocked_user_id,$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
}
$query3 = 'INSERT INTO blocked_users(user_id, blocked_user_id) VALUES (?,?);';
$stmt3 = $connection->prepare($query3);
$stmt3->bind_param('ss', $user_id, $blocked_user_id);
$stmt3->execute();
$result3 = $stmt3->get_result();
$message = "Blocked!";
$result = ['id' => $blocked_user_id, 'message' => $message];
$jsonData = json_encode($result);

echo $jsonData;
?>
