
</div>

<div id="footer-container">
    <div class="footer-row footer-row-left">
        <?php echo get_field('adress', 'option'); ?>
    </div>
    <div class="footer-row footer-row-mid">
 
        <?php
        $partners = get_field('partner', 'option');
        if($partners){
            echo '<p>The collective is an informal association initiated by SICTIC and startup days, to unlock diversity in the Swiss startup ecosystem.</p>';
            echo '<div class="footer-partner-container">'; 
            foreach($partners as $partnerID){
                echo '<div class="footer-partner"><a href="'.get_field('website', $partnerID).'" target="_blank" title="'.get_field('company', $partnerID).'">';                 
                    echo '<img src="'.esc_url(get_field('logo_negativ', $partnerID)["url"]).'" alt="'.get_field('company', $partnerID).'"/>';
                echo '</a></div>';
            }
            echo '</div>';
        }
        ?>
    </div>
    <div class="footer-row footer-row-right">
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