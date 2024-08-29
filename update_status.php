<?php
require_once("connect.php");

// Получение ID заявки и нового статуса из запроса
$applicationId = $_POST['applicationId'];
$newStatus = $_POST['newStatus'];

// Запрос на обновление статуса в базе данных
$sql = "UPDATE buytour SET status = '$newStatus' WHERE id = '$applicationId'";

// Выполнение запроса
if (mysqli_query($connect, $sql)) {
  // Ответ сервера, что статус обновлен успешно
  echo "OK";
} else {
  // Ответ сервера, что произошла ошибка
  echo "ERROR";
}

// Закрытие соединения
mysqli_close($connect);
