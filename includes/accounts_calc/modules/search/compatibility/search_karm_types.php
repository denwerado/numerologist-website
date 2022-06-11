<?php
    //#####Кармические любовники, кармические кредиторы и кармические учителя.#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор кармы Ваших отношений";

    $query = "$searchRequestStart AND `differences` LIKE '%$numberPairs%'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo );
    //#####-----#####
?>