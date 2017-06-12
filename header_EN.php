<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>gulp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php wp_head(); ?>
    <script type="text/javascript"
 +    src="<?php bloginfo("template_url"); ?>/js/libs.min.js"></script>
</head>

<body>
    <div class="mainwrapper">

        <div class="bg-top">
            <!--header-->
            <div class="header">
                <div class="header__wrap">
                    <?php the_custom_logo(); ?>
                    <nav class="header__nav">
                      <?php
                        wp_nav_menu(array(
                          'theme_location' => 'primary_en',
                          'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
                          'menu_class' => 'header__nav-size',
                          'menu_id' => '',
                          'depth' => 1
                        ));
                       ?>
                    </nav>
                    <div class="header__right">
                        <?php
                          wp_nav_menu(array(
                            'theme_location' => 'language',
                            'items_wrap' => '<span id="%1$s" class="%2$s">%3$s</span>',
                            'menu_class' => 'language',
                            'menu_id' => '',
                            'depth' => 1
                          ));
                         ?>
                        <a href="javascript:openmodal('consult');" class="header__button"><span>Ask a Question</span></a>
                        <a href="tel:79221551555" class="header__phone"><?php echo get_theme_mod('header_products'); ?></a>
                    </div>

                </div>
            </div>
            <!--header-->
