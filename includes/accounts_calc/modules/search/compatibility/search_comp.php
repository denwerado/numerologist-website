<?php
    //#####Экспресс совместимость#####
    $query = "SELECT `title`,`subtitle1`,`subdescription1`,`subtitle2`,`subdescription2`,`subtitle3`,`subdescription3` FROM `num_comp` WHERE `number_women` = $numberWomen AND `number_men` = $numberMen";
    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo );
    //#####-----#####
?>