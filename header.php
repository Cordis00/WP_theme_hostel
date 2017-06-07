<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>gulp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php wp_head(); ?>
</head>

<body>
    <div class="mainwrapper">

        <div class="bg-top">
            <!--header-->
            <div class="header">
                <div class="header__wrap">
                    <a href="" class="header__logo">
                        <?php the_custom_logo(); ?>
                    </a>
                    <nav class="header__nav">
                        <div class="header__nav-size">
                            <a href="" class="header__nav-link">О Гостинице </a>
                            <a href="" class="header__nav-link">Номера и цены</a>
                            <a href="" class="header__nav-link">Фотогалерея</a>
                            <a href="" class="header__nav-link">Услуги</a>
                            <a href="" class="header__nav-link">Как проехать</a>
                        </div>
                    </nav>

                    <div class="header__right">
                        <a href="tel:79221551555" class="header__phone">+7 922 155-155-5 </a>
                        <a href="javascript:openmodal('consult');" class="header__button"><span>Задать вопрос</span></a>
                    </div>

                </div>
            </div>
            <!--header-->
