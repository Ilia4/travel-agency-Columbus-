<?php 
require_once("connect.php");
$id = $_POST['id'];

$connect -> query("DELETE FROM `country` WHERE id = $id");
header("Location:admin.php");