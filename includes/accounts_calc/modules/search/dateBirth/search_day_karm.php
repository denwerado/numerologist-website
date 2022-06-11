<?php
    //#####Карма числа дня рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор кармы числа дня рождения";

    $query = "$searchRequestStart AND `type` = $dayBirth";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####

?>