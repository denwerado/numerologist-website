<?php
    $letterValues = [
        "А" => 1,
        "Б" => 2,
        "В" => 3,
        "Г" => 4,
        "Д" => 5,
        "Е" => 6,
        "Ё" => 7,
        "Ж" => 8,
        "З" => 9,
        "И" => 1,
        "Й" => 2,
        "К" => 3,
        "Л" => 4,
        "М" => 5,
        "Н" => 6,
        "О" => 7,
        "П" => 8,
        "Р" => 9,
        "С" => 1,
        "Т" => 2,
        "У" => 3,
        "Ф" => 4,
        "Х" => 5,
        "Ц" => 6,
        "Ч" => 7,
        "Ш" => 8,
        "Щ" => 9,
        "Ъ" => 1,
        "Ы" => 2,
        "Ь" => 3,
        "Э" => 4,
        "Ю" => 5,
        "Я" => 6
    ];


    //Разбиение строки
    function str_split_unicode($str, $l = 0) {
        if ($l > 0) {
            $ret = array();
            $len = mb_strlen($str, "UTF-8");
            for ($i = 0; $i < $len; $i += $l) {
                $ret[] = mb_substr($str, $i, $l, "UTF-8");
            }
            return $ret;
        }
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    }

    //Число имени
    $userNameCapital =  mb_strtoupper($userName,  'utf-8');
    $userNameLetters = str_split_unicode($userNameCapital);
    $userNameNumber = 0;

    foreach($userNameLetters as $key => $value){
        $userNameNumber += $letterValues[$value];
    };

    //Приведение к формату от 0 до 9
    while($userNameNumber >= 10){
        $userNameNumberStrArray = str_split((string)$userNameNumber);
        $userNameNumber  = 0;

        foreach($userNameNumberStrArray as $key => $value){
            $userNameNumber += (int)$value;
        }
    };


    //Число фамилии
    $userSurnameCapital =  mb_strtoupper($userSurname,  'utf-8');
    $userSurnameLetters = str_split_unicode($userSurnameCapital);
    $userSurnameNumber = 0;

    foreach($userSurnameLetters as $key => $value){
        $userSurnameNumber += $letterValues[$value];
    };

    //Приведение к формату от 0 до 9
    while($userSurnameNumber  >= 10){
        $userSurnameNumberStrArray = str_split((string)$userSurnameNumber);
        $userSurnameNumber  = 0;

        foreach($userSurnameNumberStrArray as $key => $value){
            $userSurnameNumber += (int)$value;
        }
    };
    

    //Число фамилии
    $userPatronymicCapital =  mb_strtoupper($userPatronymic,  'utf-8');
    $userPatronymicLetters = str_split_unicode($userPatronymicCapital);
    $userPatronymicNumber = 0;

    foreach($userPatronymicLetters as $key => $value){
        $userPatronymicNumber += $letterValues[$value];
    };

    //Приведение к формату от 0 до 9
    while($userPatronymicNumber  >= 10){
        $userPatronymicNumberStrArray = str_split((string)$userPatronymicNumber);
        $userPatronymicNumber  = 0;

        foreach($userPatronymicNumberStrArray as $key => $value){
            $userPatronymicNumber += (int)$value;
        }
    };


    $userFullNameNumberSum = $userPatronymicNumber + $userSurnameNumber + $userNameNumber;

    //Приведение к формату от 0 до 9
    while($userFullNameNumberSum >= 10){
        $userFullNameNumberSumStrArray  = str_split((string)$userFullNameNumberSum);
        $userFullNameNumberSum  = 0;

        foreach($userFullNameNumberSumStrArray  as $key => $value){
            $userFullNameNumberSum += (int)$value;
        }
    };

    
    /*$accordeonModules = array();
    $accordeonModules = [
        "modules-paths" => [
            0 => ['/modules/name/search_name_number.php'],

        ],
        "modules-title" => [
            "Число полного Имени",
        ]
    ];
    
    //Заполнение информации
    foreach ($accordeonModules["modules-paths"] as $modulesPathsKey => $modulesPaths) {
        $accordeonInfo = array();
        unset($accordeonObj);
        $accordeonObj;
        $accordeonObj["name"] = array();

        foreach ($modulesPaths as $patchKey => $patchValue) {
            require dirname(__FILE__) . $patchValue;
        }

        $accordeonObj["title"] = $accordeonModules["modules-title"][$modulesPathsKey];
        $accordeonObj["info"] = $accordeonInfo;

        array_push($accordeonArr, $accordeonObj);
    }*/
?>  

