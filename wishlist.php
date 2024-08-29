<?php
session_start();
require_once("connect.php");
$id_hotel = $_GET['id'];
$id_user = $_SESSION['user']['id'];

$connect -> query("INSERT INTO `wishlist`(`id_client`, `id_hotel`) VALUES ('$id_user','$id_hotel')");
header("Location:alltours.php");
?>