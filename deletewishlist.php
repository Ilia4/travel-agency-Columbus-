<?php 
require_once("connect.php");
$id = $_GET['id'];
$connect -> query("DELETE FROM `wishlist` WHERE id = $id");
header("Location:profilepage.php");