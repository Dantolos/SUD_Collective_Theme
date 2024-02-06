<?php

/*
 *Template Name: Event Form
 */

acf_form_head();
get_header();

?>


<main>
	<article class="SUD-ACF-Form"> 
		<h1>Add your Event</h1>
        <?php
		acf_form(
			array(
				'post_id' => 'new_post',
				'new_post' => array(
					'post_type' => 'event',
					'post_status' => 'draft'
				),
                	'post_title' => false,
				'post_content' => false,
				'fields' => array( 
					'field_63da910570a25',
					'field_63da914b70a26',
					'field_63da94bca8cb2',
				),
				'return' => '%post_url%&action=create&updated=true',
				'honeypot' => false,
				'submit_value' => 'Send Event',
			)
		);
		?>
	</article>
</main>

<?php

get_footer();