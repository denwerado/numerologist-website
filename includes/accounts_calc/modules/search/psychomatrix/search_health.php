<?php
    //#####Здоровье в психоматрице######
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор здоровья в психоматрице";

    for ($index = 1; $index <= 9; $index++) {
        if ($matrix[$index]) {
            $query = "$searchRequestStart AND `differences` = '$matrix[$index]'";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
            if (!$checkInfo) {
                $query = "$searchRequestStart AND `differences` LIKE '%$index+'";
                $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
            }
        } else {
            $query = "$searchRequestStart AND `differences` = '*$index'";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        }

        if($index == 7){
            $query = "$searchRequestStart AND `differences` LIKE '%7%'";

            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        }
        array_push($accordeonInfo, $checkInfo);
    }
    //#####-----#####
?>