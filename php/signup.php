<?php
include "connection.php";
print_r($_POST);
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

if(isset($_POST["gender"]) && $_POST["gender"] != "" ) {
    $gender = $_POST["gender"];
}else{
    die ("phone, Enter a valid input");
}

if(isset($_POST["password"]) && $_POST["password"] != "" ) {
    $password = $_POST["password"];
}else{
    die ("password, Enter a valid input");
}

if(isset($_POST["password_confirm"]) && $_POST["password_confirm"] != "" ) {
    $confirmPassword = $_POST["password_confirm"];
}else{
    die ("confirm, Enter a valid input");
}



$sql1="Select * from users where email=?;"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
    $sql2 = "INSERT INTO users (first_name, last_name, email, password, birthday, gender) VALUES (?,?,?,?,?,?);";
    #adding the new user to the database
    $hash = hash('sha256', $password);
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("ssssss",$first_name, $last_name, $email,$hash, $birthday, $gender);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    header("Location: ../index.php");
}else{
    $_SESSION['s_error'] = true;
    $_SESSION['s_flash'] = 'please make sure you entered valid inputs';
    header("Location: ../signup.php");
}

?>