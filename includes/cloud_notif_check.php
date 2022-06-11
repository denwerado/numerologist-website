<?php
    //#####Скрипт для проверки платежа#####
    require dirname(__FILE__) . '/db_connect.php';

    //Получение данных
    $payAmount = (float) $_POST['Amount']; //Сумма транзакции
    $payStatus = (string) $_POST['Status']; //Статус
    //$payEmail = (string) $_POST['Email']; //Email пользователя
    $payId = (int)$_POST['AccountId']; //

    if($payAmount && $payId && ($payStatus == 'Completed')) { 
        //Запрос в бд на проверку сущ. запроса на платеж
        $requestCheckPay = $connect->prepare("SELECT `sum`, `time` FROM `num_pay` WHERE `id` = ?");
        $requestCheckPay->execute([$payId]);
        $requestCheckPayData = ($requestCheckPay->fetchAll());

        //Получение дат
        $currentDateTime = strtotime(date("Y-m-d G:i:s"));
        $checkDateTime = (strtotime($requestCheckPayData[0]["time"]) + strtotime(date("Y-m-d G:i:s",'1970-01-01 00:30:00')));

        //Обновление статуса
        $requestUpdateInfoPay = $connect->prepare("UPDATE `num_pay` SET `status` = ? WHERE `id` = ?");

        
        //Если давность не прошла
        if($currentDateTime <= $checkDateTime){
            $checkSum = (float)$requestCheckPayData[0]["sum"];

            if($checkSum == $payAmount){
                //В режиме ожидании оплаты
                $requestUpdateInfoPay->execute(['expectation',$payId]);

                //Успех
                $response = ['code'=> 0];
            }else{
                //Неверная сумма
                $requestUpdateInfoPay->execute(['incorrect amount', $payId]);
                $response = ['code'=>12];
            }
        }else{
            //Платеж просрочен
            $requestUpdateInfoPay->execute(['payment is overdue', $payId]);
            $response = ['code' =>20];
        }
    }else{
        //Некорректный AccountId	
        $response = ['code' => 11];
    }
    
    
    echo json_encode($response);
    //#####-----#####
?>