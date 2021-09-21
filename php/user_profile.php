<?php
header('Access-Control-Allow-Origin: *');
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
//number of friends
$query = 'SELECT count(*) FROM friend_requests WHERE (user_id1 =? OR user_id2 =?) AND pending = 0;';
$stmt = $connection->prepare($query);
$stmt->bind_param('ss', $user_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$friends = $row['count(*)'];
//number of followers
$query = 'SELECT count(*) FROM friend_requests WHERE user_id2 =? AND pending = 1;';
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$followers = $row['count(*)'];
//number of account the user is following
$query = 'SELECT count(*) FROM friend_requests WHERE user_id1 =? AND pending = 1;';
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$following = $row['count(*)'];

//number of unread notifications
$query = 'SELECT count(*) FROM notification WHERE user_id =? AND is_read = 0;';
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$notifications = $row['count(*)'];

$user = array();
$user = ['user_id'=> $_SESSION['user_id'], 'following'=> $following, 'followers'=>$followers, 'friends' => $friends];
$user['first_name'] = $_SESSION['first_name'];
$user['last_name'] = $_SESSION['last_name'];
$user['email'] = $_SESSION['email'];
$user['birthday'] = $_SESSION['birthday'];
$user['about_me'] = $_SESSION['about_me'];
$user['status'] = $_SESSION['status'];
$user['country'] = $_SESSION['country'];
$user['city'] = $_SESSION['city'];
$user['address_line'] = $_SESSION['address_line'];
$user['notifications'] = $notifications;
echo json_encode($user);


?>