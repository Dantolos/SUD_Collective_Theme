

<div id="footer-container">
    <div class="footer-row">
        <?php echo get_field('adress', 'option'); ?>
    </div>
    <div class="footer-row">
        <?php
        if(wp_get_nav_menu_items('Footer Menu') ){
            foreach( wp_get_nav_menu_items('Footer Menu') as $footeritem)
            {

                echo '<a href="'.$footeritem->url.'">';
                    echo '<h4>'.$footeritem->title.'</h4>';
                echo '</a>';
            }
        }
        ?>
    
    </div>
</div>


<?php wp_footer(); ?>
</body>
</html> 