<?php
require_once("connect.php");

$name = $_POST['nameHotel'];
$description = $_POST['description'];
$location = $_POST['locationHotel'];
$stars = $_POST['star'];
$country = $_POST['country'];
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . $_FILES['photo']['name'];
$cost = $_POST['cost'];
$duration = $_POST['duration'];


$connect -> query("INSERT INTO `hotels`(`name_hotel`, `location_hotel`, `description_hotel`, `stars_hotel` , `country_hotel` , `photo_hotel` , `cost` , `duration`) 
VALUES ('$name','$location','$description','$stars','$country','$uploadfile','$cost','$duration')");
if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)){
    echo "Фaйл загружен успешно";
    header("Location:admin.php");
} else {
    echo "error";
}
?>