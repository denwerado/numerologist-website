<?php
    //#####Подключение файла со скриптом соединения к бд
    require dirname(__FILE__) . '/includes/db_connect.php';

    //#####Подключение проверки аунтефикации пользователя
    require dirname(__FILE__) . '/includes/check_auth.php';

    //#####Подключение файла сбора данных для расчетов из бд
    require dirname(__FILE__) . '/includes/search_accounts_data.php';

    //Подключение wp
    get_header();
    
    //#####Подключение вычислений######
    require dirname(__FILE__) . '/includes/accounts_calc/calc_main.php';

    //SVG иконки
	echo '<div style="display:none;">' . file_get_contents(get_template_directory_uri(  ) . '/assets/images/_svg.svg') . '</div>';
?>

    <section class="result">
        <div class="container">
            <div class="result__block">
                <h1 class="section-title result__title"><?php echo $userSurname . ' ' . $userName . ' ' . $userPatronymic;?></h1>
                <div class="cmp-matrix">
                    <p class="cmp-matrix__date"><?php echo $dateBirth;?></p>

                    <?php 
                        //Вывод времени
                        if($timeBirth){ ?>
                            <div class="cmp-matrix__time">
                                <svg><use xlink:href="#hours"></use></svg>
                                <span><?php echo $timeBirth?></span>
                            </div>
                    <?php } ?>

                    <div class="cmp-matrix__wrap">
                        <?php 
                            //Вывод матрицы
                            $indexMatrix = 1;
                            for ($index=1; $index < 10; $index++) { ?>
                                <div class="cmp-matrix__item">
                                    <span>
                                        <?php //Вывод матрицы
                                            if($indexMatrix > 8 && $indexMatrix!=9){
                                                $indexMatrix = $indexMatrix % 8;
                                            }
                                            if ($matrix[$indexMatrix]){
                                                echo $matrix[$indexMatrix];
                                            }else{
                                                echo '-';
                                            }

                                            $indexMatrix += 3;
                                        ?>
                                    </span>
                                </div>
                        <?  } ?>
                    </div>
                    <p class="cmp-matrix__numbers"><?php echo $workingNumbers?></p>
                </div>   

                <p class="result__name">Полный нумерологический расчёт</p>
                
                <?php 
                    //#####Вывод информации по главам#####
                    $dataModalNumber = 0;
                    foreach($accordeonChapter as $accordeonChapterKey => $accordeonChapterValues){
                ?>
                        <div class="result__chapter">
                            <div class="result__chapter-title">
                                <?php 
                                    if($accordeonChapterValues["chapter-desc"]){
                                ?>
                                    <div class="cmp-hint">
                                        <div class="description">
                                            <div class="arrow"></div>
                                            <div class="wrap">
                                                <?php echo $accordeonChapterValues["chapter-desc"];?>
                                                <svg class="cross"><use xlink:href="#cross"></use></svg>
                                            </div>
                                        </div>
                                        <svg class="info"><use xlink:href="#info"></use></svg>
                                    </div>
                                <?php } ?>
                                <span><?php echo $accordeonChapterValues["chapter"];?></span>
                            </div>

                    <?php  
                        //#####Вывод аккордеонов######
                        foreach($accordeonChapterValues["accordeons"] as $accordeonsKey => $accordeonsObj){
                            $dataModalNumber++;

                            //Проверка класса
                            if(!$accordeonsObj["display"]){
                                $accordeonsClass = "cmp-accordeon cmp-accordeon_disable";
                            }else{
                                $accordeonsClass = "cmp-accordeon";
                            }
                    ?>
                            <div class="<?php echo $accordeonsClass;?>">
                                <div class="cmp-accordeon__title">
                                    <div class="buttons__left">
                                        <div class="cmp-hint">
                                            <div class="description">
                                                <div class="arrow"></div>
                                                <div class="wrap">
                                                    <?php echo $accordeonsObj["description"];?>
                                                    <svg class="cross"><use xlink:href="#cross"></use></svg>
                                                </div>
                                            </div>
                                            <svg class="info"><use xlink:href="#info"></use></svg>
                                        </div>

                                        <h4 class="title"><?php echo $accordeonsObj["title"];?></h4>
                                    </div>
                                
                                    <ul class="ul buttons__right">
                                        <?php 
                                            //Если у пользователя пакет "pro"
                                            if($userRate == "pro" || $userRate == "admin"){ 
                                        ?>
                                            <li class="item" data-modal="#modal-calc<?php echo $dataModalNumber;?>">
                                                <svg class="calculator"><use xlink:href="#calculator"></use></svg>
                                            </li>

                                        <?php }else{ ?>
                                            <li class="item">
                                                <div class="cmp-latch">
                                                    <div class="cmp-latch__popup">
                                                        <div class="wrap">
                                                            <p class="description">
                                                                Информация о вычислениях доступна на тарифе «Профи»
                                                            </p>
                                                            <button class="cmp-button cmp-button_pastel" data-modal="#change-pro">Купить тариф «Профи»</button>
                                                            <a href="#" class="link">Информация о тарифах</a>
                                                        </div>
                                                    </div>
                                                    <svg class="calculator"><use xlink:href="#calculator"></use></svg>
                                                </div>
                                            </li>
                                        <?php } ?>

                                        <?php if($accordeonsObj["display"] == "yes"){ ?>
                                            <li class="item">
                                                <div class="trigger"></div>
                                            </li>
                                        <?php }else{ ?>
                                            <li class="item">
                                                <div class="cmp-latch">
                                                    <div class="cmp-latch__popup">
                                                        <div class="wrap">
                                                            <p class="description">
                                                                Расчет доступен только на тарифе «Премиум» и «Профи» 
                                                            </p>
                                                            <button class="cmp-button cmp-button_pastel" data-modal="#change-premium">Купить тариф «Премиум»</button>
                                                            <button class="cmp-button cmp-button_pastel" data-modal="#change-pro">Купить тариф «Профи»</button>
                                                            <a href="#" class="link">Информация о тарифах</a>
                                                        </div>
                                                    </div>
                                                    <svg class="latch"><use xlink:href="#latch"></use></svg>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="cmp-accordeon__content">
                                    <?php 
                                        foreach ($accordeonsObj["info"] as $accordeonInfoKey => $accordeonInfo) { 
                                            //Вывод названия поля
                                            if($accordeonsObj["name"][$accordeonInfoKey]) { ?>
                                                <p class="name"><?php echo $accordeonsObj["name"][$accordeonInfoKey];?></p>
                                            <? } ?>     

                                            <div class="cmp-accordeon__content-block">
                                                <?php 
                                                    //Вывод основной информации
                                                    if($accordeonInfo["content"]){

                                                        //Если нет описания
                                                        if(!$accordeonInfo["description"]){
                                                            echo $accordeonInfo["content"];
                                                        }else{ 
                                                            ?>
                                                                <div class="cmp-hint">
                                                                    <div class="description">
                                                                        <div class="arrow"></div>
                                                                        <div class="wrap">
                                                                            <?php echo $accordeonInfo["description"];?>
                                                                            <svg class="cross"><use xlink:href="#cross"></use></svg>
                                                                        </div>
                                                                    </div>
                                                                    <svg class="info"><use xlink:href="#info"></use></svg>
                                                                </div>
                                                                <?php echo $accordeonInfo["content"];
                                                        }
                                                    }//Проверка на содержимое
                                                ?>
                                            </div>

                                        <?php }//Перебор сдержимого аккорденоа 
                                    ?>
                                </div>
                            </div>
                    <?php 
                        }//Окончсание вывода аккордеонов
                    ?>  
                    </div>
                <?php 
                    } //Окончание вывода глав
                ?>                         


                <?php //Вывод модальных окон c вычислениями
                    if($userRate == "pro" || $userRate == "admin"){
                        $dataModalNumber = 0;
                        foreach($accordeonChapter as $accordeonChapterKey => $accordeonChapterValues){
                            foreach($accordeonChapterValues["accordeons"] as $accordeonsKey => $accordeonsObj){
                                $dataModalNumber++;
                ?>
                                <div class="cmp-modal" id="modal-calc<?php echo $dataModalNumber;?>">
                                    <div class="cmp-modal__block">
                                        <div class="cmp-modal__close">
                                            <span>Закрыть</span>
                                            <svg class="cross"><use xlink:href="#cross"></use></svg>
                                        </div>
                                        <div class="cmp-modal__scroll cmp-modal__result-content">
                                            <?php echo $accordeonsObj["calc"]; ?>
                                        </div>
                                    </div>
                                </div>
                <?php    }
                        }
                    }
                ?>
            </div>
        </div> 
    </section>


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
    
    <div class="cmp-up">
        <svg><use xlink:href="#up_arrow"></use></svg>
    </div>

    <footer class="company">
        <div class="container">
            <div class="company__block">
                <a class="link cmp-company" href="http://dy-design.com" target="_blank">
                    <p>Сервис разработан в</p>
                    <div class="flex-center dy-logo">
                        <div class="daring"></div>
                        <div class="ampers"></div>
                        <div class="young"></div>
                    </div>
                </a>
            </div>
        </div>
    </footer>
<?php
    //Подключение виджетов оплаты
    require dirname(__FILE__) . '/includes/templates/change_modal_temp.php';
    get_footer();
?>