<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_63e207d225b7b',
        'title' => 'Block | Partner Grid',
        'fields' => array(
            array(
                'key' => 'field_6464bdaae93d3',
                'label' => 'Partner Category',
                'name' => 'partner_category',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => 'If no category is selected, all the partners without a category will be taken.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'partner_category',
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'select',
                'allow_null' => 1,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_63e207d2be3d7',
                'label' => 'Partner',
                'name' => 'partner',
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
                    0 => 'partner',
                ),
                'taxonomy' => '',
                'return_format' => 'id',
                'multiple' => 1,
                'allow_null' => 0,
                'ui' => 1,
            ),
            array(
                'key' => 'field_63e21b02be3d8',
                'label' => 'Colums',
                'name' => 'colums',
                'aria-label' => '',
                'type' => 'number',
                'instructions' => 'max. amount of colums',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 3,
                'min' => '',
                'max' => '',
                'placeholder' => '',
                'step' => 1,
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_63e21b56be3d9',
                'label' => 'Width',
                'name' => 'width',
                'aria-label' => '',
                'type' => 'number',
                'instructions' => 'min-width of column',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'min' => 50,
                'max' => 1200,
                'placeholder' => '',
                'step' => 1,
                'prepend' => '',
                'append' => 'px',
            ),
            array(
                'key' => 'field_63e275befc1af',
                'label' => 'Background Color',
                'name' => 'background_color',
                'aria-label' => '',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '#fef7ff',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            array(
                'key' => 'field_63ea60107ad30',
                'label' => 'Order',
                'name' => 'order',
                'aria-label' => '',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_63ea60507ad31',
                'label' => 'Order by',
                'name' => 'order_by',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_63ea60107ad30',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'name' => 'Company name',
                ),
                'default_value' => 'name',
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_63ea60cf7ad32',
                'label' => 'Direction',
                'name' => 'direction',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_63ea60107ad30',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'asc' => 'ASC',
                    'dsc' => 'DSC',
                ),
                'default_value' => 'asc',
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/partner-grid',
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