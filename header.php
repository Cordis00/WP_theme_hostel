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
                    <!-- <a href="#" class="header__logo">

                    </a> -->
                    <?php the_custom_logo(); ?>
                    <nav class="header__nav">
                      <?php
                        wp_nav_menu(array(
                          'theme_location' => 'primary',
                          'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
                          'menu_class' => 'header__nav-size',
                          'menu_id' => '',
                          'depth' => 1
                        ));
                       ?>
                    </nav>
                    <div class="header__right">
                        <a href="tel:79221551555" class="header__phone"><?php echo get_theme_mod('header_products'); ?></a>
                        <a href="javascript:openmodal('consult');" class="header__button"><span>Задать вопрос</span></a>
                    </div>

                </div>
            </div>
            <!--header-->
