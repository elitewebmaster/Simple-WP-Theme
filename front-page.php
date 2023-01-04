<?php get_header(); ?>

<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
?>            
            <div class="post">
                <span class="post-category"><?php the_category(); ?></span>
                <a class="post-link" href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <img src="<?php the_post_thumbnail_url('full') ?>" alt="" />
                </a>
                <p>
                    <?php
                        the_content();
                    ?>
                </p>
            </div>
<?php            
        }
    }
?>
  
<?php get_footer(); ?>



