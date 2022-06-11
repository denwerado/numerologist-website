<?php
    //#####Скрипт проверки пользателя и тарифа#####
    $json = json_decode(file_get_contents('php://input'),true);

    require dirname(__FILE__) . '/db_connect.php';

    //Объект  результата
    $result;


    /**
     * Получение данных
     */
    //Получение статуса платежа
    $payStatus = (string)$json["status"];

    //Получение желаемого тарифа
    $payRate = (string)$json['rate'];

    //Получение email пользователя
    $payEmail = (string)$json["email"];

    //Получение имени пользователя
    $payName = (string)$json["name"];

    $rateNames = [
        "free" => "Бесплатный",
        "basic" => "Базовый",
        "premium" => "Премиум",
        "pro" => "Профи",
        "admin" => "Административный"
    ];
    /**---**/



    /** 
     * Запрос на информацию о стоимости и времени действия тарифа из бд
    */
    $requestInfoRate = $connect->prepare("SELECT `price`,`time_action` FROM `num_rates` WHERE `title` = ?");
    $requestInfoRate->execute([$payRate]);

    //Получение данных
    $requestInfoRateData = ($requestInfoRate->fetchAll());

    //Взятие данных
    $paySum = $requestInfoRateData[0]["price"];
    $payTimeAction = $requestInfoRateData[0]["time_action"];
    /**---**/



    /**
     * Если пришел email, проверка на сущ. аккаунта
     */
    if($payEmail){
        $requestCheckAccount = $connect->prepare("SELECT `login`FROM `num_logins` WHERE `login` = ?");
        $requestCheckAccount->execute([$payEmail]);

        //Получение данных
        $requestCheckAccountData = ($requestCheckAccount->fetchAll());
        $checkAccountLogin = $requestCheckAccountData[0]["login"];

        //Если такой аккаунт сущ., то смена статуса платежа
        if($checkAccountLogin){
            $payStatus = "change";
        }
    }
    /**---**/


    //SQL запросы
    $currentDateTime = date("Y-m-d G:i:s");
    $requestInsertInfoPay = $connect->prepare("INSERT INTO `num_pay` (`email`,`name`,`rate`,`sum`,`status_pay`,`time`,`status`) VALUES (?,?,?,?,?,?,?)");
    $requestGetPayId = $connect->prepare("SELECT `id` FROM `num_pay` WHERE `email` = ? AND `status` = 'request' ORDER BY `time` DESC LIMIT 1");


    /**
     * Если есть такой тариф
     */
    if($paySum){

        /**
         * Если пришел запрос на первияную оплату
        */
        if($payStatus == "payment"){
            //Запись в бд инфо по платежу
            $requestInsertInfoPay->execute([$payEmail,$payName,$payRate,$paySum,$payStatus,$currentDateTime,'request']); 

            //Получение id 
            $requestGetPayId->execute([$payEmail]);
            $result["id"] = ($requestGetPayId->fetchAll())[0]["id"];

            //Сообщения во время успеха или неудачи
            $result["status"] = "success";
            $result["sum"] = $paySum;
            $result["paystatus"] = $payStatus;
            $result["ru-paystatus"] = "оплатил тариф";
            $result["ru-rate"] = $rateNames[$payRate];

            $result["success"] = "<p class='cmp-modal__text-success'>Оплата прошла успешно!<br>На вашу почту выслан логин и пароль</p>";
            $result["error"] = "<p class='cmp-modal__text-error'>Ошибка оплаты!<br>Повторите попытку позже, либо обратитесь службу поддержки</p>";

            echo json_encode($result);
        }
        /**-----*/



        /**
         * Если пришел запрос на смену тарифа
         */
        if($payStatus == "change"){
            //Если email не пришел 
            if(!$payEmail){
                //Получение логина (почты) пользователя
                $payEmail = (string)$_COOKIE['login'];
            }


            /**
             * Запрос на данные о пакете пользователя
             */
            $requestCheckAccount = $connect->prepare("SELECT `rate`,`time_purchase`,`price` FROM `num_logins` INNER JOIN `num_rates` ON num_logins.rate = num_rates.title WHERE `login` = ?");
            $requestCheckAccount->execute([$payEmail]);
            //Получение данных
            $requestCheckAccountData = ($requestCheckAccount->fetchAll())[0];
            //Взятие данных
            $checkAccountRate = (string)$requestCheckAccountData["rate"];
            $checkAccountTimePurchase = $requestCheckAccountData["time_purchase"];
            $checkAccountPrice = (int)$requestCheckAccountData["price"];
            /**-----*/


            /**
             * Проверка времени действия пакета пользователя
             */
            $validityPeriodRate = date('d.m.Y',strtotime($checkAccountTimePurchase) + strtotime($payTimeAction));

            //Текущая дата
            $currentDate = date('d.m.Y');

            if(strtotime($currentDate) <= strtotime($validityPeriodRate)){
                $checkValidityPeriod = true;

            }else{
                $checkValidityPeriod = false;
            }
            /**-----*/



            if(($checkAccountRate != $payRate) || (!$checkValidityPeriod && $checkAccountRate == $payRate)){
                //Получение имени
                $requestName = $connect->prepare("SELECT `name` FROM `num_logins` WHERE `login` = ?");
                $requestName->execute([$payEmail]);
                $payUserName = ($requestName->fetchAll())[0]["name"];

                if($checkValidityPeriod){
                    if($checkAccountPrice < $paySum){
                        $paySum = $paySum - $checkAccountPrice;
                    }else{
                        $paySum = 1;
                    }
                };

                //Запись в бд инфо по платежу
                $requestInsertInfoPay->execute([$payEmail,$payUserName,$payRate,$paySum,$payStatus,$currentDateTime,'request']);

                //Получение id 
                $requestGetPayId->execute([$payEmail]);
                $result["id"] = ($requestGetPayId->fetchAll())[0]["id"];

                //Сообщения во время успеха или неудачи
                $result["status"] = "success";
                $result["name"] = $payUserName;
                $result["sum"] = $paySum;
                $result["paystatus"] = $payStatus;
                $result["ru-paystatus"] = "сменил(а) тариф";
                $result["ru-rate"] = $rateNames[$payRate];

                $result["success"] = "<p class='cmp-modal__text-success'>Поздравляем, вы успешно сменили тариф!</p>";
                $result["error"] = "<p class='cmp-modal__text-error'>Ошибка оплаты!<br>Повторите попытку позже, либо обратитесь службу поддержки</p>";
            }else{
                $result["status"] = "exists";
                $result["exists"] = "<p class='cmp-modal__text-waning'>Аккаунт с таким действующим тарифом уже существует!</p>";
            }

            echo json_encode($result);
        }
        
    }else{
        $result["status"] = "error";
        $result["error"] = "<p class='cmp-modal__text-error'>Ошибка оплаты!<br>Повторите попытку позже, либо обратитесь службу поддержки</p>";

        echo json_encode($result);
    }
?>