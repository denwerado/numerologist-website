<?php
    //#####Скрипт восстановления пароля#####
    require dirname(__FILE__) . '/db_connect.php';

    $userLogin = (string)$_POST["login"];

    if($userLogin){
        $authRequestId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
        $authRequestId->execute([$userLogin]);
        $checkId = ($authRequestId->fetchAll())[0]["id"];

        //Если такой аккаунт существует
        if($checkId){
            //Статус действия
            $statusAction = "recoveryPass";

            //Смена пароля и отправка на почту
            require dirname(__FILE__) . '/create_account.php';
            
        }else{
            $result = "erorr";
            echo json_encode(['result' => $result]);
        }
    }else{
        $result = "erorr";
        echo json_encode(['result' => $result]);
    }

    //#####-----#####
?>