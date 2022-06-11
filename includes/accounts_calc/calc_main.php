<?php
    //#####Основной файл 
    
    //Массив объектов информации для вывода результатов
    $accordeonChapter = array();

    //Файлы для получения основных вычислений 
    require dirname(__FILE__) . '/modules/calc_name.php';
    require dirname(__FILE__) . '/modules/calc_psychomatrix.php';
    require dirname(__FILE__) . '/modules/calc_dateBirth.php';
    require dirname(__FILE__) . '/modules/calc_timeBirth.php';
    require dirname(__FILE__) . '/modules/calc_compatibility.php';


    //Уровни пакетов для расчета
    $rateLevels = [
        "basic" => 1,
        "premium" => 2,
        "pro" => 3,
        "admin" => 4
    ];


    //Массив расчетов
    $accordeonModules = array();
 
    //Структура
    /* "Название главы" => [
            "Название аккордеона" =>
                [["Путь до получения знач 1","его имя в таблице"], ["Путь 2","имя"]],
            "Название 2" => 
                [["путь 1", "имя"], ["путь 2", "имя"] и тд..],
    ]*/
    
    $accordeonModules = [
        //*1-----//
        "Психоматрица личности" => [
            "Цифры в психоматрице" =>
                [['/psychomatrix/search_psychomatrix.php',"psychomatrix"]],
            "Строки" => 
                [['/psychomatrix/search_rows.php',"psychomatrix_rows"]],
            "Столбцы" =>
                [['/psychomatrix/search_columns.php',"psychomatrix_columns"]],
            "Диагонали" => 
                [['/psychomatrix/search_diag.php',"psychomatrix_diag"]]
        ],

        //*2-----//
        "Нумерологические коды" => [
            "Нумерологические коды" =>
            [['/psychomatrix/search_codes.php',"psychomatrix_codes"]],
        ],

        //*3-----//
        "Нумерологические комбинации" => [
            "Нумерологические комбинации" =>
                [['/psychomatrix/search_combinations.php',"psychomatrix_combinations"]],
        ],
        
        //*4-----//
        "Здоровье в психоматрице" => [
            "Здоровье в психоматрице" =>
                [['/psychomatrix/search_health.php',"psychomatrix_health"]],
        ],

        //*5-----//
        "Денежный потенциал" => [
            "Ваш шанс разбогатеть" =>
                [['/dateBirth/search_become_rich.php',"dateBirth_become_rich"]],
            "Личный код богатства" =>
                [['/dateBirth/search_code_rich.php',"dateBirth_code_rich"]],
            "Финансовая карма" =>
                [['/psychomatrix/search_fin_karm.php', "psychomatrix_fin_karm"]],
            "Числа богатства и числа бедности в дате рождения" =>
                [['/dateBirth/search_numbers_pov_rich.php',"dateBirth_numbers_pov_rich"]],
        ],

        //*6------//
        "Программа по дате рождения" => [
            "Время рождения" =>
                [['/timeBirth/search_timeBirth_value.php',"timeBirth_value"]],
            "Кармические задачи по месяцу рождения" =>
                [['/dateBirth/search_mounths_karm.php',"dateBirth_mounths_karm"]],
            "Карма числа дня рождения" =>
                [['/dateBirth/search_day_karm.php',"dateBirth_day_karm"]],
            "Код поведения" =>
                [['/dateBirth/search_code_behavior.php',"dateBirth_code_behavior"]],
            "Месяц рождения" =>
                [['/dateBirth/search_mounths_value.php',"dateBirth_mounths_value"]],
            "Нули в дате рождения" =>
                [['/dateBirth/search_zeros.php',"dateBirth_zeros"]],
            "Родовая программа по году рождения" =>
                [['/dateBirth/search_year_programm.php', "dateBirth_year_programm"]],
            "Число дня рождения" =>
                [['/dateBirth/search_day_number.php',"dateBirth_day_number"]],
            "Числовой код даты рождения" =>
                [['/dateBirth/search_codes.php',"dateBirth_codes"]],
        ],

        //*7-----//
        "ФИО код возможностей" => [
            "Значение ФИО" => 
                [['/name/search_name_number.php',"name_number"]],
        ],

        //*8-----//
        "Годовые циклы" => [
            "Годовые циклы" => 
                [['/dateBirth/search_year_cycle.php',"dateBirth_year_cycle"]],
        ],

        //*9-----//
        "Предназначение" => [
            "Число Души" =>
                [['/dateBirth/search_soul_number.php',"dateBirth_soul_number"]],
            "Число Судьбы" =>
                [['/dateBirth/search_fate_number.php',"dateBirth_fate_number"]],
        ],

        //*10-----//
        "Совместимость" => [
            "Для чего встретились" => 
                [['/compatibility/search_numbers_pairs.php',"comp_numbers_pairs"]],
            "Кармические любовники, кредиторы, учителя" =>
                [['/compatibility/search_karm_types.php',"comp_karm_types"]],
            "Совместимость по ЧС" =>
                [['/compatibility/search_number_fate.php',"comp_number_fate"]],
            "Союзы" =>
                [['/compatibility/search_unions.php',"comp_unions"]]
        ]
        //*-----//
    ];


    //*Таблица по которой выполняется поиск расчетов
    $searchTableName = 'num_info_calcs';

    //*Подготавливаемый запрос на поиск инф-ии по рассчету
    $searchDescCalcRequest =  $connect->prepare("SELECT `description`, `calc`, `rate` FROM `num_desc_calcs` WHERE `calc_name` = ?");
    
    //*Подготавливаемый запрос на поиск описания по главе
    $searchDescChapterRequest = $connect->prepare("SELECT `description` FROM `num_chapter` WHERE UPPER(`name`) = UPPER(?)");

    //Перебор глав
    foreach ($accordeonModules as $accordeonModulesChapter => $accordeonModulesAccordeons) {
        unset($accordeonChapterObj);
        $accordeonChapterObj;
        $accordeonArr = array();

        //Перебор содержимого главы
        foreach($accordeonModulesAccordeons as $accordeonModulesNames => $accordeonModulesData){
            //Вся информация в аккродеоне 
            $accordeonInfo = array();
            //Описание аккордеона
            $accordeonDescription = '';

            //Объект целого аккордеона
            unset($accordeonObj);
            $accordeonObj;
            $accordeonObj["name"] = array();

            $accordeonObj["title"] = $accordeonModulesNames;

            //Перебор модулей 
            foreach ($accordeonModulesData as $accordeonCalcKey => $accordeonCalcValue) {
                $searchFieldName = $accordeonCalcValue[1];

                //Запрос на информацию об расчете
                $searchDescCalcRequest->execute(["$searchFieldName"]);
                $checkInfo = ($searchDescCalcRequest->fetchAll())[0];

                $calcRate = $checkInfo["rate"];
                $accordeonDescription .= $checkInfo["description"];
                $accordeonObj["calc"] .= $checkInfo["calc"];

                if($rateLevels[$calcRate] <= $rateLevels[$userRate]){
                    //Начало запроса
                    $searchRequestStart = "SELECT `content`, `subcalc_name` FROM `$searchTableName` WHERE `calc_name` = '$searchFieldName'";

                    require dirname(__FILE__) . '/modules/search' . $accordeonCalcValue[0];
                    $accordeonObj["display"] = "yes";
                }
            }

            $accordeonObj["description"] = $accordeonDescription;
            $accordeonObj["info"] = $accordeonInfo;
            array_push($accordeonArr, $accordeonObj);
        }

        $accordeonChapterObj["accordeons"] = $accordeonArr;
        $accordeonChapterObj["chapter"] = $accordeonModulesChapter;

        //Описание главы
        $searchDescChapterRequest->execute(["$accordeonModulesChapter"]);
        $accordeonChapterObj["chapter-desc"] = ($searchDescChapterRequest->fetchAll())[0]['description'];

        array_push($accordeonChapter,$accordeonChapterObj);        
    }
?>