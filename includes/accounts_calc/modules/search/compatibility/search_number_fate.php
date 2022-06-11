<?php
    //#####Совместимость по Числу Судьбы#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор совместимости по Числу Судьбы";
    
    $query = "$searchRequestStart AND `differences` = 'women=$numberWomen&men=$numberMen'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo );
    //#####-----#####
?>