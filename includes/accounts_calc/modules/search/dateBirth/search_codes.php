<?php
    //#####Числовой код даты рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор числового кода даты рождения";

    foreach($dateBirthUniqStrArray as $key => $value){
        $query = "$searchRequestStart AND `differences` = $value";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo);
    }
    //#####-----#####
?>