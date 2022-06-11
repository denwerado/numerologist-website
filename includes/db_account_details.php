<?php
    //#####Запись и изменение данных в бд для расчета#####
    $json = json_decode(file_get_contents('php://input'),true);

    require './db_connect.php';

    //Поиск id у пользователя
    $userLogin = (string)$_COOKIE['login'];
    $requestLoginId = $connect->prepare("SELECT id FROM `num_logins` WHERE `login` = ?");
    $requestLoginId->execute([$userLogin]);
    $userLoginId = ($requestLoginId->fetchAll())[0]["id"];

    $accountLoginsId = (int)$userLoginId;
    $accountName = (string)$json['name'];
    $accountSurname  = (string)$json['surname'];
    $accountPatronymic = (string)$json['patronymic'];
    $accountDateBirth = (string)$json['dateBirth'];
    $accountTimeBirth = (string)$json['timeBirth'];
    $accountGender = (string)$json['gender'];
    $accountDateBirthPartner = (string)$json['dateBirthPartner'];


    //Проверка существования такой записи
    $requestCheckExistencRecord = $connect->prepare("SELECT * FROM `num_account_details` WHERE `loginsId` = ?");
    $requestCheckExistencRecord->execute([$accountLoginsId]);
    $checkResult = ($requestCheckExistencRecord->fetchAll())[0];

    if($checkResult){
        $requestUpdateAccountDetais = $connect->prepare("UPDATE `num_account_details` SET `name`=?,`surname`=?,`patronymic`=?,`dateBirth`=?,`timeBirth`=?,`gender`=?,`dateBirthPartner`=? WHERE `loginsId`=?");
        $requestUpdateAccountDetais->execute([$accountName,$accountSurname,$accountPatronymic,$accountDateBirth,$accountTimeBirth,$accountGender,$accountDateBirthPartner,$accountLoginsId]);

        $result = $requestUpdateAccountDetais;
    }else{
        $requestInsertAccountDetails = $connect->prepare("INSERT INTO `num_account_details` (`loginsId`,`name`,`surname`,`patronymic`,`dateBirth` ,`timeBirth`,`gender`,`dateBirthPartner`)
            VALUES (?,?,?,?,?,?,?,?)");

        $requestInsertAccountDetails->execute([$accountLoginsId,$accountName,$accountSurname,$accountPatronymic,$accountDateBirth,$accountTimeBirth,$accountGender,$accountDateBirthPartner]);

        $result = $requestInsertAccountDetails;
    }


    if ($result) {
        echo json_encode("success");
    } else {
        echo json_encode("error");
    }
    //#####-----#####
?>