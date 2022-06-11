<?php
    //#####Расшифровка диагоналей
    $accordeonObj["name"][count($accordeonInfo)] =  "Разбор диагоналей";



    //*Духовная диагональ
    $query = "$searchRequestStart AND `type` = 1 AND `differences` LIKE '%$matrixDiag1%'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    if (!$checkInfo) {
        $query = "$searchRequestStart AND `type` = 1 AND `differences` LIKE '%+'";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    if($checkInfo["subcalc_name"]){
        $subCalcName = $checkInfo["subcalc_name"];
        $query = "SELECT `description` FROM `num_desc_subcalcs` WHERE `subcalc_name` = '$subCalcName'";
        $checkInfo["description"] = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["description"];
    }

    array_push($accordeonInfo, $checkInfo);


    //*Плотская диагональ
    $query = "$searchRequestStart AND `type` = 2 AND `differences` LIKE '%$matrixDiag2%'";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    if (!$checkInfo) {
        if ($matrixDiag2) {
            $query = "$searchRequestStart AND `type` = 2 AND `differences` LIKE '%+'";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        } else {
            $query = "$searchRequestStart AND `type` = 2 AND `differences` LIKE '*%'";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        }
    }

    if($checkInfo["subcalc_name"]){
        $subCalcName = $checkInfo["subcalc_name"];
        $query = "SELECT `description` FROM `num_desc_subcalcs` WHERE `subcalc_name` = '$subCalcName'";
        $checkInfo["description"] = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["description"];
    }

    array_push($accordeonInfo, $checkInfo);


    //*Соотношение диагоналей
    $ratioDiag = $matrixDiag1 - $matrixDiag2;
    if ($ratioDiag > 0) {
        if ($ratioDiag <= 2) {
            $query = "$searchRequestStart AND `type` = 3 AND `differences` LIKE '%$ratioDiag%>'";
        } else {
            $query = "$searchRequestStart AND `type` = 3 AND `differences` LIKE '%+>'";
        }
    }
    if ($ratioDiag < 0) {
        $abs = abs($ratioDiag);
        if ($abs <= 2) {
            $query = "$searchRequestStart AND `type` = 3 AND `differences` LIKE '%$abs%<'";
        } else {
            $query = "$searchRequestStart AND `type` = 3 AND `differences` LIKE '%+<'";
        }
    }
    if ($ratioDiag == 0) {
        $query = "$searchRequestStart AND `type` = 3 AND `differences` LIKE '='";
    }
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    
    if($checkInfo["subcalc_name"]){
        $subCalcName = $checkInfo["subcalc_name"];
        $query = "SELECT `description` FROM `num_desc_subcalcs` WHERE `subcalc_name` = '$subCalcName'";
        $checkInfo["description"] = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["description"];
    }

    array_push($accordeonInfo, $checkInfo);

    //#####-----#####
?>