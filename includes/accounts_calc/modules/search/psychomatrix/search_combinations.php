<?php
    //#####Нумерологические комбинации по психоматрице######
    $accordeonObj["name"][count($accordeonInfo)] = "Разбор нумерологических комбинаций";

    //$searchTableName = "num_psychomatrix_combinations";

    //**Комбинация «Однотонельные люди»
    if($calcMatrix1 == 1 && $calcMatrix6 == 0 && $calcMatrix9 == 1){
        $query = "$searchRequestStart AND `type` = 1";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo);
    }
    //**--
 

    //**Комбинация «Болт» 
    if($calcMatrix1 >= 2 && $calcMatrix2 >= 2 && $calcMatrix3 >= 1 && ($calcMatrix5 >= 1 && $calcMatrix5 <= 4)){
        $query = "$searchRequestStart AND `type` = 2";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--

    
    //**Комбинация «Гайка»
    if($calcMatrix7 >= 1 && $calcMatrix8 >= 1 && $calcMatrix9 >= 2 && ($calcMatrix4 >= 1 && $calcMatrix4 <= 5) && ($calcMatrix6 >= 1 && $calcMatrix6 <= 4)){
        $query = "$searchRequestStart AND `type` = 3";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Висилица»
    if (($calcMatrix1 >= 2 && $calcMatrix2 >= 2 && $calcMatrix3 >= 1) && ($calcMatrix1>=2 && $calcMatrix4>=1 && $calcMatrix7>=1) && ($calcMatrix7>=1 && $calcMatrix8>=1 && $calcMatrix9>=2) && $calcMatrix5==0 && $calcMatrix6 == 0) {
        $query = "$searchRequestStart AND `type` = 4";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Птица»
    if(($calcMatrix1>=2 && $calcMatrix2>=2 && $calcMatrix3>=1) && ($calcMatrix1>=2 && $calcMatrix4>=1 && $calcMatrix7>=1)){
        $query = "$searchRequestStart AND `type` = 5";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--

    
    //**Комбинация «Стакан»
    if (($calcMatrix1>=2 && $calcMatrix2>=2 && $calcMatrix3>=1) && ($calcMatrix3>=1 && $calcMatrix6>=1 && $calcMatrix9>=2) && ($calcMatrix7>=1 && $calcMatrix8>=1 && $calcMatrix9>=2) && $calcMatrix4==0 && $calcMatrix5==0) {
        $query = "$searchRequestStart AND `type` = 6";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Якорь»
    if(($calcMatrix7>=1 && $calcMatrix8>=1 && $calcMatrix9>=2) && ($calcMatrix3>=1 && $calcMatrix6>=1 && $calcMatrix9>=2)){
        $query = "$searchRequestStart AND `type` = 7";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Лодка без вёсел»
    if(($calcMatrix1 <= 1 || $calcMatrix4 == 0 || $calcMatrix7==0) && ($calcMatrix2 <= 1 || $calcMatrix5 == 0 || $calcMatrix8 == 0) && ($calcMatrix3 == 0 || $calcMatrix6 == 0 || $calcMatrix9<=1) && ($calcMatrix1<=1 || $calcMatrix2<=1 || $calcMatrix3<=0) && ($calcMatrix4==0 || $calcMatrix5==0 || $calcMatrix6==0) && ($calcMatrix7==0 || $calcMatrix8==0 || $calcMatrix9<=1)){
        $query = "$searchRequestStart AND `type` = 8";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Идеальный человек»
    if($calcMatrix1 >= 2 && $calcMatrix2 >= 2 && $calcMatrix3 >= 1 && $calcMatrix4 >= 1 && $calcMatrix5 >= 1 && $calcMatrix6 >= 1 && $calcMatrix7 >= 1 && $calcMatrix8 >= 1 && $calcMatrix9 >= 2){
        $query = "$searchRequestStart AND `type` = 9";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Треугольник Альтруизма»
    if ($calcMatrix1 >= 2 && $calcMatrix4 >= 1 && $calcMatrix5 >= 1 && $calcMatrix7 >= 1) {
        $query = "$searchRequestStart AND `type` = 10";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Треугольник Эгоизма»
    if($calcMatrix3 >= 1 && $calcMatrix5 >= 1 && $calcMatrix6 >= 1 && $calcMatrix9 >= 2){
        $query = "$searchRequestStart AND `type` = 11";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Эгоцентризм»
    if($calcMatrix3 >= 1 && $calcMatrix5 >= 1 && $calcMatrix6 >= 1 && $calcMatrix9 == 1){
        $query = "$searchRequestStart AND `type` = 12";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--


    //**Комбинация «Ни себе ни людям»
    if($calcMatrix1 >= 2 && $calcMatrix4 >= 1 && $calcMatrix7 >= 1 && $calcMatrix3 >= 1 && $calcMatrix6 >= 1 && $calcMatrix9 >= 2 && $calcMatrix5 == 0){
        $query = "$searchRequestStart AND `type` = 13";
        $checkInfo = $connect->query($query)->fetch(PDO::FETCH_ASSOC);
        array_push($accordeonInfo, $checkInfo); 
    }
    //**--

    if(!$accordeonInfo){
        array_push($accordeonInfo, [ "content" => '<p class="title">У Вас нет нумерологических комбинаций в психоматрице</p>']);
    }
    //#####-----######

?>