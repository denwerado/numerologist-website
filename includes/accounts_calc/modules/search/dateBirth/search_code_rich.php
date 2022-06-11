<?php
    //#####Личный код богатства#####
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор личного кода богатсва";

    $dateBirthNumbersRich = array();

    //Первые три числа
    for ($index=0; $index < 3; $index++) { 
        foreach (str_split($dateBirthPointArray[$index]) as $key => $value) {
            $dateBirthNumbersRich[$index] += (int)$value;

            while($dateBirthNumbersRich[$index] >= 10){
                $dateBirthNumbersRichArr = str_split((string)$dateBirthNumbersRich[$index]);
                $dateBirthNumbersRich[$index] = 0;

                foreach ($dateBirthNumbersRichArr as $secondKey => $secodValue) {
                    $dateBirthNumbersRich[$index] += (int)$secodValue;
                }
            }
        }
    }

    //4-ое число
    $dateBirthNumbersRich[3] = $dateBirthNumbersRich[0] + $dateBirthNumbersRich[1] + $dateBirthNumbersRich[2];
    while($dateBirthNumbersRich[3] >= 10){
        $dateBirthNumbersRichArr = str_split((string)$dateBirthNumbersRich[3]);
        $dateBirthNumbersRich[3] = 0;

        foreach ($dateBirthNumbersRichArr as $secondKey => $secodValue) {
            $dateBirthNumbersRich[3] += (int)$secodValue;
        }
    }

    $accordeonObj["name"][count($accordeonInfo)] = "Ваш личный код богатства: " . implode(".", $dateBirthNumbersRich);
    
    sort($dateBirthNumbersRich);

    foreach ($dateBirthNumbersRich as $key => $value) {
        //Исключение повторения чисел
        if(stripos(implode($dateBirthNumbersRich),(string)$dateBirthNumbersRich[$key]) == $key){
            $query = "$searchRequestStart AND `differences` = '$dateBirthNumbersRich[$key]'";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
            array_push($accordeonInfo, $checkInfo );
        }
    }

?>