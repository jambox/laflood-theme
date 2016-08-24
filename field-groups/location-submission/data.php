<?php 
$group = array (
  'key' => 'group_57ba91356c5e3',
  'title' => 'Location Submission',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_57ba9281892fe',
      'label' => 'Organization',
      'name' => 'location_organization',
      'type' => 'post_object',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'post_type' => 
      array (
        0 => 'laflood_organization',
      ),
      'taxonomy' => 
      array (
      ),
      'allow_null' => 0,
      'multiple' => 0,
      'return_format' => 'object',
      'ui' => 1,
    ),
    1 => 
    array (
      'key' => 'field_57ba9cae58d6d',
      'label' => 'Can\'t find your organization?',
      'name' => '',
      'type' => 'message',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => 'add-org-msg--wrap',
        'id' => '',
      ),
      'message' => '<div class="add-org-btn"><a href="#" class="add-org-btn--link">Add An Organization</a></div>',
      'new_lines' => 'wpautop',
      'esc_html' => 0,
    ),
    2 => 
    array (
      'key' => 'field_57ba935273521',
      'label' => 'Name',
      'name' => 'location_name',
      'type' => 'text',
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
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    3 => 
    array (
      'key' => 'field_57ba9aa145016',
      'label' => 'Description',
      'name' => 'location_description',
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
      'rows' => 6,
      'new_lines' => 'wpautop',
    ),
    4 => 
    array (
      'key' => 'field_57bcc4c77f58b',
      'label' => 'Does this location accept and/or distribute goods and supplies?',
      'name' => 'location_handles_goods',
      'type' => 'true_false',
      'instructions' => 'Check this off if the Location offers or accepts food, cleaning supplies, clothing, etc.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
    ),
    5 => 
    array (
      'key' => 'field_57ba96f045dad',
      'label' => 'Select the Type of Location',
      'name' => 'location_type',
      'type' => 'radio',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'field' => 'field_57bcc4c77f58b',
            'operator' => '==',
            'value' => '1',
          ),
        ),
      ),
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => 
      array (
        'dropoff' => 'Drop Off',
        'distribution' => 'Distribution',
        'both' => 'Both',
      ),
      'allow_null' => 1,
      'other_choice' => 0,
      'save_other_choice' => 0,
      'default_value' => '',
      'layout' => 'vertical',
      'return_format' => 'value',
    ),
    6 => 
    array (
      'key' => 'field_57ba93dbe77a5',
      'label' => 'Address',
      'name' => 'location_address',
      'type' => 'google_map',
      'instructions' => '',
      'required' => 1,
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
    7 => 
    array (
      'key' => 'field_57ba942a7b8f7',
      'label' => 'Phone Number',
      'name' => 'location_phone',
      'type' => 'text',
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
      'placeholder' => '555-123-4567',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    8 => 
    array (
      'key' => 'field_57ba94b54ae5c',
      'label' => 'Email Address',
      'name' => 'location_email',
      'type' => 'email',
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
      'placeholder' => 'address@example.com',
      'prepend' => '',
      'append' => '',
    ),
    9 => 
    array (
      'key' => 'field_57ba950f57456',
      'label' => 'Contact Person(s)',
      'name' => 'location_contacts',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => '',
      'max' => '',
      'layout' => 'table',
      'button_label' => '+ Add Contact Person',
      'sub_fields' => 
      array (
        0 => 
        array (
          'key' => 'field_57ba952c57457',
          'label' => 'Contact Name',
          'name' => 'location_contact_name',
          'type' => 'text',
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
          'placeholder' => 'Jane Smith',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        1 => 
        array (
          'key' => 'field_57ba958eedc1c',
          'label' => 'Contact Title',
          'name' => 'location_contact_title',
          'type' => 'text',
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
          'placeholder' => 'Director',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        2 => 
        array (
          'key' => 'field_57ba954457458',
          'label' => 'Contact Phone',
          'name' => 'location_contact_phone',
          'type' => 'text',
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
          'placeholder' => '555-123-4567',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        3 => 
        array (
          'key' => 'field_57ba956557459',
          'label' => 'Contact Email',
          'name' => 'location_contact_email',
          'type' => 'email',
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
          'placeholder' => 'address@example.com',
          'prepend' => '',
          'append' => '',
        ),
      ),
    ),
    10 => 
    array (
      'key' => 'field_57ba95ce43391',
      'label' => 'Services Offered',
      'name' => 'location_services',
      'type' => 'taxonomy',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'taxonomy' => 'post_tag',
      'field_type' => 'multi_select',
      'allow_null' => 1,
      'add_term' => 1,
      'save_terms' => 1,
      'load_terms' => 1,
      'return_format' => 'id',
      'multiple' => 0,
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
        'value' => 'laflood_location',
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