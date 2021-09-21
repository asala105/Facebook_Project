<?php
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];
if (isset($_POST["country"]))
{
	$country = $_POST["country"];
}else{
	die("Try again next time");
}
if (isset($_POST["city"]))
{
	$city = $_POST["city"];
}else{
	die("Try again next time");
}
if (isset($_POST["address_line"]))
{
	$address_line = $_POST["address_line"];
}else{
	die("Try again next time");
}

$sql1="UPDATE users SET country = ?, city = ?, address_line = ? where id = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ssss",$country, $city, $address_line, $user_id);
$stmt1->execute();
$result = $stmt1->get_result();
$_SESSION['country'] = $country;
$_SESSION['city'] = $city;
$_SESSION['address_line'] = $address_line;
$new_address = ['country' => $country, 'city' => $city, 'address_line' => $address_line];

echo json_encode($new_address);

?>