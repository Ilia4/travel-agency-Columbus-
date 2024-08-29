<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('connect.php');?>
    <form action="addq.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="count" placeholder="цена">
        <textarea name="description" cols="30" rows="10"></textarea>
        <input type="text" name="country" placeholder="Страна">
        <input type="file" name="photo">
        <input type="submit">
    </form>

    <form action="addcountry.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Название страны">
    <textarea name="description" cols="30" rows="10"></textarea>
    <input type="file" name="photo">
    <input type="submit">
    </form>

    <form action="addhotel.php" method="POST" enctype="multipart/form-data">
<input type="text" name="name" placeholder="Наименование отеля">
<textarea name="description" cols="30" rows="10"></textarea>
<input type="text" name="location" placeholder="Расположение">
<input type="text" name="stars" placeholder="Кол-во звезд">
<input type="text" name="cost" placeholder="Цена">
<input type="text" name="duration" placeholder="Длительность">
<input type="file" name="photo">
<select name="country">
<?php 
$sql = "SELECT * FROM country";

if($result = $connect -> query($sql)){
    while($row = $result -> fetch_array()){     
        echo'<option>'. $row['name'] .'</option>';        


    }
}

?>
</select>
<input type="submit">


</form>
</body>
</html>