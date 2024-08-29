<?php 
require_once("connect.php");
$id = $_POST['id'];

$connect -> query("DELETE FROM `hotels` WHERE id = $id");
header("Location:admin.php");