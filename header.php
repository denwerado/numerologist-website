<?php 
//Получение url сайта
$webSiteUri = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <link rel="shortcut icon" href="/favicon.png" type="image/png"> 

    <title>Нумерология Александры Амосовой</title>

    <script src="https://code-sb1.jivosite.com/widget/Sywd71rSQx" async></script>


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(87537892, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
    });
    </script>
    <!-- /Yandex.Metrika counter -->
</head>
<body class="body">

    <div style="display:none;">
        <!-- Rating Mail.ru counter -->
        <script type="text/javascript">
            var _tmr = window._tmr || (window._tmr = []);
            _tmr.push({id: "3238428", type: "pageView", start: (new Date()).getTime(), pid: "USER_ID"});
            (function (d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
            ts.src = "https://top-fwz1.mail.ru/js/code.js";
            var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
            })(document, window, "topmailru-code");
        </script>

        <noscript>
            <div>
                <img src="https://top-fwz1.mail.ru/counter?id=3238428;js=na" style="border:0;position:absolute;left:-9999px;" alt="Top.Mail.Ru" />
            </div>
        </noscript>
        <!-- //Rating Mail.ru counter -->

        <script type="text/javascript">
            var _tmr = window._tmr || (window._tmr = []);
            _tmr.push({"type":"reachGoal","id":3238428,"goal":"87537892"});
        </script>

        <!-- Yandex.Metrika counter -->
        <noscript><div><img src="https://mc.yandex.ru/watch/87537892" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    </div>

    <div class="cmp-loader">
        <div class="cmp-loader__item"></div>
    </div>

    <header class="header"> 
        <div class="container">
            <div class="header__block">
                <div class="info">
                    <a href="/" class="link">
                        <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/logo.svg" alt="" class="header__logo">
                    </a>

                    <?php 
                        //Если главная стр
                        if(is_home()){ 
                    ?>
                        <ul class="ul header__menu">
                            <li class="item">
                                <a href="#psychomatrix" class="link cmp-link_active">Бесплатные расчеты</a>
                            </li>
                            <li class="item">
                                <a href="#about" class="link cmp-link_active">О программе</a>
                            </li>
                            <li class="item">
                                <a href="#vista" class="link cmp-link_active">Преимущества</a>
                            </li>
                            <li class="item">
                                <a href="#subscription" class="link cmp-link_active">Тарифы</a>
                            </li>
                            <li class="item">
                                <a href="#author" class="link cmp-link_active">Об Авторе</a>
                            </li>
                        </ul>
                    <? } ?>
                </div>

                <div class="buttons">
                    <?php
                        //Если главная стр
                        if(is_home()){ 
                    ?>
                        <a href="/login/" class="link cmp-button cmp-button_pastel-reverse header__account">
                            <span>Личный кабинет</span>
                            <svg class="right_svg"><use xlink:href="#user_avatar"></use></svg>
                        </a>
                    <?php } ?>


                    <?php
                        //Включение бургера
                        if(is_home() || $webSiteUri == '/account/result/'){?>
                        <div class="header__burger">
                            <div class="line"></div>
                        </div>
                    <? } ?>


                    <?php
                        //Если стр аккаунта
                        if($webSiteUri  == '/account/' || $webSiteUri == '/account/result/'){

                            //Если страница результата
                            if($webSiteUri == '/account/result/') {?>
                                <ul class="ul header__menu">
                                    <li class="item">
                                        <button class="button cmp-button cmp-button_pastel-reverse" id="print_calc">
                                            <svg class="left_svg"><use xlink:href="#print"></use></svg>
                                            <span>Распечатать расчет</span>  
                                        </button>  
                                    </li>
                                    <li class="item">
                                        <a href="/account/" class="link cmp-button cmp-button_pastel-reverse" id="another_calc">
                                            <svg class="left_svg"><use xlink:href="#arrows"></use></svg>
                                            <span>Расчитать другую дату</span> 
                                        </a>  
                                    </li>      
                                </ul>
                            <?php } ?>

                            <div class="account__settings">
                                <div class="popup">
                                    <div class="wrap">
                                        <button class="button" data-modal="#changing_pass">– Сменить пароль</button>
                                        <button class="button" data-modal="#change-rates">– Выбрать тариф</button>
                                        <button class="button" id="account_exit">– Выйти из аккаунта</button>
                                    </div>
                                </div>
                                <svg><use xlink:href="#scrollbar__gears"></use></svg>
                            </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div> 
    </header>