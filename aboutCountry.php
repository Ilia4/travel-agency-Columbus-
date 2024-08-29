<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/aboutCountry.css">
</head>
<body>
<?php 
require_once("connect.php");
require_once("header.php");
?>    



<div class="container">
    <div class="main">
        <div class="title">
            <h3>ИНФОРМАЦИЯ О СТРАНЕ</h3>
        </div>
        <div class="countryTitle"></div>
        
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM country WHERE id = $id";
                if($result = $connect -> query($sql)){
                    if($row = $result -> fetch_array()){
                        echo'<div class="containCountryBlock">';
                        echo'<div class="infoAboutCountry">';
                        echo'<div class="infoCountry">';
                        echo '<h1>' . $row['name'] . '</h1>';
                        echo'</div>';
                        echo'<div class="countryDescription">';
                        echo "<p>".$row['description']."</p>";
                        echo'</div>';
                        $country = $row['name'];
                        $sql1 = "SELECT * FROM `tours` WHERE `country` = '$country'";
                        if($result1 = $connect -> query($sql1)){
                            if($row1 = $result1 -> fetch_array()){
                                echo '<div class="imgCountry">';
                                echo'<img src="'.$row1['photo'].'">';
                                echo'<h1>'. $row1['name'] .'</h1>';
                                echo'</div>';
                                echo'<div class="toursDescription">';
                                echo'<p>' .$row1['description']. '</p>';
                                echo'</div>';
                                echo'<div class="tittleTours">';
                                echo'<h1>Туры по стране</h1>';
                                echo'</div>';
                                echo'<div class="toursContain">';
                                    $sql2 = "SELECT * FROM `hotels` WHERE `country_hotel` = '$country'";
                                    if($result2 = $connect -> query($sql2)){
                                        while($row2 = $result2 -> fetch_array()){
                                            echo"<div class='hotel'>";
                                            echo "<div class='photo'>";
                                            echo '<img/src = "'.$row2['photo_hotel'] . ' " class="hotelPhoto" width="230px" height="160px">' . "<br>";
                                            echo"</div>";
                                            echo'<div class="mainInfo">';
                                            echo "<h4 class='nameHotel'>".$row2['name_hotel'] ." ". $row2['stars_hotel']."* </h4>";
                                            echo "<p class='desc'>". $row2['location_hotel']."</p>";
                                            echo'</div>';                     
                                            echo '<div class="costHotelBlock">';
                                            echo "<h5 class='costHotel'>".$row2['cost']." рублей</h5><br>";
                                            echo'<a href="moreAboutTheHotel.php?id='.$row2['id'].'" class="more">Подробнее</a>';       
                                            echo'</div>';
                                            echo"</div>"; 
                                        }
                                    }
                                echo'</div>';
                                echo'</div>';
                                echo'</div>';
                            }
                        }
                    }
                }
            }
            ?>
        
    </div>
</div>



<?php require_once("footer.php"); ?>
</body>
</html>