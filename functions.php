<?php
    function setup_theme(){
        add_theme_support("title-tag");
        add_theme_support("custom-logo");
        add_theme_support('post-thumbnails');
    }
    
    add_action('after_setup_theme','setup_theme');

    function menus(){
        $locations = array(
            "side" => "Side Menu",
            "box" => "Right Box Menu"
        );

        register_nav_menus($locations);
    }

    add_action('init','menus');

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
      if (in_array('current-menu-item', $classes) ){
        $classes[] = 'current ';
      }
      return $classes;
    }

    function regsiter_url(){
        $version = wp_get_theme()->get('Version');
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array(), '6.2.1', 'all');
        wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), '5.2.3', 'all');
        wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', array(), $version, 'all');

        wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/d1f56b097b.js', [], null,true );
        wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js', [], '5.2.3',true );
        wp_deregister_script('jquery');
        wp_register_script('jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.1.1/jquery.easing.min.js', ['jquery'], null,true );
        wp_enqueue_script('jquery-lavalamp', get_template_directory_uri() . '/scripts/jquery.lavalamp.min.js', ['jquery','jquery-easing'], null,true );
        wp_enqueue_script('scripts', get_template_directory_uri() . '/scripts/scripts.js', ['jquery','jquery-easing', 'jquery-lavalamp'], null,true );
    }
    
    add_action('wp_enqueue_scripts','regsiter_url');
                
    function your_theme_slug_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
            
            <div class="comment-wrap">
                <div class="comment-img">
                    <?php echo get_avatar($comment,$args['avatar_size'],null,null,array('class' => array('img-responsive', 'img-circle') )); ?>
                </div>
                <div class="comment-body">
                    <h4 class="comment-author"><?php echo get_comment_author_link(); ?></h4>
                    <span class="comment-date"><?php printf(__('%1$s at %2$s', 'your-text-domain'), get_comment_date(),  get_comment_time()) ?></span>
                    <?php if ($comment->comment_approved == '0') { ?><em><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> <?php _e('Comment awaiting approval', 'your-text-domain'); ?></em><br /><?php } ?>
                    <?php comment_text(); ?>
                    <span class="comment-reply"> <?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'your-text-domain'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?></span>
                </div>
            </div>
    <?php }

    add_action('wp_enqueue_scripts', 'your_theme_slug_public_scripts');

    function your_theme_slug_public_scripts() {
        if (!is_admin()) {
            if (is_singular() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
        }
    }
    

    function widget_areas(){
        register_sidebar(
            array(
                'before_title' => '<div class="widget-title">',
                'after_title' => '</div>',
                'before_widget' => '<div class="widget-content">',
                'after_widget' => '</div>',
                'name' => 'Sidebar Area',
                'id' => 'sidebar-1',
                'description' => 'Sidebar Widget Area',
            )            
        );

        register_sidebar(
            array(
                'before_title' => '<div class="widget-title">',
                'after_title' => '</div>',
                'before_widget' => '<div class="widget-content">',
                'after_widget' => '</div>',
                'name' => 'Footer Area',
                'id' => 'footer-1',
                'description' => 'Footer Widget Area',
            )            
        );

        register_sidebar(
            array(
                'name' => 'Cube 1',
                'id' => 'cube-1',
                'description' => 'Right Side Cube 1 Area',
            )            
        );

        register_sidebar(
            array(
                'name' => 'Cube 2',
                'id' => 'cube-2',
                'description' => 'Right Side Cube 2 Area',
            )            
        );
        
        register_sidebar(
            array(
                'name' => 'Cube 3',
                'id' => 'cube-3',
                'description' => 'Right Side Cube 3 Area',
            )            
        );    
    }

    add_action('widgets_init','widget_areas');
?>
