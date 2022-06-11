<?php
    //#####Скрипт аунтефикации#####
    $json = json_decode(file_get_contents('php://input'),true);

    require './db_connect.php';


    //Получение логина и пароля с экранированием спец символов
    $userLogin = (string)$_POST["login"];
    $userPassword = addslashes((string)$_POST["password"]);

    //Запрос на выход
    $exit = $json["exit"];

    //*Если пришел запрос на вход
    if($userLogin && $userPassword){
        //Поиск id для соли
        $authRequestId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
        $authRequestId->execute([$userLogin]);
        $checkId = ($authRequestId->fetchAll())[0]["id"];

        if($checkId){ 
            //Соль
            $userSalt = substr($userPassword,0,6) . 'numerologist' . (string)$checkId . $userPassword;

            //Поиск логина и пароля
            $authRequest = $connect->prepare("SELECT `login`,`password` FROM `num_logins` WHERE `login` = ?");
            $authRequest->execute([$userLogin]);
            $checkAuth = $authRequest->fetchAll();

            $checkLogin = $checkAuth[0]["login"];
            $checkPassword = $checkAuth[0]["password"];

            //echo password_hash($userSalt,PASSWORD_DEFAULT);
            if(password_verify($userSalt,$checkPassword)){
                $result = 'success';

                setcookie('login',$checkLogin, time() + 60*60*24*30, '/');
                setcookie('password',$checkPassword, time() + 60*60*24*30, '/');
            }else{
                $result = 'erorr';
            }
        }else{
            $result = 'erorr';
        }
    }else{
        $result = 'erorr';
    }


    //*Если пришел запрос на выход
    if($exit){
        setcookie('login','', time() - 3600,'/');
        setcookie('password','', time() - 3600,'/');

        $result = 'exit';
    }

    echo json_encode(['result' => $result]);
    //#####-----#####
?>