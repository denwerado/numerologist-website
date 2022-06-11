<?php
    function my_admin_scripts() {
        if(!is_admin()){
            //Подключение стилей
            wp_enqueue_style( 'normalize', get_template_directory_uri(  ) . '/assets/css/normalize.css');
            //wp_enqueue_style( 'datepicker', get_template_directory_uri(  ) . '/assets/css/datepicker.css');
            wp_enqueue_style( 'owl-carousel', get_template_directory_uri(  ) . '/assets/css/owl.carousel.min.css');
            wp_enqueue_style( 'style', get_template_directory_uri(  ) . '/assets/css/style.css');


            //Подключение скриптов
            wp_enqueue_script('jquery');
            //wp_enqueue_script( 'datepicker-js', get_template_directory_uri(  ) . '/assets/plugins/js/datepicker.min.js', array('jquery'), null, true);
            wp_enqueue_script( 'maskedinput', get_template_directory_uri(  ) . '/assets/plugins/js/jquery.maskedinput.min.js', array('jquery'), null, true);
            wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri(  ) . '/assets/plugins/js/owl.carousel.min.js', array('jquery'), null, true);

            //Подключение скриптов yookassa для инициализации виджета платежей
            //wp_enqueue_script( 'yookassa', 'https://yookassa.ru/checkout-widget/v1/checkout-widget.js', array('jquery'), null, true);

            //Подключение скриптов cloud для инициализации виджета оплаты
            wp_enqueue_script( 'cloud-js', 'https://widget.cloudpayments.ru/bundles/cloudpayments.js', array('jquery'), null, true);

            //Подключение основного скритпа страницы
            wp_enqueue_script( 'bundl', get_template_directory_uri(  ) . '/assets/scripts/bundl.js', array('jquery'), null, true);
        }
    }

    add_action('wp_enqueue_scripts', 'my_admin_scripts' );
?>