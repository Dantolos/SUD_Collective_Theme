<?php
			if( function_exists('acf_add_local_field_group') ):

                acf_add_local_field_group(array(
                    'key' => 'group_63da9022a63d4',
                    'title' => 'Event Fields',
                    'fields' => array(
                        array(
                            'key' => 'field_63da910570a25',
                            'label' => 'Content',
                            'name' => 'content',
                            'aria-label' => '',
                            'type' => 'group',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '60',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_63da902270a22',
                                    'label' => 'Title',
                                    'name' => 'title',
                                    'aria-label' => '',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 1,
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
                                    'key' => 'field_63da909370a23',
                                    'label' => 'Description',
                                    'name' => 'lead',
                                    'aria-label' => '',
                                    'type' => 'textarea',
                                    'instructions' => '',
                                    'required' => 1,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'maxlength' => '120',
                                    'rows' => 3,
                                    'placeholder' => '',
                                    'new_lines' => '',
                                ),
                                array(
                                    'key' => 'field_63da90ad70a24',
                                    'label' => 'Description',
                                    'name' => 'description',
                                    'aria-label' => '',
                                    'type' => 'wysiwyg',
                                    'instructions' => '',
                                    'required' => 1,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'tabs' => 'visual',
                                    'toolbar' => 'basic',
                                    'media_upload' => 0,
                                    'delay' => 0,
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_63da914b70a26',
                            'label' => 'Facts',
                            'name' => 'facts',
                            'aria-label' => '',
                            'type' => 'group',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '40',
                                'class' => '',
                                'id' => '',
                            ),
                            'layout' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_63da915970a27',
                                    'label' => 'Date',
                                    'name' => 'date',
                                    'aria-label' => '',
                                    'type' => 'date_picker',
                                    'instructions' => '',
                                    'required' => 1,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'display_format' => 'd/m/Y',
                                    'return_format' => 'd/m/Y',
                                    'first_day' => 1,
                                ),
                                array(
                                    'key' => 'field_63da91d370a28',
                                    'label' => 'From',
                                    'name' => 'from',
                                    'aria-label' => '',
                                    'type' => 'time_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '50',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'display_format' => 'H:i',
                                    'return_format' => 'H:i',
                                ),
                                array(
                                    'key' => 'field_63da91fc70a29',
                                    'label' => 'Until',
                                    'name' => 'until',
                                    'aria-label' => '',
                                    'type' => 'time_picker',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '50',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'display_format' => 'H:i',
                                    'return_format' => 'H:i',
                                ),
                                array(
                                    'key' => 'field_63da92c370a2a',
                                    'label' => 'Venue',
                                    'name' => 'venue',
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
                                    'key' => 'field_63e260c2850c9',
                                    'label' => 'Register Link',
                                    'name' => 'register_link',
                                    'aria-label' => '',
                                    'type' => 'url',
                                    'instructions' => '',
                                    'required' => 1,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_63da94bca8cb2',
                            'label' => 'Image',
                            'name' => 'Thumb',
                            'aria-label' => '',
                            'type' => 'image',
                            'instructions' => 'Format: jpeg or png, no pdf. Content: just a visual or a photo, no text, not a flyer Max width is 1200px, max height is 800px.',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '40',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'library' => 'all',
                            'min_width' => '350',
                            'min_height' => '150',
                            'min_size' => '',
                            'max_width' => '1200',
                            'max_height' => '800',
                            'max_size' => '',
                            'mime_types' => 'png, jpg',
                            'preview_size' => 'medium',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'post_type',
                                'operator' => '==',
                                'value' => 'event',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'seamless',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => true,
                    'description' => '',
                    'show_in_rest' => 1,
                ));
                
                endif;		