<?php
    //#####Скрипт смены пакета#####
    $json = json_decode(file_get_contents('php://input'),true);

    require './db_connect.php';

    $userRate = $json["rate"];
    $userLogin = $json["email"];

    if($userLogin && $userRate){
        //Поиск id
        $checkRequestId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
        $checkRequestId->execute([$userLogin]);
        $checkId = ($checkRequestId->fetchAll())[0]["id"];

        if($checkId){
            //Получение даты
            $timePurchase = date('Y-m-d');
            
            $checkRequestRate = $connect->prepare("UPDATE `num_logins` SET `rate` = '$userRate', `time_purchase` = '$timePurchase' WHERE `id` = $checkId;");
            $checkRequestRate->execute([$userRate]);
        }
    }
    //#####-----#####
?>