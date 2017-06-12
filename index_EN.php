<?php
/*
Template Name: index_EN
*/
?>
<?php include ('header_EN.php'); ?>

<!--header-form-->
<div class="header-form">
    <div class="header-form__wrap">
        <div class="header-form__left">
            <img src="<?php echo get_template_directory_uri() ?> /img/header-form__image.png" alt="" class="header-form__image">
        </div>
        <!-- <?php dynamic_sidebar('sidebar-1'); ?> -->
        <div class="header-form__right">
            <div class="form-main">
                <h3 class="form-main__title"><?php echo get_theme_mod('sidebar_header_en'); ?></h3>
                <p class="form-main__caption"><?php echo get_theme_mod('sidebar_caption_en'); ?></p>

                <form action="main">
                    <div class="form-main__group form-main__group_calendar">
                        <input type="text" class="form-main__field" placeholder="Arrival date">
                    </div>

                    <div class="form-main__group form-main__group_calendar">
                        <input type="text" class="form-main__field" placeholder="Date of departure">
                    </div>

                    <div class="form-main__group form-main__group_num-block">
                        <div class="num-block js-num-block">
                            <span class="num-block__caption">Number of Guests</span>
                            <div class="num-block__wrap">
                                <a href="" class="num-block__minus"></a>
                                <input type="text" class="num-block__field" value="1">
                                <a href="" class="num-block__plus"></a>
                            </div>
                        </div>
                    </div>

                    <div class="form-main__button-wrap">
                        <button type="submit" class="form-main__button"><span>Reservation</span></button>
                        <span class="form-main__button-caption">Online Booking System</span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--header-form-->

<!--block-circle-->
<div class="circles">
  <div class="circles__wrap">
   <?php if ( have_posts() ) :
     query_posts('cat=12');
       while ( have_posts() ) : the_post(); ?>
        <div class="circles__cell">
           <figure class="circles__figure">
             <?php the_post_thumbnail(); ?>
           </figure>
           <b class="circles__title"> <?php the_title(); ?> </b>
           <p class="circles__text">
             <?php the_content(); ?>
           </p>
        </div>
       <?php endwhile; ?>
     <?php endif; ?>
   <?php wp_reset_query(); ?>
 </div>
<!--block-circle-->
</div>

<!--bg-middle-->
<div class="bg-middle">
<!--block-comment-->
<div class="comments">
    <div class="comments__wrap">
        <!--left img-->
        <figure class="comments__image">
            <img src="<?php echo get_template_directory_uri() ?> /img/comments__img.png" alt="" class="comments__img">
            <figcaption class="comments__caption">Free <br> transfer</figcaption>
        </figure>
        <!--left img-->

        <!--comments-slider-->
        <div class="comments__slider">

            <div class="comment-slider">
                <h3 class="comment-slider__title">Reviews</h3>

                <!--slider-->
                <div class="js-comment-slider">
                    <?php if ( have_posts() ) :
                      query_posts('cat=13');
                        while ( have_posts() ) : the_post(); ?>
                        <div class="comment">
                          <p class="comment__text"><?php the_content(); ?></p>
                          <b class="comment__author"><?php the_title(); ?></b>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  <?php wp_reset_query(); ?>
                </div>
                <!--slider-->

            </div>
        </div>
        <!--comments-slider-->

    </div>
</div>
<!--block-comment-->


<!--cubes-->
<div class="cubes">
    <div class="cubes__wrap">
        <!--cube-->
        <?php if ( have_posts() ) :
          query_posts('cat=14');
            while ( have_posts() ) : the_post(); ?>
        <a href="" class="cube cube1">
            <div class="cube__visible">
                <div class="cube__figure">
                    <?php the_post_thumbnail(); ?>
                </div>
                <span class="cube__text-wrap">
                    <b class="cube__text"> <?php the_title(); ?> </b>
                </span>
            </div>
            <div class="cube__hidden">
                <p class="cube__caption"> <?php the_content(); ?> </p>
            </div>
        </a>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php wp_reset_query(); ?>
        <!--cube-->
    </div>
</div>
<!--cubes-->


<!--rooms-->
<div class="b-preview">
    <div class="b-preview__wrap">

        <div class="b-title">
            <h2 class="b-title__title"><?php echo get_theme_mod('caption_en'); ?></h2>
            <p class="b-title__caption"><?php echo get_theme_mod('invitation_en'); ?></p>
        </div>

        <?php if ( have_posts() ) :
          query_posts('cat=15');
            while ( have_posts() ) : the_post(); ?>
            <div class="b-preview__cell">
                <div class="image-post">
                    <figure class="image-post__figure">
                      <?php the_post_thumbnail(poster); ?>
                    </figure>
                    <div class="image-post__wrap">
                        <b class="image-post__title"><?php the_title(); ?></b>
                        <p class="image-post__text"><?php the_content(); ?></p>
                    </div>
               </div>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div>
</div>
<!--rooms-->

<?php include ('footer_EN.php'); ?>
