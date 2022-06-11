<?php
    //#####Число Души#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор Числа Души";
    $soulNumber = $dayBirth;
    while($soulNumber >= 10){
        $soulNumberStrArr = str_split((string)$soulNumber);
        $soulNumber = 0;
        foreach($soulNumberStrArr as $key => $value){
            $soulNumber += (int)$value;
        }
    }

    $query = "$searchRequestStart AND `differences` = '$soulNumber'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?>