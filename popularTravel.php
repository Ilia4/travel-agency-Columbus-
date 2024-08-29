<link rel="stylesheet" href="../css/popularTravel.css">

<body>
    <?php
    require_once("header.php");
    require_once("connect.php");
    session_start();
    ?>


    <div class="infBlck">
        <h1 class="title">Популярные направления</h1>
    </div>

<?php 





echo '<div class="container">';
$sql = "SELECT id_hotel, COUNT(*) as count FROM wishlist GROUP BY id_hotel ORDER BY count DESC";
if($result = $connect -> query($sql)){
    while($row = $result -> fetch_array()){
        $id_hotel = $row['id_hotel'];

        $sql2 = "SELECT * FROM hotels where id = $id_hotel";
        if($result1 = $connect -> query($sql2)){
            while($row1 = $result1 -> fetch_array()){
              
                echo'<div class="card mb-3" style="max-width: 650px; max-height:300px;">
                        <div class="row-g-0">
                            <div class="col-md-4">
                                <img src="'.$row1['photo_hotel'].'" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">'. $row1['name_hotel'] .'</h5>
                                    <p class="card-text">'.$row1['description_hotel'].'</p>
                                    <p class="card-text"><small class="text-body-secondary"><a href="moreAboutTheHotel.php?id='.$row1['id'].'">Подробнее</a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>';
               
            }
        }
    }
}
 echo'</div>';
?>


<?php require_once("footer.php") ?>
</body> 
</html>