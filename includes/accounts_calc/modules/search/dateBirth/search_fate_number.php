<?php
    //#####Число судьбы#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор Числа Судьбы";
    
    $query = "$searchRequestStart AND `differences` = '$dateBirthSumВigits'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?> 