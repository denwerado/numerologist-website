<?php
    //#####Скрипт проверки аунтефикации#####

    //Получение логина и пароля с экранированием спец символов
    $userLogin = (string) $_COOKIE['login'];
    $userPassword = addslashes((string) $_COOKIE['password']);

    if($userLogin && $userPassword){
        //Поиск id
        $authRequestId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
        $authRequestId->execute([$userLogin]);
        $checkId = ($authRequestId->fetchAll())[0]["id"];

        if($checkId){
            //Поиск логина и пароля
            $authRequest = $connect->prepare("SELECT `login`,`password` FROM `num_logins` WHERE `login` = ?");
            $authRequest->execute([$userLogin]);
            $checkAuth = $authRequest->fetchAll();

            $checkLogin = $checkAuth[0]["login"];
            $checkPassword = $checkAuth[0]["password"];

            if(!hash_equals($userPassword,$checkPassword)){
                setcookie('login','', time() - 3600,'/');
                setcookie('password','', time() - 3600,'/');

                header('Location: /login/');
            }
        }else{
            setcookie('login','', time() - 3600,'/');
            setcookie('password','', time() - 3600,'/');

            header('Location: /login/');
        }
    }else{
        setcookie('login','', time() - 3600,'/');
        setcookie('password','', time() - 3600,'/');

        header('Location: /login/');
    }

    //#####-----#####
?>