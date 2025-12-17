
</div>
<div id="footer-wrapper">
<div id="footer-container">
    <div class="footer-row footer-row-left">
        <?php echo get_field('adress', 'option'); ?>
    </div>

    <!--<div class="footer-row footer-row-mid">

        <?php
        $partners = get_field('partner', 'option');
        if(false){

            if($partners ){
                echo '<p>The collective is an informal association initiated by SICTIC and startup days, to unlock diversity in the Swiss startup ecosystem.</p>';
                echo '<div class="footer-partner-container">';
                foreach($partners as $partnerID){
                    echo '<div class="footer-partner"><a href="'.get_field('website', $partnerID).'" target="_blank" title="'.get_field('company', $partnerID).'">';
                        echo '<img src="'.esc_url(get_field('logo_negativ', $partnerID)["url"]).'" alt="'.get_field('company', $partnerID).'"/>';
                    echo '</a></div>';
                }
                echo '</div>';
            }
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

    </div>-->
    <div class="footer-menu-grid">
        <?php

        $menuCol1 = get_field('menu_column_1', 'option');
        //var_dump($menuCol2);
        echo '<div>';
        if($menuCol1){

            foreach($menuCol1 as $menuItem){
                echo '<a href="'.$menuItem["link"]["url"].'" target="'.$menuItem["link"]["target"].'">';
                echo '<p >'.$menuItem["link"]["title"].'</p>';
                echo '</a>';
            }

        }
        echo '</div>';


        $menuCol2 = get_field('menu_column_2', 'option');
        //var_dump($menuCol2);
        echo '<div>';
        if($menuCol2){

            foreach($menuCol2 as $menuItem){
                echo '<a href="'.$menuItem["link"]["url"].'" target="'.$menuItem["link"]["target"].'">';
                echo '<p>'.$menuItem["link"]["title"].'</p>';
                echo '</a>';
            }

        }
        echo '</div>';

        $menuCol3 = get_field('menu_column_3', 'option');
        //var_dump($menuCol2);
        echo '<div>';
        if($menuCol3){

            foreach($menuCol3 as $menuItem){
                echo '<a href="'.$menuItem["link"]["url"].'" target="'.$menuItem["link"]["target"].'">';
                echo '<p >'.$menuItem["link"]["title"].'</p>';
                echo '</a>';
            }

        }
        echo '</div>';

   ?>
    </div>
</div>
 <div class="footer-copyright">
    <div class="footer-copyright-container">
        <div>
            <?php
            $footerButton = get_field('newsletter_button','option');

            if($footerButton){
                echo '<a href="" >';
                echo '<div class="footer-newsletter-button">'.$footerButton["title"].'</div>';
                echo '</a>';
            }
            ?>

        </div>
        <div class="footer-sm-icons"><?php
           $social_media_links = get_field('social_media_links', 'option');
           //var_dump($social_media_links);
            if($social_media_links ){
                foreach( $social_media_links as $sm){
                    echo '<a href="'. $sm["link"].'" target="_blank" class="footer-social_media_links"><img src="'.$sm["icon"].'" height="25px" width="25px"></a>';
                }
            }

            ?></div>
    </div>
 </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
