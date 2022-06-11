<?php
    //#####Вид союза#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор Вашего союза";

    $query = "$searchRequestStart AND `differences` LIKE '%/$psychotypePartner,$psychotype/%'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    if(!$checkInfo){
        $query = "$searchRequestStart AND `differences` LIKE '%/$psychotype,$psychotypePartner/%'";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    }
    array_push($accordeonInfo, $checkInfo );
    //#####-----#####
?>