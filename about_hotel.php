<?php
/*
Template Name: about_hotel
*/
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>gulp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="mainwrapper">

        <div class="bg-top">

            <!--page-header-->
            <div class="header-rl">
                <div class="page-header">
                    <div class="page-header__wrap">
                        <div class="page-header__left">
                            <b class="page-header__title">Бронирование номера</b>
                            <p class="page-header__caption">Гарантия лучшей цены в <br>нашей гостинице</p>
                        </div>
                        <div class="page-header__right">
                            <form action="js">
                                <div class="page-header__form">
                                    <div class="page-header__form-wrap">
                                        <div class="sl-field">
                                            <input type="text" required class="sl-field__fr sl-field_calendar" placeholder="Дата заезда">
                                        </div>
                                    </div>
                                    <div class="page-header__form-wrap">
                                        <div class="sl-field">
                                            <input type="text" required class="sl-field__fr sl-field_calendar" placeholder="Дата выезда">
                                        </div>
                                    </div>
                                    <div class="page-header__form-wrap">
                                        <div class="sl-num">
                                            <div class="num-block js-num-block">
                                                <span class="num-block__caption">Количество гостей</span>
                                                <div class="num-block__wrap">
                                                    <a href="" class="num-block__minus"></a>
                                                    <input type="text" class="num-block__field" value="1" maxlength="2">
                                                    <a href="" class="num-block__plus"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-header__form-wrap">
                                        <button type="submit" class="sl-button"><span>Забронировать</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--nav-line-->
                <div class="nav-line">
                    <div class="nav-line__wrap">
                        <div class="nav-line__left"></div>
                        <div class="nav-line__right">

                            <!--right-wrap-->
                            <div class="nav-line__nc-wrap">
                                <!--navigation-->
                                <div class="nav-line__nav">
                                    <nav class="head-nav">
                                        <ul class="head-nav__list">
                                            <li>
                                                <a href="" class="head-nav__link head-nav__link_has-submenu">О Гостинице</a>
                                                <ul class="head-nav__hidden-list">
                                                    <li>
                                                        <a href="" class="head-nav__hidden-link">История гостиницы</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="head-nav__hidden-link">Команда</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="head-nav__hidden-link">Качество услуг</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="" class="head-nav__link">Номера и цены</a>
                                            </li>
                                            <li>
                                                <a href="" class="head-nav__link">Фотогалерея</a>
                                            </li>
                                            <li>
                                                <a href="" class="head-nav__link">Услуги</a>
                                            </li>
                                            <li>
                                                <a href="" class="head-nav__link">Как проехать</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!--navigation-->
                                <!--address-->
                                <div class="nav-line__address">
                                    <a href="tel:+79221551555" class="nav-line__tel">+7 922 155-155-5</a>
                                    <a href="javascript:openmodal('consult');" class="nav-line__question">Задать вопрос</a>
                                </div>
                                <!--address-->
                            </div>
                            <!--right-wrap-->

                        </div>
                    </div>
                </div>
                <!--nav-line-->

                <!--mobile-header-->
                <div class="mobile-header">
                    <a href="" class="mobile-header__open-nav js-open-mobile-nav"><span></span></a>
                    <a href="" class="mobile-header__logo ">Дом Моряка</a>
                    <div class="mobile-header__right ">
                        <a href="tel:+79221551555" class="mobile-header__phone"></a>
                        <a href="javascript:openmodal('consult');" class="mobile-header__help"></a>
                        <a href="javascript:openmodal('mobile-form');" class="mobile-header__form"></a>
                    </div>
                </div>
                <!--mobile-header-->

                <!--float-menu-->
                <div class="mobile-menu">
                    <div class="js-cloned-menu"></div>
                </div>
                <!--float-menu-->

                <!--mobile-form-->
                <div class="modal-window" id="mobile-form">
                    <span class="mobile-form-title">Бронирование номера</span>

                    <form action="js">

                        <div class="sl-field sl-field_with-margin">
                            <input type="text" required class="sl-field__fr sl-field_calendar" placeholder="Дата заезда">
                        </div>

                        <div class="sl-field sl-field_with-margin">
                            <input type="text" required class="sl-field__fr sl-field_calendar" placeholder="Дата выезда">
                        </div>

                        <div class="sl-num sl-field_with-margin">
                            <div class="num-block js-num-block">
                                <span class="num-block__caption">Количество гостей</span>
                                <div class="num-block__wrap">
                                    <a href="" class="num-block__minus"></a>
                                    <input type="text" class="num-block__field" value="1" maxlength="2">
                                    <a href="" class="num-block__plus"></a>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="sl-button"><span>Забронировать</span></button>

                    </form>
                </div>
                <!--mobile-form-->
            </div>
            <!--page-header-->

            <!--nrcr-block-->
            <div class="ncr-block">
                <div class="ncr-block__wrap">
                    <div class="ncr-block__left">
                        <a href="" class="ncr-block__logo"><img src="img/logo.png" alt=""></a>
                    </div>
                    <div class="ncr-block__right">

                        <a href="" class="link-back">&larr; Вернуться назад</a>
                        <div class="text-format">
                            <h1>О Гостинице</h1>

                            <p>
                                Запад Краснодарского края занимает Таманский полуостров, выдвинутый в акваторию двух морей. С севера он омывается Азовским морем, самым комфортным для отдыха с детьми, т.к. из за небольшой глубины оно быстро прогревается и курортный сезон можно начинать
                                уже с мая. С юга, полуостров, омывается Чёрным морем. На западе - Керченский пролив соединяет Азовское и Чёрное моря. Такое разнообразие ландшафта - удачное сочетание географических закономерностей.
                            </p>

                            <p>
                                Помимо самого Азовского моря, отелей, гостиниц и другого рода центров летнего отдыха на Таманском полуострове насчитывается около тридцати грязевых вулканов, которые превращают полуостров в самый настоящий санаторно-лечебный курорт. Пансионат «Тиздар»
                                славится одним из таких лечебных вулканов, расположенных на территории гостиничного комплекса и является по истине чудом природы.
                            </p>

                            <p>
                                Запад Краснодарского края занимает Таманский полуостров, выдвинутый в акваторию двух морей. С севера он омывается Азовским морем, самым комфортным для отдыха с детьми, т.к. из за небольшой глубины оно быстро прогревается и курортный сезон можно начинать
                                уже с мая. С юга, полуостров, омывается Чёрным морем. На западе - Керченский пролив соединяет Азовское и Чёрное моря. Такое разнообразие ландшафта - удачное сочетание географических закономерностей.
                            </p>

                            <p>
                                Помимо самого Азовского моря, отелей, гостиниц и другого рода центров летнего отдыха на Таманском полуострове насчитывается около тридцати грязевых вулканов, которые превращают полуостров в самый настоящий санаторно-лечебный курорт. Пансионат «Тиздар»
                                славится одним из таких лечебных вулканов, расположенных на территории гостиничного комплекса и является по истине чудом природы.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <!--nrcr-block-->

            <!--block-circle-->
            <div class="circles circles_smart-margin">
                <div class="circles__wrap">
                    <!--circless-cell-->
                    <div class="circles__cell">
                        <figure class="circles__figure">
                            <img src="img/circles__img_1.png" class="circles__img" alt="">
                        </figure>
                        <b class="circles__title">Любовь к гостям</b>
                        <p class="circles__text">
                            Наш уютный отель на Азовском побережье отмечен 3 звёздами, и мы делаем всё, чтобы оправдать каждую из них
                        </p>
                    </div>
                    <!--circless-cell-->


                    <!--circless-cell-->
                    <div class="circles__cell">
                        <figure class="circles__figure">
                            <img src="img/circles__img_2.png" class="circles__img" alt="">
                        </figure>
                        <b class="circles__title">Нам доверяют</b>
                        <p class="circles__text">Наш уютный отель на Азовском побережье отмечен 3 звёздами, и мы делаем всё, чтобы оправдать каждую из них</p>
                    </div>
                    <!--circless-cell-->

                    <!--circless-cell-->
                    <div class="circles__cell">
                        <figure class="circles__figure">
                            <img src="img/circles__img_3.png" class="circles__img" alt="">
                        </figure>
                        <b class="circles__title">Отдых с детьми</b>
                        <p class="circles__text">Наш уютный отель на Азовском побережье отмечен 3 звёздами, и мы делаем всё, чтобы оправдать каждую из них</p>
                    </div>
                    <!--circless-cell-->

                    <!--circless-cell-->
                    <div class="circles__cell">
                        <figure class="circles__figure">
                            <img src="img/circles__img_4.png" class="circles__img" alt="">
                        </figure>
                        <b class="circles__title">Услуги гостиницы</b>
                        <p class="circles__text">Наш уютный отель на Азовском побережье отмечен 3 звёздами, и мы делаем всё, чтобы оправдать каждую из них</p>
                    </div>
                    <!--circless-cell-->

                </div>
            </div>
            <!--block-circle-->

        </div>

        <!--bg-middle-->
        <div class="bg-middle">

            <!--rooms-->
            <div class="b-preview">
                <div class="b-preview__wrap">

                    <div class="b-title">
                        <h2 class="b-title__title">Открытие летнего сезона 2017</h2>
                        <p class="b-title__caption">Приглашаем наших дорогих гостей в наши номера</p>
                    </div>

                    <!--cell-->
                    <div class="b-preview__cell">
                        <div class="image-post">
                            <figure class="image-post__figure">
                                <img src="img/demo/1.png" class="image-post__image" alt="">
                            </figure>
                            <div class="image-post__wrap">
                                <b class="image-post__title">Люкс</b>
                                <p class="image-post__text">До этого несколько лет подряд отдыхали в других гостиницах на Азовском побережье и все время было что-то не то.</p>
                                <span class="image-post__price">8 900 р.</span>
                            </div>
                        </div>
                    </div>
                    <!--cell-->

                    <!--cell-->
                    <div class="b-preview__cell">
                        <div class="image-post">
                            <figure class="image-post__figure image-post__figure_mask2">
                                <img src="img/demo/2.png" class="image-post__image" alt="">
                            </figure>
                            <div class="image-post__wrap">
                                <b class="image-post__title">Стандарт</b>
                                <p class="image-post__text">До этого несколько лет подряд отдыхали в других гостиницах на Азовском побережье и все время было что-то не то.</p>
                                <span class="image-post__price">4 500 р.</span>
                            </div>
                        </div>
                    </div>
                    <!--cell-->

                    <!--cell-->
                    <div class="b-preview__cell">
                        <div class="image-post">
                            <figure class="image-post__figure image-post__figure_mask3">
                                <img src="img/demo/3.png" class="image-post__image" alt="">
                            </figure>
                            <div class="image-post__wrap">
                                <b class="image-post__title">Эконом</b>
                                <p class="image-post__text">До этого несколько лет подряд отдыхали в других гостиницах на Азовском побережье и все время было что-то не то. </p>
                                <span class="image-post__price">3 400 р.</span>
                            </div>
                        </div>
                    </div>
                    <!--cell-->

                </div>
            </div>
            <!--rooms-->
            <div class="map">
                <div class="map__wrap">
                    <div class="map__relative">
                        <div class="map__design_top"></div>
                        <div class="map__design_left"></div>
                        <div class="map__design_right"></div>
                        <script src="https://maps.googleapis.com/maps/api/js?key=&extension=.js"></script>
                        <div id="mapkit-4515"></div>
                    </div>
                </div>
            </div>

        </div>
        <!--bg-middle-->

        <div class="modal-window" id="consult">
            <span class="modal-title">Есть вопросы? Пишите!</span>
            <form action="js">
                <div class="modal-form">

            <div class="modal-form__wrap">
                <span class="rn-label">Ваше имя</span>
                <input type="text" requitred class="rn-field">
            </div>

            <div class="modal-form__wrap">
                <span class="rn-label">Сообщение</span>
                <textarea requitred class="rn-textarea"></textarea>
            </div>

            <div class="modal-form__wrap modal-form__wrap_double">
                <div class="modal-form__captcha">
                    <div class="captcha">
                        <div class="captcha__left">
                            <span class="captcha__label">Защита от СПАМа</span>
                            <img src="img/demo/rectangle-1.jpg" alt="" class="captcha__image">
                        </div>
                        <div class="captcha__right">
                            <span class="captcha__label">Введите код с картинки</span>
                            <input type="text" requitred class="captcha__field">
                        </div>
                    </div>
                </div>
                <div class="modal-form__button-wrap">
                    <button type="submit" class="nr-button">Отправить</button>
                </div>
            </div>

        </div>
            </form>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/libs.min.js"></script>
</body>

</html>
