<?php

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key'                   => 'group_5e80bb066e2a2',
        'title'                 => 'Circle item options',
        'fields'                => array(
            array(
                'key'               => 'field_5e80bb16cd958',
                'label'             => 'Link',
                'name'              => 'custom_link',
                'type'              => 'url',
                'instructions'      => '',
                'required'          => 1,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'default_value'     => site_url(),
                'placeholder'       => 'Place an URL here...',
            ),
            array(
                'key'               => 'field_5e80bb3ecd959',
                'label'             => 'Background Color',
                'name'              => 'background_color',
                'type'              => 'color_picker',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                    'width' => '',
                    'class' => '',
                    'id'    => '',
                ),
                'default_value'     => '#021533',
            ),
        ),
        'location'              => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'circle_slider',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
        'active'                => true,
        'description'           => '',
    ));

endif;