<?php
    //#####Родовая программа по году рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор родовой программы по году рождения";

    $yearBirthStrArr = str_split((string)$yearBirth);

    foreach($yearBirthStrArr as $key => $value){
        $yearBirthProgramm += (int)$value;
    }

    while($yearBirthProgramm > 10){
        $yearBirthProgrammStrArr = str_split((string)$yearBirthProgramm);

        $yearBirthProgramm = 0;

        foreach($yearBirthProgrammStrArr as $key => $value){
            $yearBirthProgramm += (int)$value;
        }
    }

    $query = "$searchRequestStart AND `differences` = '$yearBirthProgramm'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?>