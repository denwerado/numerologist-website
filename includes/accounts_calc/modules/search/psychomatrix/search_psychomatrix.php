<?php 
    //#####Вывод информации по психоматрице######
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор психоматрицы";
    
    
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

        if($checkInfo["subcalc_name"]){
            $subCalcName = $checkInfo["subcalc_name"];
            $query = "SELECT `description` FROM `num_desc_subcalcs` WHERE `subcalc_name` = '$subCalcName'";
            $checkInfo["description"] = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["description"];
        }

        array_push($accordeonInfo, $checkInfo);

        //Вывод психотипа
        if($index == 2){
            require dirname(__FILE__) . '/search_psychotype.php';
        }
    }
    //#####-----#####
?>