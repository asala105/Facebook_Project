<?php
include "connection.php";
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST["first_name"]) && $_POST["first_name"] != "" && strlen($_POST["first_name"]) >= 3) {
    $first_name = $_POST["first_name"];
}else{
    die ("name, Enter a valid input");
}

if(isset($_POST["last_name"]) && $_POST["last_name"] != "" && strlen($_POST["last_name"]) >= 3) {
    $last_name = $_POST["last_name"];
}else{
    die ("name, Enter a valid input");
}

//for user table
if(isset($_POST["email"]) && $_POST["email"] != "" ) {
    $email = $_POST["email"];
}else{
    die ("email, Enter a valid input");
}
if(isset($_POST["birthday"])) {
    $birthday = $_POST["birthday"];
    $time = strtotime($birthday);
    $birthday = date('Y-m-d',$time);
}else{
    die ("type, Enter a valid input");
}

$sql1="UPDATE users SET first_name = ?, last_name = ?, email = ?, birthday = ? where id = ?";
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ssss",$country, $city, $address_line, $user_id);
$stmt1->execute();
$result = $stmt1->get_result();
$_SESSION['first_name'] = $country;
$_SESSION['last_name'] = $city;
$_SESSION['email'] = $address_line;
$new_profile = ['country' => $country, 'city' => $city, 'address_line' => $address_line];

echo json_encode($new_profile);

?>