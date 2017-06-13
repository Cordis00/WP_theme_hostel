<?php get_header(); ?>

<!--header-form-->
<div class="header-form">
    <div class="header-form__wrap">
        <div class="header-form__left">
            <img src="<?php echo get_template_directory_uri() ?> /img/header-form__image.png" alt="" class="header-form__image">
        </div>
        <!-- <?php dynamic_sidebar('sidebar-1'); ?> -->
        <div class="header-form__right">
            <div class="form-main">
                <h3 class="form-main__title"><?php pll_e('Reservation'); ?></h3>
                <p class="form-main__caption"><?php pll_e('Description'); ?></p>

                <form action="main">
                    <div class="form-main__group form-main__group_calendar">
                        <input type="text" class="form-main__field" placeholder="<?php pll_e('Data_on'); ?>">
                    </div>

                    <div class="form-main__group form-main__group_calendar">
                        <input type="text" class="form-main__field" placeholder="<?php pll_e('Data_off'); ?>">
                    </div>

                    <div class="form-main__group form-main__group_num-block">
                        <div class="num-block js-num-block">
                            <span class="num-block__caption"><?php pll_e('Guest_amount'); ?></span>
                            <div class="num-block__wrap">
                                <a href="" class="num-block__minus"></a>
                                <input type="text" class="num-block__field" value="1">
                                <a href="" class="num-block__plus"></a>
                            </div>
                        </div>
                    </div>

                    <div class="form-main__button-wrap">
                        <button type="submit" class="form-main__button"><span><?php pll_e('Reservation_btn'); ?></span></button>
                        <span class="form-main__button-caption"><?php pll_e('Sidebar_under'); ?></span>
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
     query_posts('cat=39');
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
            <figcaption class="comments__caption"><?php pll_e('Free_transport'); ?></figcaption>
        </figure>
        <!--left img-->

        <!--comments-slider-->
        <div class="comments__slider">

            <div class="comment-slider">
                <h3 class="comment-slider__title"><?php pll_e('Comments'); ?></h3>

                <!--slider-->
                <div class="js-comment-slider">
                    <?php if ( have_posts() ) :
                      query_posts('cat=37');
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
          query_posts('cat=33');
            while ( have_posts() ) : the_post(); ?>
        <a href="" class="cube">
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
            <h2 class="b-title__title"><?php pll_e('Poster_header'); ?></h2>
            <p class="b-title__caption"><?php pll_e('Poster_description'); ?></p>
        </div>

        <?php if ( have_posts() ) :
          query_posts('cat=35');
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

<?php get_footer(); ?>
