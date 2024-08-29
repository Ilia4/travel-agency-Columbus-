<?php 
$connect = new mysqli('localhost', 'root', '', 'kolymb');
if(!$connect)
{echo 'нет соединения с базой данных';}
?>