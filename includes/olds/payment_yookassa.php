<?php
    /**
     * Старый скрипт оплаты
     * Использовался контроль по сесии, сейчас бы все записывал в бд
     */

    //#####Скрипт оплаты#####
    $json = json_decode(file_get_contents('php://input'),true);

    //Подключение файлов
    require dirname(__FILE__) . '/assets/php/db_connect.php';
    require dirname(__FILE__) . '/vendor/autoload.php';


    //Включение клиента оплаты
    use YooKassa\Client;
    $client = new Client();
    $client->setAuth('865771', 'live_jOtujvp_A7SaU4JqAc7XoY6hCC5aFBzDV_QK_hWu9KQ');


    //Объект  результата
    $result;


    //Получение статуса платежа
    $payStatus = (string)$json["status"];

    //Получение желаемого тарифа
    $payRate = (string)$json['rate'];

    //Получение email пользователя
    $payEmail = (string)$json["email"];


    $rateNames = [
        "free" => "Бесплатный",
        "basic" => "Базовый",
        "premium" => "Премиум",
        "pro" => "Профи",
        "admin" => "Административный"
    ];

    //***Запрос на информацию о тарифе из бд***
    $requestRate = $connect->prepare("SELECT `price`,`time_action` FROM `num_rates` WHERE `title` = ?");
    $requestRate->execute([$payRate]);
    //Получение данных
    $requestRateData = ($requestRate->fetchAll());
    //Взятие данных
    $paySum = $requestRateData[0]["price"];
    $payTimeAction = $requestRateData[0]["time_action"];
    //***---***/


    //Если пришел email
    if($payEmail){
        //***Запрос на проверку существования аккаунта***
        $requestCheckAccount = $connect->prepare("SELECT `login`FROM `num_logins` WHERE `login` = ?");
        $requestCheckAccount->execute([$payEmail]);
        //Получение данных
        $requestCheckAccountData = ($requestCheckAccount->fetchAll());
        //Взятие данных
        $checkAccountLogin = $requestCheckAccountData[0]["login"];
        //***---***

        //Если такой аккаунт сущ., то смена статуса платежа
        if($checkAccountLogin){
            $payStatus = "change";
        }
    }


    //***Если пришел запрос на первичную оплату***
    if($payStatus == "payment"){

        //Получение имени пользователя
        $payUserName = $json["name"];

        try {
            $payment = $client->createPayment(
                array(
                    //Сумма платежа
                    'amount' => array(
                        'value' => $paySum,
                        'currency' => 'RUB',
                    ),

                    //Описание транзакции
                    'description' => "Тариф:" . $rateNames["$payRate"],

                    //Сценарий подтверждения платежа пользователем
                    'confirmation' => array(
                        "type" => "embedded",
                        "locale" => "ru_RU",
                    ),

                    //Данные для чека
                    'receipt' => array(
                        'customer' => array(
                            'full_name' => "$payUserName",
                            'email' => "$payEmail",
                        ),
                        'items' => array(
                            array(
                                'description' => "Тариф:" . $rateNames["$payRate"],
                                'quantity' => '1.00',
                                'amount' => array(
                                    'value' => $paySum,
                                    'currency' => 'RUB',
                                ),
                                'vat_code' => 1,
                            ),
                        ),
                    ),

                    //Автоматический прием поступившего платежа
                    'capture' => true,

                    //Id покупателя по почте
                    'merchant_customer_id' => "$payEmail",
                ),
                uniqid('', true)
            );
        }catch (\Exception $e) {
            $response = $e;
        }


        //Проверка токена
        if($payment["confirmation"]["confirmation_token"]){
            $result["status"] = "success";
            $result["confirmation_token"] = $payment["confirmation"]["confirmation_token"];
        }else{
            $result["status"] = "error";
        }

        //Сообщения во время успеха или неудачи
        $result["success"] = "<p class='cmp-modal__text-success'>Оплата прошла успешно!<br>На вашу почту выслан логин и пароль</p>";
        $result["error"] = "<p class='cmp-modal__text-error'>Ошибка оплаты!<br>Повторите попытку позже, либо обратитесь службу поддержки</p>";

        //Отправка клиенту ключ информации
        $result["rate"] = "$payRate";
        $result["email"] = "$payEmail";
        $result["name"] = "$payUserName";
        $result["paystatus"] = "$payStatus";

        //Запись в сессию для контроля нессанкционированного доступа
        //$_SESSION["payrate"] = $result["rate"];
        //$_SESSION['payemail'] = $result["email"];

        //Отправка клиенту
        echo json_encode($result);
    }



    //*Если пришел запрос на смену тарифа
    if($payStatus == "change"){

        //Если email не пришел 
        if(!$payEmail){
            //Получение логина (почты) пользователя
            $payEmail = (string)$_COOKIE['login'];
        }


        //****Запрос на данные о пакете пользователя***
        $requestCheckAccount = $connect->prepare("SELECT `rate`,`time_purchase` FROM `num_logins` WHERE `login` = ?");
        $requestCheckAccount->execute([$payEmail]);
        //Получение данных
        $requestCheckAccountData = ($requestCheckAccount->fetchAll());
        //Взятие данных
        $checkAccountRate = $requestCheckAccountData[0]["rate"];
        $checkAccountTimePurchase = $requestCheckAccountData[0]["time_purchase"];
        //***---***/
         


        //***Проверка времени действия пакета пользователя***/
        $validityPeriodRate = date('d.m.Y',strtotime($checkAccountTimePurchase) + strtotime($payTimeAction));

        //Текущая дата
        $currentDate = date('d.m.Y');
        //***---***/



        //Проверка на время действия тарифа
        if(strtotime($currentDate) <= strtotime($validityPeriodRate)){
            $checkValidityPeriod = true;
            // /$payOldPrice = 
        }else{
            $checkValidityPeriod = false;
        }


        if(($checkAccountRate != $payRate) || (!$checkValidityPeriod && $checkAccountRate == $payRate)){
            //Получение имени
            $requestName = $connect->prepare("SELECT `name` FROM `num_logins` WHERE `login` = ?");
            $requestName->execute([$payEmail]);
            $payUserName = ($requestName->fetchAll())[0]["name"];


            try {
                $payment = $client->createPayment(
                    array(
                        //Сумма платежа
                        'amount' => array(
                            'value' => $paySum,
                            'currency' => 'RUB',
                        ),

                        //Описание транзакции
                        'description' => "Тариф:" . $rateNames["$payRate"],

                        //Сценарий подтверждения платежа пользователем
                        'confirmation' => array(
                            "type" => "embedded",
                            "locale" => "ru_RU",
                        ),

                        //Данные для чека
                        'receipt' => array(
                            'customer' => array(
                                'full_name' => "$payUserName",
                                'email' => "$payEmail",
                            ),
                            'items' => array(
                                array(
                                    'description' => "Тариф:" . $rateNames["$payRate"],
                                    'quantity' => '1.00',
                                    'amount' => array(
                                        'value' => $paySum,
                                        'currency' => 'RUB',
                                    ),
                                    'vat_code' => 1,
                                ),
                            ),
                        ),

                        //Автоматический прием поступившего платежа
                        'capture' => true,

                        //Id покупателя по почте
                        'merchant_customer_id' => "$payEmail",
                    ),
                    uniqid('', true)
                );
            }catch (\Exception $e) {
                $response = $e;
            }


            //Проверка токена
            if($payment["confirmation"]["confirmation_token"]){
                $result["status"] = "success";
                $result["confirmation_token"] = $payment["confirmation"]["confirmation_token"];
            }else{
                $result["status"] = "error";
            }

            //Сообщения во время успеха или неудачи
            $result["success"] = "<p class='cmp-modal__text-success'>Поздравляем, вы успешно сменили тариф!</p>";
            $result["error"] = "<p class='cmp-modal__text-error'>Ошибка оплаты!<br>Повторите попытку позже, либо обратитесь службу поддержки</p>";

        }else{
            $result["status"] = "exists";
            $result["exists"] = "<p class='cmp-modal__text-waning'>Аккаунт с таким действующим тарифом уже существует!</p>";
        }

        //Отправка клиенту ключевой информации
        $result["rate"] = "$payRate";
        $result["email"] = "$payEmail";
        $result["paystatus"] = "$payStatus";

        //Запись в сессию для контроля нессанкционированного доступа
        //$_SESSION["payrate"] = $result["rate"];
        //$_SESSION['payemail'] = $result["email"];
 
        echo json_encode($result);
    }
    //#####-----#####
?>
