<!doctype html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
    wp_head();
  ?>
</head>

<body>
<div id="wrapper">    
    <input type="checkbox" id="navigation" />
    <label for="navigation" class="burger"><i class="fa-sharp fa-solid fa-bars fa-3x"></i></label>
    <nav id="side">
        <?php 
            wp_nav_menu(
                array(
                    "menu" => "side",
                    "container" => "",
                    "theme_location" => "primary",
                    "items_wrap" => '<ul id="side-menu">%3$s</ul>'
                )
            );

            dynamic_sidebar('sidebar-1');
        ?>
        <div id="side-ad">
            <?php dynamic_sidebar('cube-1');  ?>
        </div>
    </nav>
    <div id="wrap">
        <header id="header">
            <div class="logo">
                <?php 
                    if(function_exists("the_custom_logo")){
                        $custom_logo_id = get_theme_mod("custom_logo");
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    }
                ?>
                <a href="/"><img src="<?php echo $logo[0] ?>" alt="" /></a>
            </div>
            <div class="billboard">
                <img src="<?php bloginfo('template_directory'); ?>/images/top.png" alt="" />
            </div>
            <div class="bar">
                <span class="site-title"><a href="/"><?php echo get_bloginfo('name');  ?></a></span>
                <?php 
                    wp_nav_menu(
                        array(
                            "menu" => "side",
                            "container" => "",
                            "theme_location" => "primary",
                            "items_wrap" => '<ul id="top-menu">%3$s</ul>'
                        )
                    );

                    dynamic_sidebar('sidebar-1');
                ?>                
            </div>
            <div class="robot-left-arm"></div>
            <div class="robot-right-arm"></div>
        </header>
        <section id="main">
            <section id="content">
                <div class="col-left">