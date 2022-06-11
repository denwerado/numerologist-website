<?php
    //#####Годовые циклы#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор годовых циклов";

    $dateBirthSumВigits;
    $currentYearSumВigits = date('Y');
    while($currentYearSumВigits >= 10){
        $currentYearSumВigitsArr = str_split((string)$currentYearSumВigits);

        $currentYearSumВigits = 0;

        foreach($currentYearSumВigitsArr as $key => $value){
            $currentYearSumВigits += (int)$value;
        }
    }


    $sumBigitsNumbers = $currentYearSumВigits + $dateBirthSumВigits;
    while($sumBigitsNumbers >= 10){
        $sumBigitsNumbersStrArr = str_split((string)$sumBigitsNumbers);

        $sumBigitsNumbers = 0;

        foreach($sumBigitsNumbersStrArr as $key => $value){
            $sumBigitsNumbers += (int)$value;
        }
    }

    $query = "$searchRequestStart AND `type` = $sumBigitsNumbers";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo); 

    //#####-----#####
?>