<?php 
require_once('connect.php');
session_start();
 $email = $_POST['email'];
 $pass= $_POST['pass'];




 $result = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `pass`='$pass'");
 if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
    
    $_SESSION['user'] = 
    ["id" => $user['id'],
     "name" => $user['name'],
     "surname" => $user['surname'],
     "patronymic" => $user['patronymic'],
     "phone" => $user['phone'],
     "pass" => $user['pass'],
     "email" => $user['email'], 
     "admin" => $user['admin'],  
 ];
 if($_SESSION['user']['admin'] == '1'){
    header("Location:index.php");
 }else{
    header("Location:admin.php");
 }
 
}

   { 
    echo 'Неверный логин или пароль';

}

?>