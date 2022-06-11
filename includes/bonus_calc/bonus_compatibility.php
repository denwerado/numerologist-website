<?php
    //вычисление совместимости
    $json = json_decode(file_get_contents('php://input'),true);

    require dirname(__FILE__) . '/db_connect.php';

    //###Если пришли две даты###
    if($json['womandate'] && $json['mendate']){
        //Разбитие на символы
        $womanStrArray = str_split($json['womandate']);
        $menStrArray = str_split($json['mendate']);

        $numberWomen = 0;
        $numberMen = 0;

        foreach($womanStrArray as $key => $value){
            if($value!='.'){
                $numberWomen += (int)$value;
            };
        };

        foreach($menStrArray as $key => $value){
            if($value!='.'){
                $numberMen += (int)$value;
            };
        };


        //Приведение к формату от 0 до 9
        while($numberWomen>=10){
            $womanStrArray = str_split((string)$numberWomen);
            $numberWomen = 0;

            foreach($womanStrArray as $key => $value){
                $numberWomen += (int)$value;
            }
        };

        while($numberMen>=10){
            $menStrArray = str_split((string)$numberMen);
            $numberMen = 0;
            
            foreach($menStrArray as $key => $value){
                $numberMen += (int)$value;
            }
        };


        //Запрос в бд
        $requestInfoCompatibility = $connect->prepare("SELECT `percent_love_marriage`,`description_love_marriage`,
        `percent_friendship`,`description_friendship`,
        `percent_work`,`description_work` FROM `num_compatibility` WHERE `number_women` = ? AND `number_men` = ?");
        
        $requestInfoCompatibility->execute([$numberWomen,$numberMen]);
        $requestInfoCompatibilityData = ($requestInfoCompatibility->fetchAll())[0];

        $result = $requestInfoCompatibilityData;

        echo json_encode(["number_women" => $numberWomen,
                        "number_men" => $numberMen,
                        "percent_love_marriage" => $result["percent_love_marriage"], 
                        "description_love_marriage" => $result["description_love_marriage"],
                        "percent_friendship" => $result["percent_friendship"],
                        "description_friendship" => $result["description_friendship"],
                        "percent_work" => $result["percent_work"],
                        "description_work" => $result["description_work"]]);
    }
?>