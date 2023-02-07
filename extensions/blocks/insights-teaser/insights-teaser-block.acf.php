<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63e13a1063fd7',
	'title' => 'Block | Insight Teaser',
	'fields' => array(
		array(
			'key' => 'field_63e13a10cfe32',
			'label' => 'Insights',
			'name' => 'insights',
			'aria-label' => '',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'insight',
			),
			'taxonomy' => '',
			'return_format' => 'id',
			'multiple' => 1,
			'allow_null' => 0,
			'ui' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/insights-teaser',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
));

endif;		