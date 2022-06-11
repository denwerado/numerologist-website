<?php
    //#####Скрипт соединения с бд#####
    $dbhost = 'localhost';
    $dbname = 'numerologist_db';
    $dblogin = 'root';
    $dbpassword = 'root';

    /*$dbhost = 'u62684.mysql.masterhost.ru';
    $dbname = 'u62684_numerolog';
    $dblogin = 'u62684_numerpro';
    $dbpassword = '3HIlinh_resS';*/

    $connect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dblogin, $dbpassword);
    $connect -> exec("set names utf8");
    //#####-----#####
?>