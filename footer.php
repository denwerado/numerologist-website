<?php 
    //Если домашняя страница
    if(is_home()){
?>
    <footer class="footer">
        <div class="container">
            <div class="footer__block">
                <div class="row">
                    <ul class="ul footer__menu">
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
                        <!--<li class="item">
                            <button class="button cmp-link_active" data-modal="#buy-free">Тестовый тариф</button>
                        </li>-->
                    </ul>
                    <a href="/login/" class="link cmp-link_hover">Личный кабинет</a>
                </div>
                <div class="row">
                    <div class="footer__payment">
                        <p class="message">Мы принимаем к оплате:</p>
                        <div class="footer__payment-systems">
                            <a href="#" class="link system">
                                <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/payment_systems/visa.png" alt="">
                            </a>
                            <a href="#" class="link system">
                                <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/payment_systems/mastercard.png" alt="">
                            </a>
                            <a href="#" class="link system">
                                <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/payment_systems/world.png" alt="">
                            </a>
                            <a href="#" class="link system">
                                <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/payment_systems/gpay.png" alt="">
                            </a>
                            <a href="#" class="link system">
                                <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/payment_systems/applepay.png" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="socials">
                        <a target="_blank" href="https://www.instagram.com/alexa_amo/?utm_medium=copy_link" class="link social">
                            <img src="<?php echo get_template_directory_uri(  ); ?>/assets/images/instagram.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <ul class="ul documents">
                        <li>
                            <a target="_blank" class="link cmp-link_active" href="/documents/SA_publichnaya_oferta.pdf">Публичная оферта</a>
                        </li>
                        <li>
                            <a target="_blank" class="link cmp-link_active" href="/documents/SA_polzovatelskoe_soglashenie.pdf">Пользовательское соглашение</a>
                        </li>
                        <li>
                            <a target="_blank" class="link cmp-link_active" href="/policity.pdf">Политика в отношении обработки персональных данных</a>
                        </li>
                        <li>
                            <a target="_blank" class="link cmp-link_active" href="/documents/SA_oferta_tovar.pdf">Публичная оферта о предоставлении товаров/услуг</a>
                        </li>
                        <li>
                            <a target="_blank" class="link cmp-link_active" href="/documents/SA_oplata_vozvrat.pdf">Оплата и возврат</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <p class="info">ИП Амосова Александра Константиновна<br>ИНН 165506387578, ОГРНИП 321169000210945</p>

                    <p class="copyright">© <?= date('Y');?>. Все права защищены</p>

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
        </div>
    </footer>
<? } ?>


<?php wp_footer();?>

</body>
</html>

