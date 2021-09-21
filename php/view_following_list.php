<?php
header('Access-Control-Allow-Origin: *'); 
include 'connection.php';
session_start();
$user_id = $_SESSION['user_id'];
$sql1="SELECT * FROM users WHERE id in (select user_id2 from friend_requests where user_id1 = ? and pending = 1);";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$user_id);
$stmt1->execute();
$result = $stmt1->get_result();
$following = array();
while($row = $result->fetch_assoc()){
    $following[] = $row;
}
$followingList = json_encode($following);
echo $followingList;
?>