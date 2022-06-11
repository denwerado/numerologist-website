<?php
    //#####Время рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор времени рождения";

    $query = "$searchRequestStart AND `timeRange1` <= '$timeBirth:00' AND `timeRange2` >= '$timeBirth:00'";

    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?>  