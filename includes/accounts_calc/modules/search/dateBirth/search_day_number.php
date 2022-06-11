<?php
    //#####Число дня рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор числа дня рождения";

    $query = "$searchRequestStart AND `differences` = '$dayBirth'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?>