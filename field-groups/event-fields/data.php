<?php 
$group = array (
  'key' => 'group_57d47f71c7c63',
  'title' => 'Event Fields',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_57d48100d19cd',
      'label' => 'URL',
      'name' => 'event_url',
      'type' => 'url',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
    ),
    1 => 
    array (
      'key' => 'field_57d47f7c4434c',
      'label' => 'Start Date & Time',
      'name' => 'event_start_date',
      'type' => 'date_time_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'display_format' => 'd/m/Y g:i a',
      'return_format' => 'd/m/Y g:i a',
      'first_day' => 0,
    ),
    2 => 
    array (
      'key' => 'field_57d47fcd4434e',
      'label' => 'End Date & Time',
      'name' => 'event_end_date',
      'type' => 'date_time_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'display_format' => 'd/m/Y g:i a',
      'return_format' => 'd/m/Y g:i a',
      'first_day' => 0,
    ),
    3 => 
    array (
      'key' => 'field_57d48005d6d6f',
      'label' => 'Location',
      'name' => 'event_location',
      'type' => 'google_map',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'center_lat' => '30.39047',
      'center_lng' => '-90.92800',
      'zoom' => 11,
      'height' => 400,
    ),
    4 => 
    array (
      'key' => 'field_57d48057d19ca',
      'label' => 'Host Organizations',
      'name' => 'event_orgs',
      'type' => 'relationship',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'post_type' => 
      array (
        0 => 'lfr_org',
      ),
      'taxonomy' => 
      array (
      ),
      'filters' => 
      array (
        0 => 'search',
      ),
      'elements' => '',
      'min' => '',
      'max' => '',
      'return_format' => 'object',
    ),
    5 => 
    array (
      'key' => 'field_57d48084d19cb',
      'label' => 'What to Bring',
      'name' => 'event_what_to_bring',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => 'wpautop',
    ),
    6 => 
    array (
      'key' => 'field_57d480b6d19cc',
      'label' => 'Still Accepting Volunteers',
      'name' => 'event_open_status',
      'type' => 'true_false',
      'instructions' => 'Once this event has been filled up, uncheck this field to let site users know you\'re no longer accepting volunteers.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
    ),
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'lfr_event',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
);