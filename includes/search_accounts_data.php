<?php
    //#####Поиск данных для страницы результата#####
    $userLogin = (string)$_COOKIE['login'];

    //Поиск id пользователя
    $requestUserId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
    $requestUserId->execute([$userLogin]);
    $userLoginId = (int) ($requestUserId->fetchAll())[0]["id"];


    //Запрос инфо об аккаунте
    $requestUserInfo = $connect->prepare("SELECT `rate`,`time_purchase` FROM `num_logins` WHERE `login` = ?");
    $requestUserInfo->execute([$userLogin]);
    $requestUserInfoData = ($requestUserInfo->fetchAll())[0];

    //Пакет пользователя
    $userRate = $requestUserInfoData["rate"];
    //Время покупки
    $timePurchase = date('d-m-Y',strtotime($requestUserInfoData["time_purchase"]));


    //Вемя действия пакета
    $requestInfoRate = $connect->prepare("SELECT `time_action` FROM `num_rates` WHERE `title` = ?");
    $requestInfoRate->execute([$userRate]);
    $requestInfoRateData = ($requestInfoRate->fetchAll())[0];

    $timeAction = date('d-m-Y',strtotime($requestInfoRateData["time_action"]));


    //Период действия пакета
    $validityPeriod = date('d.m.Y',strtotime($timePurchase)  + strtotime($timeAction));

    //Текущая дата
    $currentDate = date('d.m.Y');

    
    //Проверка на время действия тарифа
    $checkValidityPeriod;
    if(strtotime($currentDate) <= strtotime($validityPeriod)){
        $checkValidityPeriod = true;
    }else{
        $checkValidityPeriod = false;
    }


    //Поиск ФИО 
    $requestGetAccountDetails = $connect->prepare("SELECT `name`,`surname`,`patronymic`,`dateBirth`,`timeBirth`,`gender`,`dateBirthPartner` FROM `num_account_details` WHERE `loginsId` = ?");
    $requestGetAccountDetails->execute([$userLoginId]);
    $requestGetAccountDetailsData = ($requestGetAccountDetails->fetchAll())[0];

    $userName = $requestGetAccountDetailsData["name"];
    $userSurname = $requestGetAccountDetailsData["surname"]; 
    $userPatronymic = $requestGetAccountDetailsData["patronymic"];
    $dateBirth = $requestGetAccountDetailsData["dateBirth"];
    $dateBirthPartner = $requestGetAccountDetailsData["dateBirthPartner"];
    $timeBirth = $requestGetAccountDetailsData["timeBirth"];
    $gender = $requestGetAccountDetailsData["gender"];
    //#####-----#####
?>