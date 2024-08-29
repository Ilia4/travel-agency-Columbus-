<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://www.sng-it.ru/bitrix/templates/master/js/jquery.inputmask.bundle.min.js"></script>
   
</head>

<body>
    <?php
    session_start();
    require_once("connect.php");
    session_start();
    ?>
    <!--  САМЫЕ ВЕРХНИЕ КНОПКИ С ДОПОЛНИТЕЛЬНОЙ ИНФОРМАЦИЕЙ -->
<div class="border">
    <div class="link">
        <a href="aboutCompany.php" class="linkHead">О компании</a>
        <a href="contact.php" class="linkHead">Контакты</a>
        <a href="alltours.php" class="linkHead">Отели</a>

    </div>
</div>
<!-- КОНЕЦ -->


<!-- КНОПКИ ОТВЕЧАЮЩИЕ ЗА ПЕРЕХОД ПО САЙТУ -->
<div class="header">
    <div class="img">
        <img src="css/img/newLogo.png" width="300" height="100" onclick="main()">
    </div>
    <div class="button">
        <button class="search" onclick="alltours()">ПОИСК ТУРОВ</button>
        <button class="top" onclick="popularTravel()">ПОПУЛЯРНЫЕ НАПРАВЛЕНИЯ</button>
        <div class="dropdown">
            <button id="list" class="dropbtn">КУДА ПОЕХАТЬ?</button>
            <div id="myDropdown" class="dropdown-content">
                <?php 
                $sql = "SELECT * FROM country ORDER BY id desc";

                if($result = $connect -> query($sql)){
                    while($row = $result -> fetch_array()){     
                        echo '<a href="aboutCountry.php?id='.$row['id'].'">'.$row['name'].'</a>' ;
                    }
                }

                ?>
            </div>
        </div>
        <?php 
if(isset($_SESSION['user']['id'])){
    echo '<button class="acc" onclick="profile()">';
    echo 'АККАУНТ';
    echo '<div class="hoverEffect">';
    echo '<div>';
    echo '</div>';
    echo '</div></button>';
}
else{
    echo '<button class="acc" onclick="openForm()">';
    echo 'РЕГИСТРАЦИЯ';
    echo '<div class="hoverEffect">';
    echo '<div>';
    echo '</div>';
    echo '</div></button>';
}
?>

    </div>   
</div>
<!-- КОНЕЦ -->


<!-- БЛОК С ФОРМАМИ КОТОРЫЕ ОТОБРАЖАЮТСЯ ПО НАЖАТИЮ -->
<div class="form">

        <!-- ФОРМА РЕГИСТРАЦИИ -->
        <div class="signup" id="signupForm" style="display:none;">

            <div class="close" id="close" onclick="Close()">
                <img src="css/img/closeProfile.png" alt="" width="25" srcset="">
            </div>

            <form action="signbd.php" method="POST" class="form1">
                
                    <div class="input-group">
                        <input type="text" name="name" id="name" required="" autocomplete="off" class="input">
                        <label class="user-label">Имя</label>
                        <span id="nameStatus"></span>
                    </div>
                    <div class="input-group">
                        <input type="text"  name="surname" id="surname" required="" autocomplete="off" class="input" >
                        <label class="user-label">Фамилия</label>
                        <span id="snameStatus"></span>
                    </div>
                    <div class="input-group">
                        <input type="text" name="patronymic" id="patronymic" required="" autocomplete="off" class="input">
                        <label class="user-label">Отчество</label>
                        <span id="patronStatus"></span>
                    </div>
                    <div class="input-group">
                        <input type="phone" name="phone" id="phone" required="" autocomplete="off" class="input">
                        <label class="user-label">Телефон</label>
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" required="" id="username" placeholder="Почта" autocomplete="off" class="input" oninput="checkUsername()"><br>
                        <!-- <label class="user-label">Почта</label><br> -->
                        <span id="username-status"></span>
                    </div>
                    
                    <div class="input-group">
                        <input type="password" required="" name="pass" id="pass"  autocomplete="off" class="input">
                        <label class="user-label">Пароль</label>
                    </div>

                   <button type="submit" class="btn" id="btnRegForm">Зарегистрироваться</button>
                    
            </form>
            <div class="errorBlockReg" id="errorBlockReg">
                Проверьте правильность введенных данных
            </div>        

            <div class="alog">
                <a href="#" class="a" onclick="openLogin()">Уже есть аккаунт?</a>
            </div> 

        </div>
        <!-- КОНЕЦ -->

        <!-- ФОРМА АВТОРИЗАЦИИ -->
        <div class="login" id="loginForm">
            <div class="close" id="close" onclick="Close2()">
                <img src="css/img/closeProfile.png" alt="" width="25" srcset="">
            </div>

            <form action="loginbd.php" method="POST" class="form2">
                
                    <div class="input-group2">
                        <input type="email" name="email" required=""  autocomplete="off" class="input">
                        <label class="user-label">Почта</label>
                    </div>
                    <div class="input-group2">
                        <input type="password" required="" name="pass"  autocomplete="off" class="input">
                        <label class="user-label">Пароль</label>
                    </div>

                    <button type="submit" class="btn2">Войти</button>

                    <div class="alog">
                        <a href="#" class="a" onclick="openSignup()">Нету аккаунта?</a>
                    </div> 
                    
            </form>

        </div>
        <!-- КОНЕЦ -->

    </div>   

    
    </div>

<script src="js/header.js"></script>
</body>

<script>
    
    /*Проверка на уникальность электронной почты*/
    var valid = '';
    function checkUsername() {
        let username = document.getElementById('username').value;
        $.ajax({
            type: 'POST',
            url: 'check_username.php',
            data: { username: username },
            success: function(response) {
                if(response === 'unique' ) {
                    document.getElementById('username-status').innerHTML = '<span style="color:green;">Отлично!</span>';
                    valid = 'okay';
                    
                } 
                else if(response === 'not_mail'){
                    document.getElementById('username-status').innerHTML = '<span style="color:red;">Ошибка при написание почты!</span>';
                    valid = 'none';
                   
                  
                }
                else {
                    document.getElementById('username-status').innerHTML = '<span style="color:red;">Эл. почта уже используется!</span>';
                    valid = 'none';
                  
                }
            }
        });
    }
    /*Маска ввода для телефонного номера*/
    $('#phone').inputmask("+9 (999) 999-99-99");

    /*Проверка правильности заполенения формы регистрации*/
    function checkForm() {
    var name = document.getElementById('name').value.trim();
    var surname = document.getElementById('surname').value.trim();
    var patronymic = document.getElementById('patronymic').value.trim();
    var phone = document.getElementById('phone').value.trim();
    var email = document.getElementById('username').value.trim();
    var pass = document.getElementById('pass').value.trim();

    var fieldComplete = false

    if ( name === '' || surname === '' || patronymic === '' || phone === '' || email === '' || pass === '' || valid === 'none') {
       document.getElementById("errorBlockReg").style = "display:block";
        return false;
        
    }

    return true;
    

    
    console.log(valid);
    
}
/*Отправка данных в базу данных*/
document.getElementById('btnRegForm').addEventListener('click', function(event) {
    event.preventDefault(); // Отмена стандартной отправки формы

    if (checkForm()) {
        var formData = new FormData(document.querySelector('.form1'));
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'signbd.php', true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
               
                console.log("Отправлено");
                location.reload();
            } else {
                console.log("Ошибка");
            }
        };
        xhr.send(formData);
    }
});

</script>

</html>