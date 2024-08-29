<?php
require_once("connect.php");

$existing_usernames = array();

$query = $connect->query('SELECT `email` FROM `users`');
if ($query) {
    while ($row = $query->fetch_array()) {
        $existing_usernames[] = $row['email'];
    }
}

if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $newStr = str_split($username);
    
    $firstElement = '@';
    $secondElement = '.';

    $flag1 = false;
    $flag2 = false;

    foreach ($newStr as $element) {
        if ($element == $firstElement) {
            $flag1 = true;
        }
        if ($element == $secondElement) {
            $flag2 = true;
        }
    
        // Если оба элемента найдены, можно прервать дальнейший поиск
        if ($flag1 && $flag2) {
            break;
        }
    }



    if( in_array($username, $existing_usernames)) {
        echo 'not_unique';
    } 
    else if(in_array($username, $existing_usernames) || $username == '' || ($flag1 == 0 || $flag2 == 0)){
        echo 'not_mail';
    }
    else {
        echo 'unique';
    }
}
