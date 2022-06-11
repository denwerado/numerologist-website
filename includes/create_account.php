<?php
    //#####Скрипт создания доступов в аккаунт#####
    require dirname(__FILE__) . '/db_connect.php';

    function generateRandomString(){
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random ='';
        for ($i=0; $i < 8; $i++) { 
            //Обращается к char и с первого по последний значение рандомно выбираем символ
            $random .= $char[rand(0,(strlen($char)-1))];
        }
        return $random;
    }

    //Генерация пароля
    $userPass = generateRandomString();


    //Если пришел запрос на генерацию нового аккаунта
    if($statusAction == "createNewAccount"){
        
        //Получение даты
        $timePurchase = date('Y-m-d');

        //Вставка значений в бд
        $requestInsertNewAccount = $connect->prepare("INSERT INTO `num_logins` (`login`,`password`,`name`,`time_purchase`,`rate`) VALUES (?,'new_hash',?,?,?)");
        $requestInsertNewAccount->execute([$userEmail,$userName,$timePurchase,$userRate]);

        //Получение id
        $requestGetAccountId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
        $requestGetAccountId->execute([$userEmail]);
        $checkId = ($requestGetAccountId->fetchAll())[0]["id"];

        //Получение соли
        $userSalt = substr($userPass,0,6) . 'numerologist' . (string)$checkId . $userPass;

        //Получение хэша
        $passHash = password_hash($userSalt,PASSWORD_DEFAULT);

        //Обновление хэша пароля
        $requestUpdateAccountPass = $connect->prepare("UPDATE `num_logins` SET `password` = ? WHERE `login` = ?");
        $requestUpdateAccountPass->execute([$passHash,$userEmail]);

        // Формирование самого письма
        $title = "Доступы для сайта Нумеролог PRO";
        $body = "
        <h2>$userName, добрый день!</h2>
        <p>Поздравляем вас с приобретением тарифа $userRate</p>
        <br>
        <b>Ваш логин:</b> $userEmail<br>
        <b>Ваш пароль:</b> $userPass<br><br>
        <p>Для входа в личный кабинет перейдите по ссылке: <a href='https://numerologist.pro/login/'>https://numerologist.pro/login/</a></p>";

        require dirname(__FILE__) . '/phpmailer/send.php';
    }



    //Если пришел запрос на восстановление пароля
    if($statusAction == "recoveryPass"){
        //Получение id
        $query = "SELECT `id` FROM `num_logins` WHERE `login` = '$userLogin'";
        $checkId = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["id"];

        //Получение соли
        $userSalt = substr($userPass,0,6) . 'numerologist' . (string)$checkId . $userPass;

        //Получение хэша
        $passHash = password_hash($userSalt,PASSWORD_DEFAULT);

        //Обновление пароля
        $query = "UPDATE `num_logins` SET `password` = '$passHash' WHERE `login` = '$userLogin'";
        $connect->query($query);

        //Получение имени
        $query = "SELECT `name` FROM `num_logins` WHERE `login` = '$userLogin'";
        $userName = $connect->query($query)->fetch(PDO::FETCH_ASSOC)["name"];

        // Формирование самого письма
        $title = "Восстановление пароля Нумеролог PRO";
        $body = "
        <h2>$userName, добрый день!</h2>
        <p>Нами был принят запрос на восстановление пароля.</p>
        <br>
        <b>Ваш новый пароль:</b> $userPass<br><br>
        <p>Для входа в личный кабинет перейдите по ссылке: <a href='https://numerologist.pro/login/'>https://numerologist.pro/login/</a></p>";

        $userEmail = $userLogin;
        
        require dirname(__FILE__) . '/phpmailer/send.php';

        $result = "success";
        echo json_encode(['result' => $result]);
    }


    
    //Если пришел запрос на смену пакета
    if($statusAction == "changeRate"){
        if($userEmail && $userRate){
            //Получение даты
            $timePurchase = date('Y-m-d');
                
            $checkRequestRate = $connect->prepare("UPDATE `num_logins` SET `rate` = ?, `time_purchase` = ? WHERE `login` = ?");
            $checkRequestRate->execute([$userRate,$timePurchase,$userEmail]);
        }
    }
?>