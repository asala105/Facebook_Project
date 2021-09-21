<?php
header('Access-Control-Allow-Origin: *');
include 'connection.php';
session_start();
$user_id = $_SESSION['user_id'];
if(isset($_POST['keyword']) && $_POST['keyword']!=""){
$keyword = strtolower($_POST['keyword']);
}
    $sql1='SELECT * FROM users WHERE 
    id NOT IN (SELECT blocked_user_id FROM blocked_users  WHERE user_id = ?) AND
    id NOT IN (SELECT user_id1 FROM friend_requests WHERE user_id2 = ?) AND
    id NOT IN (SELECT user_id2 FROM friend_requests WHERE user_id1 = ?) AND (LOWER(first_name) LIKE "%'.$keyword.'%" OR LOWER(last_name) LIKE "%'.$keyword.'%");';
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("sss",$user_id,$user_id,$user_id);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $accounts = array();
while($row = $result->fetch_assoc()){
    $accounts[] = $row;
}
$accountsList = json_encode($accounts);
echo $accountsList;
?>