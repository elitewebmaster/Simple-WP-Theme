</div>
                <aside class="col-right">
                    <div class="side-parts sponsor">
                        <div class="side-parts-line"></div>
                        <div class="side-parts-title">Sponsor.aspx</div>
                        <div class="side-parts-window">
                            <?php dynamic_sidebar('cube-1'); ?>
                        </div>
                    </div>
                    
                    <div class="side-parts tags">
                        <div class="side-parts-line"></div>
                        <div class="side-parts-title">Tags.aspx</div>
                        <div class="side-parts-window">
                            <?php dynamic_sidebar('cube-2'); ?>
                        </div>    
                    </div>    

                    <div class="side-parts links">
                        <div class="side-parts-line"></div>
                        <div class="side-parts-title">Links.aspx</div>
                        <div class="side-parts-window">
                            <?php 
                                wp_nav_menu(
                                    array(
                                        "menu" => "box",
                                        "container" => "",
                                        "items_wrap" => '<ul id="box-menu">%3$s</ul>'
                                    )
                                );

                                dynamic_sidebar('box-1');
                            ?> 
                        </div> 
                    </div>
                </aside>
            </section>  
            <section class="bottom-ad">
                <img class="bottom-ad-img" src="<?php bloginfo('template_directory'); ?>/images/c-sharp.png" alt="" />
            </section>
            <footer>
                    <?php dynamic_sidebar('footer-1'); ?>
                    <div class="robot-front"></div>
                    <span>©<?php echo date("Y"); ?> <a href="https://www.elitewebmaster.com">EliteWebmaster</a>
            </footer>
        </section>
    </div>
</div>
<?php 
    wp_footer();
?>
</body>
</html>