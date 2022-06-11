<?php
    //#####Число полного имени#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор числа полного Имени";

    $query = "$searchRequestStart AND `differences` = $userFullNameNumberSum";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo);

?>