<?php 
require_once("connect.php");
$id = $_POST['id'];

$connect -> query("DELETE FROM `tours` WHERE id = $id");
header("Location:admin.php");