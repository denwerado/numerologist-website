CREATE TABLE `num_desc_calcs`(  
    `id` int NOT NULL primary key AUTO_INCREMENT,
    `calc_name` VARCHAR(255) UNIQUE,
    `description` VARCHAR(5000),
    `calc` TEXT,
    `rate` VARCHAR(255),
    FOREIGN KEY (rate) REFERENCES num_rates (title)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO `num_desc_calcs` (`calc_name`, `description`, `calc`, `rate`)
VALUES
    ('psychomatrix',
    '<p>Психоматрица – это методика анализа личности по дате рождения.</p>
    <p>Это индивидуальная комбинация цифр, полученная путем нумерологического расчета. Она содержит в себе информацию о Вашем потенциале.</p>
    <p>Можно сказать, что вместе с датой рождения мы получаем некий личный код, шифр, ценную информацию о себе, которую можно расшифровать, развернуть в большой рассказ о человеке и его возможностях.</p>
    <p>Каждая ячейка в психоматрице имеет своё обозначение и ей соответствует определенная цифра и ее количество, которая накладывает на человека эмоциональный фон всей его жизни, наделяя его индивидуальными чертами для достижения успеха.</p>
    <p>Психоматрица содержит знание о Ваших сильных и слабых сторонах, которые помогут задать Вам вектор развития и помочь определиться с предназначением. Она максимально точно показывает, где и каким образом Вы сможете раскрыть себя и свои способности.</p>',
    '<p class="cmp-modal__title">Как рассчитать Психоматрицу</p>
    <div class="content">
        <p class="description">При расчёте стоит обратить внимание не только на год рождения, но и на число рождения, которое участвует в расчёте. Если число рождения начинается с нуля (например, 03.08.1968), то при расчёте третьего рабочего числа, мы ноль не учитываем.</p>
        <p class="description">Если число рождения начинается с единички двойки или тройки (например, 17.01.1978; 23. 06.1983; 30.02.1980), то при расчёте третьего рабочего числа, мы учитываем только 1 число дня рождения (например, в числе рождения 17, учитываем только 1; в числе рождения 23 учитываем только 2; в числе рождения 30 только 3).</p>

        <p class="subtitle">Расчет нумерологической психоматрицы для людей, рожденных до 1999г.</p>

        <p class="datebirth">Дата рождения 03.08.1968</p>
        
        <p class="description">Рассчитываем рабочие числа:</p>

        <ul class="ul calc">
            <li><span class="text_pastel">1 число</span> — это сумма всех цифр даты рождения.</li>
            <li>1 число = 3 + 8 + 1 + 9 + 6 +8 = 35.</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">2 число</span> — получаем, суммируя цифры первого рабочего числа.</li>
            <li>2 число = 3 + 5 = 8.</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">3 число</span> — получаем путем вычитания из первого рабочего числа первую цифру даты рождения, умноженную на константу 2. (первой цифрой считается цифра, стоящая после нуля).</li>
            <li>3 число = 35 - (3 х 2) = 29.</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">4 число</span> —  получаем, суммируя цифры третьего рабочего числа.</li>
            <li>4 число = 2 + 9 = 11 (дальше это число не складываем).</li>
        </ul>

        <p class="description">Получилось 4 рабочих числа: 35.8.29.11</p>

        <p class="description">Дату рождения 03.08.1968 и 4 рабочих числа 35.8.29.11 вносим в психоматрицу. В психоматрицу вносятся поочередно все цифры, кроме нулей. Там, где отсутствует цифра, ставим прочерк.</p>

        <div class="cmp-matrix">
            <p class="cmp-matrix__date">03.08.1968</p>
            <div class="cmp-matrix__wrap">
                <div class="cmp-matrix__item">
                    <span>111</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>2</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>5</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>888</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>33</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>6</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>99</span>
                </div>
            </div>
            <p class="cmp-matrix__numbers">35.8.29.11</p>
        </div>

        <p class="description">Примечание</p>

        <ul class="ul note">
            <li>Если во втором и четвёртом рабочем числе получается двузначное число (например, 10, 11, 12), мы его не складываем, оставляем так, как есть.</li>
            <li>Константа 2 и нули в матрицу не вносятся.</li>
            <li>Если число рождения двузначное, то при расчёте 3 рабочего числа, учитывается только первое число из даты рождения.</li>
        </ul>

        <p class="subtitle">Расчет нумерологической психоматрицы для людей, рожденных после 2000г.</p>

        <p class="description">При расчете обращаем внимание на итоговую цифру первого рабочего числа. Если оно двузначное, то производится расчет 2-го рабочего числа путем сложения первого рабочего числа и приведение его к однозначному значению.</p>

        <p class="description">Если при расчёте первое рабочее число получилось однозначным, то 2 –го рабочего числа не будет, сразу переходим к расчёту 3 рабочего числа.</p>

        <p class="datebirth">Дата рождения 01.02.2001</p>

        <p class="description">Рассчитываем рабочие числа:</p>

        <ul class="ul calc">
            <li><span class="text_pastel">1 число</span> — это сумма всех цифр даты рождения.</li>
            <li>1 число = 1 + 2 + 2 + 1 = 6.</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">2 число</span> — нет (так как первое рабочее число однозначное и складывать его не надо).</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">3 число</span> — 19- константа, которая считается как рабочее число и вносится в матрицу.</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">4 число</span> — к первому рабочему числу прибавляем константу 19</li>
            <li>4 число = 6 + 19 = 25.</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">5 число</span> — суммируем цифры четвертого рабочего числа</li>
            <li>5 число = 2 + 5 = 7.</li>
        </ul>

        <p class="description">Получилось 4 рабочих числа: 6.19.25.7</p>

        <p class="description">Дату рождения 01.02.2001 и 4 рабочих числа 6.19.25.7 вносим в психоматрицу. В психоматрицу вносятся поочередно все цифры, в том числе и константа 19. Там, где отсутствует цифра, ставим прочерк. Нули в матрицу не вносятся.</p>

        <div class="cmp-matrix">
            <p class="cmp-matrix__date">01.02.2001</p>
            <div class="cmp-matrix__wrap">
                <div class="cmp-matrix__item">
                    <span>11</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>7</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>222</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>5</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>6</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>9</span>
                </div>
            </div>
            <p class="cmp-matrix__numbers">6.19.25.71</p>
        </div>
    </div>','basic'),

    ('psychomatrix_rows',
    '<p>Строк в психоматрице всего три.</p>
    <p>В первую строку «Целеустремлённость» входят цифры 1, 4, 7.</p>
    <p>Во вторую строку «Семья» входят цифры 2, 5, 8.</p>
    <p>В третью строку «Стабильность» входят цифры 3, 6, 9.</p>',
    '<p class="cmp-modal__title">Расчет строк</p>
    <div class="content">
        <p class="description">Считаем отдельно количество цифр в каждой из строк. Если в ячейке стоит прочерк, то эту цифру не считаем.</p>
        <p>После подсчета цифр в каждой из строк даётся описание.</p>
        <div class="row">
            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>1111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>9</span>
                    </div>
                </div>
            </div>
            <ul class="ul">
                <li>строка «Целеустремлённость» - 5 цифр</li>
                <li>строка «Семья» - 4 цифры</li>
                <li>строка «Стабильность» - 2 цифры</li>
            </ul>
        </div>
    </div>','basic'),

    ('psychomatrix_columns',
    '<p>Столбцов в психоматрице всего три.</p>
    <p>В первый столбец «Самооценка» входят цифры 1, 2, 3.</p>
    <p>Во второй столбец «Быт» входят цифры 4, 5, 6.</p>
    <p>В третий столбец «Таланты» входят цифры 7, 8, 9.</p>',
    '<p class="cmp-modal__title">Расчет столбцов</p>
    <div class="content">
        <p class="description">Считаем отдельно количество цифр в каждом из столбцов. Если в ячейке стоит прочерк, то эту цифру не считаем.</p>
        <p>После подсчета цифр в каждом из столбцов даётся описание.</p>
        <p>Например:</p>
        <div class="col">
            <ul class="ul row">
                <li>1 ст.</li>
                <li>2 ст.</li>
                <li>3 ст.</li>
            </ul>
            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>1111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>55</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>9</span>
                    </div>
                </div>
            </div>
        </div>

        <p class="description">Первый столбец «Самооценка» - 6 цифр</p>
        <p class="description">Второй столбец «Быт» - 3 цифры</p>
        <p class="description">Третий столбец «Таланты» - 3 цифры</p>
    </div>','basic'),

    ('psychomatrix_diag',
    '<p>Диагоналей в психоматрице всего две: «Духовная» и «Плотская».</p>
    <p>В «Духовную» диагональ входят цифры 1, 5, 9</p>
    <p>В «Плотскую» диагональ входят цифры 3, 5, 7.</p>',
    '<p class="cmp-modal__title">Расчет диагоналей</p>
    <div class="content">
        <p class="description">Считаем отдельно количество цифр в каждой из диагоналей: «духовной» и «плотской». Если в ячейке стоит прочерк, то эту цифру не считаем.</p>
        <p class="description">После подсчета цифр в каждой из диагоналей определяем их соотношение.</p>

        <p class="description"><em>Например</em></p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span class="text_blue">11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span class="text_red">7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span class="text_red">3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span class="text_blue">99</span>
                    </div>
                </div>
            </div>

        <p class="description text_red">«Плотская» диагональ - 2 цифры</p>
        <p class="description text_blue">«Духовная» диагональ - 4 цифры</p>

        <p class="description">Соотношение «духовной» диагонали к «плотской» 4/2 говорит о том…. (даётся описание).</p>
    </div>','basic'),

    ('psychomatrix_codes',
    '<p>Нумерологические коды - это Ваш потенциал возможностей, заложенных от рождения.</p>',
    '<p class="cmp-modal__title">Расчет нумерологических кодов</p>
    <div class="content">
        <p class="subtitle">Код «Миллионера»</p>
        <p class="description">Столбец «Быт» 3/4/ 5 цифр + строка «Целеустремлённость» 4/5 цифр + «Энергия» 22 + «Труд» 6/66 + «Память» 99</p>
        <p class="description">Например:</p>
        
            <div class="cmp-matrix">
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
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>66</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>2 столбец «Быт» - 3 цифры</li>
            <li>1 строка «Целеустремлённость» - 5 цифр</li>
            <li>«Энергия» 22</li>
            <li>«Труд» 66</li>
            <li>«Память» 99</li>
        </ul>

        <p class="subtitle">Код «Матери»</p>

        <p class="description">«Энергия» 22 + «Здоровье» 44/444/4444 + «Логика» 5/55 + «Интерес» 33/333/3333</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>44</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>88</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>333</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>«Энергия» 22</li>
            <li>«Здоровье» 44</li>
            <li>«Логика» 5</li>
            <li>«Интерес» 333</li>
        </ul>

        <p class="subtitle">Код «Отца»</p>

        <p class="description"> «Логика» 5/55 + «Интерес» 33/333 /3333+ «Семья» 4/5цифр + «Долг» 88/888 + «Характер» 111/1111/11111</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>88</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>333</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>66</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>
        
        <ul class="ul note">
            <li>«Логика» 5</li>
            <li>«Интерес» 333</li>
            <li>2 строка «Семья» - 5 цифр</li>
            <li>«Долг» 88</li>
            <li>«Характер» 111</li>
        </ul>

        <p class="subtitle">Код «Альфонса» и «Содержанки»</p>

        <p class="description">Столбец «Быт» пусто + Сектор «Долг» пусто.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3333</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>999</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>Столбец «Быт» - пусто</li>
            <li>«Долг» - пусто</li>
        </ul>

        <p class="subtitle">Код «Риска»</p>

        <p class="description">Столбец «Быт» пусто /1/2 + «Интерес» 33/333/3333 + «Удача»  77/777</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>777</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>333</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>
        
        <ul class="ul note">
            <li>2 столбец «Быт» - 2 цифры</li>
            <li>«Интерес» 333</li>
            <li>«Удача» 777</li>
        </ul>
    </div>','premium'),

    ('psychomatrix_combinations',
    '<p>Нумерологические комбинации – это Ваши особенности, заложенные от рождения.</p>',
    '<p class="cmp-modal__title">Расчет нумерологических комбинаций</p>
    <div class="content">
        <p class="subtitle">Комбинация «Однотонельные люди»</p>
        
        <p class="description">«Характер» 1, «Труд» пусто, «Память» 9.</p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>1</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>222</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>88</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>9</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>«Характер» 1</li>
            <li>«Труд» пусто</li>
            <li>«Память» 9</li>
        </ul>

        <p class="subtitle">Комбинация «Болт»</p>

        <p class="description">1 столбец «Самооценка» 11, 22, 3, все цифры в столбце присутствуют в норме или больше + «Логика» 5/55/555/5555.</p>

        <p class="description">Если не хватает хотя бы одной цифры, например, всего одна 1 или одна 2, или отсутствует 3 или 5, то комбинация работать не будет.</p>

        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>222</span>
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
            </div>

        <p class="description">1 столбец «Самооценка» 11, 222, 33, все цифры в столбце присутствуют в норме или больше + «Логика» 5</p>

        <p class="subtitle">Комбинация «Гайка»</p>

        <p class="description">3 столбец «Таланты» 7, 8, 99, все цифры в столбце присутствуют в норме или больше + «Здоровье» 4/44/4444/44444 + «Труд» 6/66/666/6666</p>
        <p class="description">Если не хватает хотя бы одной цифры, например, всего одна 9 или отсутствует 4, 6, 7 или 8, то комбинация работать не будет.</p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>Столбец «Таланты» 7, 8, 99, все цифры в столбце присутствуют</li>
            <li>«Здоровье» 4</li>
            <li>«Труд» 6</li>
        </ul>

        <p class="subtitle">Комбинация «Висилица»</p>

        <p class="description">1 столбец «Самооценка» 11, 22, 3, все цифры в столбце присутствуют в норме или больше + строка «Целеустремлённость» 11, 4, 7, все цифры в строке присутствуют в норме или больше + 3 Столбец «Таланты» 7, 8, 99,  все цифры в столбце присутствуют в норме или больше + «Логика» пусто + «Труд» пусто.</p>
        <p class="description">Эта комбинация напоминает букву П, образ виселицы.</p>
        <p class="description">Если не хватает хотя бы одной цифры, например, всего одна 9, одна 1, либо одна 2, или отсутствует 4, 7 или 8, либо присутствуют цифры 5 или 6, то комбинация работать не будет.</p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>
        
        <ul class="ul note">
            <li>1 столбец «Самооценка» 111, 22, 3, все цифры в столбце присутствуют</li>
            <li>1 строка «Целеустремлённость» 111, 4, 7, все цифры в строке присутствуют</li>
            <li>3 столбец «Таланты» 7, 8, 99, все цифры в столбце присутствуют</li>
            <li>«Логика» пусто</li>
            <li>«Труд» пусто</li>
        </ul>

        <p class="subtitle">Комбинация «Птица»</p>

        <p class="description">1 столбец «Самооценка» 11, 22, 3, все цифры в столбце присутствуют в норме или больше + 1 строка «Целеустремлённость» 11, 4, 7, все цифры в строке присутствуют в норме или больше.</p>
        <p class="description">Если не хватает хотя бы одной цифры, например, всего одна 1, либо одна 2, или отсутствует 3, 4, 7, то комбинация работать не будет. </p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>1 столбец «Самооценка» 111, 22, 3, все цифры в столбце присутствуют</li>
            <li>1 строка «Целеустремлённость» 111, 4, 7, все цифры в строке присутствуют</li>
        </ul>

        <p class="subtitle">Комбинация «Стакан»</p>

        <p class="description">1 столбец «Самооценка» 11, 22, 3, все цифры в столбце присутствуют в норме или больше + 3 строка «Стабильность» 3, 6, 99 , все цифры в строке присутствуют в норме или больше + 3 столбец «Таланты» 7, 8, 99,,  все цифры в столбце присутствуют в норме или больше  + «Здоровье» пусто + «Логика» пусто.</p>
        <p class="description">Если не хватает хотя бы одной цифры, например, всего одна 1, одна 2, либо одна 9, или отсутствуют цифры 3, 6, либо присутствуют цифры 4 и 5, то комбинация «Стакан» работать не будет.</p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>1 столбец «Самооценка» 11, 22, 3, все цифры в столбце присутствуют</li>
            <li>3 строка «Стабильность» 3, 6, 99, все цифры в строке присутствуют</li>
            <li>3 столбец «Таланты» 7, 8, 99, все цифры в столбце присутствуют</li>
            <li>«Здоровье» пусто</li>
            <li> «Логика» пусто</li>
        </ul>

        <p class="subtitle">Комбинация «Якорь»</p>

        <p class="description">3 столбец «Таланты» 7, 8, 99, все цифры в столбце присутствуют в норме или больше + 3 строка «Стабильность» 3, 6, 99, все цифры в строке присутствуют в норме или больше.</p>
        <p class="description">Если не хватает хотя бы одной цифры, например, всего одна 9, либо отсутствуют цифры 3, 6, 7, 8, то комбинация работать не будет.</p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>
        
        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>3 столбец «Таланты» 7, 8, 99, все цифры в столбце присутствуют в норме или больше.</li>
            <li>3 строка «Стабильность» 3, 6, 99, все цифры в строке присутствуют в норме или больше.</li>
        </ul>

        <p class="subtitle">Комбинация «Лодка без вёсел»</p>

        <p class="description">Когда ни одна из строк и столбцов не замкнута, то такая комбинация цифр называется «Лодка без вёсел».</p>
        <p class="description">Не замкнутыми считаются строки, столбцы, в которых отсутствуют какие-либо цифры, либо они представлены ниже нормы (например, одна 1, одна 2, одна 9).</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>1</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>44</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>888</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>66</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>1 строка «Целеустремлённость» 1, 44, 7 пусто - не замкнута</li>
            <li>2 строка «Семья» 22, 5 пусто, 888 -  не замкнута</li>
            <li>3 строка «Стабильность» 3 пусто, 66, 99 -  не замкнута</li>
            <li>1 столбец «Самооценка» 1, 22, 3 пусто - не замкнут</li>
            <li>2 столбец «Быт» 4, 5 пусто, 66 - не замкнут</li>
            <li>3 столбец «Таланты» 7 пусто, 888, 99 - не замкнут</li>
        </ul>

        <p class="subtitle">Комбинация «Идеальный человек»</p>

        <p class="description">Если все ячейки в матрице заполнены, все цифры представлены в норме и в них нет пустых ячеек, то такая матрица считается идеальной.</p>
        <p class="description">Допустимая разница в одну цифру.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <ul class="ul note">
            <li>1 строка «Целеустремлённость» 11, 4, 7</li>
            <li>2 строка «Семья» 22, 5, 8</li>
            <li>3 строка «Стабильность» 3, 6, 99</li>
            <li>1 столбец «Самооценка» 11, 22, 3</li>
            <li>2 столбец «Быт» 4, 5, 6</li>
            <li>3 столбец «Таланты» 7, 8, 99</li>
        </ul>

        <p class="subtitle">Комбинация «Треугольник Альтруизма»</p>

        <p class="description">Когда ячейки в матрице заполнены цифрами 11, 4, 7, 5, в норме или больше, то такая комбинация называется «Треугольник Альтруизма».</p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>88</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <p class="description">Ячейки в матрице заполнены цифрами 11, 4, 7, 5</p>

        <p class="subtitle">Комбинация «Треугольник Эгоизма»</p>

        <p class="description">Когда ячейки в матрице заполнены цифрами 3, 6, 99, 5, в норме или больше, то такая комбинация называется «Треугольник Эгоизма».</p>
        <p class="description">Другие цифры на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>88</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <p class="description">Ячейки в матрице заполнены цифрами 3, 6, 99, 5</p>

        <p class="subtitle">Комбинация «Эгоцентризм»</p>

        <p class="description">Если в треугольнике «Эгоизма» присутствует только одна 9 (в норме должно быть две), то такое качество называется «Эгоцентризм».</p>
        <p class="description">Остальные цифры в треугольнике «Эгоизма» могут быть представлены в норме или больше.</p>
        <p class="description">Другие цифры в психоматрице на эту комбинацию влияния не оказывают, их может не быть, они могут быть в норме или больше.</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>88</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>9</span>
                    </div>
                </div>
            </div>

        <p class="description">В треугольнике «Эгоцентризма» 3, 5, 6, 9 присутствует только одна 9.</p>

        <p class="subtitle">Комбинация «Ни себе ни людям»</p>

        <p class="description">Если в обоих треугольниках «Альтруизма» и «Эгоизма» отсутствует 5, то такое качество называется «Ни себе ни людям».</p>

        <p class="description">Например:</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>88</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>

        <p class="description">В обоих треугольниках «Альтруизма» и «Эгоизма» отсутствует 5.</p>
    </div>','basic'),

    ('psychomatrix_health',
    '<p>Согласно цифрам, представленным в психоматрице, можно определить потенциал здоровья человека и склонность его к заболеваниям.</p>
    <p>В идеале все цифры в психоматрице должны быть в пределах нормы.</p>
    <p>Когда качество в норме, можно говорить о том, что такой человек наделен всеми качествами, которые необходимы ему для жизни и сохранения здоровья.</p>
    <p>Отклонения от нормы в большую или меньшую сторону, могут говорить о склонности к заболеваниям.</p>
    <p>Если есть склонности к заболеваниям, то это не означает, что есть сами заболевания. Заболевания возникают в тех случаях, ко¬гда человек неправильно мыслит, неправильно себя ведет, неправильно использует те энергии и качества, которые за¬ложены в нем от рождения.</p>',
    '<p class="cmp-modal__title">Расчет здоровья</p>
    <div class="content">
        <p class="description">Анализируем психоматрицу человека.</p>
        <p class="description">В тех ячейках, где нет цифр, либо где они представлены меньше или больше нормы, может выражаться склонность человека к определённым заболеваниям.</p>
        <p class="description">Те цифры, которые представлены в норме, склонностей к заболе-ваниям не дают.</p>
        
        <p class="description">Норма психоматрицы</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>8</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>3</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>6</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>99</span>
                    </div>
                </div>
            </div>
        
        <p class="description">Пример, отклонения от нормы</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>1111</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>22</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>333</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>9</span>
                    </div>
                </div>
            </div>

        <p class="description">Склонность к заболеваниям в этой матрице дают 1111, 333, 9.</p>

        <p class="description">Далее даётся описание этих цифр.</p>
    </div>','premium'),

    ('dateBirth_become_rich',
    '<p>Шанс разбогатеть можно определить по дате рождения, если произвести определённый нумерологический расчет.</p>',
    '<p class="cmp-modal__title">Расчет шанса разбогатеть</p>
    <div class="content">
        <p class="description">Шанс разбогатеть рассчитывается по следующей формуле:</p>
        <p class="description">Число рождения умножаем на совмещенное число месяца и года в одну строчку и получаем шестизначное/семизначное/восьмизначное число.</p>
        <p class="description">Далее, все цифры в этом числе складываем до получения двузначного числа.</p>
        <p class="description">Это число и будет являться показателем шанса разбогатеть.</p>

        <br>
        <br>

        <p class="description">26 - 28 - показатель нормы</p>
        <p class="description">25 и меньше - средний показатель</p>
        <p>29 и более - высокий показатель</p>

        <br>
        <br>

        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения 24.05.1989</p>

        <ul class="ul calc">
            <li>24 х 51989= 1247736</li>
            <li>1247736 =1+2+4+7+7+3+6 = 30</li>
            <li>30 – высокий показатель шанса разбогатеть. </li>
        </ul>

        <p class="description">На основании показателя даётся описание.</p>
    </div>','premium'),

    ('dateBirth_code_rich',
    '<p>У каждого человека есть свой личный денежный код.</p>
    <p>Для того, чтобы всегда быть в достатке, необходимо знать свой код богатства и придерживаться значения кода.</p>
    <p>Чем больше одинаковых цифр в значении кода богатства, тем больше влияния они будут оказывать на Вас.</p>
    <p>Чтобы усилить влияние цифр кода богатства, можно использовать эту комбинацию для пин - кода от телефона/карты/сейфа. Также можно найти денежную купюру любого номинала с номером или серией Ваших цифр и носить ее с собой.</p>',
    '<p class="cmp-modal__title">Расчет личного кода богатсва</p>
    <div class="content">
        <p class="description">Чтобы усилить влияние цифр кода богатства, можно использовать эту комбинацию для пин - кода от телефона/карты/сейфа. Также можно найти денежную купюру любого номинала с номером или серией Ваших цифр и носить ее с собой.</p>
        <p class="description">Первая цифра – это число Вашего рождения; если оно двузначное, приводим его к однозначному числу.</p>
        <p class="description">Вторая цифра - это число месяца Вашего рождения; если оно двузначное, приводим его к однозначному числу.</p>
        <p class="description">Третья цифра - это число года Вашего рождения; складываем все числа, входящие в число года и приводим к однозначному числу.</p>
        <p class="description">Четвертая цифра – это сумма первой, второй и третьей цифры; если оно получилось двузначное, то приводим его к однозначному числу.</p>

        <br>
        <br>

        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения 25.11.2005</p>

        <ul class="ul calc">
            <li>2 + 5 = 7 - <span class="text_pastel">первое число</span></li>
            <li>1 + 1 = 2 – <span class="text_pastel">второе число</span></li>
            <li>2 + 0 + 0 +5 =7 - <span class="text_pastel">третье число</span></li>
            <li>7 + 2 + 7 = 16 = 1 + 6 = 7 - <span class="text_pastel">четвёртое число</span></li>
        </ul>

        <p class="description">Ваш личный код богатства – 7277</p>
    </div>','premium'),

    ('psychomatrix_fin_karm',
    '<p>2 столбец «Быт» называется финансовой кармой. Чем больше цифр в столбце, тем больше вероятность самостоятельно без помощи третьих лиц достигнуть финансового благополучия.</p>
    <p>Какой бы финансовый столбец у Вас не получился в психоматрице, важно понимать, что на Ваше финансовое благополучие могут оказывать влияние многие факторы, в том числе третьи лица, например: партнер, родители, супруг и прочее окружение с более сильной финансовой кармой. Если такой человек будет «включён» в Вас, то Ваше финансовое благополучие может резко увеличиться.</p>
    <p>Также бывает, что у человека в матрице карма богатства, а на деле денег не хватает. На это могут влиять Ваши личные установки в отношении денег: страх, жадность, неправильное распределение денежных ресурсов, неправильное отношение к жизни, плохие поступки мысли и так далее.</p>
    <p>Причиной также могут быть Ваш партнер или другие люди, которые оказывают на Вас негативное влияние.</p>',
    '<p class="cmp-modal__title">Расчет финаносвой кармы</p>
    <div class="content">
        <p class="description">Финансовая карма определяется по количеству цифр во 2 столбце «Быт». Чем больше цифр в этом столбце, чем выше финансовая карма.</p>

        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения 08.03.1985</p>

            <div class="cmp-matrix">
                <div class="cmp-matrix__wrap">
                    <div class="cmp-matrix__item">
                        <span>11</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>4</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>7</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>-</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>5</span>
                    </div>
                    <div class="cmp-matrix__item">
                        <span>888</span>
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
            </div>

        <p class="description">2 столбец «Быт» - 2 цифры</p>
        <p class="description">Карма среднего достатка.</p>

        <p class="description">На основании показателя денежного потенциала финансовой кармы даётся описание.</p>
    </div>','premium'),

    ('dateBirth_numbers_pov_rich',
    '<p>В Нумерологии денег есть денежные числа богатства - 3, 6, 8, числа бедности - 1, 2, 7 и числа особых даров 4, 5, 9.</p>
    <p>Каждое денежное число обладает вибрациями, являясь проводником определенных энергий и финансовых потоков.</p>
    <p>Денежные числа даются человеку при рождении и остаются с ним на протяжении всей жизни. Они показывают человеку перспективу и дают понять свой финансовый потенциал.</p>
    <p>Не каждое число обладает большим финансовым потенциалом, но при правильном его использовании дает возможность избежать многих потерь и разочарований.</p>
    <p>Чтобы определить Ваш финансовый потенциал, нужно посмотреть на Вашу дату рождения и подсчитать, каких денежных чисел в ней больше: чисел бедности, богатства или чисел особых даров.</p>
    <p>Также важно проанализировать их значение и количество. Чем больше у Вас чисел богатства, тем больше денежного потенциала Вам дано от рождения. Чем меньше цифр богатства и больше цифр бедности, тем больше усилий и труда Вам придется приложить, чтобы достигнуть финансового достатка.</p>',
    '<p class="cmp-modal__title">Расчет числа богатсва и бедности</p>
    <div class="content">
        <p class="description">Смотрим на дату рождения и определяем числа богатства, бедности, числа особых даров, которые в ней присутствуют. Чем больше повторяющихся чисел, тем большее влияние они на Вас оказывают.</p>

        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения 08.03.1985</p>

        <ul class="ul calc">
            <li><span class="text_pastel">Числа богатства</span> – 3, 88</li>
            <li>По числу 3, 8 даётся описание</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">Число бедности </span> – 1</li>
            <li>По числу 1 даётся описание</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">Числа особых даров</span> – 5, 9</li>
            <li>По числу 5, 9 даётся описание</li>
        </ul>
    </div>','premium'),

    ('timeBirth_value',
    '<p>Согласно нумерологии, точное время рождения влияет на характер человека, на его темперамент и накладывает важный отпечаток на его судьбу.</p>
    <p>Зная время появления человека на свет, можно определить, насколько судьба будет к нему благосклонна и какой будет его личность.</p>
    <p>Несомненно, формирование личности зависит не только от времени рождения, но и от других нумерологических данных. Однако, основные особенности характера человека закладываются именно в период появления его на свет.</p>',
    '<p class="cmp-modal__title">Расчет времени рождения</p>
    <div class="content">
        <p class="description">Время рождения в нумерологии определяется временными отрезками по 2 часа, от 00:01 до 24:00.</p>

        <p class="description">Эти временные отрезки находятся под влиянием определённых планет, которые и характеризуют личность человека.</p>

        <p class="description">Например:</p>

        <ul class="ul">
            <li>Время рождения: 11.05</li>
            <li>10:01 - 12:00 Покровитель Сатурн </li>
        </ul>

        <p class="description">Далее идет описание времени рождения, в соответствии с отрезком времени.</p>

        <p class="subtitle">Время рождения варианты:</p>

        <ul class="ul note">
            <li>00:01 - 02:00 Покровитель Меркурий</li>
            <li>02:01 - 04:00 Покровитель Венера</li>
            <li>04:01 - 06:00 Покровитель Марс</li>
            <li>06:01 - 08:00 Покровитель Нептун</li>
            <li>08:01 - 10:00 Покровитель Уран</li>
            <li>10:01 - 12:00 Покровитель Сатурн</li>
            <li>12:01 - 14:00 Покровитель Юпитер</li>
            <li>14:01 - 16:00 Покровитель Плутон</li>
            <li>16:01 - 18:00 Покровитель Венера</li>
            <li>18:01 - 20:00 Покровитель Меркурий</li>
            <li>20:01 - 22:00 Покровитель Солнце</li>
            <li>22:01 - 24:00 Покровитель Луна</li>
        </ul>
    </div>','premium'),

    ('dateBirth_mounths_karm',
    '<p>Месяц рождения связан с нынешним воплощением. Зная, в каком месяце рожден человек, можно сказать, зачем он пришел в свой Род, какая у него роль в семье. Также месяц рождения указывает на кармическую задачу, которую человек должен выполнить в течение жизни.</p>',
    '<p class="cmp-modal__title">Расчет кармич. задач по месяцу рождения</p>
    <div class="content">
        <p class="description">Месяц рождения связан с нынешним воплощением. Зная, в каком месяце рожден человек, можно сказать, зачем он пришел в свой Род, какая у него роль в семье. Также месяц рождения указывает на кармическую задачу, которую человек должен выполнить в течение жизни.</p>
        
        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения 17.01.1978</p>

        <p class="description">Месяц рождения – январь</p>

        <p class="description">Даются кармические задачи рожденного в январе.</p>
    </div>','basic'),

    ('dateBirth_day_karm',
    '<p>Карма числа дня рождения – это определённая программа, с которой человек пришёл на Землю в этом воплощении.</p>
    <p>Считается, что рождение происходит в то время, которое выбрано кем-то свыше. Его цель - дать человеку ощутить на своем опыте последствия поступков, которые были совершены им в прошлой жизни. С помощью этого можно не только понять свои ошибки и исправить их, но и открыть путь в следующие воплощения</p>',
    '<p class="cmp-modal__title">Расчет кармы числа дня рождения</p>
    <div class="content">
        <p class="description">Считается, что рождение происходит в то время, которое выбрано кем-то свыше. Его цель - дать человеку ощутить на своем опыте последствия поступков, которые были совершены им в прошлой жизни. С помощью этого можно не только понять свои ошибки и исправить их, но и открыть путь в следующие воплощения</p>
        <p class="description">Например:</p>

        <ul class="ul">
            <li>Дата рождения 05.06.1998</li>
            <li>Карма числа дня рождения «5»</li>
        </ul>

        <ul class="ul">
            <li>Дата рождения 17.05.2000</li>
            <li>Карма числа дня рождения «17»</li>
        </ul>
    </div>','basic'),

    ('dateBirth_code_behavior',
    '<p>Согласно нумерологии, каждый человек родился со своим кодом поведения. И если он строит жизнь согласно прописанной стратегии, то ему все удается, открываются перспективы для удачной и гармоничной жизни.</p>',
    '<p class="cmp-modal__title">Расчет кода поведения</p>
    <div class="content">
        <p class="description">Код поведения рассчитывается, исходя из даты рождения и определённого периода.</p>
        <p class="description">Например:</p>

        <br>
        <br>

        <p class="datebirth">Дата рождения 17.01.1978</p>

        <p class="description">22.12. - 20.01 Код поведения - Код Карьеры</p>

        <p class="description">Далее идет описание кода поведения, в соответствии с датой рождения.</p>

        <br>

        <p class="description">Варианты:</p>

        <ul class="ul note">
            <li>21.01. - 19.02 Код поведения - Код Перемен</li>
            <li>20.02. - 20.03. Код поведения – Код Праздника</li>
            <li>21.03. - 20.04. Код поведения – Код Переживаний</li>
            <li>21.04. - 20.05. Код поведения – Код Независимости</li>
            <li>21.05. - 21.06.  Код поведения – Код Мечтателя</li>
            <li>22.06. -22.07. Код поведения – Код Прыгуна</li>
            <li>23.07. - 22.08.  Код поведения – Код Короля</li>
            <li>23.08. - 22.09. Код поведения - Код Рекламы</li>
            <li>23.09. - 23.10. Код поведения - Код Индивидуальности</li>
            <li>24.10. - 21.11. Код поведения - Код Серого кардинала</li>
            <li>22.11. - 21.12. Код поведения - Код Облагораживателя</li>
            <li>22.12. - 20.01. Код поведения - Код Карьеры </li>
        </ul>
    </div>','basic'),

    ('dateBirth_mounths_value',
    '<p>Месяц рождения накладывает на человека определению энергию, которую нужно развивать и правильно ею пользоваться.</p>',
    '<p class="cmp-modal__title">Расчет месяца рождения</p>
    <div class="content">
        <p class="description">Месяц рождения при расчёте не меняется, в числовое значение не переводится и соответствует истинному месяцу рождения.</p>

        <p class="description">Например:</p>

        <br>

        <p class="datebirth">Дата рождения 05.02.1998</p>
        <p class="description">Месяц рождения – февраль</p>

        <p class="decscription">Далее идет описание, в соответствии с полученным результатом.</p>
    </div>','basic'),

    ('dateBirth_zeros',
    '<p>Ноль - это особая цифра. Это степень свободы, лёгкость, подвижность, манёвренность, принятие перемен, отсутствие границ, свобода выбора, возможность и желание всё попробовать.</p>
    <p>Если в дате рождения человека есть нули, то все эти качества у него будут присутствовать.</p>
    <p>Если в дате рождения нет нулей, то человек в большей степени ограничен в выборе и придерживается некого плана.</p>',
    '<p class="cmp-modal__title">Расчет нулей</p>
    <div class="content">
        <p>Если в дате рождения нет нулей, то человек в большей степени ограничен в выборе и придерживается некого плана.</p>
        <p class="description">Учитываются все нули, как в числе, так и в месяце, и в годе рождения.</p>

        <br>

        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения 13.11.1982</p>
        <p class="description">Нет нулей в дате рождения.</p>

        <br>

        <p class="description">Например:</p>
        <p class="datebirth">Дата рождения 17.01.1978</p>
        <p class="description">Один ноль в дате рождения.</p>

        <br>

        <p class="description">Далее идет описание в соответствии с количеством нулей в дате рождения. По отсутствию нуля в дате рождения также даётся описание.</p>
    </div>','basic'),

    ('dateBirth_year_programm',
    '<p>Год рождения неизменен, он оказывает вибрирующее влияние на судьбу человека со времени его рождения и относится к родовой программе. Число года рождения раскрывает унаследованные черты человека, заключающиеся в его способности управлять обстоятельствами, и является его направляющим фактором.</p>',
    '<p class="cmp-modal__title">Расчет родовой программы</p>
    <div class="content">
        <p class="description">Все числа года рождения суммируются и сводятся к однозначному числу, которое будет являться числовым кодом родовой программы.</p>

        <br>

        <p class="description">Например:</p>

        <br>

        <ul class="ul calc">
            <li><span class="text_pastel">Год рождения 1987</span></li>
            <li>1987 = 1 + 9 + 8 + 7 = 25 = 7</li>
            <li>Числовой код родовой программы -7</li>
        </ul>
    </div>','basic'),

    ('dateBirth_day_number',
    '<p>Число дня рождения возникает в момент рождения человека и оказывает на него вибрирующее действие. Оно может направлять и изменять его судьбу, усиливать или ослабевать своё влияние за счет других окружающих чисел.</p>',
    '<p class="cmp-modal__title">Расчет числа дня рождения</p>
    <div class="content">
        <p class="description">Число дня рождения возникает в момент рождения человека и оказывает на него вибрирующее действие. Оно может направлять и изменять его судьбу, усиливать или ослабевать своё влияние за счет других окружающих чисел.</p>

        <br>

        <p class="description">Например: </p>

        <br>

        <ul class="ul calc">
            <li><span class="text_pastel">Дата рождения 03.05.1988</span></li>
            <li>Число дня рождения – 3</li>
        </ul>

        <br>

        <ul class="ul calc">
            <li><span class="text_pastel">Дата рождения 15.06.1998</span></li>
            <li>Число дня рождения – 15</li>
        </ul>

        <p class="description">По числу дается описание...</p>
    </div>','basic'),

    ('dateBirth_codes',
    '<p>Числовой код даты рождения несет определённую информацию о Вас и позволяет определить влияние каждой цифры, входящую в Вашу дату.</p>
    <p>Чем больше в дате рождения у Вас одинаковых цифр, тем более сильное влияние они на Вас будут оказывать.</p>',
    '<p class="cmp-modal__title">Расчет числового кода</p>
    <div class="content">
        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения 17.01.1978</p>

        <ul class="ul note">
            <li>Числовой код «Ноль» - описание</li>
            <li>Числовой код «Один» - описание</li>
            <li>Числовой код «Семёрка» - описание</li>
            <li>Числовой код «Восьмёрка» - описание</li>
            <li>Числовой код «Девятка» - описание</li>
        </ul>
    </div>','basic'),

    ('name_number',
    '<p>Имя, фамилия и отчество - это Ваша личность. Ваше Число полного Имени, определяет направление Вашей жизни. Это личный код Ваших возможностей. При смене фамилии, имени или отчества Число полного Имени меняется, и с ним меняется Ваша личность.</p>',
    '<p class="cmp-modal__title">Как рассчитать Число полного Имени</p>
    <div class="content">
        <p class="description">Чтобы вычислить ФИО – код возможностей, нужно:</p>

        <ul class="ul">
            <li><span class="text_pastel">1. </span>Перевести буквы фамилии в числа, сложить эти числа между собой и привести результат к однозначному числу.</li>
            <li><span class="text_pastel">2. </span>Перевести буквы имени в числа, сложить эти числа между собой и привести результат к однозначному числу.</li>
            <li><span class="text_pastel">3. </span>Перевести буквы отчества в числа, сложить эти числа между собой и привести результат к однозначному числу.</li>
            <li><span class="text_pastel">4. </span>Сложить полученные результаты и привести общий результат  к однозначному числу.</li>
        </ul>

        <table class="table">
            <thead>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>А</td>
                    <td>Б</td>
                    <td>В</td>
                    <td>Г</td>
                    <td>Д</td>
                    <td>Е</td>
                    <td>Ё</td>
                    <td>Ж</td>
                    <td>З</td>
                </tr>
                <tr>
                    <td>И</td>
                    <td>Й</td>
                    <td>К</td>
                    <td>Л</td>
                    <td>М</td>
                    <td>Н</td>
                    <td>О</td>
                    <td>П</td>
                    <td>Р</td>
                </tr>
                <tr>
                    <td>С</td>
                    <td>Т</td>
                    <td>У</td>
                    <td>Ф</td>
                    <td>Х</td>
                    <td>Ц</td>
                    <td>Ч</td>
                    <td>Ш</td>
                    <td>Щ</td>
                </tr>
                <tr>
                    <td>Ъ</td>
                    <td>Ы</td>
                    <td>Ь</td>
                    <td>Э</td>
                    <td>Ю</td>
                    <td>Я</td>
                </tr>
            </tbody>
        </table>

        <p class="description">Например:</p>

        <ul class="ul calc">
            <li>Иванова</li>
            <li>1 + 3 + 1+ 6 + 3 + 1 = 15 = 1 + 5 = 6</li>
        </ul>

        <ul class="ul calc">
            <li>Наталья</li>
            <li>6 + 1 + 2 + 1 + 4 + 3 + 6 = 23 = 2 + 3 = 5</li>
        </ul>

        <ul class="ul calc">
            <li>Владимировна</li>
            <li>3 + 4 + 1 + 5 + 1 + 5 + 1 + 9 + 7 + 3 + 6 + 1= 46 = 4 + 6 = 10 = 1 + 0 = 1</li>
        </ul>

        <ul class="ul calc">
            <li>Складываем все числа</li>
            <li>6 + 5 + 1 = 12 = 1 + 2 = 3</li>
            <li>Число полного Имени (кода возможности) - 3</li>
        </ul>

        <p class="description">В соответствии с полученным результатом, дается описание Числа Полного Имени (кода возможности).</p>
    </div>','basic'),

    ('dateBirth_year_cycle',
    '<p>С точки зрения нумерологии человеческая жизнь протекает через смену девятилетних циклов. У каждого цикла есть своё число и, следовательно, присущая ему энергия. Поэтому важно учитывать не только дату рождения, но и знать, в каком цикле Вы находитесь.</p>
    <p>Ваши личные годовые циклы начинаются с рождения и продолжаются один за другим в течение девяти лет, а затем повторяются снова. Задачи этих циклов остаются те же, но уроки уже меняются.</p>
    <p>Каждый цикл длится один год и имеет свое значение. Благодаря циклу можно понять, что и почему у Вас происходит в данное время, какие задачи Вам предстоит выполнить, какие уроки пройти, на что нужно обратить внимание, чтобы прожить этот год в гармонии с собой.</p>
    <p>Узнав свой персональный цикл пребывания на текущий год, Вы сможете расставить приоритеты, понять возможности и перспективы этого периода и определить дальнейшее направление для себя.</p>',
    '<p class="cmp-modal__title">Расчет годовых циклов</p>
    <div class="content">
        <p class="description">Для того чтобы определить персональный годовой цикл, необходимо:</p>
        <ul class="ul">
            <li><span class="text_pastel">1. </span>Сложить все числа даты рождения и привести результат к однозначному значению.</li>
            <li><span class="text_pastel">2. </span>Сложить все числа текущего года и привести результат к однозначному значению.</li>
            <li><span class="text_pastel">3. </span>Cложить полученные значения 1-го и 2-го числа и привести результат к однозначному значению.</li>
        </ul>

        <p class="description">Важно учитывать, что годовой цикл начинается со дня рождения, а не с календарного года! До наступления дня рождения у Вас идёт предыдущий цикл.</p>

        <ul class="ul calc">
            <li>Например:</li>
            <li>Дата Ваша рождения 01.02.1991</li>
            <li>Текущий год 2021 </li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">1 число </span> — это сумма всех цифр даты рождения.</li>
            <li>0+1+0+2+1+9+9+1=23=2+5=5</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">2 число </span> — это сумма всех цифр текущего года.</li>
            <li>2+0+2+1=5</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">3 число </span> — это сумма первого и второго числа.</li>
            <li>5+5=10=1+0= 1</li>
        </ul>

        <p class="description">Первый персональный годовой цикл.</p>

        <p class="description">Далее даётся описание по циклу.</p>
    </div>','premium'),

    ('dateBirth_soul_number',
    '<p>Число Души – это индивидуальный показатель человека, владея которым легко можно понять свою роль в жизни, свои предпочтения, свою силу и свои слабости.</p>
    <p>Каждое число Души находится под управлением определённой планеты, которая наделяет человека некими качествами.</p>
    <p>Число Души крайне важно человеку, так как оно воздействует приблизительно на его первую половину жизни, очерчивая круг возможностей и перспектив.</p>
    <p>Особенно сильное влияние оно оказывает до 35 лет. После этого возраста, его влияние несколько ослабевает и в приоритет выходит влияние числа Судьбы.</p>',
    '<p class="cmp-modal__title">Расчет числа Души</p>
    <div class="content">
        <p class="description">Число Души определяется по дню рождения человека.</p>

        <p class="description">Если человек родился с 1 по 9 число, то число Души будет соответствовать этой цифре.</p>

        <p class="description">Если человек родился с 10 по 31 число, то нужно двузначное число сложить и привести его к однозначному значению.</p>

        <p class="description">Например</p>

        <ul class="ul calc">
            <li>Если человек родился 3 числа, то его число Души будет 3.</li>
        </ul>

        <ul class="ul calc">
            <li>Если человек родился 15 числа, то его число Души будет 6</li>
            <li>1 + 5 = 6</li>
        </ul>

        <ul class="ul calc">
            <li>Если человек родился 28 числа, то его число Души будет 1.</li>
            <li>2 + 8 = 10 = 1 + 0 =1</li>
        </ul>

        <ul class="ul calc">
            <li>Если человек родился 31 числа, то его число Души будет 4</li>
            <li>3 + 1 = 4</li>
        </ul>

        <p class="description">То есть мы упрощаем (редуцируем) до тех пор, пока не получится однозначное простое число.</p>

        <ul class="ul note">
            <li>Число Души 1 имеют все, кто родился 1, 10, 19, 28 числа любого месяца.</li>
            <li>Число Души 2 имеют все, кто родился 2, 11, 20, 29 числа любого месяца.</li>
            <li>Число Души 3 имеют все, кто родился 3, 12, 21,30 числа любого месяца.</li>
            <li>Число Души 4 имеют все, кто родился числа 4, 13, 22, 31 числа любого месяца.</li>
            <li>Число Души 5 имеют все, кто родился числа 5, 14. 23 числа любого месяца.</li>
            <li>Число Души 6 имеют все, кто родился числа 6, 15, 24 числа любого месяца.</li>
            <li>Число Души 7 имеют все, кто родился числа 7, 16, 25 числа любого месяца.</li>
            <li>Число Души 8 имеют все, кто родился числа 8, 17, 26 числа любого месяца.</li>
            <li>Число Души 9 имеют все, кто родился числа 9, 18 или 27 числа любого месяца.</li>
        </ul>
    </div>','basic'),

    ('dateBirth_fate_number',
    '<p>Число Судьбы – это кармические задачи данного воплощения человека и его предназначение, то, к чему каждый должен прийти, к чему нужно стремиться. Число Судьбы обычно «включается» во второй половине жизни, после 36–40 лет. Поскольку человек в течение жизни набирается опыта, развивается, его характер и судьба должны меняться вместе с ним. Поэтому и существует Число Судьбы, направляющее человека к цели, для которой он родился.</p>
    <p>Для людей, которые не занимаются саморазвитием и всю жизнь остаются на месте, Число Судьбы – это только мечта, кармическое задание, которое может остаться нереализованным в текущей жизни человека. Ему придется родиться заново с тем же числом, но в следующий раз это уже будет для него Числом Души – той отправной точкой, с которой он начнёт следующую жизнь.</p>
    <p>Если человек развивается, то ко второй половине жизни он начнет чувствовать не только внутренние изменения, но и внешние. Люди начнут его видеть больше по его Числу Судьбы, а не Числу Души.</p>
    <p>Одинаковые Число Души и Число Судьбы указывают на то, что человек не понял и не выполнил кармических задач данного числа, и во второй половине жизни у него появляется шанс исправить ситуацию и начать соответствовать тем качествам и кармическим задачам, на которые указывают его числа Души и Судьбы.</p>
    <p>Есть люди, которые не узнают себя ни в Числе Души, ни в Числе Судьбы. Так бывает, потому что, скорее всего, человек себя еще до конца не узнал, и впереди у него большая работа по раскрытию своих талантов, характера и нахождению себя. В таком случае числа Души и Судьбы – это только интерпретация возможностей. А будет ли человек их использовать и захочет ли он увидеть себя таким, какой он есть, зависит только от него самого.</p>',
    '<p class="cmp-modal__title">Расчет числа судьбы</p>
    <div class="content">
        <p class="description">Число Судьбы определяется по дате рождения человека.</p>

        <p class="description">Для того чтобы узнать Число Судьбы, необходимо произвести следующий расчет:</p>

        <p class="description">Сложить все числа даты рождения и привести результат к однозначному значению.</p>

        <p class="description">Например:</p>

        <p class="datebirth">Дата рождения: 24.05.1990</p>

        <ul class="ul calc">
            <li>ЧС = 2 + 4 + 0 + 5 + 1 + 9 + 9 + 0 = 30 = 3 + 0 = 3</li>
            <li>Число Судьбы = 3</li>
        </ul>
    </div>','basic'),

    ('comp_numbers_pairs',
    '<p>Каждая встреча в нашей жизни не случайна. С помощью нумерологии можно узнать не только цель встречи с любимым человеком, но и чему вы вместе должны научиться в этой жизни.</p>',
    '<p class="cmp-modal__title">Расчет чисела пары</p>
    <div class="content">
        <p class="description">Узнав Число Пары, можно понять, для чего Вы встретились, и что Вас ожидает с партнером.</p>
        <p class="description">Для этого нужно произвести следующий расчет:</p>

        <ul class="ul calc">
            <li>1-ое Число - сложить все числа даты рождения женщины и привести результат к однозначному значению.</li>
            <li>2-ое Число - сложить все числа даты рождения мужчины и привести результат к однозначному значению.</li>
        </ul>

        <p class="description">Число Пары - сложить оба числа партнеров и привести результат к однозначному значению.</p>

        <ul class="ul">
            <li>Дата рождение женщины: 15.08.1981</li>
            <li>Дата рождения мужчины: 17.01.1978</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">1 Число </span>— это сумма всех цифр даты рождения женщины.</li>
            <li>1 + 5 + 0 + 8 + 1 + 9 + 8 +1 =  33= 3 + 3 = 6</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">2 Число </span>— это сумма всех цифр даты рождения мужчины.</li>
            <li>1 + 7 + 0 + 1 + 1 + 9 + 7 + 8 = 34 = 3 + 4 = 7</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">Число Пары </span> — это сумма чисел партнеров.</li>
            <li>6 + 7 = 13 = 4 – Число Пары 4</li>
        </ul>

        <p class="description">По полученному результату даётся описание Числа Пары.</p>
    </div>','premium'),

    ('comp_karm_types',
    '<p>Существуют три вида партнеров. Это кармические любовники, кармические кредиторы и кармические учителя.</p>
    <p>Кармические любовники – это партнеры, с которыми у Вас будет любовь, взаимопонимание и страстные отношения.</p>
    <p>Кармические кредиторы – это партнеры, во взаимоотношениях с которыми Вы будете друг другу что-то должны. Вам нужно будет пройти урок и закрыть долг.</p>
    <p>Кармические учителя – это партнеры, во взаимоотношениях с которыми Вы будете друг друга чему-то учить и чему-то учиться.</p>',
    '<p class="cmp-modal__title">Расчет кармич. отношений</p>
    <div class="content">
        <p class="decscription">Для того, чтобы вычислить вид Вашего партнерства, необходимо:</p>

        <ul class="ul">
            <li><span class="text_pastel">1. </span>Сложить все числа даты рождения первого партнера и привести результат к однозначному значению.</li>
            <li><span class="text_pastel">2. </span>Сложить все числа даты рождения первого партнера и привести результат к однозначному значению.</li>
            <li><span class="text_pastel">3. </span>Сложить полученные значения 1 и 2 числа и привести результат к однозначному значению.</li>
            <li><span class="text_pastel">4. </span>Исходя из полученного результата, определить вид партнерства.</li>
        </ul>

        <br>

        <p class="description">Например:</p>

        <ul class="ul">
            <li>1 Партнер дата рождения 14.06.2000</li>
            <li>2 Партнер дата рождения 01.12.1996</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">1 число</span> — это сумма всех цифр даты рождения 1 партнера.</li>
            <li>1 + 4 + 0 + 6 + 2 + 0 + 0 + 0 = 13 = 1 + 3 = 4</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">2 число</span> — это сумма всех цифр даты рождения 2 партнера.</li>
            <li>0 + 1 + 1 + 2 +1 + 9 + 9 + 6 = 29 = 2 + 9 = 11 = 1 + 1 = 2</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">3 число</span> — это сумма чисел первого и второго партнеров.</li>
            <li>4 + 2 = 6</li>
        </ul>

        <p class="description">6 - эти партнеры являются кармическими любовниками.</p>

        <p class="description">На основании полученного результата даётся описание партнерства.</p>

        <p class="description">Вид партнерства на основании общего числа:</p>

        <ul class="ul note">
            <li>Кармические любовники: общее число 2, 3, 6.</li>
            <li>Кармические кредиторы: общее число 4, 7, 8.</li>
            <li>Кармические учителя: общее число 1, 5, 9.</li>
        </ul>
    </div>','premium'),

    ('comp_number_fate',
    '<p>Благодаря уникальному Числу Судьбы, которое дано каждому человеку с рождения, можно узнать нумерологическую совместимость. Зная все тонкости своего числа и числа Вашего партнера, можно определить дальнейшую судьбу Ваших отношений.</p>',
    '<p class="cmp-modal__title">Расчет совместимости по числу судьбы</p>
    <div class="content">
        <p class="description">Благодаря уникальному Числу Судьбы, которое дано каждому человеку с рождения, можно узнать нумерологическую совместимость. Зная все тонкости своего числа и числа Вашего партнера, можно определить дальнейшую судьбу Ваших отношений.</p>

        <ul class="ul">
            <li>1 Число Судьбы - сложить все числа даты рождения женщины и привести результат к однозначному значению. </li>
            <li>2 Число Судьбы - сложить все числа даты рождения мужчины и привести результат к однозначному значению.</li>
            <li>Совместимость - по полученным результатам посмотреть Совместимость Ваших Чисел Судьбы.</li>
        </ul>

        <br>

        <p class="description">Например:</p>

        <ul class="ul">
            <li>Дата рождение женщины: 15.08.1981</li>
            <li>Дата рождения мужчины: 17.01.1978</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">1 Число Судьбы </span>— это сумма всех цифр даты рождения женщины.</li>
            <li>1 + 5 + 0 + 8 + 1+ 9 + 8 +1 = 33 = 3 + 3 = 6</li>
        </ul>

        <ul class="ul calc">
            <li><span class="text_pastel">2 Число Судьбы </span>— это сумма всех цифр даты мужчины.</li>
            <li>1 + 7 + 0 + 1 + 1 + 9 + 7 + 8 = 34 = 3 + 4 = 7</li>
        </ul>

        <ul class="ul calc">
            <li><span class="pastel_text">Совместимость </span>— ЧС 6 с ЧС 7</li>
        </ul>

        <p class="description">Далее даётся описание согласно полученному расчёту.</p>
    </div>','premium'),

    ('comp_unions',
    '<p>В нумерологии существует три вида союзов: Кармический, Судьбовой и Зеркальный. У каждого союза свои характеристики.</p>
    <p>Союзы показывают взаимодействие партнеров в браке, с какими трудностями и сложностями они могут столкнуться, на что стоит обратить внимание.</p>',
    '<p class="cmp-modal__title">Расчет союза</p>
    <div class="content">
        <p class="description">Вид союза определяется по психотипам. Психотип определяется после расчета психоматрицы путем подсчета единиц и двоек.</p>

        <ul class="ul">
            <li><span class="text_pastel">1 психотип </span>- единиц больше, чем двоек;</li>
            <li><span class="text_pastel">2 психотип </span>- двоек больше, чем единиц;</li>
            <li><span class="text_pastel">3 психотип </span>- равное количество двоек и единиц. </li>
        </ul>

        <br>

        <p class="description">Союзы</p>

        <ul class="ul note">    
            <li><span class="text_pastel">Зеркальный союз </span>- это союз 1 и 1, 2 и 2, 3 и 3 психотипа.</li>
            <li><span class="text_pastel">Кармический союз </span>- это союз 3 и 1, 3 и 2 психотипа.</li>
            <li><span class="text_pastel">Судьбовой союз </span> - это союз 1 и 2, 2 и 1 психотипа.</li>
        </ul>

        <br>

        <p class="description">Например:</p>

        <ul class="ul">
            <li>1 Партнер дата рождения 14.06.2000</li>
            <li>2 Партнер дата рождения 01.12.1996</li>
        </ul>

        <p class="description">У 1 Партнера, рождённого 14.06.2000 - 3 психотип (количество единиц равно количеству двоек).</p>

        <div class="cmp-matrix">
            <div class="cmp-matrix__wrap">
                <div class="cmp-matrix__item">
                    <span>11</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>44</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>22</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>5</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>33</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>6</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>9</span>
                </div>
            </div>
        </div>

        <p class="description">У 2 Партнера, рождённого 01.12.1996 - 1 психотип (количество единиц больше, чем количество двоек).</p>

        <div class="cmp-matrix">
            <div class="cmp-matrix__wrap">
                <div class="cmp-matrix__item">
                    <span>111</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>4</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>7</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>22</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>5</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>-</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>33</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>6</span>
                </div>
                <div class="cmp-matrix__item">
                    <span>9</span>
                </div>
            </div>
        </div>

        <p class="description">У данный пары Кармический союз 3 и 1 психотипа.</p>

        <p class="description">На основании полученного результата даётся описание вида союза.</p>
    </div>','premium'),

    ('psychomatrix_psychotype','','','basic');