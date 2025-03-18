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
             							'allow_in_bindings' => 1,
             							'rows' => 4,
             							'placeholder' => '',
             							'new_lines' => '',
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
