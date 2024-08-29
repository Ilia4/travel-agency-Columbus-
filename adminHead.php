<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/adminHead.css">
</head>
<body>
<?php require_once("connect.php") ?>
    <?php require_once("adminHead.php") ?>
    <?php session_start(); ?>
    <header>
        <h1>Панель администратора</h1>
    </header>
    <section class="actions">
            <h2>Действия</h2>
            <button class="add-tour" >Добавить отель</button>
            <button class="delete-tour">Удалить тур</button>
            <button class="add-country">Добавить страну</button>
            <button class="delete-country">Удалить страну</button>
            <button class="add-hotel">Добавить тур</button>
            <button class="delete-hotel">Удалить отель</button>
            <button class="add-country" id="exit">Выход</button>
        </section>
</body>
</html>
<script>
    let exit = document.getElementById("exit");
    exit.addEventListener('click', function(){
        window.location.href = "exit.php"
    })
</script>