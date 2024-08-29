<?php
// Подключение к базе данных
require_once("connect.php");
session_start();
// Получение данных из формы
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Запрос на обновление данных пользователя в базе данных
$sql = "UPDATE users SET name = '$name', surname = '$surname', patronymic = '$patronymic', phone = '$phone', email = '$email' WHERE id = $user_id";

// Выполнение запроса
if (mysqli_query($connect, $sql)) {
  // Перенаправление на страницу профиля
  $_SESSION['user']['name'] = $name;
  $_SESSION['user']['surname'] = $surname;
  $_SESSION['user']['patronymic'] = $patronymic;
  $_SESSION['user']['phone'] = $phone;
  $_SESSION['user']['email'] = $email;
  header("Location: profilepage.php"); // Замените на имя вашего файла
  exit;
} else {
  // Ошибка при обновлении данных
  echo "Ошибка при обновлении данных: " . mysqli_error($conn);
}

// Закрытие соединения с базой данных
mysqli_close($conn);