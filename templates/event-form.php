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

		<?php if ( isset($_GET['event_submitted']) && $_GET['event_submitted'] === '1' ) : ?>
            <div class="acf-form-success-message">
                <p>Your event has been submitted and is awaiting review.</p>
            </div>
        <?php endif;

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
					'field_699eb4793cae9',
					'field_63da94bca8cb2',
				),
        	   'return'       => add_query_arg(
                    array(
                        'event_submitted' => '1',
                    ),
                    get_permalink()
                ),
				'honeypot' => false,
				'submit_value' => 'Send Event',
			)
		);
		?>
	</article>
</main>

<?php

get_footer();
