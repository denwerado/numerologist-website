<?php
    //#####Расшифровка строк#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор строк";
    $matrixRowsNumber = 0;

    for ($index = 1; $index < 4; $index++) {
        $matrixRowsNumber++;
        $rowNum = strlen($matrix[$index]) + strlen($matrix[$index + 3]) + strlen($matrix[$index + 6]);
        $query = "$searchRequestStart AND `differences` LIKE '%$rowNum%' AND `type` = $index";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);

        if (!$checkInfo) {
            $query = "$searchRequestStart AND `differences` LIKE '%+' AND `type` = $index";
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