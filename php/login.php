<?php
include "connection.php";
session_start();
session_unset();

if (isset($_POST["email"]) and $_POST["email"] !="" && strrpos($_POST["email"],'.') > strpos($_POST["email"],'@') && strpos($_POST["email"],'@')!=null)
	{
		$email = $_POST["email"];
	}else
	{
		die("Try again next time");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = hash('sha256', $_POST["password"]);
	}else{
		die("Try again next time");
	}

$sql1="Select * from users where email=? and password=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$email,$password);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
    $_SESSION["error"] = true;
	$_SESSION["flash"] = "Please check your email and password";
	header('location: ../index.php');
}
else{
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['last_name'] = $row ['last_name'];
	$_SESSION['about_me'] = $row ['about_me'];
	$_SESSION['birthday'] = $row ['birthday'];
	$_SESSION['profile_pic'] = $row ['profile_pic'];
	$_SESSION['gender'] = $row['gender'];
	$_SESSION['status'] = $row['status'];
	$_SESSION['country'] = $row ['country'];
	$_SESSION['city'] = $row ['city'];
	$_SESSION['address_line'] = $row ['address_line'];
    $_SESSION["error"] = false;
	header('location: ../facebook.php');
}
?>