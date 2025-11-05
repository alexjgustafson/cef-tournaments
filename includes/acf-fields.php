<?php

add_action( 'acf/include_fields', function() {
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
return;
}

acf_add_local_field_group( array(
'key' => 'group_690b9cbcbddf1',
'title' => 'CEF Tournament Details',
'fields' => array(
array(
'key' => 'field_690b9cbc3dec0',
'label' => 'Tournament Start Date',
'name' => 'tournament_start_date',
'aria-label' => '',
'type' => 'date_picker',
'instructions' => 'Needs to match the start date of the tournament submitted.',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '50',
'class' => '',
'id' => '',
),
'display_format' => 'F j, Y',
'return_format' => 'Y-m-d',
'first_day' => 1,
'default_to_current_date' => 0,
'allow_in_bindings' => 0,
),
array(
'key' => 'field_690b9d5e3dec1',
'label' => 'Tournament End Date',
'name' => 'tournament_end_date',
'aria-label' => '',
'type' => 'date_picker',
'instructions' => 'Optional - only needed if end date is different than start date.',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '50',
'class' => '',
'id' => '',
),
'display_format' => 'F j, Y',
'return_format' => 'Y-m-d',
'first_day' => 1,
'default_to_current_date' => 0,
'allow_in_bindings' => 0,
),
    array(
        'key' => 'field_690ba31380e66',
        'label' => 'Cross Table URL',
        'name' => 'tournament_crosstable_url',
        'aria-label' => '',
        'type' => 'url',
        'instructions' => 'When present, changes the tournament\'s page to display a link to the crosstable instead of the registration information.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'allow_in_bindings' => 0,
        'placeholder' => '',
    ),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'tournament',
),
),
),
'menu_order' => 0,
'position' => 'acf_after_title',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => true,
'description' => '',
'show_in_rest' => 0,
) );
} );

add_action( 'acf/include_fields', function() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key' => 'group_690ba313c5609',
        'title' => 'foo',
        'fields' => array(

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
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
} );


