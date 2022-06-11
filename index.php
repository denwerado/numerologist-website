<?php
    get_header();

    //Подключение иконок
	echo '<div style="display:none;">' . file_get_contents(get_template_directory_uri(  ) . '/assets/images/_svg.svg') . '</div>';

?> 

<main class="main">
    <section class="top">
        <div class="container">
            <div class="top__block">
                <div class="info">
                    <h1 class="section-title top__title">Нумерология.<span>PRO</span></h1>
                    <div class="top__desctop">
                        <p class="section-description top__description">
                            Нумерология.PRO – это нумерологическая программа, которая
                            поможет Вам раскрыть Ваш внутренний потенциал, найти ответы на важные для Вас вопросы, поможет выстроить гармоничные отношения и разбогатеть. 
                        </p>
                        <p class="section-description top__description">
                            В программе Вы получите массу рекомендаций для того, 
                            чтобы прожить лучший сценарий своей жизни.
                        </p>
                        <div class="top__buttons">
                            <a href="#about" class="link cmp-button cmp-button_pastel"><span>Подробнее о программе</span></a>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="top__gradient">
            <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/backgrounds/top_background.png" class="top__background" alt="Фон страницы">
        </div>
        <div class="container">
            <div class="top__block">
                <div class="top__mobile">
                    <p class="section-description top__description">
                        Нумерология.PRO – это нумерологическая программа, которая
                        поможет Вам раскрыть Ваш внутренний потенциал, найти ответы на важные для Вас вопросы, поможет выстроить гармоничные отношения и разбогатеть. 
                    </p>
                    <p class="section-description top__description">
                        В программе Вы получите массу рекомендаций для того, 
                        чтобы прожить лучший сценарий своей жизни.
                    </p>
                    <div class="top__buttons">
                        <a href="#about" class="link cmp-button cmp-button_pastel"><span>Подробнее о программе</span></a>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- /.top -->

    <a name="psychomatrix"></a>
    <section class="psychomatrix">
        <div class="container">
            <div class="psychomatrix__block">
            <h2 class="section-title  psychomatrix__title">Бесплатные расчеты</h2>
            <div class="mobile"><p class="title">Рассчитай свою психоматрицу</p></div>
            <div class="psychomatrix__wrap">
                <!--<img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/backgrounds/psychomatrix.png" alt="" class="psychomatrix__background">-->
                <div class="cmp-matrix">
                    <p class="cmp-matrix__date"></p>
                    <div class="cmp-matrix__wrap">
                        <div class="cmp-matrix__item">
                            <span>111</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>-</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>77</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>2</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>5</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>88</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>33</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>-</span>
                        </div>
                        <div class="cmp-matrix__item">
                            <span>99</span>
                        </div>
                    </div>
                    <p class="cmp-matrix__numbers">35.8.29.11</p>
                </div>
                <div class="calc">
                    <div class="desctop"><p class="title">Рассчитай свою психоматрицу</p></div>
                    <div class="cmp-forms__item">
                        <p class="cmp-forms__name">
                            Дата рождения
                        </p> 
                        <input type='text' class='input cmp-forms__input input-date' name="dateBirth" placeholder="03.07.1987">     
                    </div>
                    <button class="button cmp-button cmp-button_pastel">Рассчитать</button>
                </div>
            </div>
                
            </div>
        </div>
    </section>
    <!-- ./psychomatrix -->

    <section class="compatibility">
        <div class="container">
            <div class="compatibility__block">
                <h2 class="section-title  compatibility__title">Бесплатный экспресс – расчет совместимости по дате рождения</h2>
                <p class="section-description compatibility__description">
                    Рассчитай свою совместимость с партнером
                </p>
                <div class="compatibility__limiter">
                    <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/backgrounds/compatibility.jpg" alt="" class="compatibility__background">
                </div>
                
                <div class="calc">
                    <div class="wrap">
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Дата рождения (женщина)
                            </p> 
                            <input type='text' class='input cmp-forms__input input-date' name="dateBirth" placeholder="03.07.1987">     
                        </div>
                        <div class="cmp-forms__item">
                            <p class="cmp-forms__name">
                                Дата рождения (мужчина)
                            </p> 
                            <input type='text' class='input cmp-forms__input input-date' name="dateBirth" placeholder="03.07.1987">     
                        </div>
                    </div>
                    <button class="button cmp-button cmp-button_pastel">Рассчитать</button>
                </div>
            </div>
        </div>
    </section>
    <!-- ./compatibility -->

   <a name="about"></a>
    <section class="about">
        <div class="container">
            <div class="about__block">
                <h2 class="section-title about__title">О программе</h2>
                <p class="section-description about__description">
                    Программа Нумерология.PRO — это уникальный продукт, основанный на многочисленных учениях и личном опыте автора.
                </p>
                <p class="section-description about__description">
                    Это полный нумерологический расчёт, который включает в себя 10 основных разделов и более 50 подразделов.
                </p>
                <div class="wrap">
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#num_psych"></use></svg>
                        </div>
                        <span class="cmp-item__info">Полный разбор Психоматрицы</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#candles"></use></svg>
                        </div>
                        <span class="cmp-item__info">Программа по дате рождения</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#numbers123"></use></svg>
                        </div>
                        <span class="cmp-item__info">Уникальные коды</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#calendar2"></use></svg>
                        </div>
                        <span class="cmp-item__info">Годовые циклы</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#shapes"></use></svg>
                        </div>
                        <span class="cmp-item__info">Нумерологические комбинации </span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#magic_wand2"></use></svg>
                        </div>
                        <span class="cmp-item__info">ФИО код возможностей</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#heart2"></use></svg>
                        </div>
                        <span class="cmp-item__info">Здоровье и склонность к заболеваниям</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#palm"></use></svg>
                        </div>
                        <span class="cmp-item__info">Предназначение, карма, судьба</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#money_dollar"></use></svg>
                        </div>
                        <span class="cmp-item__info">Денежный потенциал</span>
                    </div>
                    <div class="cmp-item">
                        <div class="cmp-item__mark">
                            <svg><use xlink:href="#puzzle"></use></svg>
                        </div>
                        <span class="cmp-item__info">Совместимость партнеров </span>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/backgrounds/about_numbers.png" alt="" class="about__background">
    </section>
    <!-- ./about -->

    <section class="preview">
        <div class="container">
            <h2 class="section-title preview__title">Программа Нумерология.PRO — это быстро, понятно, профессионально, всегда под рукой!</h2>
        </div>
        <div class="preview__limiter">
            <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/backgrounds/preview__background.jpg" alt="" class="preview__background">
        </div>
    </section>
    <!-- ./preview -->

    <section class="purpose">
        <div class="container">
            <div class="purpose__block">
                <h2 class="section-title purpose__title">Для кого предназначена программа?</h2>
                <div class="wrap">
                    <div class="col">
                        <p class="section-description purpose__description">
                            Программа Нумерология.PRO предназначена как для профессиональных и начинающих нумерологов, так и для тех, кто хочет разобраться в себе и помогать своим близким.
                        </p>
                        <p class="section-description purpose__description">
                            С помощью данной авторской программы Вы сможете мгновенно составлять полные нумерологические расчёты, проводить консультации и зарабатывать. 
                        </p>
                        <p class="section-description purpose__description">
                            Программа Нумерология.PRO станет Вашим помощником и навигатором в любых вопросах.
                        </p>
                    </div>
                    <div class="col">
                        <p class="section-description purpose__description">
                            С помощью программы Нумерология.PRO Вы сможете стать профессиональным нумерологом и разобраться в древней науке Нумерология. Программа Нумерология.PRO уникальна и заменяет обучение в престижных нумерологических школах.  
                        </p>
                        <p class="section-description purpose__description">
                            Стоимость программы Нумерология.PRO равна стоимости всего одной консультации опытного нумеролога, при этом Вы сможете производить расчёт неограниченное количество раз.
                        </p>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    <!-- ./purpose -->

    <a name="vista"></a>
    <section class="vista">
        <div class="container">
            <div class="vista__block">
                <h2 class="section-title vista__title">Преимущества программы<br>Нумерология.PRO</h2>
                <ul class="ul vista__list" id="owl1">
                    <li class="item">
                        <span class="description">Программа Нумерология.PRO достаточно проста в обращении и понятна, никакой профессиональной подготовки не требуется.</span>
                    </li>

                    <li class="item">
                        <span class="description">В программе Вы найдете рекомендации о том, как использовать свой потенциал по-максимуму, как стать богатым, успешным, здоровым, как правильно пройти свой путь, найти свою вторую половинку, выполнить своё предназначение.</span>
                        <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/vista/compass.svg" alt="" class="preview">
                    </li>

                    <li class="item">
                        <span class="description">Вы сможете проанализировать неограниченное количество дат рождения.</span>
                    </li>

                    <li class="item">
                        <span class="description">Вы мгновенно получите полный нумерологический расчет.</span>
                        <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/vista/lamp.svg" alt="" class="preview">
                    </li>

                    <li class="item">
                        <span class="description">У Вас будет возможность освоить полный курс нумерологии за достаточно короткое время.</span>
                    </li>

                    <li class="item">
                        <span class="description">Программа в любой момент даст Вам профессиональный совет и сэкономит Ваше время. Вы всегда сможете распечатать полученный расчёт, отправить его клиенту или сохранить его на своем устройстве.</span>
                    </li>

                    <li class="item">
                        <span class="description">Программа Нумерология.PRO поможет Вам разобраться с отношениями, узнать для чего Вы встретились с партнером, определит Вид Вашего партнерства, кто Вы друг для друга:  кармические любовники, кармические кредиторы или кармические учителя. Она поможет определить тип Вашего союза и способ взаимодействия в нем, поможет найти ключ к Вашему партнеру, чтобы выстроить долгие и крепкие отношения.</span>
                        <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/vista/hands_2.svg" alt="" class="preview">
                    </li>
                </ul>
                <div class="owl-dots" id="vista__dots">

                </div>
            </div>
        </div>
    </section>
    <!-- /.vista -->

    <a name="subscription"></a>
    <section class="subscription">
        <div class="container">
            <div class="subscription__block">
                <h2 class="section-title subscription__title">Тарифы программы<br>Нумерология.PRO</h2>
                <ul class="ul subscription__list">

                    <li class="item">
                        <div class="hint">
                            <div class="description">
                                <div class="arrow"></div>
                                <div class="wrap">
                                    <p class="title">Полный разбор Психоматрицы</p>
                                    <ul>
                                        <li>Характер и волевые качества</li>
                                        <li>Жизненная энергия </li>
                                        <li>Психотип</li>
                                        <li>Интерес и отношения с деньгами</li> 
                                        <li>Потенциал здоровья</li>
                                        <li>Любовный потенциал и логика</li>
                                        <li>Потенциал профессионализма и отношение к трудовой деятельности</li>
                                        <li>Потенциал удачливости</li>
                                        <li>Степень ответственности и подарки судьбы</li> 
                                        <li>Потенциал памяти и результативности</li>
                                        <li>Целеустремлённость</li>
                                        <li>Потенциал иметь семью, выйти замуж/жениться</li> 
                                        <li>Привычки и привязанности</li>
                                        <li>Самооценка</li>
                                        <li>Быт и денежный потенциал </li>
                                        <li>Таланты </li>
                                        <li>Духовность</li> 
                                        <li>Темперамент</li> 
                                    </ul>

                                    <p class="title">Нумерологические комбинации</p>
                                    <ul>
                                        <li>Комбинация «Однотонельные люди»</li>
                                        <li>Комбинация «Болт»</li>
                                        <li>Комбинация «Гайка»</li>
                                        <li>Комбинация «Висилица»</li>
                                        <li>Комбинация «Птица»</li>
                                        <li>Комбинация «Стакан</li>
                                        <li>Комбинация «Якорь»</li>
                                        <li>Комбинация «Лодка без вёсел»</li>
                                        <li>Комбинация «Идеальный человек»</li> 
                                        <li>Комбинация «Треугольник Альтруизма»</li>
                                        <li>Комбинация «Треугольник Эгоизма»</li>
                                        <li>Комбинация «Эгоцентризм»</li>
                                        <li>Комбинация «Ни себе ни людям»</li>
                                    </ul>

                                    <p class="title">Программа по дате рождения</p>
                                    <ul>
                                        <li>Числовой код даты рождения</li>
                                        <li>Число дня рождения</li>
                                        <li>Карма числа дня рождения</li>
                                        <li>Месяц рождения </li>
                                        <li>Карма месяца рождения</li>
                                        <li>Родовая программа по году рождения</li>
                                        <li>Нули в дате рождения</li>
                                        <li>Код поведения по дате рождения</li>
                                        <li>Время рождения</li>
                                    </ul>

                                    <p class="title">ФИО код возможностей</p>
                                    <ul>
                                        <li>Число полного Имени (ФИО)</li>
                                    </ul>

                                    <p class="title">Годовые циклы</p>
                                    <ul>
                                        <li>Годовой цикл</li>
                                    </ul>

                                    <p class="title">Предназначение/Карма/Судьба</p>
                                    <ul>
                                        <li>Число Души</li>
                                        <li>Число Судьбы </li>
                                        <li>Кармические задачи</li>
                                        <li>Предназначение</li>
                                    </ul>
                                </div>
                            </div>
                            <svg class="info"><use xlink:href="#info"></use></svg>
                        </div>

                        <div class="info">
                            <span class="plans">Базовый</span>
                            <p class="time">1 месяц</p>
                            <span class="description">Неограниченного доступа</span>

                            <div class="cmp-lg-modal cmp-lg-modal-block" id="basic-package">
                                <div class="cmp-lg-modal__block">
                                    <div class="cmp-lg-modal__scroll">
                                        <span class="plans cmp-lg-modal__visibility">Базовый</span>
                                        <p class="time cmp-lg-modal__visibility">1 месяц</p>
                                        <span class="description cmp-lg-modal__visibility">Неограниченного доступа</span>
                                        <p class="list-name">Вы получите:</p>
                                        <ul class="ul functional">
                                            <li>Полный разбор психоматрицы</li>
                                            <li>Нумерологические комбинации</li>
                                            <li>Программа по дате рождения</li>
                                            <li>ФИО код возможностей</li>
                                            <li>Годовые циклы</li>
                                            <li>Предназначение/Карма/Судьба </li>
                                        </ul>
                                        <div class="cmp-lg-modal__visibility buttons">
                                            <button class="button cmp-button cmp-button_pastel-reverse cmp-modal__close" >Скрыть</button>
                                            <button class="button cmp-button cmp-button_black-reverse cmp-modal__close" data-modal="#buy-basic">Купить</button>    
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="purchase">
                            <span class="price">Стоимость пакета: 3 900 руб.</span>
                            <div class="buttons">
                                <button class="button cmp-button cmp-button_pastel-reverse" data-modal="#basic-package">Подробнее</button>
                                <button class="button cmp-button cmp-button_black-reverse" data-modal="#buy-basic">Купить</button>    
                            </div>
                        </div>
                    </li>

                    <li class="item">
                        <div class="hint">
                            <div class="description">
                                <div class="arrow"></div>
                                <div class="wrap">
                                    <p class="title">Полный разбор Психоматрицы</p>
                                    <ul>
                                        <li>Характер и волевые качества</li>
                                        <li>Жизненная энергия </li>
                                        <li>Психотип</li>
                                        <li>Интерес и отношения с деньгами</li> 
                                        <li>Потенциал здоровья</li>
                                        <li>Любовный потенциал и логика</li>
                                        <li>Потенциал профессионализма и отношение к трудовой деятельности</li>
                                        <li>Потенциал удачливости</li>
                                        <li>Степень ответственности и подарки судьбы</li> 
                                        <li>Потенциал памяти и результативности</li>
                                        <li>Целеустремлённость</li>
                                        <li>Потенциал иметь семью, выйти замуж/жениться</li> 
                                        <li>Привычки и привязанности</li>
                                        <li>Самооценка</li>
                                        <li>Быт и денежный потенциал </li>
                                        <li>Таланты </li>
                                        <li>Духовность</li> 
                                        <li>Темперамент</li> 
                                    </ul>
                                    
                                    <p class="title">Уникальные нумерологические коды</p>
                                    <ul>
                                        <li>Код Миллионера</li>
                                        <li>Код Матери</li>
                                        <li>Код Отца</li>
                                        <li>Код Альфонса и Содержанки</li>
                                        <li>Код Риска</li>
                                    </ul>

                                    <p class="title">Нумерологические комбинации</p>
                                    <ul>
                                        <li>Комбинация «Однотонельные люди»</li>
                                        <li>Комбинация «Болт»</li>
                                        <li>Комбинация «Гайка»</li>
                                        <li>Комбинация «Висилица»</li>
                                        <li>Комбинация «Птица»</li>
                                        <li>Комбинация «Стакан</li>
                                        <li>Комбинация «Якорь»</li>
                                        <li>Комбинация «Лодка без вёсел»</li>
                                        <li>Комбинация «Идеальный человек»</li> 
                                        <li>Комбинация «Треугольник Альтруизма»</li>
                                        <li>Комбинация «Треугольник Эгоизма»</li>
                                        <li>Комбинация «Эгоцентризм»</li>
                                        <li>Комбинация «Ни себе ни людям»</li>
                                    </ul>

                                    <p class="title">Здоровье и склонность к заболеваниям</p>
                                    <ul>
                                        <li>Цифры - склонность к заболеваниям</li>
                                    </ul>
                                    
                                    <p class="title">Денежный потенциал</p>
                                    <ul>
                                        <li>Финансовая карма</li>
                                        <li>Шанс разбогатеть</li>
                                        <li>Числа богатства и числа бедности в дате рождения</li>
                                        <li>Личный код Богатства</li>
                                    </ul>
                                    
                                    <p class="title">Программа по дате рождения</p>
                                    <ul>
                                        <li>Числовой код даты рождения</li>
                                        <li>Число дня рождения</li>
                                        <li>Карма числа дня рождения</li>
                                        <li>Месяц рождения </li>
                                        <li>Карма месяца рождения</li>
                                        <li>Родовая программа по году рождения</li>
                                        <li>Нули в дате рождения</li>
                                        <li>Код поведения по дате рождения</li>
                                        <li>Время рождения</li>
                                    </ul>

                                    <p class="title">ФИО код возможностей</p>
                                    <ul>
                                        <li>Число полного Имени (ФИО)</li>
                                    </ul>

                                    <p class="title">Годовые циклы </p>
                                    <ul>
                                        <li>Годовой цикл</li>
                                    </ul>

                                    <p class="title">Предназначение/Карма/Судьба</p>
                                    <ul>
                                        <li>Число Души</li>
                                        <li>Число Судьбы </li>
                                        <li>Кармические задачи</li>
                                        <li>Предназначение</li>
                                    </ul>

                                    <p class="title">Совместимость партнеров</p>
                                    <ul>
                                        <li>Для чего партнеры встретились</li>
                                        <li>Совместимость по Числу Судьбы</li>
                                        <li>Кармические отношения (любовник, кредитор, учитель)</li>
                                        <li>Вид союза</li>
                                    </ul>
                                </div>
                            </div>
                            <svg class="info"><use xlink:href="#info"></use></svg>
                        </div>

                        <div class="info">
                            <p class="plans">
                                <span>Премиум</span>
                                <svg class="mark"><use xlink:href="#black_star"></use></svg>
                            </p>
                            <p class="time">90 дней</p>
                            <span class="description">Неограниченного доступа</span>

                            <div class="cmp-lg-modal" id="premium-package">
                                <div class="cmp-lg-modal__block">
                                    <div class="cmp-lg-modal__scroll">
                                        <p class="plans cmp-lg-modal__visibility">
                                            <span>Премиум</span>
                                            <svg class="mark"><use xlink:href="#black_star"></use></svg>
                                        </p>
                                        <p class="time cmp-lg-modal__visibility">90 дней</p>
                                        <span class="description cmp-lg-modal__visibility">Неограниченного доступа</span>
                                        <p class="list-name">Вы получите:</p>
                                        <ul class="ul functional">
                                            <li>Полный разбор психоматрицы</li>
                                            <li>Уникальные нумерологические коды</li>
                                            <li>Нумерологические комбинации</li>
                                            <li>Здоровье и склонность к заболеваниям</li>
                                            <li>Денежный потенциал</li>
                                            <li>Программа по дате рождения</li>
                                            <li>ФИО код возможностей</li>
                                            <li>Годовые циклы </li>
                                            <li>Предназначение/Карма/Судьба </li>
                                            <li>Совместимость партнеров </li>
                                        </ul>
                                        <div class="cmp-lg-modal__visibility buttons">
                                            <button class="button cmp-button cmp-button_pastel-reverse cmp-modal__close">Скрыть</button>
                                            <button class="button cmp-button cmp-button_black-reverse cmp-modal__close" data-modal="#buy-premium">Купить</button>    
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <div class="purchase">
                            <span class="price">Стоимость пакета: 7 900 руб.</span>
                            <div class="buttons">
                                <button class="button cmp-button cmp-button_pastel-reverse" data-modal="#premium-package">Подробнее</button>
                                <button class="button cmp-button cmp-button_pastel" data-modal="#buy-premium">Купить</button>  
                            </div>
                            
                        </div>
                    </li>

                    <li class="item">
                        <div class="hint">
                            <div class="description">
                                <div class="arrow"></div>
                                <div class="wrap">
                                    <p class="title">Полный разбор Психоматрицы
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Характер и волевые качества</li>
                                        <li>Жизненная энергия </li>
                                        <li>Психотип</li>
                                        <li>Интерес и отношения с деньгами</li> 
                                        <li>Потенциал здоровья</li>
                                        <li>Любовный потенциал и логика</li>
                                        <li>Потенциал профессионализма и отношение к трудовой деятельности</li>
                                        <li>Потенциал удачливости</li>
                                        <li>Степень ответственности и подарки судьбы</li> 
                                        <li>Потенциал памяти и результативности</li>
                                        <li>Целеустремлённость</li>
                                        <li>Потенциал иметь семью, выйти замуж/жениться</li> 
                                        <li>Привычки и привязанности</li>
                                        <li>Самооценка</li>
                                        <li>Быт и денежный потенциал </li>
                                        <li>Таланты </li>
                                        <li>Духовность</li> 
                                        <li>Темперамент</li> 
                                    </ul>
                                    
                                    <p class="title">Уникальные нумерологические коды
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Код Миллионера</li>
                                        <li>Код Матери</li>
                                        <li>Код Отца</li>
                                        <li>Код Альфонса и Содержанки</li>
                                        <li>Код Риска</li>
                                    </ul>

                                    <p class="title">Нумерологические комбинации
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Комбинация «Однотонельные люди»</li>
                                        <li>Комбинация «Болт»</li>
                                        <li>Комбинация «Гайка»</li>
                                        <li>Комбинация «Висилица»</li>
                                        <li>Комбинация «Птица»</li>
                                        <li>Комбинация «Стакан</li>
                                        <li>Комбинация «Якорь»</li>
                                        <li>Комбинация «Лодка без вёсел»</li>
                                        <li>Комбинация «Идеальный человек»</li> 
                                        <li>Комбинация «Треугольник Альтруизма»</li>
                                        <li>Комбинация «Треугольник Эгоизма»</li>
                                        <li>Комбинация «Эгоцентризм»</li>
                                        <li>Комбинация «Ни себе ни людям»</li>
                                    </ul>

                                    <p class="title">Здоровье и склонность к заболеваниям
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Цифры - склонность к заболеваниям</li>
                                    </ul>
                                    
                                    <p class="title">Денежный потенциал
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Финансовая карма</li>
                                        <li>Шанс разбогатеть</li>
                                        <li>Числа богатства и числа бедности в дате рождения</li>
                                        <li>Личный код Богатства</li>
                                    </ul>
                                    
                                    <p class="title">Программа по дате рождения
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Числовой код даты рождения</li>
                                        <li>Число дня рождения</li>
                                        <li>Карма числа дня рождения</li>
                                        <li>Месяц рождения </li>
                                        <li>Карма месяца рождения</li>
                                        <li>Родовая программа по году рождения</li>
                                        <li>Нули в дате рождения</li>
                                        <li>Код поведения по дате рождения</li>
                                        <li>Время рождения</li>
                                    </ul>

                                    <p class="title">ФИО код возможностей
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Число полного Имени (ФИО)</li>
                                    </ul>

                                    <p class="title">Годовые циклы
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Годовой цикл</li>
                                    </ul>

                                    <p class="title">Предназначение/Карма/Судьба
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Число Души</li>
                                        <li>Число Судьбы </li>
                                        <li>Кармические задачи</li>
                                        <li>Предназначение</li>
                                    </ul>

                                    <p class="title">Совместимость партнеров
                                        <br>+Расчет
                                    </p>
                                    <ul>
                                        <li>Для чего партнеры встретились</li>
                                        <li>Совместимость по Числу Судьбы</li>
                                        <li>Кармические отношения (любовник, кредитор, учитель)</li>
                                        <li>Вид союза</li>
                                    </ul>
                                </div>
                            </div>
                            <svg class="info"><use xlink:href="#info"></use></svg>
                        </div>

                        <div class="info">
                            <p class="plans">
                                <span>Профи</span>
                                <svg class="mark"><use xlink:href="#black_star"></use></svg>
                                <svg class="mark"><use xlink:href="#black_star"></use></svg>
                            </p>
                            <p class="time">1 год</p>
                            <span class="description">Неограниченного доступа + формулы расчета</span>
                            <div class="cmp-lg-modal" id="pro-package">
                                <div class="cmp-lg-modal__block">
                                    <div class="cmp-lg-modal__scroll">
                                        <span class="plans cmp-lg-modal__visibility">Профи</span>
                                        <p class="time cmp-lg-modal__visibility">1 год</p>
                                        <span class="description cmp-lg-modal__visibility">Неограниченного доступа + формулы расчета</span>
                                        <p class="list-name">Вы получите:</p>
                                        <ul class="ul functional">
                                            <li>Полный разбор психоматрицы</li>
                                            <li>Уникальные нумерологические коды</li>
                                            <li>Нумерологические комбинации</li>
                                            <li>Здоровье и склонность к заболеваниям</li>
                                            <li>Денежный потенциал</li>
                                            <li>Программа по дате рождения</li>
                                            <li>ФИО код возможностей</li>
                                            <li>Годовые циклы </li>
                                            <li>Предназначение/Карма/Судьба </li>
                                            <li>Совместимость партнеров</li>
                                        </ul>    
                                        <div class="cmp-lg-modal__visibility buttons">
                                            <button class="button cmp-button cmp-button_pastel-reverse cmp-modal__close">Скрыть</button>
                                            <button class="button cmp-button cmp-button_black-reverse cmp-modal__close" data-modal="#buy-pro">Купить</button>    
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            
                        </div>
                        <div class="purchase">
                            <span class="price">Стоимость пакета: 10 900 руб.</span>
                            <div class="buttons">
                                <button class="button cmp-button cmp-button_pastel-reverse" data-modal="#pro-package">Подробнее</button>
                                <button class="button cmp-button cmp-button_black-reverse" data-modal="#buy-pro">Купить</button>  
                            </div>     
                        </div>
                    </li>
                </ul>
                <!--<p class="subscription__warning">
                    Для входа Ваш в личный кабинет Вы можете использовать не более 2х разных устройств или браузеров.<br> 
                    В противном случае попытки входа будут заблокированы.
                </p>-->
            </div>
        </div>
    </section>
    <!-- /.subscription -->

    <a name="author"></a>
    <section class="author">
        <div class="container">
            <div class="author__block">
                <h2 class="section-title author__title">Об Авторе</h2>
                <div class="author__background">
                    <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/backgrounds/author_background.jpg" alt="">
                    <span>Александра Амосова</span>
                </div>
                <p class="section-description author__description">
                    Нумеролог, владеющий уникальными особыми знаниями, проверенными временем и результатом. 
                </p>
                <p class="section-description author__description">
                    Среди моих клиентов известные личности: политики, бизнесмены, люди шоу-бизнеса, спортсмены, актёры и просто люди, которые заинтересованы в своем развитии.
                </p>
                <p class="section-description author__description">
                    Открыв секреты нумерологии, я даю возможность посмотреть 
                    на жизнь под другим углом, раскрыть Ваш внутренний потенциал 
                    и возможности.
                </p>
                <p class="section-description author__description">
                    Моя работа — делать людей счастливыми и показывать, 
                    как нужно действовать, чтобы достичь желаемого.
                </p>
                <p class="section-description author__description">
                    Где бы Вы не находились, в любой точке мира, я всегда открыта для Вас и готова делиться мудростью чисел и своими уникальными знаниями.
                </p>
                <p class="section-description author__description">
                    Моя программа Нумерология.PRO поможет Вам уже сегодня
                    начать менять жизнь к лучшему и стать намного ближе к своей мечте!
                </p>
            </div>
        </div>
    </section>
</main>
<!-- /.main --> 



<div class="cmp-modal" id="result_compatibility">
    <div class="cmp-modal__block">
        <div class="cmp-modal__close">
            <span>Закрыть</span>
            <svg class="cross"><use xlink:href="#cross"></use></svg>
        </div>
        <div class="cmp-modal__scroll">
            <div class="cmp-modal__result">
                <div class="cmp-modal__wrap">
                    <div class="cmp-modal__visualization">
                        <p class="cmp-modal__title">Ваша совместимость</p>
                        <div class="scrollbars">
                            <div class="cmp-scrollbar">
                                <div class="cmp-scrollbar__info">
                                    <span class="name">Совместимость в любви</span><svg class="cmp-scrollbar__ico"><use xlink:href="#scrollbar__heart"></use></svg>
                                    <div class="cmp-scrollbar__container">
                                        <div class="cmp-scrollbar__line" data-percent="percent_love_marriage">
                                            <span class="message"></span>  
                                        </div>
                                    </div>  
                                </div> 
                            </div>
                            <div class="cmp-scrollbar">
                                <div class="cmp-scrollbar__info">
                                    <span class="name">Совместимость в дружбе</span><svg class="cmp-scrollbar__ico"><use xlink:href="#scrollbar__handshake"></use></svg>
                                    <div class="cmp-scrollbar__container">
                                        <div class="cmp-scrollbar__line" data-percent="percent_friendship">
                                            <span class="message"></span>  
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="cmp-scrollbar">
                                <div class="cmp-scrollbar__info">
                                    <span class="name">Совместимость в работе</span><svg class="cmp-scrollbar__ico"><use xlink:href="#scrollbar__gears"></use></svg>
                                    <div class="cmp-scrollbar__container">
                                        <div class="cmp-scrollbar__line" data-percent="percent_work">
                                            <span class="message"></span>  
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="cmp-modal__ratio">
                            <span class="title">Ваши числа судьбы</span>
                            <div class="wrap">
                                <span class="number" data-number="number_women"></span>
                                <span class="number" data-number="number_men"></span>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/hand_in_hand.jpg" alt="" class="cmp-modal__preview">
                </div>
                <p class="cmp-modal__subtitle">
                    Cовместимость в любви и браке <span data-percent="percent_love_marriage"></span>% 
                </p>
                <p class="cmp-modal__description" data-description="description_love_marriage"></p>
                <p class="cmp-modal__subtitle">
                    Cовместимость в дружбе <span data-percent="percent_friendship"></span>%
                </p>
                <p class="cmp-modal__description" data-description="description_friendship"></p>
                <p class="cmp-modal__subtitle">
                    Cовместимость в работе <span data-percent="percent_work"></span>%
                </p>
                <p class="cmp-modal__description" data-description="description_work"></p>
                <div class="cmp-modal__buttons">
                    <a href="#subscription" class="link cmp-button cmp-button_pastel cmp-modal__close">
                        <!--<svg><use xlink:href="#magic_wand"></use></svg>-->
                        <span>Перейти к полному расчету</span>
                    </a>
                    <!--<span class="cmp-link_hover">Узнать больше</span>-->
                </div>
            </div>
        </div>
    </div>
</div>



<div class="cmp-modal" id="result_psychomatrix">
    <div class="cmp-modal__block">
        <div class="cmp-modal__close">
            <span>Закрыть</span>
            <svg class="cross"><use xlink:href="#cross"></use></svg>
        </div>
        <div class="cmp-modal__scroll">
            <div class="cmp-modal__result">
                <p class="cmp-modal__title">Психоматрица</p>
                <!--<p class="cmp-modal__date"></p>-->
                <!--<p class="cmp-modal__name">Матрица</p>-->
                <div class="cmp-modal__wrap">
                    <div class="cmp-matrix">
                        <p class="cmp-matrix__date"></p>
                        <div class="cmp-matrix__wrap">
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                            <div class="cmp-matrix__item">
                                <span></span>
                            </div>
                        </div>
                        <p class="cmp-matrix__numbers"></p>
                    </div>
                    <div class="cmp-modal__info">
                        <p class="cmp-modal__description">
                            <span class="text_bold">Психоматрица</span> – это методика анализа личности по дате рождения. 
                        </p>
                        <p class="cmp-modal__description">
                            Это индивидуальная комбинация цифр, полученная путем нумерологического расчета. Она содержит в себе информацию 
                            о Вашем потенциале.
                        </p>
                        <p class="cmp-modal__description">
                            Можно сказать, что вместе с датой рождения мы получаем некий личный код, шифр, ценную информацию о себе, которую можно расшифровать, развернуть в большой рассказ о человеке и его возможностях.
                        </p>
                        <p class="cmp-modal__description">
                            Каждая ячейка в психоматрице имеет своё обозначение и ей соответствует определенная цифра и ее количество, которая накладывает на человека эмоциональный фон всей его жизни, наделяя его индивидуальными чертами для достижения успеха.
                        </p>
                        <p class="cmp-modal__description text_pastel">
                            Расшифровка Вашей психоматрицы доступна на тарифе «Базовый», «Премиум», «Профи». 
                        </p>
                        <a href="#subscription" class="link cmp-button cmp-button_pastel cmp-modal__close">
                            <span>Перейти к пакетам услуг</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    //Подключение виджетов оплаты
    require dirname(__FILE__) . '/includes/templates/buy_modal_temp.php';
    get_footer();
?>