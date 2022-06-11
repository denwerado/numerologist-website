<?php
    //#####Скрипт смены пароля#####
    require './db_connect.php';

    //Получение логина и пароля с экранированием спец символов
    $userLogin = (string)$_COOKIE['login'];
    $userOldPassword = addslashes((string)$_POST["oldpass"]);
    $userNewPassword = addslashes((string)$_POST["newpass"]);

    //Если куки существует
    if($userLogin){
        //Если введены оба поля
        if($userOldPassword && $userNewPassword){
            //Поиск id для соли
            $authRequestId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
            $authRequestId->execute([$userLogin]);
            $checkId = ($authRequestId->fetchAll())[0]["id"];

            //Если такой логин найден
            if($checkId){
                //Соль
                $userSalt = substr($userOldPassword,0,6) . 'numerologist' . (string)$checkId . $userOldPassword;

                //Поиск логина и пароля
                $authRequest = $connect->prepare("SELECT `login`,`password` FROM `num_logins` WHERE `login` = ?");
                $authRequest->execute([$userLogin]);
                $checkAuth = $authRequest->fetchAll();

                $checkLogin = $checkAuth[0]["login"];
                $checkPassword = $checkAuth[0]["password"];

                if(password_verify($userSalt,$checkPassword)){
                    $authChangePass = $connect->prepare("UPDATE `num_logins` SET `password` = ? WHERE `login` = ?;");

                    $userNewSalt = substr($userNewPassword,0,6) . 'numerologist' . (string)$checkId . $userNewPassword;
                    $userNewHash = password_hash($userNewSalt,PASSWORD_DEFAULT);

                    $authChangePass->execute([$userNewHash,$userLogin]);

                    setcookie('password',$userNewHash, time() + 60*60*24*30, '/');

                    $result = 'success';
                }else{
                    //Ошибка
                    $result = 'erorr';
                }
            }else{
                //Если в сессии неправильный логин (хз, думаю могут перезаписать логин)
                setcookie('login','', time() - 3600,'/');
                setcookie('password','', time() - 3600,'/');

                $result = "exit";
            }
        }else{
            //Введены не все данные
            $result = "incomplete";
        }
    }else{
        setcookie('login','', time() - 3600,'/');
        setcookie('password','', time() - 3600,'/');

        //Если нет логина в куки
        $result = "exit";
    }

    echo json_encode(['result' => $result]);
    //#####-----#####
?>