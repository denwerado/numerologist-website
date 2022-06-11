<?php
    //Соединение с бд
    require dirname(__FILE__) . '/includes/db_connect.php';

    //Подключение проверки аунтефикации пользователя
    require dirname(__FILE__) . '/includes/check_auth.php';

    get_header();

    //Поиск логина
    $userLogin = (string)$_COOKIE['login'];

    //Запрос инфо об аккаунте
    $requestUserInfo = $connect->prepare("SELECT `name`,`rate`,`time_purchase` FROM `num_logins` WHERE `login` = ?");
    $requestUserInfo->execute([$userLogin]);
    $requestUserInfoData = ($requestUserInfo->fetchAll())[0];

    //Имя пользователя
    $userName = $requestUserInfoData["name"];
    //Пакет пользователя
    $userRate = $requestUserInfoData["rate"];
    //Время покупки
    $timePurchase =  date('d-m-Y',strtotime($requestUserInfoData["time_purchase"]));


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

    

    //Подключение иконок
	echo '<div style="display:none;">' . file_get_contents(get_template_directory_uri(  ) . '/assets/images/_svg.svg') . '</div>';

    $rateNames = [
        "free" => "Бесплатный",
        "basic" => "Базовый",
        "premium" => "Премиум",
        "pro" => "Профи",
        "admin" => "Административный"
    ];

    
    //Переменные для блокировки полей
    $inputReadonlyData = "";
    $inputRadioData = "";
    
?>
    <section class="account">
        <div class="container">
            <div class="account__block">
                <h1 class="account__title">
                    <?php echo $userName;?>,
                </h1>
                <p class="account__info">
                    поздравляем Вас с приобретением тарифа «<?php echo $rateNames["$userRate"];?>» программы Нумерология.PRO 
                </p>
                <p class="account__term">
                    Срок действия Вашего тарифа до <?php echo $validityPeriod;?>.
                </p>
                <p class="section__description account__description">
                В течение этого времени Вы можете производить<br>неограниченное количество расчетов.
                </p>
                <div class="account__line"></div>
                <p class="section__description account__description">
                    Введите свои данные для получения расчета 
                </p>

                <?php 
                    //Если окончился период действия тарифа
                    if(!$checkValidityPeriod){
                        $inputReadonlyData = "readonly";
                        $inputRadioData = "disabled";
                        $accountDataClass = "account__data_disable";
                    }
                ?>
                <div class="account__data <?php echo $accountDataClass?>">
                    <div class="cmp-forms__wrap">
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Фамилия<sup>*</sup>
                            </p> 
                            <input type='text' class='input cmp-forms__input russian-input' name="surname" placeholder="Иванова" <?php echo $inputReadonlyData;?>>     
                        </div>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Имя<sup>*</sup>
                            </p> 
                            <input type='text' class='input cmp-forms__input russian-input' name="name" placeholder="Ольга" <?php echo $inputReadonlyData;?>>     
                        </div>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Отчество<sup>*</sup>
                            </p> 
                            <input type='text' class='input cmp-forms__input russian-input' name="patronymic" placeholder="Ивановна" <?php echo $inputReadonlyData;?>>     
                        </div>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Дата рождения<sup>*</sup>
                            </p> 
                            <input type='text' class='input cmp-forms__input input-date' name="dateBirth" placeholder="день.месяц.год" <?php echo $inputReadonlyData;?>>     
                        </div>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Время рождения
                            </p> 
                            <input type='text' class='input cmp-forms__input input-time' name="timeBirth" placeholder="00:00" <?php echo $inputReadonlyData;?>>     
                        </div>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Пол<sup>*</sup>
                            </p> 
                            <div class="cmp-forms__radio">
                                <input type="radio" id="radio1" name="gender" value="women" <?php echo $inputRadioData;?>>
                                <label for="radio1">
                                    <svg class="check"><use xlink:href="#check"></use></svg>
                                    <span>Женщина</span>
                                </label>
                                <input type="radio" id="radio2" name="gender" value="men" <?php echo $inputRadioData;?>>
                                <label for="radio2"> 
                                    <svg class="check"><use xlink:href="#check"></use></svg>
                                    <span>Мужчина</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div> 
                    

                <?php 
                    if($userRate != "premium" && $userRate != "pro" && $userRate != "admin" || !$checkValidityPeriod){
                        $inputReadonlyPremium = "readonly";
                        $accountPremiumClass = "account__premium_disable";
                    }
                ?>
                <div class="account__premium <?php echo $accountPremiumClass;?>">
                    <div class="account__premium-wrap">
                        <p class="section__description account__description">
                            Введите свои данные своего партнера
                        </p> 

                        <?php if($userRate != "premium" && $userRate != "pro" && $userRate != "admin"){ ?>
                            <div class="cmp-latch">
                                <div class="cmp-latch__popup">
                                    <div class="wrap">
                                        <p class="description">
                                            Расчет на совместимость доступен только на тарифе «Премиум» и «Профи» 
                                        </p>
                                        <button class="cmp-button cmp-button_pastel" data-modal="#change-premium">Купить тариф «Премиум»</button>
                                        <button class="cmp-button cmp-button_pastel" data-modal="#change-pro">Купить тариф «Профи»</button>
                                        <a href="#" class="link">Информация о тарифах</a>
                                    </div>
                                </div>
                                <svg class="latch"><use xlink:href="#latch"></use></svg>
                            </div>
                        <?php } ?>

                    </div>
                    
                    <div class="cmp-forms__item">
                        <p class="cmp-forms__name">
                            Дата рождения<sup>*</sup>
                        </p> 
                        <input type='text' class='input cmp-forms__input input-date' name="dateBirthPartner" placeholder="день.месяц.год" <?php echo $inputReadonlyPremium;?>>     
                    </div>
                </div>

                <div class="account__buttons">
                    <?php if($checkValidityPeriod){ ?>
                        <button class="button cmp-button cmp-button_pastel" id="account-calc">
                            Рассчитать
                        </button>
                    <?php }else{ ?>
                        <button class="button cmp-button cmp-button_pastel" data-modal="#message">
                            Рассчитать
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/backgrounds/account_background2.jpg" alt="" class="account__background">
    </section>


    <?php 
        //Вывод сообщения об окончании тарифа
        if(!$checkValidityPeriod){
    ?>
        <div class="cmp-modal cmp-modal__small cmp-modal_active" id="message">
            <div class="cmp-modal__block">
                <div class="cmp-modal__close">
                    <span>Закрыть</span>
                    <svg class="cross"><use xlink:href="#cross"></use></svg>
                </div>
                <div class="cmp-modal__scroll">
                    <p class="cmp-modal__title">Тариф закончился</p>
                    <p class="cmp-modal__description">К сожалению, Ваш тариф закончился <?php echo $validityPeriod;?>.</p>
                    <p class="cmp-modal__description">Что бы продолжить пользоваться сервисом перейдите к покупке нового тарифа.</p>
                    <button class="button cmp-button cmp-button_pastel" data-modal="#change-<?php echo $userRate;?>">
                        <span>Продлить тариф</span>
                    </button>
                    <p class="cmp-modal__description" data-modal="#change-rates">Выбрать другой тариф</p>
                </div>   
            </div>
        </div>
    <?php } ?>


    <div class="cmp-modal cmp-modal__small" id="changing_pass">
        <div class="cmp-modal__block">
            <div class="cmp-modal__close">
                <span>Закрыть</span>
                <svg class="cross"><use xlink:href="#cross"></use></svg>
            </div>
            <div class="cmp-modal__scroll">
                <p class="cmp-modal__title">Изменение пароля</p>
                <div class="form">
                    <form>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Введите Ваш старый пароль
                            </p> 
                            <input type='password' class='input cmp-forms__input' name="oldpass" placeholder="**********" autocomplete="on" required>     
                        </div>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Введите Ваш новый пароль
                            </p> 
                            <input type='password' class='input cmp-forms__input' name="newpass" placeholder="**********" autocomplete="on" required>     
                        </div>
                        <div class="cmp-forms__error">
                        </div>
                        <button class="button cmp-button cmp-button_pastel">
                            <svg class="left_svg"><use xlink:href="#arrows"></use></svg>
                            <span>Заменить пароль</span>
                        </button>
                    </form>
                </div>
            </div>
        </div> 
    </div>

<?php
    //Подключение виджетов оплаты
    require dirname(__FILE__) . '/includes/templates/change_modal_temp.php';
    get_footer();
?>