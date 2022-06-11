<?php
    //#####Шаблон для окон оплаты#####

    /**
     * Шаблон блока верификации
     */
    function buy_modal__verification(){
        ?>
            <div class="cmp-modal__verification">
                <p class="cmp-modal__title">Для авторизации и оплаты тарифа введите свои данные</p>
                <form>
                    <div class="cmp-forms__item">
                        <p class="cmp-forms__name">
                            Ваше Имя<sup>*</sup>
                        </p>
                        <input type='text' class='input cmp-forms__input russian-input' name="name" placeholder="Введите имя" required>     
                    </div>
                    <div class="cmp-forms__item">
                        <p class="cmp-forms__name">
                            Ваша почта<sup>*</sup>
                        </p> 
                        <input type='email' class='input cmp-forms__input' name="email" placeholder="________@mail.ru" required>     
                    </div>
                        
                    <div class="cmp-check">
                        <label class="cmp-check__label">
                            <input type="checkbox">
                            <span class="cmp-check__checkmark"></span>
                        </label>
                        <a target="_blank" href="/policity.pdf" class="cmp-check__agreement">Согласие на обработку персональных данных</a>
                    </div>  

                    <button class="button cmp-button cmp-button_pastel" disabled>Перейти к оплате</button>
                </form>
            </div>
        <?php
    }
?>

<div class="cmp-modal cmp-modal__small" id="buy-basic">
    <div class="cmp-modal__block">
        <div class="cmp-modal__close">
            <span>Закрыть</span>
            <svg class="cross"><use xlink:href="#cross"></use></svg>
        </div>
        <div class="cmp-modal__scroll">
            <?php buy_modal__verification() ?>
            <div class="cmp-modal__payment">
                <p class="cmp-modal__title">Сообщение об оплате тарифа Базовый</p>
                <!--<p class="cmp-modal__description">Стоимость пакета: <span>3 900</span>руб.</p>-->
                <div id="payment-form-basic" data-typepay="payment" data-rate="basic"></div>
            </div>
        </div>
    </div>
</div>

<div class="cmp-modal cmp-modal__small" id="buy-premium">
    <div class="cmp-modal__block">
        <div class="cmp-modal__close">
            <span>Закрыть</span>
            <svg class="cross"><use xlink:href="#cross"></use></svg>
        </div>
        <div class="cmp-modal__scroll">
            <?php buy_modal__verification() ?>
            <div class="cmp-modal__payment">
                <p class="cmp-modal__title">Сообщение об оплате тарифа Премиум</p>
                <!--<p class="cmp-modal__description">Стоимость пакета: <span>7 900</span>руб.</p>-->
                <div id="payment-form-premium" data-typepay="payment" data-rate="premium"></div>
            </div>
        </div>
    </div>
</div>

<div class="cmp-modal cmp-modal__small" id="buy-pro">
    <div class="cmp-modal__block">
        <div class="cmp-modal__close">
            <span>Закрыть</span>
            <svg class="cross"><use xlink:href="#cross"></use></svg>
        </div>
        <div class="cmp-modal__scroll">
            <?php buy_modal__verification() ?>
            <div class="cmp-modal__payment">
                <p class="cmp-modal__title">Сообщение об оплате тарифа Про</p>
                <!--<p class="cmp-modal__description">Стоимость пакета: <span>10 900</span>руб.</p>-->
                <div id="payment-form-pro" data-typepay="payment" data-rate="pro"></div>
            </div>
        </div>
    </div>
</div>


<?php
    /*
    <div class="cmp-modal cmp-modal__small" id="buy-free">
        <div class="cmp-modal__block">
            <div class="cmp-modal__close">
                <span>Закрыть</span>
                <svg class="cross"><use xlink:href="#cross"></use></svg>
            </div>
            <div class="cmp-modal__scroll">
                <?php buy_modal__verification() ?>
                <div class="cmp-modal__payment">
                    <p class="cmp-modal__title">Сообщение об оплате тарифа Бесплатный</p>
                    <!--<p class="cmp-modal__description">Стоимость пакета: <span>1</span>руб.</p>-->
                    <div id="payment-form-free" data-typepay="payment" data-rate="free"></div>
                </div>
            </div>
        </div>
    </div>*/
    //#####-----#####
?>