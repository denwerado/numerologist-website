<?php
    //Разбор нумерологических кодов
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор нумерологических кодов";

    //**Код миллионера
    if(($calcCol2>=3 && $calcCol2 <=5)&&($calcRow1 >= 4 && $calcRow1 <= 5) && $calcMatrix2 == 2 && ($calcMatrix6 >= 1 && $calcMatrix6 <= 2) && $calcMatrix9 == 2){
        $query = "$searchRequestStart AND `type` = 1";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo);
    }
    //**--

    if($gender == "men"){
        //**Код «Отца»
        if(($calcRow2>=4 && $calcRow2<=5) && ($calcMatrix1>=3 && $calcMatrix1<=5) && ($calcMatrix3>=2 && $calcMatrix3<=4) && ($calcMatrix5>=1 && $calcMatrix5<=2) && ($calcMatrix8>=2 && $calcMatrix8<3)){
            $query = "$searchRequestStart AND `type` = 3";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
            array_push($accordeonInfo, $checkInfo);
        }
        //**--
    }else{
        //**Код «Матери»
        if($calcMatrix2 == 2 && ($calcMatrix3 >= 2 && $calcMatrix3 <=4) && ($calcMatrix4 >=2 && $calcMatrix4 <= 4) && ($calcMatrix5 >= 1 && $calcMatrix5 <=2)){
            $query = "$searchRequestStart AND `type` = 2";
            $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
            array_push($accordeonInfo, $checkInfo);
        }
        //**--
    }


    //**Код «Бездетности» (убрали из всех пакетов)
    /*if($calcRow2 == 0 && $calcMatrix3==0){
        $query = "$searchRequestStart and `type` = 4";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo);
    }*/
    //**--


    //**Код «Альфонса» и «Содержанки»
    if($calcCol2 == 0 && $calcMatrix8==0){
        $query = "$searchRequestStart AND `type` = 4";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo);
    }
    //**--


    //**Код «Риска»
    if(($calcCol2>=0 && $calcCol2<=2) && ($calcMatrix3>=2 && $calcMatrix3<=4) && ($calcMatrix7>=2 && $calcMatrix7<=3)){
        $query = "$searchRequestStart AND `type` = 5";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo);
    }
    //**--

    if(!$accordeonInfo){
        array_push($accordeonInfo,["content" => '<p class="title">У Вас нет нумерологических кодов в психоматрице</p>']);
    }
?>