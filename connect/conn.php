<?php
    $severName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'tincrud';

    $connect = new mysqli($severName, $userName, $password, $dbName);

    if(!$connect){
        echo 'khong thanh cong';
    }
?>