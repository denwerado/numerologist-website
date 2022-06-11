<?php
    //#####Нули в дате рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор нулей в дате рождения";

    $dateBirthZeroz = 0;

    foreach($dateBirthStrArray as $key => $value){
        if($value == '0'){
            $dateBirthZeroz++;
        }
    }

    if($dateBirthZeroz <= 5){
        $query = "$searchRequestStart AND `differences` = '$dateBirthZeroz'";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo );
    }
    //#####-----#####
?>