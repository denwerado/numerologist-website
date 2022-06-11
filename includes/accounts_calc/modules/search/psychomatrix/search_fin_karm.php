<?php
    //#####Финансовая карма и Ваш денежный потенциал######
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор финансовой кармы";
 
    //$searchTableName = 'num_psychomatrix_fin_karm';

    if($calcCol2){
        $query = "$searchRequestStart AND `differences` = '$calcCol2'";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    }else{
        $query = "$searchRequestStart AND `differences` = '*'";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    }
    array_push($accordeonInfo, $checkInfo); 


    if(!$accordeonInfo){
        array_push($accordeonInfo, [ "title" => 'Не удалось расчитать финансовую карму']);
    }
    //#####-----#####
?>