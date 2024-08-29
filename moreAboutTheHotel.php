<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/moreAboutTheHotel.css">
    <script src="js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <?php 
        session_start();
        require_once("connect.php");
        require_once("header.php");

?>






<div class="hotelInfoContain">
    <div class="hotelBlock">
        <div class="hotelBlockHead">
            <button class="backBtnHead" id="backBtnHead">Назад</button>
        </div>
        <div class="mainInfo">

        
    

<?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM hotels WHERE id = '$id'";
            if($result = $connect -> query($sql)){
                if($row = $result -> fetch_array()){
                    $star = $row['stars_hotel'];
                    $day = date("d")+5;
                    $month = date("m");
                    $monthStr = '';
                    $country = $row['country_hotel'];
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



                    for($i = 1 ; $i <= $star; $i++){
                        echo'<img src="css/img/star.png" class="star" alt="" srcset="">';
                    }
                    echo '<h2 class="name">'.$row['name_hotel'].' ' . $row['stars_hotel']. '*'.'</h2>';
                    echo '<h5 class="country">'.$row['country_hotel'].'</h5>';
                    echo '<div class="moreInfo">';
                        echo '<div class="imgBlock">';

                            echo'<div class="location">';
                                echo'<img src="css/img/marker.png" alt="" srcset="" class="marker">';
                                echo'<h5>'.$row['country_hotel'].'</h5>';
                            echo'</div>';

                            echo'<div class="location">';
                                echo'<img src="css/img/calendar.png" alt="" srcset="" class="marker">';
                                echo'<h5>'.$day. ' ' . $monthStr . '<br>'.$row['duration'].' ночей </h5>';
                            echo'</div>';

                            echo'<div class="location">';
                                echo'<img src="css/img/loshka.png" alt="" srcset="" class="marker">';
                                echo'<h5>Питание <br> Без питания</h5>';
                                
                            echo'</div>';
                            echo'<div class="location">';
                                echo'<img src="css/img/bed.png" alt="" srcset="" class="marker">';
                                echo'<h5>Станд. комната<br>2 взрослых</h5>';
                                
                            echo'</div>';
                            echo'<div class="location">';
                                echo'<img src="css/img/6renka.png" alt="" srcset="" class="marker">';
                                echo'<h5>Услуги<br>Стандартные</h5>';
                                
                            echo'</div>';
                            
                        echo'</div>';
                       if(isset($_SESSION['user']['id'])){
                            echo"<div class='btnHtlBlk'>";
                            echo '<h2 class="h222">'.$row['cost'].' руб.</h2>';
                             
                            echo '<button class="cssbuttons-io-button" id="autorizBtnNext">';
                                echo'<span>Продолжить</span>';
                            echo'</button>';
                            echo'<a id="bottone5" href="wishlist.php?id='.$row['id'].'" >Добавить в желаемое</a>';

                        echo'</div>';
                        }
                        else{
                            echo"<div class='btnHtlBlk'>";
                            echo '<h2 class="h222">'.$row['cost'].' руб.</h2>';
                            echo '<button class="cssbuttons-io-button">';
                                echo'<span>Необходимо авторизоваться</span>';
                            echo'</button>';
                        echo'</div>';
                        }

                    echo '</div>';
                   
                }
            }
        }


    ?>

        </div>


        <div class="photoBlockHotel">

            <div class="headBlockHotel">
                <button class="headBlockHotelbtn" onClick="infoHotel()">ОТЕЛЬ</button>
                <button class="headBlockHotelbtn" onClick="openFeedback()">ОТЗЫВЫ</button>
            </div>

            <div class="infoAboutHotel">
                <div class="aboutCountry">
                    <div class="titleBlockH4">
                        <h4>ОБЩАЯ ИНФОРМАЦИЯ</h4>
                    </div>
                    <div class="infBlk">
                        <?php 
                            echo'<p class="p">'.$row['description_hotel'].'.</p>';
                            $sql2 = "SELECT * FROM `tours` WHERE `country` = '$country'";
                            if($result2 = $connect -> query($sql2)){                               
                                if($row2 = $result2 -> fetch_array()){
                                    echo'<p class="p">'.$row2['description'].'</p>';
                                }
                            }
                           
                            $sql3 = "SELECT * FROM `country` WHERE `name` = '$country'";
                            if($result3 = $connect -> query($sql3)){                               
                                if($row3 = $result3 -> fetch_array()){
                                    echo'<p class="p">'.$row3['description'].'</p>';
                                }
                            }


                        ?>  
                    </div>
                    <div class="titleBlockH4">
                        <h4>ИЗОБРАЖЕНИЯ</h4>
                    </div>
                    <div class="photoHotel">
                            <?php 
                                echo '<img src="'.$row['photo_hotel'].'" class="phthtl">';
                                $sql2 = "SELECT * FROM `tours` WHERE `country` = '$country'";
                                if($result2 = $connect -> query($sql2)){                               
                                    if($row2 = $result2 -> fetch_array()){
                                        echo'<img src="'.$row2['photo'].'" class="phthtl">';
                                    }
                                }                           
                            ?>
                    </div>
                </div>

                <div class="feedback">
                    <?php if(isset($_SESSION['user']['id'])){
                    echo'<div class="feedbackContain">';
                    echo'<div class="feedbackTittle">';
                    echo'<h4>ОСТАВЬТЕ СВОЙ ОТЗЫВ</h4>';
                    echo'</div>';
                    echo'<div class="textAreaBlock">';
                    echo'<form action="" method="POST">';
                    echo'<textarea class="feedbackInput"></textarea>';
                    echo'<div class="starContain">';
                    echo'<img src="../css/img/feedbackStar3.png" alt="" class="feedbackStar" id="smile1">';
                    echo'<img src="../css/img/feedbackStar3.png" alt="" class="feedbackStar" id="smile2">';
                    echo'<img src="../css/img/feedbackStar3.png" alt="" class="feedbackStar" id="smile3">';
                    echo'<img src="../css/img/feedbackStar3.png" alt="" class="feedbackStar" id="smile4">';
                    echo'<img src="../css/img/feedbackStar3.png" alt="" class="feedbackStar" id="smile5">';
                    echo'<h4>ВАША ОЦЕНКУ</h4>';
                    echo'</div>';
                    echo "<input type='hidden' class='userId' value='".$_SESSION['user']['id'] . "'>";
                    echo "<input type='hidden' class='hotelId' value='".$row['id'] . "'>";
                    echo'<button class="sendFeedback" id="sendFeedback">Отправить</button>';
                    echo'</form>';
                            
                    echo'</div>';

                        
                    echo'</div>';}
                    else{
                        echo'<div class="feedbackTittle">';
                        echo'<h4>ЧТОБЫ ОСТАВЛЯТЬ ОТЗЫВЫ НЕОБХОДИМО АВТОРИЗОВАТЬСЯ</h4>';
                        echo'</div>';
                    }
?>
                    <div class="allFeedback">
                        <div class="allFeedbackTittle">
                            <h4>ОТЗЫВЫ</h4>
                        </div>
                        <div class="userContain">
                            <?php 
                            $hotel = $row['id'];
                                 $sql = "SELECT * FROM `feedback` WHERE `hotelId` = '$hotel'";
                                 if($result = $connect -> query($sql)){
                                    while($row = $result -> fetch_array()){
                                        $userID = $row['userId'];
                                        $rating = $row['rating'];
                                        $sql1 = "SELECT `name`, `surname`, `patronymic` FROM `users` WHERE id = $userID";
                                        if($result1 = $connect -> query($sql1)){                               
                                            if($row1 = $result1 -> fetch_array()){
                                                echo"<div class='userfeedBlock'>";
                                                    echo"<div class='userfeedBlockHead'>";
                                                        echo"<h4>".$row1['surname']." ".$row1['name']."</h4>";
                                                        echo'<div class="ratingContain">';
                                                       
                                                            for($i = 1 ; $i <= $rating; $i++){
                                                                echo'<img src="../css/img/feedbackStar3.png" class="star" alt="" srcset="">';
                                                            }
                                                             echo'<h4>Оценка пользователя </h4>';
                                                        echo'</div>';
                                                    echo"</div>";
                                                    echo'<div class="textFeedback">';
                                                        echo'<p>'.$row['feedbackText'].'</p>';
                                                    echo'</div>';
                                                echo"</div>";


                                            }
                                        }                           
                                       
                                    }
                                }
                            ?>
                        </div>
                    </div>

                </div>



            </div>


        </div>
        <div class="error" id="errorBlock">
            Для начала необходимо авторизоваться
        </div>
        <div class="formNotification">
       
            <div class="inputEmail">
                <a href="#" class="back">Вернуться к описанию</a><h3>Запрос на информиацию о туре</h6>
                <form action="addUsrAboutInfo.php" method="POST">

                    <?php 
                    echo '<input type="hidden" value="'.$id.'" name="id_hotel">';
                    echo '<input type="hidden" value="'.$_SESSION['user']['id'].'" name="id_user">';
                    echo '<input type="email" class="infInput" placeholder="Эл.почта" required value="'.$_SESSION['user']['email'].'" name="email_user">'; 
                    echo '<input type="text" class="infInput" placeholder="Имя" required value="'.$_SESSION['user']['name'].'" name="name_user">'; 
                     ?>
                    <button role="button" class="button-name">Отправить</button>
                </form>

            </div>

            <div class="infoAboutEmail">
                <p>- Мы предоставим Вам самую полную информацию о туре;</p>
<p>- Расскажем об особенностях отеля, курорта, страны;</p>
<p>- Предложим способы бронирования тура;</p>
<p>- При необходимости подберем альтернативы;</p>
            </div>
        
        </div>

    </div>

</div>


<?php require_once("footer.php") ?>
<script src="js/moreAboutTheHotel.js"></script>
<script>


  $(document).ready(function() {

    $('.feedbackStar').on('mouseover', function() {
        $(this).prevAll().addBack().addClass('active');
    });

    $('.feedbackStar').on('mouseout', function() {
        $('.feedbackStar').removeClass('active');
    });

    $('.feedbackStar').on('click', function() {
        $('.feedbackStar').removeClass('selected'); // Убираем класс 'selected' со всех звезд
        $(this).prevAll().addBack().addClass('selected'); // Добавляем класс 'selected' ко всем звездам до текущей включительно
    });

    $('.sendFeedback').on('click', function(e) {
        e.preventDefault();
        
        // Получаем значение текстового поля
        var feedbackText = $('.feedbackInput').val();
        
        // Получаем значение выбранного рейтинга
        var rating = $('.feedbackStar.selected').length;
        var userId = $('.userId').val();
        var hotelId = $('.hotelId').val();
        // Отправляем данные (значение текстового поля и рейтинг) на сервер
        console.log('Отзыв: ' + feedbackText);
        console.log('ID пользователя: ' + userId);
        console.log('ID отеля: ' + hotelId);
        console.log('Рейтинг: ' + rating);
        
        

    });

$('.sendFeedback').on('click', function(e) {
        e.preventDefault();
        
        // Получаем значение текстового поля
        var feedbackText = $('.feedbackInput').val();
        
        // Получаем значение выбранного рейтинга
        var rating = $('.feedbackStar.selected').length;
        var userId = $('.userId').val();
        var hotelId = $('.hotelId').val();
        
    
        $.ajax({
            type: 'POST',
            url: 'feedbackadd.php',
            data: {
                feedbackText: feedbackText,
                rating: rating,
                userId: userId,
                hotelId: hotelId
            },
            success: function(response) {
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error); // Выводим ошибку, если запрос не удался
            }
        });
    });

    

});



</script>
</body>

</html>
