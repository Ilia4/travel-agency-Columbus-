<?php 
require_once("connect.php");
session_start();

$feedbackText = $_POST['feedbackText'];
$rating = $_POST['rating'];
$userId = $_POST['userId'];
$hotelId = $_POST['hotelId'];
$status = "На проверке";



$connect -> query("INSERT INTO `feedback`(`userId`, `hotelId`, `feedbackText`, `rating`, `status`) VALUES ('$userId', '$hotelId', '$feedbackText', '$rating', '$status')");