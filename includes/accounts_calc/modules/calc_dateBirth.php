<?php 
    //Разбитие через точку
    $dateBirthPointArray = explode('.',$dateBirth);

    //Разбитие на символы
    $dateBirthStrArray = str_split((string) $dateBirth);

    //Разбитие на неповторяющиеся символы
    $dateBirthUniqStrArray = array();
    foreach ($dateBirthStrArray as $key => $value) {
        $checkValue = stripos(implode($dateBirthUniqStrArray),$value);

        if($checkValue === false && $value!= '.'){
            array_push($dateBirthUniqStrArray,(int)$value);
        }
    }
    sort($dateBirthUniqStrArray);



    //** Сумма цифр даты рождения
    $dateBirthSumВigits = 0;
    foreach($dateBirthStrArray as $key => $value){
        $dateBirthSumВigits += (int)$value;
    }


    while($dateBirthSumВigits >= 10){
        $dateBirthSumВigitsStrArr = str_split((string)$dateBirthSumВigits);

        $dateBirthSumВigits = 0;

        foreach($dateBirthSumВigitsStrArr as $key => $value){
            $dateBirthSumВigits += (int)$value;
        }
    } 
    //**--



    $dayBirth = (int)$dateBirthPointArray[0];
    $monthBirth = (int)$dateBirthPointArray[1];
    $yearBirth = (int)$dateBirthPointArray[2];
?>