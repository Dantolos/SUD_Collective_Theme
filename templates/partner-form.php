<?php

/*
 *Template Name: Partner Form
 */

acf_form_head();
get_header();

?>	


<main>
	<article class="SUD-ACF-Form">
		<h1>Be a part of the Collective</h1>
        <?php
		//successmessage
		$args = array(
			'post_type' => 'contacts',

		);
		$contacts = new WP_Query($args);
		//echo '<h1>'.count($contacts).'</h1>';

		if(isset($_GET["success"])){
			echo '<div class="acf-form-success-message"><p>Your form is sent sucessfull!</p></div>';
		}

		acf_form(
			array(
				'post_id' => 'new_post',
				'new_post' => array(
					'post_type' => 'partner',
					'post_status' => 'draft'
				),
				//'fields' => array( 'field_63da910570a25' ),
				'return' => '?success',
				'honeypot' => false,
				'submit_value' => 'Join the collective',
			)
		);
		?>
	</article>
</main>

<?php

get_footer();