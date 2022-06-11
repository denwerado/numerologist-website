<?php
    //#####Скрипт для проверки платежа#####
    require dirname(__FILE__) . '/db_connect.php';

    $payEmail = (string) $_POST['Email']; //Email пользователя
    $payId = (int) $_POST['AccountId']; //

    if($payId) {
        //Запрос в бд на проверку сущ. запроса на платеж
        $requestInfoUser = $connect->prepare("SELECT `email`,`name`,`rate`,`status_pay`,`time` FROM `num_pay` WHERE `id` = ?");
        $requestInfoUser->execute([$payId]);
        $requestInfoUserData = ($requestInfoUser->fetchAll());

        $userEmail = $requestInfoUserData[0]["email"];
        $userDateTimePay = $requestInfoUserData[0]["time"];
        $userName = (string)$requestInfoUserData[0]["name"];
        $userRate = (string)$requestInfoUserData[0]["rate"];
        $userStatusPay = $requestInfoUserData[0]["status_pay"];

        //Запрос на обновление статуса
        $requestUpdateInfoPay = $connect->prepare("UPDATE `num_pay` SET `status` = ? WHERE `email` = ? AND `time` = ?");

        if($userName && $userRate && $userStatusPay){
            //Успех
            $requestUpdateInfoPay->execute(['success', $userEmail, $userDateTimePay]);

            if($userStatusPay == "payment"){
                $statusAction = "createNewAccount";
                require  dirname(__FILE__) . '/create_account.php';
            }

            if($userStatusPay == "change"){
                $statusAction = "changeRate";
                require  dirname(__FILE__) . '/create_account.php';
            };  

        }else{
            //отклоненный
            $requestUpdateInfoPay->execute(['payment error', $userEmail, $userDateTimePay]);
        }
    }

    //Успех
    $response = ['code'=> 0];

    echo json_encode($response);
?>