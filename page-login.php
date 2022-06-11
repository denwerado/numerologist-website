<?php
    require dirname(__FILE__) . '/includes/db_connect.php';

    //Получение логина и пароля с экранированием спец символов
    $userLogin = addslashes((string) $_COOKIE['login']);
    $userPassword = addslashes((string) $_COOKIE['password']);
 

    //#####Проверка куки#####
    if($userLogin && $userPassword){
        //Поиск id
        $authRequestId = $connect->prepare("SELECT `id` FROM `num_logins` WHERE `login` = ?");
        $authRequestId->execute([$userLogin]);
        $checkId = ($authRequestId->fetchAll())[0]["id"];
        
        if($checkId){
            //Соль
            //$userSalt = substr($userPassword,0,6) . 'numerologist' . (string)$checkId . $userPassword;

            //Поиск логина и пароля
            $authRequest = $connect->prepare("SELECT `login`,`password` FROM `num_logins` WHERE `login` = ?");
            $authRequest->execute([$userLogin]);
            $checkAuth = $authRequest->fetchAll();

            $checkLogin = $checkAuth[0]["login"];
            $checkPassword = $checkAuth[0]["password"];

            if(hash_equals($userPassword,$checkPassword)){
                header('Location: /account/');
            }else{
                setcookie('login','', time() - 3600,'/');
                setcookie('password','', time() - 3600,'/');
            }
        }
    }
    //#####-----#####


    get_header();

    //Подключение иконок
	echo '<div style="display:none;">' . file_get_contents(get_template_directory_uri(  ) . '/assets/images/_svg.svg') . '</div>';
?>

    <section class="login">
        <div class="login__block">
            <h1 class="section-title login__title">Введите логин<br>и пароль</h1>
            <div class="login__form">
                <form>
                    <div class="cmp-forms__item">
                        <p class="cmp-forms__name">Введите вашу почту/Логин <sup>*</sup></p>
                        <input type="text" class="input cmp-forms__input" name="login" placeholder="Введите логин" required>
                    </div>
                    <div class="cmp-forms__item">
                        <p class="cmp-forms__name">Пароль <sup>*</sup></p>
                        <input type="password" class="input cmp-forms__input" name="password" placeholder="Введите пароль" autocomplete="on" required>
                    </div>
                    <div class="cmp-forms__error">
                    </div>
                    <button class="button cmp-button cmp-button_pastel">
                        <svg class="left_svg"><use xlink:href="#door"></use></svg>
                        <span>Войти в личный кабинет</span>
                    </button>
                </form>
            </div>
            <div class="links">
                <a class="link " href="/#subscription">Перейти к покупке тарифа</a>
                <button class="button" data-modal="#recovery_pass">Забыли пароль?</и>     
            </div>
        </div>

        <a class="link cmp-company" href="http://dy-design.com" target="_blank">
            <p>Сервис разработан в</p>
            <div class="flex-center dy-logo">
                <div class="daring"></div>
                <div class="ampers"></div>
                <div class="young"></div>
            </div>
        </a>
    </section> 

    
    <div class="cmp-modal cmp-modal__small" id="recovery_pass">
        <div class="cmp-modal__block">
            <div class="cmp-modal__close">
                <span>Закрыть</span>
                <svg class="cross"><use xlink:href="#cross"></use></svg>
            </div>
            <div class="cmp-modal__scroll">
                <p class="cmp-modal__title">Восстановление пароля</p>
                <div class="cmp-modal__recovery">
                    <p class="cmp-modal__description">Введите почту для проверки вашего аккаунта.</p>
                    <p class="cmp-modal__description">Если аккаунт с такой почтой существет, мы пришлем новый сгенерированный пароль на вашу почту</p>
                    <form>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">Введите вашу почту<sup>*</sup></p>
                            <input type="email" class="input cmp-forms__input" name="login" placeholder="Введите логин" required>
                        </div>
                        <div class="cmp-forms__error"></div>
                        <div class="cmp-forms__success"></div>
                        <button class="button cmp-button cmp-button_pastel">
                            <span>Отправить запрос</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    get_footer();
?>