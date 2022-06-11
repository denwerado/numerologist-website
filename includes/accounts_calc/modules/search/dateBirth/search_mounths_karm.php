<?php
    //#####Кармические задачи по месяцу рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор кармических задач по месяцу рождения";

    $query = "$searchRequestStart AND `type` = $monthBirth";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?>