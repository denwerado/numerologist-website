<?php
    //#####Для чего Вы встретились#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор числа пары";

    $query = "$searchRequestStart AND `differences` = '$numberPairs'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo );
    //#####-----#####
?>