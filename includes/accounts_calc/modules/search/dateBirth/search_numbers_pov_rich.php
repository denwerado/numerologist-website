<?php
    //#####Числа богатсва и числа бедности#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор чисел богатства, бедности и чисел особых даров в дате рождения";

    
    //Вычисление шанса разбогатеть
    foreach($dateBirthStrArray as $key => $value){
        if($value != '.' && $value!='0'){
            $dateBirthNumbersPovRichArr[(int)$value] .= $value;
        }
    };

    for ($index=1; $index <= 9; $index++) { 
        if($dateBirthNumbersPovRichArr[$index]){
            $query = "$searchRequestStart AND `differences` = '$index'";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
            array_push($accordeonInfo, $checkInfo );
        }
    } 
    //#####-----#####

?>