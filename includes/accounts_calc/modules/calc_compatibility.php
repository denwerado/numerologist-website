<?php
    if($gender == "men"){
        $womanDateBirth = $dateBirthPartner;
        $menDateBirth = $dateBirth;
    }else{
        $womanDateBirth = $dateBirth;
        $menDateBirth = $dateBirthPartner;
    }

    $womanDateBirthStrArray = str_split($womanDateBirth);
    $menDateBirthStrArray = str_split($menDateBirth);

    $numberWomen = 0;
    $numberMen = 0;

    foreach($womanDateBirthStrArray as $key => $value){
        if($value!='.'){
            $numberWomen += (int)$value;
        };
    };

    foreach($menDateBirthStrArray as $key => $value){
        if($value!='.'){
            $numberMen += (int)$value;
        };
    };


    //Приведение к формату от 0 до 9
    while($numberWomen>=10){
        $womanDateBirthStrArray = str_split((string)$numberWomen);
        $numberWomen = 0;

        foreach($womanDateBirthStrArray as $key => $value){
            $numberWomen += (int)$value;
        }
    };

    //Приведение к формату от 0 до 9
    while($numberMen>=10){
        $menDateBirthStrArray = str_split((string)$numberMen);
        $numberMen = 0;
            
        foreach($menDateBirthStrArray as $key => $value){
            $numberMen += (int)$value;
        }
    };

    //Число пары
    $numberPairs = $numberWomen + $numberMen;
    //Приведение к формату от 0 до 9
    while($numberPairs>=10){
        $numberPairsStrArray = str_split((string)$numberPairs);
        $numberPairs = 0;
        foreach($numberPairsStrArray as $key => $value){
            $numberPairs += (int)$value;
        }
    };

    /*$accordeonModules = array();
    $accordeonModules = [
        "modules-paths" => [
            0 => ['/modules/compatibility/search_numbers_pairs.php'],
            1 => ['/modules/compatibility/search_karm_types.php'],
            2 => ['/modules/compatibility/search_number_fate.php'],
            3 => ['/modules/compatibility/search_comp.php'],
            4 => ['/modules/compatibility/search_unions.php'],
        ],
        "modules-title" => [
            "Для чего Вы встретились",
            "Кармические любовники, кармические кредиторы и кармические учителя",
            "Совместимость по Числу Судьбы",
            "Экспресс совместимость",
            "Вид союза"
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