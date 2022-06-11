<?php
    //#####Код поведения по дате рождения#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор кода поведения";

    $dateBirthMountsDayStr = $dateBirthPointArray [1] . '.' . $dateBirthPointArray[0];

    $query = "$searchRequestStart AND `dateRange1` <= '0000.$dateBirthMountsDayStr' AND `dateRange2` >= '0000.$dateBirthMountsDayStr'";

    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?>