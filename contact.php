<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
<?php session_start(); ?>
<?php require_once("connect.php"); ?>
<?php require_once("header.php"); ?>
<div class="container">
    <div style="display:flex;overflow:hidden;"><iframe src="https://yandex.ru/map-widget/v1/?ll=52.407935%2C55.756716&mode=whatshere&whatshere%5Bpoint%5D=52.404487%2C55.755988&whatshere%5Bzoom%5D=17&z=15.8" width="1920" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
    <div class="containContactInfo">
        <div class="contactInfo">
        <p><img src="../css/img/gps.png" width="30" >Улица Шамиля Усманова, 91/41, 3 под.</p>
        <p><img src="../css/img/phone.png" width="30" >+7 987 275-12-28</p>
        <p><img src="../css/img/telegram.png" width="30" >+7 987 275-12-28</p>
        <p><img src="../css/img/clock.png" width="30" >Время работы : Пн-Пт с 10:00 до 19:00</p>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>
</body> 
</html>