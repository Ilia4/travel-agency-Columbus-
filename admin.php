<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
    
</head>
<body>
    <?php require_once("connect.php") ?>
    <?php require_once("adminHead.php") ?>
    <?php session_start(); ?>   
    <main>
       
        <section class="applications">
            <h2>Заявки на покупку туров</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID заявки</th>
                        <th>ID пользователя</th>
                        <th>ID отеля</th>
                        <th>Эл. почта</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Подключение к базе данных
                    require_once("connect.php");

                    // Запрос к базе данных
                    $sql = "SELECT * FROM `buytour`";
                    $result = mysqli_query($connect, $sql);

                    // Проверка результата запроса
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            // Формирование строки таблицы
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name_user"] . "</td>";
                            echo "<td>" . $row["id_hotel"] . "</td>";
                            echo "<td>" . $row["email_user"] . "</td>"; // Замените id_hotel на имя столбца с названием тура
                            // echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td><button class='delete' data-id='" . $row["id"] . "'>Отменить</button> <button class='submit' data-id='" . $row["id"] . "'>Подтвердить</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Заявок нет</td></tr>";
                    }

                    // Закрытие соединения
                   
                    ?>
                </tbody>
            </table>
        </section>

        <section class="add-tour-container">
            <section class="add-tour">
                <h2>Добавить новый отель</h2>
                <form id="addTourForm" method="POST" action="addhotel.php" enctype="multipart/form-data">
                    <label for="nameHotel">Название отеля:</label>
                    <input type="text" id="nameHotel" name="nameHotel" required>

                    <label for="locationHotel">Месторасположение:</label>
                    <input type="text" id="locationHotel" name="locationHotel" required>

                    <label for="description">Описание:</label>
                    <textarea id="description" name="description" required></textarea>

                    <label for="star">Количество звезд:</label>
                    <input type="number" id="star" name="star" required>

                    <label for="country">Страна:</label>
                   
                    <select name="country">
                    <?php 
                    require_once("connect.php");

                    $sql = "SELECT * FROM country";
                    $result = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo'<option>'. $row['name'] .'</option>';        


                        }
                    }

                    ?>
                    </select>
                
                    <label for="photo">Фото:</label>
                    <input type="file" id="photo" name="photo" required>

                    <label for="cost">Цена:</label>
                    <input type="text" id="cost" name="cost" required>

                    <label for="duration">Длительность:</label>
                    <input type="number" id="duration" name="duration" required>

                    <button type="submit">Добавить отель</button>
                </form>
            </section>
        </section>

        <section class="add-country-container">
            <section class="add-country">
                <h2>Добавить новую страну</h2>
                <form id="addCountryForm" method="POST" action="addcountry.php">
                    <label for="countryName">Название страны:</label>
                    <input type="text" id="countryName" name="name" required>

                    <label for="countryDescription">Описание:</label>
                    <textarea id="countryDescription" name="description" required></textarea>

                    <button type="submit">Добавить страну</button>
                </form>
            </section>
        </section>

        <section class="add-hotel-container">
            <section class="add-hotel">
                <h2>Добавить новый тур</h2>
                <form id="addTourForm" method="POST" action="addq.php" enctype="multipart/form-data">
                    <label for="tourName">Название тура:</label>
                    <input type="text" id="tourName" name="name" required>

                    <label for="tourCount">Цена:</label>
                    <input type="number" id="tourCount" name="count" required>

                    <label for="tourDescription">Описание:</label>
                    <textarea id="tourDescription" name="description" required></textarea>

                    <label for="tourPhoto">Фото:</label>
                    <input type="file" id="tourPhoto" name="photo" required>

                    <label for="tourCountry">Страна:</label>
                    <select name="country" id="tourCountry" required>
                        <?php
                        require_once("connect.php"); 

                        $sql = "SELECT * FROM country";
                        $result = mysqli_query($connect, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>'; 
                            }
                        }
                        
                        ?>
                    </select>

                    <button type="submit">Добавить тур</button>
                </form>
            </section>
        </section>
        
        <section class="deleteHotels">
            <h2>Список отелей</h2>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Месторасположение</th>
                    <th>Описание</th>
                    <th>Звезды</th>
                    <th>Страна</th>
                    <th>Фото</th>
                    <th>Цена</th>
                    <th>Длительность</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Подключение к базе данных
                require_once("connect.php");

                // Запрос к базе данных
                $sql = "SELECT * FROM hotels";
                $result = mysqli_query($connect, $sql);

                // Проверка результата запроса
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    // Формирование строки таблицы
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name_hotel"] . "</td>";
                    echo "<td>" . $row["location_hotel"] . "</td>";
                    echo "<td>" . $row["description_hotel"] . "</td>";
                    echo "<td>" . $row["stars_hotel"] . "</td>";
                    echo "<td>" . $row["country_hotel"] . "</td>";
                    echo "<td><img src='" . $row["photo_hotel"] . "' alt='Фото отеля' width='100'></td>";
                    echo "<td>" . $row["cost"] . "</td>";
                    echo "<td>" . $row["duration"] . " дней</td>";
                    echo "<td>
                            <form method='POST' action='deletehotel.php'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' class='delete-button'>Удалить</button>
                            </form>
                            </td>";
                    echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Отелей нет</td></tr>";
                }

           
               
                ?>
                </tbody>
            </table>
        </section>
        

        <section class="deleteCountry">
            <h2>Список стран</h2>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>    
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Подключение к базе данных
                require_once("connect.php");

                // Запрос к базе данных
                $sql = "SELECT * FROM country";
                $result = mysqli_query($connect, $sql);

                // Проверка результата запроса
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    // Формирование строки таблицы
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";         
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>
                            <form method='POST' action='deletecountry.php'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' class='delete-button'>Удалить</button>
                            </form>
                            </td>";
                    echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Отелей нет</td></tr>";
                }

            
                ?>
                </tbody>
            </table>
        </section>

        <section class="deleteTours">
            <h2>Список туров</h2>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>  
                    <th>Цена</th>   
                    <th>Описание</th>
                    <th>Фото</th>
                    <th>Страна</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Подключение к базе данных
                require_once("connect.php");

                // Запрос к базе данных
                $sql = "SELECT * FROM tours";
                $result = mysqli_query($connect, $sql);

                // Проверка результата запроса
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    // Формирование строки таблицы
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["count"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td><img src='" . $row["photo"] . "' alt='Фото отеля' width='100'></td>";
                    echo "<td>" . $row["country"] . "</td>";
                    echo "<td>
                            <form method='POST' action='deletetour.php'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' class='delete-button'>Удалить</button>
                            </form>
                            </td>";
                    echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Отелей нет</td></tr>";
                }

                // Закрытие соединения
                mysqli_close($connect);
                ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2023</p>
    </footer>
</body>
<script src="js/admin.js"></script>
</html>