<?php
    //session_start();

    //ini_set('session.gc.maxlifetime', 3600);

    //#####Скрипт формирования аккаунта и отправки данных на почту#####
    $json = json_decode(file_get_contents('php://input'),true);

    // Переменные, которые отправляет пользователь
    $userName = $json['name'];
    $userEmail = $json['email'];
    $userRate = $json["rate"];

    //Статус действия
    $statusAction = "createNewAccount";

    if($userEmail && $userRate){
        //if($userEmail == $_SESSION['payemail'] && $userRate == $_SESSION["payrate"]){
            // Файл для генерации пароля и создания доступа в аккаунт
            require dirname(__FILE__) . '/create_account.php';
        //}else{
            echo json_encode(["result" => "unauthorized_access"]);
        //}
    }

    //unset($_SESSION['payemail']);
    //unset($_SESSION['payrate']); 
    //#####-----#####
?>