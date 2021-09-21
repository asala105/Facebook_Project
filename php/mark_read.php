<?php
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
$notification_id = $_GET['q'];

$sql1="UPDATE notification SET is_read = 1 where id = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$notification_id);
$stmt1->execute();
$result = $stmt1->get_result();
$new_not = ['notification_id'=>$notification_id];
$new = json_encode($new_not);
echo json_encode($new);


?>