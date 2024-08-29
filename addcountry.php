<?php 
require_once("connect.php");
$name = $_POST['name'];
$description = $_POST['description'];


$connect -> query("INSERT INTO `country`(`name`, `description`) 
VALUES ('$name','$description')");
header("Location:admin.php");
?>