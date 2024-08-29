<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>
<body>
        <?php 
        session_start();
        require_once("header.php"); 
        require_once("connect.php"); 
        ?>
        
     <!-- Слайдер с 5 последними добавленными турами    -->
    <div class="swiper" >
    
    <div class="swiper-wrapper">
    <?php 
    $sql = "SELECT * FROM tours ORDER BY id desc LIMIT 5";


    if($result = $connect -> query($sql)){
        while($row = $result -> fetch_array()){
            $country = $row['country'];
            echo '<div class = "swiper-slide">';
                echo '<div class="infoSlider">';
                    echo '<div class="count">';
                        echo '<img src="../css/img/plane.png" alt="" width="50" class="imgPlane">';
                        echo '<h3 style="display:inline-block; ">'.$row['count'].' РУБ.</h3>';
                    echo '</div>';
                        echo '<h1 class="nameTour">'. $row['name'] .'</h1>';
                        echo '<div class="description">';
                            echo'<h5>'.$row['description'].'</h5>';
                        echo'</div>';
                        $sql1 = "SELECT `id` FROM `country` WHERE `name` = '$country'";
                        if($result1 = $connect -> query($sql1)){
                            while($row1 = $result1 -> fetch_array()){
                                echo'<a href="aboutCountry.php?id='.$row1['id'].'" class="more">Подробнее</a>';
                            }
                        }
                      
                echo '</div>';
            echo '<img/src = "'.$row['photo'] . ' " class="sliderImg" width="2000" height="800">' . "<br>";
            
            echo "</div>";
        }
    }

    ?>
    </div>
    

    
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    </div>

    <div class="main">
        <div class="slogan">
            <h1 class="question">ЗА ЧТО НАС ХВАЛЯТ?</h1>
        </div>
        <div class="advantages">
            <div class="advantImg">

                <div class="adv" >
                    <img src="../css/img/like.png" width="70" alt="" srcset="">
                    <p class="text" >Нас рекомендуют друзьям</p>
                </div>

                <div class="adv" >
                    <img src="../css/img/honey-moon.png" width="70" alt="" srcset="">
                    <p class="text">Быстрое оформление туров</p>
                </div>
                
                <div class="adv" >
                    <img src="../css/img/map.png" width="70" alt="" srcset="">
                    <p class="text">В любую точку мира</p>
                </div>
                
                <div class="adv" >
                    <img src="../css/img/piggy11.svg" width="70" alt="" srcset="">
                    <p class="text">Низкие цены на туры</p>
                </div>
                
                <div class="adv" >
                    <img src="../css/img/parking.png" width="70" alt="" srcset="">
                    <p class="text">Офисы в любом городе</p>
                </div>
                
                
                
            </div>
        </div>
    </div>

    
<div class="slogan" >
    <h1 class="question">НАШИ НОВЫЕ НАПРАВЛЕНИЯ</h1>
</div>
<!-- Слайдер с 5 последними добавленными отелями -->
<div class="allHotel">
    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30"
    slides-per-view="3" style="height:450px; width:1050px; background-color:rgb(255, 255, 255); " >
    <?php 
          $sql = "SELECT * FROM hotels ORDER BY id desc LIMIT 5";


          if($result = $connect -> query($sql)){
              while($row = $result -> fetch_array()){ 
                echo "<swiper-slide style='width:200px;' onclick='openAllTours()'>"; 
                    echo"<div class='hotel'>";

                        echo "<div class='photo'>";
                            echo '<img/src = "'.$row['photo_hotel'] . ' " class="hotelPhoto" width="230px" height="160px">' . "<br>";
                        echo"</div>";

                        echo'<div class="mainInfo">';

                            echo "<h4 class='nameHotel'>".$row['name_hotel'] ." ". $row['stars_hotel']."* </h4>";
                            echo "<p class='desc'>". $row['location_hotel']."</p>";

                        echo'</div>';
                    
                        echo "<p>".$row['duration']." ночей, вылет " . date('d') + $row['stars_hotel'] . ' декабря' . "</p>";
                        echo '<div class="costHotelBlock">';
                            echo "<h5 class='costHotel'>".$row['cost']." рублей</h5>";
                                echo'<div class="fire">';
                                    echo'<img src="../css/img/sale.png" class="sale" width="15px" alt="" srcset="">';
                                echo'</div>';
                            echo'</div>';
                        echo"</div>"; 
                echo "</swiper-slide>";
              }
          }

          ?>
    
  </swiper-container>
  <div class="foter">

</div>
</div>

<?php require_once("footer.php"); ?>
</body>
<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</html>