<?php 
require_once("connect.php");

$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$admin = "1";

$connect -> query("INSERT INTO `users`(`name`, `surname`, `patronymic`, `phone`, `email`, `pass`, `admin`)
 VALUES ('$name','$surname','$patronymic','$phone','$email','$pass','$admin')");
header("Location:index.php");
?>