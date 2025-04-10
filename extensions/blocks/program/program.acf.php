<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group( array(
	'key' => 'group_659d03f2b9c0c',
	'title' => 'B | Program',
	'fields' => array(
		array(
			'key' => 'field_659d03f21fe77',
			'label' => 'Title',
			'name' => 'title',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_659d040a1fe78',
			'label' => 'Description',
			'name' => 'description',
			'aria-label' => '',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'rows' => 4,
			'placeholder' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_659d041a1fe79',
			'label' => 'Program Rows',
			'name' => 'program_rows',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'table',
			'pagination' => 0,
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Eintrag hinzufügen',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_659d042c1fe7a',
					'label' => 'Time',
					'name' => 'time',
					'aria-label' => '',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '20',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_659d05bceccc6',
							'label' => 'From',
							'name' => 'from',
							'aria-label' => '',
							'type' => 'time_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'display_format' => 'g:i a',
							'return_format' => 'g:i',
						),
						array(
							'key' => 'field_659d0605eccc7',
							'label' => 'Till',
							'name' => 'till',
							'aria-label' => '',
							'type' => 'time_picker',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'display_format' => 'g:i a',
							'return_format' => 'g:i a',
						),
					),
					'parent_repeater' => 'field_659d041a1fe79',
				),
				array(
					'key' => 'field_659d04621fe7b',
					'label' => 'Content',
					'name' => 'content',
					'aria-label' => '',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '80',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_67e3f4f0c40a6',
							'label' => 'Type',
							'name' => 'type',
							'aria-label' => '',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'default' => 'Standard',
								'sessions' => 'Sessions',
							),
							'default_value' => 'default',
							'return_format' => 'value',
							'multiple' => 0,
							'allow_null' => 0,
							'allow_in_bindings' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
						),
						array(
							'key' => 'field_659d048e1fe7c',
							'label' => 'Program Title',
							'name' => 'program_title',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
						),
						array(
							'key' => 'field_659d04a81fe7d',
							'label' => 'Program Subtitle',
							'name' => 'program_subtitle',
							'aria-label' => '',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'allow_in_bindings' => 0,
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 0,
							'delay' => 0,
						),
						array(
							'key' => 'field_67e3f64bc40a8',
							'label' => 'Sessions',
							'name' => 'sessions',
							'aria-label' => '',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_67e3f4f0c40a6',
										'operator' => '==',
										'value' => 'sessions',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'layout' => 'block',
							'pagination' => 0,
							'min' => 0,
							'max' => 0,
							'collapsed' => '',
							'button_label' => 'Eintrag hinzufügen',
							'rows_per_page' => 20,
							'sub_fields' => array(
								array(
									'key' => 'field_67e3fc6103013',
									'label' => 'Session Label',
									'name' => 'session_label',
									'aria-label' => '',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'maxlength' => '',
									'allow_in_bindings' => 0,
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'parent_repeater' => 'field_67e3f64bc40a8',
								),
								array(
									'key' => 'field_67e3f691c40aa',
									'label' => 'Room',
									'name' => 'room',
									'aria-label' => '',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '50',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'maxlength' => '',
									'allow_in_bindings' => 0,
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'parent_repeater' => 'field_67e3f64bc40a8',
								),
								array(
									'key' => 'field_67e3f688c40a9',
									'label' => 'Session Title',
									'name' => 'session_title',
									'aria-label' => '',
									'type' => 'text',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'maxlength' => '',
									'allow_in_bindings' => 0,
									'placeholder' => '',
									'prepend' => '',
									'append' => '',
									'parent_repeater' => 'field_67e3f64bc40a8',
								),
								array(
									'key' => 'field_67e3f6c5c40ab',
									'label' => 'Session Content',
									'name' => 'session_content',
									'aria-label' => '',
									'type' => 'wysiwyg',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array(
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'default_value' => '',
									'allow_in_bindings' => 0,
									'tabs' => 'all',
									'toolbar' => 'full',
									'media_upload' => 0,
									'delay' => 0,
									'parent_repeater' => 'field_67e3f64bc40a8',
								),
							),
						),
					),
					'parent_repeater' => 'field_659d041a1fe79',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/program',
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
) );

endif;
