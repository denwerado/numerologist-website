jQuery(document).ready(function($){
    //!Глобальные переменные
    let globalМariables = new Object;

    //Высота окна
    globalМariables["windowHeight"] = window.innerHeight;
    $(window).resize(function() {
        globalМariables["windowHeight"] = window.innerHeight;
    });

    //id окон для автоматического вкючения оплаты
    globalМariables["BuyId"] = [
        "#change-basic",
        "#change-premium",
        "#change-pro"];





    //#####Кнопка вверх#####
    let cmpUp = $('.cmp-up');
    if(cmpUp){
        $(window).on('scroll', function cmpUpActive(e){
            if(($(this).scrollTop() + window.innerHeight) >= globalМariables["windowHeight"]*1.5){
                cmpUp.addClass('cmp-up_active');
            }else{
                cmpUp.removeClass('cmp-up_active');
            }
        });

        if(($(this).scrollTop() + window.innerHeight) >= globalМariables["windowHeight"]*1.5){
            cmpUp.addClass('cmp-up_active');
        }else{
            cmpUp.removeClass('cmp-up_active');
        }
    }

    $('.cmp-up').on('click',()=>{
        $('html, body').stop().animate({
            scrollTop: $('body').offset().top
        }, 1000);
    });
    //#####-----#####





    //!РАБОТА С ВЕРХНИМ МЕНЮ!
    //#####Верхнее меню######
    if($('.header__burger')){
        $('.header__burger').on('click',()=>{
            $('.header__menu').toggleClass('header__menu_active');
            $('.header__burger').toggleClass('header__burger_active');
        });

        $('.header__menu .item a').on('click',()=>{
            $('.header__menu').removeClass('header__menu_active');
            $('.header__burger').removeClass('header__burger_active');
        });

        $(window).on('click',function(e){
            let element = $(e.target);
            if(!element.closest('.header__burger').length && !element.closest('.header__menu').length){
                $('.header__menu').removeClass('header__menu_active');
                $('.header__burger').removeClass('header__burger_active');
            }
        });
    }
    //#####-----#####



    //######Включение фона у меню######
    $(window).on('scroll', function(e){
        if($(this).scrollTop() > 70 && $(window).width() > 768){
            $('.header').addClass('header_scrolled');
        }else{
            $('.header').removeClass('header_scrolled');
        }
    });
    if($(window).scrollTop() > 70 && $(window).width() > 768){
        $('.header').addClass('header_scrolled');
    }
    //#####-----#####
    //!##--##--##--##!





    //######Плавность якорей на странице######
    $('a[href*="#"]').on("click", function(e){
        //e.preventDefault();
        let anchor = $(this);
        let href = anchor.attr('href').split('#')[1];

        let anchorEl = $('[name="' + href + '"]');

        $('html, body').stop().animate({
            scrollTop: anchorEl.offset().top - 60
        }, 1000);
    });
    //#####-----#####





    //!РАБОТА С INPUT-ами
    //#####Включение маски#####
    //Дата
    $('.input-date').mask("99.99.9999",{placeholder:"-"});

    //Время
    $('.input-time').mask("99:99",{placeholder:"-"});
    //#####-----#####



    //#####Удаление сообщений об ошибке при вводе с клавиатуры#####
    $('input').on('keypress change', function(event) {
        let cmpFormsItem = $(event.target).closest('.cmp-forms__item');
        if (cmpFormsItem){
            let cmpFormsError = cmpFormsItem.find('.cmp-forms__error');
            if(cmpFormsError){
                setTimeout(function() {
                    cmpFormsError.remove();
                }, 0);
            }
        }
    });
    //#####-----#####



    //#####Ввод только русских букв в соответсвующие поля#####
    $('.russian-input').on('keypress', function(event) {
        var that = this;
        setTimeout(function() {
            var inputLetter = /[^а-яА-Я]/g.exec(that.value);

            let cmpFormsItem = $(event.target).closest('.cmp-forms__item');

            if (inputLetter){
                that.value = that.value.replace(inputLetter, '');

                let cmpFormsName = cmpFormsItem.children().eq(0);
                $(cmpFormsName).after('<p class="cmp-forms__error">Можно вводить только русские буквы!</p>');
            }
        }, 0);
    });
    //#####-----#####



    //#####Функция проверки заполненности полей#####
    function checkFullnessInputs (checkInputs, ignoredInputs){
        //Заполненность по умолчанию true
        let checkSwith = true;

        //Массив для проверки радиокнопок
        let checkRadioValues = new Array();

        $.each(checkInputs,function(index,input){
            //?Если данный input не игнорируется
            if(ignoredInputs.indexOf(index) == -1){
                let cmpFormsItem = $(input).closest('.cmp-forms__item');
                
                //Если не заполнен, не readonly, type - не радокнопка
                if(!input.value && !$(input).attr("readonly") && input.type != "radio"){
                    checkSwith  = false;

                    //Удаление предыдущего значения
                    cmpFormsItem.find('.cmp-forms__error').remove();

                    //Вставка после заголовка
                    let cmpFormsName = cmpFormsItem.children().eq(0);
                    $(cmpFormsName).after('<p class="cmp-forms__error">Заполните поле!</p>');
                }

                //Если type - радиокнопка
                if(input.type == "radio" && !$(input).attr("disabled")){
                    if(input.checked){
                        checkRadioValues[input.name] = true;
                    }else{
                        if(checkRadioValues[input.name] != true){
                            checkRadioValues[input.name] = false;
                        }
                    }
                }
            }
        });

        //*Обработка радиокнопок
        for(radioInput in checkRadioValues){
            let searchSelector = "[name='" + radioInput + "']";
            let cmpFormsItem = $($(searchSelector)[0]).closest('.cmp-forms__item');

            if(!checkRadioValues[radioInput]){
                checkSwith  = false;

                //Удаление предыдущего значения
                cmpFormsItem.find('.cmp-forms__error').remove();

                //Вставка после заголовка
                let cmpFormsName = cmpFormsItem.children().eq(0);
                $(cmpFormsName).after('<p class="cmp-forms__error">Выберите пол</p>');
            }
        }

        //Возрат валидности (false или true)
        return checkSwith;
    }
    //#####-----#####



    //#####Чекбокс соглашения#####
    $('.cmp-check__label input[type="checkbox"]').on('change', function(event){
        let button = $(event.target).closest('form').find('button');
        if (!$(this).prop('checked')) {
            button.prop('disabled', true)
        }else{
            button.prop('disabled', false)
        }
    });
    //#####-----#####
    //!##--##--##--##!





    //######Модальные окна######
    $('[data-modal*="#"]').on("click", function(event){
        $('.cmp-modal_active').removeClass('cmp-modal_active');
        
        let button = event.target;
        let dataModal = button.dataset.modal;

        while(!dataModal){
            button = button.parentElement
            dataModal = button.dataset.modal;
        }

        //*Если окно с оплатой, то включение скрипта оплаты
        if(globalМariables["BuyId"].includes(dataModal)){
            automaticPayment(dataModal);
        }

        let modal = $(dataModal);
        modal.addClass('cmp-modal_active');

        $('html, body').css('overflow', 'hidden');
    });


    //При клике на кнопку закрыть
    $(document).on('click','.cmp-modal__close',function(e){
        let modal = $(e.target).closest('.cmp-modal_active');

        modal.removeClass('cmp-modal_active');
        $('html, body').css('overflow', 'visible');

        let dataModal = "#" + modal.attr('id');

        //*Если окно с оплатой, то отключение и очищение скрипта оплаты
        destroyPayment(dataModal);
    });


    //При клике на неактивную область
    $(document).on('click','.cmp-modal_active',function(e){
        if($(e.target).hasClass("cmp-modal_active")){

            $(e.target).removeClass('cmp-modal_active');
            $('html, body').css('overflow', 'visible');

            let dataModal = "#" + $(e.target).attr('id');

            //*Если окно с оплатой, то отключение и очищение скрипта оплаты
            destroyPayment(dataModal);
        }
    });
    //#####-----#####





    //######Слайдер######
    function addSlider(){
        let owl1 = $('#owl1')
        if($(window).width() <= 768){
            owl1.addClass('owl-carousel');
            owl1.owlCarousel({
                items: 1,
                dots: true,
                dotsContainer: '#vista__dots',
                responsive: {
                    660:{
                        items: 2
                    },
                    0:{
                        items: 1
                    }
                }
            })
        }else{
            owl1.trigger('destroy.owl.carousel');
            owl1.removeClass('owl-carousel');
        }
    };
    addSlider();

    $(window).resize(function(){
        if($('#owl1')){
            addSlider();
        }
    });
    //#####-----#####





    //#####Вычисление бонуса######
    //*Запрос на вычисление психоматрицы
    $('section.psychomatrix .calc button').on('click',function(e){
        $('.cmp-loader').css({'display':'block'});
        let button = $(e.target);
        let dateBirthInputs = button.closest('.calc').find('.input-date');
        let dateBirth = dateBirthInputs[0].value;

        //Создание объекта
        let parametrs = {
            date: dateBirth
        } 

        let json = JSON.stringify(parametrs);
        let request = new XMLHttpRequest();

        request.open("POST", "/wp-content/themes/numerologist/includes/bonus_calc/bonus_psychomatrix.php", true);
        request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        request.send(json);

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200){
                dateBirthInputs[0].value = "";
                result = JSON.parse(this.response);
                addInfoResult(result);
            }
        }
    });
    //*-----



    //*Запрос на вычисление совместимости
    $('section.compatibility .calc button').on('click',function(e){
        $('.cmp-loader').css({'display':'block'});
        
        let button = $(e.target);
        let dateBirthInputs = button.closest('.calc').find('.input-date');

        let dateBirthWoman = dateBirthInputs[0].value;
        let dateBirthMan = dateBirthInputs[1].value;

        //Создание объекта
        let parametrs = {
            womandate: dateBirthWoman,
            mendate: dateBirthMan
        } 

        let json = JSON.stringify(parametrs);
        let request = new XMLHttpRequest();

        request.open("POST", "/wp-content/themes/numerologist/includes/bonus_calc/bonus_compatibility.php", true);
        request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        request.send(json);

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200){
                dateBirthInputs[0].value = "";
                dateBirthInputs[1].value = "";
                result = JSON.parse(this.response);
                addInfoResult(result);
            }
        }
    });
    //*-----
    

    
    //*Добавление информации в модальное окно
    function addInfoResult(result){

        //?Если пришла совместимость
        if(result["number_women"] && result["number_men"]){
            //Открытие модального окна
            let resultModal = $('#result_compatibility');
            resultModal.addClass('cmp-modal_active');
            $('html, body').css('overflow', 'hidden');

            $('.cmp-modal__scroll').animate({
                scrollTop: 0
            }, 1000);
    

            let scrollbars = resultModal.find('.cmp-scrollbar__line[data-percent]');
            $.each(scrollbars,function(index,scrollbar){
                let percent = result[$(scrollbar).attr("data-percent")];
                $(scrollbar).find('span').text(percent + '%');
                $(scrollbar).css('width', percent + '%');
            });

            let subtitlePercents = resultModal.find('span[data-percent]');
            $.each(subtitlePercents,function(index,span){
                let percent = result[$(span).attr("data-percent")];
                $(span).text(percent);
            });
 
            let numbers = resultModal.find('[data-number]');
            $.each(numbers,function(index,number){
                let num = result[$(number).attr("data-number")];
                $(number).text(num);
            });

            let descriptions = resultModal.find('[data-description]');
            $.each(descriptions,function(index,description){
                let desc = result[$(description).attr("data-description")];
                $(description).empty();
                $(description).append(desc);
            });
        };

        //?Если пришла психоматрица
        if(result["matrix"]){
            //Открытие модального окна
            let resultModal = $('#result_psychomatrix');
            resultModal.addClass('cmp-modal_active');
            $('html, body').css('overflow', 'hidden');

            $('.cmp-modal__scroll').animate({
                scrollTop: 0
            }, 1000);

            //Дата рождения
            let dateBirth = resultModal.find('.cmp-matrix__date');
            dateBirth.text(result["date_birth"]);

            //Рабочие числа
            let workingNumbers = resultModal.find('.cmp-matrix__numbers');
            workingNumbers.text(result["working_numbers"]);

            //Вывод матрицы
            let matrixNumbers = resultModal.find('.cmp-matrix__item span');
            let indexMatrix = 1;
            let matrix = result["matrix"];

            for (let index = 1; index <= 9; index++) {
                if(indexMatrix > 8 && indexMatrix!=9){
                    indexMatrix = indexMatrix % 8;
                }
                if (matrix[indexMatrix]){
                    $(matrixNumbers[index-1]).text(matrix[indexMatrix]);
                }else{
                    $(matrixNumbers[index-1]).text('-');
                }
                indexMatrix += 3;
            }
        }

        $('.cmp-loader').css({'display':'none'});
    }
    //#####-----#####





    //#####Сбор и отправка данных для расчета#####
    $('#account-calc').on('click', function(event) {

        //Объект 
        let userData = {};

        let button = $(event.target);
        let section = button.closest('.account__block');

        let sectionUserData = section.find('.account__data');
        let sectionAccountPremiumData = section.find('.account__premium');
        
        //Поиск полей в верхнем блоке
        let accountInputs = sectionUserData.find('input');
        let checkValuesAccountInputs = checkFullnessInputs(accountInputs,[4]);

        //В нижнем блоке
        let accountPremiumInputs =  sectionAccountPremiumData.find('input');
        let checkValuesAccountPremiumInputs = checkFullnessInputs(accountPremiumInputs,[-1]);


        if(checkValuesAccountInputs){
            $.each(accountInputs,function(index,input){
                if(input.type != "radio" || input.checked){
                    userData[input.name] = input.value;
                }
            });
        }

        if(checkValuesAccountPremiumInputs){
            $.each(accountPremiumInputs,function(index,input){
                if((input.type != "radio" || input.checked)){
                    userData[input.name] = input.value;
                }
            });
        }

        //Отправка на сервер
        if(checkValuesAccountInputs && checkValuesAccountPremiumInputs){
            $('.cmp-loader').css({'display':'block'});
            
            let json = JSON.stringify(userData);
            let request = new XMLHttpRequest();
            
            request.open("POST", "/wp-content/themes/numerologist/includes/db_account_details.php", true);
            request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            request.send(json);

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200){
                    result = JSON.parse(this.response);
                    if(result == "success"){
                        window.location.replace("/account/result/")
                    }else{
                        $('.cmp-loader').css({'display':'none'});
                    }
                }
            }
        }
    });
    //#####-----#####





    //#####Переключение аккордеона#####
    $('.cmp-accordeon__title').on('click', (event)=>{
        let element = $(event.target);
        let accordeon = element.closest('.cmp-accordeon');

        //Проверка на область кнопок
        let checkingEx = element.closest('ul.buttons__right');
        let checkHint = element.closest('.cmp-hint');

        if((!checkingEx.length && !checkHint.length) || element.hasClass('trigger')){
            let accordeonActive = $('.cmp-accordeon_active');

            if(!accordeon.hasClass('cmp-accordeon_active')){
                accordeonActive.toggleClass('cmp-accordeon_active');
                accordeonActive.find('.cmp-accordeon__content').slideToggle();
            }

            accordeon.toggleClass('cmp-accordeon_active');
            accordeon.find('.cmp-accordeon__content').slideToggle();
        }
    });
    //#####-----#####





    //#####Отображение всплывающей подсказки относительно экрана#####
    $('.cmp-hint').on('mouseenter click', (event)=>{
        if(!$(event.target).hasClass('cross')){
            let hint = $(event.target).closest('.cmp-hint');
            let hintDescription = hint.find('.description');
            let hintDescriptionArrow = hintDescription.find('.arrow');

            if(window.innerWidth > 1024){
                hintDescription.css({'visibility' : 'visible',
                                    'width' : '70vw'});
            }else{
                hintDescription.css({'visibility' : 'visible',
                                    'width' : '86vw'});
            }

            if(hintDescription[0].getBoundingClientRect().top < 60){
                hintDescription.css({'bottom' : 'auto',
                                    'top' : '-5px',
                                    });
                hintDescriptionArrow.css({
                    'bottom' : 'auto',
                    'top' : '0',
                });
            }
        }
    });

    $('.cmp-hint').on('mouseleave', (event)=>{
        let hint = $(event.target).closest('.cmp-hint');
        let hintDescription = hint.find('.description');
        let hintDescriptionArrow = hintDescription.find('.arrow');

        hintDescription.css({'visibility' : 'hidden',
                            'width' : '0'});

        if((hintDescription[0].getBoundingClientRect().top - hintDescription[0].offsetHeight) > 60){
            setTimeout(function() {
                hintDescription.css({'bottom' : '0',
                                    'top' : 'auto',
                                    });
                hintDescriptionArrow.css({
                    'bottom' : '10px',
                    'top' : 'auto',
                });
            }, 1000);
        }
    });

    $('.cmp-hint .cross').on('click', (event)=>{
        let hintDescription = $(event.target).closest('.description');
        
        hintDescription.css({
            'visibility': 'hidden',
            'width': '0'
        });
    });
    //#####-----#####





    //#####Вход в личный кабинет######
    $('.login__form form').on('submit', (event)=>{
        $('.cmp-loader').css({'display':'block'});

        //Путь до файла php
        let php = '/wp-content/themes/numerologist/includes/authentication.php';

        event.preventDefault ? event.preventDefault() : event.returnValue = false;

        var req = new XMLHttpRequest();
        req.open('POST', php, true);

        let formsError = $(event.target).find('.cmp-forms__error');

        req.onload = function() {
            if (req.status >= 200 && req.status < 400) {
                json = JSON.parse(this.response);
                
                //В случае успеха или неудачи
                if (json.result == "success") {
                    formsError.empty();
                    window.location.replace("/account/");
                    //$('.cmp-loader').css({'display':'none'});
                } else {
                    formsError.empty();
                    formsError.append('<p>Неправильный или логин или пароль</p>');
                    $('.cmp-loader').css({'display':'none'})
                }
            // Если не удалось связаться с php файлом
            } else{
                formsError.empty();
                formsError.append('<p>Ошибка сервера!</p>');
                $('.cmp-loader').css({'display':'none'})
                
            }
        }; 
        
        // Если не удалось отправить запрос. Стоит блок на хостинге
        req.onerror = function() {
            formsError.empty();
            formsError.append('<p>Ошибка сервера!</p>');
            $('.cmp-loader').css({'display':'none'})
        };
        req.send(new FormData(event.target));
    });
    //#####-----#####





    //#####Выход#####
    $('#account_exit').on('click', ()=>{
        $('.cmp-loader').css({'display':'block'});

        let exitData = {
            "exit": "exit"
        }
        
        let json = JSON.stringify(exitData);
        let request = new XMLHttpRequest();
        
        request.open("POST", "/wp-content/themes/numerologist/includes/authentication.php", true);
        request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        request.send(json);

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200){
                result = JSON.parse(this.response);
                if(result["result"] == "exit"){
                    window.location.replace("/login/");
                }
                //$('.cmp-loader').css({'display':'none'});
            }
        }
    });
    //#####-----#####



    

    //#####Запрос на смену пароля#####
    $('#changing_pass form').on('submit', (event)=>{
        $('.cmp-loader').css({'display':'block'});

        let php = '/wp-content/themes/numerologist/includes/change_pass.php';

        event.preventDefault ? event.preventDefault() : event.returnValue = false;

        var req = new XMLHttpRequest();
        req.open('POST', php, true);

        let formsError = $(event.target).find('.cmp-forms__error');

        req.onload = function() {
            if (req.status >= 200 && req.status < 400) {
                json = JSON.parse(this.response);
                
                //В случае успеха или неудачи
                if (json.result == "success") {
                    window.location.replace("/account/");
                    //$('.cmp-loader').css({'display':'none'})
                } else {
                    formsError.append('<p>Неправильный или логин или пароль</p>');
                    $('.cmp-loader').css({'display':'none'})
                }
            // Если не удалось связаться с php файлом
            } else{
                formsError.append('<p>Ошибка сервера!</p>');
                $('.cmp-loader').css({'display':'none'})
            }
        }; 
        
        // Если не удалось отправить запрос. Стоит блок на хостинге
        req.onerror = function() {
            formsError.append('<p>Ошибка сервера!</p>');
            $('.cmp-loader').css({'display':'none'})
        };
        req.send(new FormData(event.target));
    })
    //#####-----#####





    //#####Запрос на восстановление пароля#####
    $('#recovery_pass form').on('submit', (event)=>{
        $('.cmp-loader').css({'display':'block'});

        let php = '/wp-content/themes/numerologist/includes/recovery_pass.php';
        event.preventDefault ? event.preventDefault() : event.returnValue = false;

        var req = new XMLHttpRequest();
        req.open('POST', php, true);

        //Контейнеры для вставки сообщений
        let formsError = $(event.target).find('.cmp-forms__error');
        let formsSuccess = $(event.target).find('.cmp-forms__success');

        formsError.empty();
        formsSuccess.empty();

        req.onload = function() {
            if (req.status >= 200 && req.status < 400) {
                json = JSON.parse(this.response);
                
                //В случае успеха или неудачи
                if (json.result == "success") {
                    formsSuccess.append('<p>Ваш пароль успешно изменен! Доступы отправлены на почту.</p>');
                    $('.cmp-loader').css({'display':'none'});
                } else {
                    formsError.append('<p>Аккаунта с такой почтой не существует!</p>');
                    $('.cmp-loader').css({'display':'none'});
                }
            // Если не удалось связаться с php файлом
            } else{
                formsError.append('<p>Ошибка сервера! Свяжитесь с администратором сайта!</p>');
                $('.cmp-loader').css({'display':'none'});
            }
        }; 
        
        // Если не удалось отправить запрос. Стоит блок на хостинге
        req.onerror = function() {
            formsError.append('<p>Ошибка сервера! Свяжитесь с администратором сайта!</p>');
            $('.cmp-loader').css({'display':'none'});
        };
        req.send(new FormData(event.target));
    })
    //#####-----#####





    //#####Печать#####
    $('#print_calc').on('click', (event)=>{
        window.print();
    });
    //#####-----#####





    //!####РАБОТА С ПЛАТЕЖАМИ#####
    //#####Запрос на создание платежа####
    function creatingPayment(parametrsPayment){
        let parametrs

        if(parametrsPayment["status"] == "change"){
            parametrs = {
                "rate": parametrsPayment["rate"],
                "status": parametrsPayment["status"],
                "name": parametrsPayment["name"]
            } 
        }

        if(parametrsPayment["status"] == "payment"){
            parametrs = {
                "rate": parametrsPayment["rate"],
                "status": parametrsPayment["status"],
                "email": parametrsPayment["email"],
                "name": parametrsPayment["name"]
            }
        }

        let json = JSON.stringify(parametrs);
        let request = new XMLHttpRequest();

        request.open("POST", "/wp-content/themes/numerologist/includes/check_pay_rate.php", true);
        request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
        request.send(json);

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200){
                paymentsData = JSON.parse(this.response);

                //Проверка статуса сервера
                if (paymentsData["status"] == "success"){
                    if(!parametrsPayment["name"]){
                        parametrsPayment["name"] = paymentsData["name"];
                    }

                    $('#' + parametrsPayment["payment_form_id"]).closest('.cmp-modal').removeClass('cmp-modal_active');
                    addWigetPaymentCloud(paymentsData,parametrsPayment);
                }
                if(paymentsData["status"] == "error"){
                    $('#' + parametrsPayment["payment_form_id"]).append(paymentsData["error"]);
                }
                if(paymentsData["status"] == "exists"){
                    $('#' + parametrsPayment["payment_form_id"]).append(paymentsData["exists"]);
                }
            }
        }

    }
    //#####-----#####

 

    //#####Добавление оплаты через YooMoney#####
    /*function addWigetPaymentYooMoney(paymentsData,paymentFormId){
        let tokenPayment = paymentsData["confirmation_token"];

        const checkout = new window.YooMoneyCheckoutWidget({
            confirmation_token: tokenPayment, //Токен, который вы получили после создания платежа
            payment_methods: ['google_pay','yoo_money','sberbank',],
            error_callback: function(error) {
                console.log(error)
            }
        });

        checkout.on('success', () => {
            checkout.destroy();
            $('#' + paymentFormId).append(paymentsData["success"]);

            if(paymentsData["paystatus"] == "payment"){
                sendingAccesses(paymentsData["email"], paymentsData["name"], paymentsData["rate"]);
            }

            if(paymentsData["paystatus"] == "change"){
                changeAccountRates(paymentsData["email"], paymentsData["rate"]);
            }
        });
        
        checkout.on('fail', () => {
            checkout.destroy();
            $('#' + paymentFormId).append(paymentsData["error"]);
        });

        checkout.render(paymentFormId);
    }*/
    //#####-----#####



    //#####Добавление виджета через Cloud#####
    function addWigetPaymentCloud(paymentsData,parametrsPayment){
        this.pay = function () {
            //Товарные позиции для чека
            let receipt = {
                "Items": [ //Содержимое позиций чека
                    {
                        "label": "Тариф " + paymentsData['ru-rate'], //Наименование товара или услуги
                        "price": Number(paymentsData['sum']), //Цена за единицу товара/услуги
                        "quantity": 1.00, //Количество
                        "vat": 0, //Ставка НДС услуги/товара
                        "amount": Number(paymentsData['sum']), //Price * Quantity c учетом скидки
                    },
                ],
                "TaxationSystem" : 0, //Система налогообложения
                "amounts": { //Общая сумма платежа
                    "electronic": Number(paymentsData['sum']), // Сумма оплаты электронными деньгами
                    "advancePayment": 0.00, // Сумма из предоплаты (зачетом аванса) (2 знака после запятой)
                    "credit": 0.00, // Сумма постоплатой(в кредит) (2 знака после запятой)
                    "provision": 0.00 // Сумма оплаты встречным предоставлением (сертификаты, др. мат.ценности) (2 знака после запятой)
                },
                "email" :  parametrsPayment['email'], //E-mail покупателя для отправки чека
                "customerInfo" : parametrsPayment['name'], //Имя покупателя
            }

            var widget = new cp.CloudPayments();
            widget.pay('charge', // или 'auth'
                { //options
                    publicId: 'pk_d9f4433cb9093f4d06696d1aaacab', //Публичный id из ЛК
                    amount: Number(paymentsData['sum']), //Полная сумма оплаты
                    currency: 'RUB', //Валюта
                    accountId: paymentsData['id'], //Инентификатор пользователя для создания подписки на уведомление
                    description: 'Оплата тарифа ' + paymentsData['ru-rate'] + ' на сайте numerologist.pro', //Описание назначения оплаты в произвольном формате
                    email: parametrsPayment['email'], //E-mail адрес пользователя
                    requireEmail: true, //Требование указать e-mail адрес пользователя в виджете
                    skin: "mini", //дизайн виджета (необязательно)
                    data: { //Любые другие данные, которые будут связаны с транзакцией
                        "CloudPayments": {  //Чек
                            "CustomerReceipt": receipt, //Параметры формирования чека
                        }
                    }
                },
                {
                    onSuccess: function (options) { // success
                        $('#' + parametrsPayment["payment_form_id"]).closest('.cmp-modal').addClass('cmp-modal_active');
                        $('#' + parametrsPayment["payment_form_id"]).append(paymentsData["success"]);
                    },
                    onFail: function (reason, options) { // fail
                        $('#' + parametrsPayment["payment_form_id"]).closest('.cmp-modal').addClass('cmp-modal_active');
                        $('#' + parametrsPayment["payment_form_id"]).append(paymentsData["error"]);
                    },
                    onComplete: function (paymentResult, options) { //Вызывается как только виджет получает от api.cloudpayments ответ с результатом транзакции.

                    }
                }
            )
        }
        pay();
    }
    //#####-----#####



    //#####Автоматическое включение формы оплаты#####
    function automaticPayment(checkBlock){
        let paymentForm = $(checkBlock).find('[data-typepay]');

        //Если внутри еще нет формы оплаты
        if(!paymentForm.children().length){
            //покупка,смена или продление тарифа
            let paymentStatus = paymentForm.data('typepay');

            //тариф пользователя
            let paymentRate = paymentForm.data('rate');

            //id для добавления в блок
            let paymentFormId = paymentForm.attr('id');


            let parametrsPayment = {
                "status": paymentStatus,
                "rate": paymentRate,
                "payment_form_id": paymentFormId
            }

            creatingPayment(parametrsPayment);
        }
    }
    //#####-----#####



    //#####Принудительное включение формы оплаты#####
    function manualPayment(checkBlock, formData){
        let paymentForm = $(checkBlock).find('[data-typepay]');

        $(checkBlock).find('.cmp-modal__verification').css({'display':'none'});
        $(checkBlock).find('.cmp-modal__payment').css({'display':'block'});

        //Если внутри еще нет формы оплаты
        if(!paymentForm.children().length){
            //покупка,смена или продление тарифа
            let paymentStatus = paymentForm.data('typepay');

            //тариф пользователя
            let paymentRate = paymentForm.data('rate');

            //id для добавления в блок
            let paymentFormId = paymentForm.attr('id');


            let parametrsPayment = {
                "status": paymentStatus,
                "rate": paymentRate,
                "payment_form_id": paymentFormId,
                "name": formData["name"],
                "email": formData["email"]
            }

            if(paymentFormId && paymentRate && paymentStatus){
                creatingPayment(parametrsPayment);
            }
        }
    }



    //#####Запрос на оплату#####
    $(".cmp-modal__verification form").on('submit', (e)=>{
        e.preventDefault();
        
        //Получение значений формы
        const formData = Object.fromEntries(new FormData(e.target).entries());
        
        //Получение id блока
        let checkBlock = '#' + $(e.target).closest('.cmp-modal_active').attr('id');

        manualPayment(checkBlock,formData);
    });
    //#####-----#####



    //#####Удаление сообщения оплаты#####
    function destroyPayment(checkBlock){
        if($(checkBlock).find('[data-typepay]')){
            $(checkBlock).find('.cmp-modal__verification').css({'display':'block'});
            $(checkBlock).find('.cmp-modal__payment').css({'display':'none'});
        }
    }
    //#####-----#####
    //!#####-#####-#####



    //#####Отправка POST запроса#####
    /*function postRequest(){

        var formData = new FormData();
        formData.append('Amount', 3900);
        formData.append('Status', 'Completed');
        formData.append('AccountId', 'denwerado@gmail.com');
        
        var request = new XMLHttpRequest();
        function reqReadyStateChange() {
            if (request.readyState == 4 && request.status == 200){

            }
        }
        
        request.open("POST", "/wp-content/themes/numerologist/includes/cloud_notif_pay.php");
        request.onreadystatechange = reqReadyStateChange;
        request.send(formData);
    }

    postRequest();*/
    //#####-----#####
});
