<?php
    //#####Скрипт соединения с бд#####
    $dbhost = 'localhost';
    $dbname = 'numerologist_db';
    $dblogin = 'root';
    $dbpassword = 'root';

    $connect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dblogin, $dbpassword);
    $connect -> exec("set names utf8");
    //#####-----#####
?>