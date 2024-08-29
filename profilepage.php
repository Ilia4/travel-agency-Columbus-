<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profile.css">

</head>
<body>
    <?php session_start(); ?>
    <?php require_once("connect.php") ?>
    <?php require_once("header.php") ?>

    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="#" class="active" id="profile" onclick="profile()">Профиль</a></li>
                <li><a href="#" id="wishlist" onclick="wishlist()">Список желаемого</a></li>
                <li><a href="#" id="purchases" onclick="purchases()">Покупки</a></li>
                <li><a href="exit.php" id="purchases">Выход</a></li>
                
            </ul>
        </div>
        <div class="content">
            
            <div class="user-info">
                <h1>Мой профиль</h1>
                <!-- Здесь отображаем информацию о пользователе -->
                <p>Имя: <?php echo $_SESSION['user']['name']; ?></p>
                <p>Фамилия: <?php echo $_SESSION['user']['surname']; ?></p>
                <p>Отчество: <?php echo $_SESSION['user']['patronymic']; ?></p>
                <p>Номер телефона: <?php echo $_SESSION['user']['phone']; ?></p>
                <p>Электронная почта: <?php echo $_SESSION['user']['email']; ?></p>

                <!-- Добавьте другие поля информации о пользователе -->
                <button class="edit-profile">Изменить данные</button>
                <div class="edit-form" style="display: none;">
        <h2>Изменить данные профиля</h2>
        <form method="POST" action="updateinfo.php"> 
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
            <div>
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" value="<?php echo $_SESSION['user']['name']; ?>">
            </div>
            <div>
                <label for="surname">Фамилия:</label>
                <input type="text" id="surname" name="surname" value="<?php echo $_SESSION['user']['surname']; ?>">
            </div>
            <div>
                <label for="patronymic">Отчество:</label>
                <input type="text" id="patronymic" name="patronymic" value="<?php echo $_SESSION['user']['patronymic']; ?>">
            </div>
            <div>
                <label for="phone">Номер телефона:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['user']['phone']; ?>">
            </div>
            <div>
                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>">
            </div>
            <!-- Добавьте другие поля для редактирования -->
            <button type="submit">Сохранить изменения</button>
        </form>
    </div>
</div>
            </div>

            <div class="wishlist-items">
                <?php
                // Запрос к базе данных для получения списка желаемого
                $user_id = $_SESSION['user']['id']; // Добавьте код для получения ID пользователя
                $sql = "SELECT * FROM wishlist WHERE id_client = $user_id";
                $result = mysqli_query($connect, $sql);
                
                // Проверка наличия данных
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $hotel_id = $row['id_hotel'];
                        $sql1 = "SELECT * FROM hotels WHERE id = $hotel_id";
                        $result1 = mysqli_query($connect, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                            <div class="wishlist-item">
                                <img src="<?php echo $row1['photo_hotel']; ?>">
                                <div class="wishlist-info">
                                    <h3><?php echo $row1['name_hotel']; ?></h3>
                                    <p>Цена: <?php echo $row1['cost']; ?> ₽</p>
                                    <p>Местоположение: <?php echo $row1['location_hotel']; ?></p>
                                </div>
                                <a href= <?php echo "moreAboutTheHotel.php?id=".$hotel_id."" ?> class="more">Подробнее</a>
                                <a href=<?php echo "deletewishlist.php?id=".$id."" ?> class="more">Удалить</a>
                            </div>
                            <?php
                        }
                        }

                    }
                } else {
                    ?>
                    <p>В вашем списке желаемого пока нет отелей.</p>
                    <?php
                }
                ?>
            </div>
              
            <div class="purchases-items">
                <?php
                // Запрос к базе данных для получения списка покупок
                $user_id = $_SESSION['user']['id']; // Добавьте код для получения ID пользователя
                $sql = "SELECT * FROM buytour WHERE id_client = $user_id";
                $result = mysqli_query($connect, $sql);

                // Проверка наличия данных
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $hotel_id = $row['id_hotel'];
                        $sql1 = "SELECT * FROM hotels WHERE id = $hotel_id";
                        $result1 = mysqli_query($connect, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                            <div class="purchase-item">
                                <img src="<?php echo $row1['photo_hotel']; ?>">
                                <div class="purchase-info">
                                    <h3><?php echo $row1['name_hotel']; ?></h3>
                                    <p>Цена: <?php echo $row1['cost']; ?> ₽</p>
                                    <p>Местоположение: <?php echo $row1['location_hotel']; ?></p>
                                </div>
                                <a href=<?php echo "moreAboutTheHotel.php?id=".$hotel_id."" ?> class="more">Подробнее</a>
                                <a href=<?php echo "removebuy.php?id=".$id."" ?> class="more">Отменить</a>
                            </div>
                            <?php
                        }
                        }

                    }
                } else {
                    ?>
                    <p>В вашем списке желаемого пока нет отелей.</p>
                    <?php
                }
                ?>
                
            </div>
        </div> 
    </div>
    <?php require_once("footer.php") ?>
</body>
<script src="js/profile.js"></script>
</html>