<?php 
require_once("connect.php");
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . $_FILES['photo']['name'];
$name = $_POST['name'];
$count = $_POST['count'];
$description = $_POST['description'];
$country = $_POST['country'];

$connect -> query("INSERT INTO `tours`(`name`, `count`, `description`, `photo` , `country`) 
VALUES ('$name','$count','$description','$uploadfile' , '$country')");
if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)){
    echo "Фaйл загружен успешно";
    header("Location:admin.php");
} else {
    echo "error";
}
header("addbd.php");
?>
