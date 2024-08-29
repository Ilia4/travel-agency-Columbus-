<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/alltour.css">
</head>
<body>
    <?php 
    session_start();
    require_once("connect.php");
    require_once("header.php");
 
 $month = date("m");
 $monthStr = '';
 switch ($month) {
    case 01:
        $monthStr = 'Января';
        break;
    case 02:
        $monthStr = 'Февраля';
        break;
    case 03:
        $monthStr = 'Марта';
        break;
    case 04:
        $monthStr = 'Апреля';
        break;
    case 05:
        $monthStr = 'Мая';
        break;
    case 06:
        $monthStr = 'Июня';
        break;
    case 07:
        $monthStr = 'Июля';
        break;
    case 8:
        $monthStr = 'Августа';
        break;
    case 9:
        $monthStr = 'Сентября';
        break;
    case 10:
        $monthStr = 'Октября';
        break;
    case 11:
        $monthStr = 'Ноября';
        break;
    case 12:
        $monthStr = 'Декабря';
        break;
    default:
        echo "Ошибка";    
}   
?>

    <div class="main">
        <h1 class="title">Поиск туров</h1>
        
    </div>

       
    
    <div class="hotelContain">

            <?php 
                require_once("connect.php");
                $sql = "SELECT * FROM `hotels`";
                if($result = $connect -> query($sql)){
                    while($row = $result -> fetch_array()){
                        echo"<div class='hotel'>";

                        echo "<div class='photo'>";
                            echo '<img/src = "'.$row['photo_hotel'] . ' " class="hotelPhoto" width="230px" height="160px">' . "<br>";
                        echo"</div>";

                        echo'<div class="mainInfo">';

                            echo "<h4 class='nameHotel'>".$row['name_hotel'] ." ". $row['stars_hotel']."* </h4>";
                            echo "<p class='desc'>". $row['location_hotel']."</p>";

                        echo'</div>';
                    
                        echo "<p>".$row['duration']." ночей, вылет " . date('d') +  mt_rand(1, 5). ' ' . $monthStr . "</p>";
                        echo '<div class="costHotelBlock">';
                            echo "<h5 class='costHotel'>".$row['cost']." рублей</h5>";
                                echo'<a href="moreAboutTheHotel.php?id='.$row['id'].'" class="more">Подробнее</a>';       
                            echo'</div>';
                            
                        echo"</div>"; 
                    }
                }

            ?>

      
    </div>
    <?php
        if(isset($_SESSION['message'])) {
            echo '<script> window.onload = function(){
                let div = document.createElement("div");
                div.className = "alert";
                div.innerHTML = "'.$_SESSION['message'].'";
                document.body.append(div);
                
                
            }
            setTimeout(function() {
                var alertContainer = document.querySelector(".alert");
                if (alertContainer) {
                    alertContainer.remove();
                }
            }, 3000);

            </script>';
            unset($_SESSION['message']); // Очистим сообщение после отображения
        }
    ?>


<?php require_once("footer.php"); ?>

</body>
<script>
</script>
</html>
