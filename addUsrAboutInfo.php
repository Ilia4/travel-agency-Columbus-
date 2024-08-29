<?php 
require_once("connect.php");
session_start();


$id_hotel = $_POST['id_hotel'];
$id_user = $_POST['id_user'];
$email_user = $_POST['email_user'];
$name_user = $_POST['name_user'];
$status = "В работе";

if($connect -> query("INSERT INTO `buytour`(`id_client`, `id_hotel`, `email_user`, `name_user`, `status`) VALUES ('$id_user','$id_hotel','$email_user','$name_user','$status')")){
    $_SESSION['message'] = "Запрос успешно отправлен! С вами свяжутся по указанной электронной почте.";
    header("Location:alltours.php");   
 }
 


?>