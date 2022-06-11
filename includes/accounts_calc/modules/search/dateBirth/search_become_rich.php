<?php
    //#####Шанс разбогатеть#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор показателя Вашего шанса разбогатеть";

    $mountsYearBirthNumber = (int) ($dateBirthPointArray[1] . $dateBirthPointArray[2]);

    $multiplicationNumbersBirth = $dayBirth * $mountsYearBirthNumber;
    $multiplicationNumbersBirthArr = str_split((string) $multiplicationNumbersBirth);

    foreach ($multiplicationNumbersBirthArr as $key => $value) {
        $becomeRich += (int) $value;
    };

    if($becomeRich >= 29){
        $query = "$searchRequestStart AND `type` = 3";
    }else{
        if($becomeRich <= 25){
            $query = "$searchRequestStart AND `type` = 2";
        }else{
            $query = "$searchRequestStart AND `type` = 1";
        }
    }

    $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
    array_push($accordeonInfo, $checkInfo );
    //#####-----#####
?>