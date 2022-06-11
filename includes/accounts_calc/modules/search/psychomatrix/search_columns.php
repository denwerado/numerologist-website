<?php
    //#####Расшифровка столбцов#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор столбцов";
    $matrixColNumber = 0;

    for ($index = 1; $index < 10; $index += 3) {
        $matrixColNumber++;
        $colNum = strlen($matrix[$index]) + strlen($matrix[$index + 1]) + strlen($matrix[$index + 2]);
        $query = "$searchRequestStart AND `type` = $matrixColNumber  AND `differences` LIKE '%$colNum%'";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);

        if (!$checkInfo) {
            $query = "$searchRequestStart AND `type` = $matrixColNumber AND `differences` LIKE '%+'";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        }

        if($checkInfo["subcalc_name"]){
            $subCalcName = $checkInfo["subcalc_name"];
            $query = "SELECT `description` FROM `num_desc_subcalcs` WHERE `subcalc_name` = '$subCalcName'";
            $checkInfo["description"] = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["description"];
        }
        
        array_push($accordeonInfo, $checkInfo);
    }
    //#####-----#####
?>