<?php

/*
 *Template Name: Form Page
 */

get_header();



?>

<main>
	<article class="SUD-ACF-Form">
		
        <?php
        echo '<div style="width:80vw;">';
        echo the_content();
        echo '</div>';
		acf_form(
			array(
				'post_id' => 'new_post',
				'new_post' => array(
					'post_type' => 'contact',
					'post_status' => 'draft'
				),
                'post_title' => false,
				//'fields' => array( 'field_63da910570a25' ),
				'return' => '?success',
				'honeypot' => false,
				'submit_value' => 'Send reservation',
			)
		);
		?>
	</article>
</main>


<?php

get_footer();

