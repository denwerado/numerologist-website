<?php
    //#####Месяц рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор месяца рождения";

    $query = "$searchRequestStart AND `type` = $monthBirth";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####

?>