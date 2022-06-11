<?php
    //#####Шаблон для окон смены тарифа#####

    //Уровни пакетов
    $rateLevels = [
        "free" => 0,
        "basic" => 1,
        "premium" => 2,
        "pro" => 3,
        "admin" => 4
    ];

    //Базовый
    if(!$checkValidityPeriod || ($rateLevels[$userRate] < $rateLevels["basic"])){
?>
    <div class="cmp-modal cmp-modal__small" id="change-basic">
        <div class="cmp-modal__block">
            <div class="cmp-modal__close">
                <span>Закрыть</span>
                <svg class="cross"><use xlink:href="#cross"></use></svg>
            </div>
            <div class="cmp-modal__scroll">
                <p class="cmp-modal__title">Сообщение об оплате тарифа <span>Базовый</span></p>
                <!--<p class="cmp-modal__description">Стоимость пакета: <span>3 900</span>руб.</p>-->
                <div id="payment-form-basic" data-typepay="change" data-rate="basic"></div>
            </div>
        </div>
    </div>
<?php }

    //Премиум
    if(!$checkValidityPeriod || ($rateLevels[$userRate] < $rateLevels["premium"])){
?>

    <div class="cmp-modal cmp-modal__small" id="change-premium">
        <div class="cmp-modal__block">
            <div class="cmp-modal__close">
                <span>Закрыть</span>
                <svg class="cross"><use xlink:href="#cross"></use></svg>
            </div>
            <div class="cmp-modal__scroll">
                <p class="cmp-modal__title">Сообщение об оплате тарифа <span>Премиум</span></p>
                <!--<p class="cmp-modal__description">Стоимость пакета: <span>7 900</span>руб.</p>-->
                <div id="payment-form-premium" data-typepay="change" data-rate="premium"></div>
            </div>
        </div>
    </div>
<?php }

    //Про
    if(!$checkValidityPeriod || ($rateLevels[$userRate] < $rateLevels["pro"])){
?>
    <div class="cmp-modal cmp-modal__small" id="change-pro">
        <div class="cmp-modal__block">
            <div class="cmp-modal__close">
                <span>Закрыть</span>
                <svg class="cross"><use xlink:href="#cross"></use></svg>
            </div>
            <div class="cmp-modal__scroll">
                <p class="cmp-modal__title">Сообщение об оплате тарифа <span>Профи</span></p>
                <!--<p class="cmp-modal__description">Стоимость пакета: <span>10 900</span>руб.</p>-->
                <div id="payment-form-pro" data-typepay="change" data-rate="pro"></div>
            </div>
        </div>
    </div>
<?php } ?>

    <div class="cmp-modal" id="change-rates">
        <div class="cmp-modal__block">
            <div class="cmp-modal__close">
                <span>Закрыть</span>
                <svg class="cross"><use xlink:href="#cross"></use></svg>
            </div>
            <div class="cmp-modal__scroll">
                <p class="cmp-modal__title">Смена тарифа</p>

                <?php 
                    //Базовый
                    if(!$checkValidityPeriod || ($rateLevels[$userRate] <= $rateLevels["basic"])){ 
                ?>
                    <div class="cmp-modal__rate">
                        <span class="plans">Базовый</span>
                        <p class="time">1 месяц</p>
                        <p class="list-name">Вы получите:</p>
                        <ul class="ul functional">
                            <li>Число полного Имени</li>
                            <li>Карма месяца рождения</li>
                            <li>Числовой код даты рождения</li>
                            <li>Родовая программа по году рождения</li>
                            <li>Число дня рождения</li>
                            <li>Психоматрица личности</li>
                            <li>Карма числа дня рождения</li>
                            <li>Предназначение</li>
                            <li>Месяц рождения</li>
                        </ul>
                        <p class="price">Стоимость тарифа: 3 900 руб.</p>

                        <?php if($checkValidityPeriod && $rateLevels[$userRate] == $rateLevels["basic"]){ ?>
                            <button class="button cmp-button cmp-button_black-reverse">Действующий</button>
                        <?php }else{ ?>
                            <button class="button cmp-button cmp-button_black-reverse" data-modal="#change-basic">Купить</button>
                        <?php }?>

                    </div>

                <?php } 
                    //Премиум
                    if(!$checkValidityPeriod || ($rateLevels[$userRate] <= $rateLevels["premium"])){
                ?>
                    <div class="cmp-modal__rate cmp-modal__rate_pastel">
                        <span class="plans">Премиум</span>
                        <p class="time">90 дней</p>
                        <p class="list-name">Вы получите:</p>
                        <ul class="ul functional">
                            <li>Число полного Имени</li>
                            <li>Карма месяца рождения</li>
                            <li>Числовой код даты рождения</li>
                            <li>Родовая программа по году рождения</li>
                            <li>Число дня рождения</li>
                            <li>Психоматрица личности</li>
                            <li>Карма числа дня рождения</li>
                            <li>Предназначение</li>
                            <li>Месяц рождения</li>
                        </ul>

                        <div class="line"></div>

                        <ul class="ul functional functional__block">
                            <li>Время Вашего рождения</li>
                            <li>Нумерологические коды по психоматрице</li>
                            <li>Деньги по психоматрице</li>
                            <li>Числа богатства и числа бедности</li>
                            <li>Здоровье по психоматрице</li>
                            <li>Совместимость</li>
                        </ul>
                        <p class="price">Стоимость тарифа: 7 900 руб.</p>

                        <?php if($checkValidityPeriod && $rateLevels[$userRate] == $rateLevels["premium"]){ ?>
                            <button class="button cmp-button cmp-button_pastel">Действующий</button>
                        <?php }else{ ?>
                            <button class="button cmp-button cmp-button_pastel" data-modal="#change-premium">Купить</button>
                        <?php }?>
                    </div>

                <?php } 
                    //Про
                    if(!$checkValidityPeriod || ($rateLevels[$userRate] <= $rateLevels["pro"])){
                ?>
                    <div class="cmp-modal__rate">
                        <span class="plans">Профи</span>
                        <p class="time">1 год</p>
                        <p class="list-name">Вы получите:</p>
                        <ul class="ul functional">
                            <li>Число полного Имени</li>
                            <li>Карма месяца рождения</li>
                            <li>Числовой код даты рождения</li>
                            <li>Родовая программа по году рождения</li>
                            <li>Число дня рождения</li>
                            <li>Психоматрица личности</li>
                            <li>Карма числа дня рождения</li>
                            <li>Предназначение</li>
                            <li>Месяц рождения</li>
                        </ul>

                        <div class="line"></div>

                        <ul class="ul functional functional__block">
                            <li>Время Вашего рождения</li>
                            <li>Нумерологические коды по психоматрице</li>
                            <li>Деньги по психоматрице</li>
                            <li>Числа богатства и числа бедности</li>
                            <li>Здоровье по психоматрице</li>
                            <li>Совместимость</li>
                        </ul>

                        <p class="price">Стоимость тарифа: 10 900 руб.</p>
                        <?php if($checkValidityPeriod && $rateLevels[$userRate] == $rateLevels["pro"]){ ?>
                            <button class="button cmp-button cmp-button_black-reverse">Действующий</button>
                        <?php }else{ ?>
                            <button class="button cmp-button cmp-button_black-reverse" data-modal="#change-pro">Купить</button>
                        <?php }?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php
    ///#####-----#####
?>