<?php
    //#####Вывод информации по психотипу#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор психотипа";

    $query = "SELECT `content`, `subcalc_name` FROM `$searchTableName` WHERE `calc_name` = 'psychomatrix_psychotype' AND `type` = $psychotype";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);

    if($checkInfo["subcalc_name"]){
        $subCalcName = $checkInfo["subcalc_name"];
        $query = "SELECT `description` FROM `num_desc_subcalcs` WHERE `subcalc_name` = '$subCalcName'";
        $checkInfo["description"] = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["description"];
    }

    array_push($accordeonInfo, $checkInfo);
    //#####-----#####
?>