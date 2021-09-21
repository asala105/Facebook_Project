<?php
include "connection.php";
session_start();
$friend_id = $_GET['q'];
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['first_name']." ".$_SESSION['last_name'];
// I am checking if there is any request from the account that the user wants to be friends with
$query = 'SELECT * FROM friend_requests WHERE (user_id1 = ? AND user_id2 =?);';
$stmt = $connection->prepare($query);
$stmt->bind_param('ss', $friend_id,$user_id);
$stmt->execute();
$result = $stmt->get_result();
$row1 = $result->fetch_assoc();

$query2 = 'SELECT * FROM friend_requests WHERE (user_id2 = ? AND user_id1 =?);';
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param('ss', $friend_id,$user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();

if (!empty($row1) && $row1['pending']==1){
    //if yes we just update the status of the request to accepted
    $query = 'UPDATE friend_requests SET pending = 0 WHERE user_id1 = ? AND user_id2 =?;';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $friend_id,$user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = "Now you are friends";

    //send a notification to the friend that he has a new friend request
    $text = $user_name." accepted your friend request";
    $query = 'INSERT INTO notification (text, is_read, user_id) VALUES (?, 0, ?);';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $text, $friend_id);
    $stmt->execute();
    $result = $stmt->get_result();

}else if(!empty($row2)){
    //else if the user already sent a friend request before
    $message = "You already sent a friend request";

}else if ((!empty($row1) && $row1['pending']==0) || (!empty($row2) && $row2['pending']==0)){
    //if there is a record in the friend requests and is accepted by either users then they 
    //are friends no need to send the request again
    $message = "You are already friends";

}else if (empty($row1) && empty($row2)){
    //else we add a new record to the friend_requests 
    $query = 'INSERT INTO friend_requests (user_id1, user_id2, pending) VALUES (?,?,1);';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $user_id, $friend_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = "created new friend request";

    //send a notification to the friend that he has a new friend request
    $text = $user_name." sent you a friend request";
    $query = 'INSERT INTO notification (text, is_read, user_id) VALUES (?, 0, ?);';
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ss', $text, $friend_id);
    $stmt->execute();
    $result = $stmt->get_result();

}else {
    $message = "an error occurred";
}
$result = ['message' => $message, 'id' => $friend_id];
$jsonData = json_encode($result);
echo $jsonData;
?>
