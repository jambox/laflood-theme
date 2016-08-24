<?php 
$group = array (
  'key' => 'group_57ba91356c5e3',
  'title' => 'Organization Fields',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_57bd3306fd853',
      'label' => 'What type of services are provided?',
      'name' => 'org_category',
      'type' => 'taxonomy',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'taxonomy' => 'category',
      'field_type' => 'select',
      'allow_null' => 0,
      'add_term' => 0,
      'save_terms' => 1,
      'load_terms' => 1,
      'return_format' => 'id',
      'multiple' => 0,
    ),
    1 => 
    array (
      'key' => 'field_57bd37dcbf834',
      'label' => 'Parent Organization (if applicable)',
      'name' => 'org_parent_org',
      'type' => 'taxonomy',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'taxonomy' => 'lfr_parent_org',
      'field_type' => 'select',
      'allow_null' => 1,
      'add_term' => 0,
      'save_terms' => 1,
      'load_terms' => 1,
      'return_format' => 'object',
      'multiple' => 0,
    ),
    2 => 
    array (
      'key' => 'field_57ba95ce43391',
      'label' => 'Services/Goods Offered',
      'name' => 'org_services',
      'type' => 'taxonomy',
      'instructions' => 'Start typing to search for existing services. Enter as many as you\'d like.',
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
    3 => 
    array (
      'key' => 'field_57bd3cc3f5343',
      'label' => 'Visitor Type',
      'name' => 'org_visitor_type',
      'type' => 'radio',
      'instructions' => 'Tell us whether this Organization provides help for Clients (victims of the flood), for Volunteers to lend a hand, or both of those.',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => 
      array (
        'volunteer' => 'Volunteer',
        'client' => 'Client',
        'both' => 'Both',
      ),
      'allow_null' => 0,
      'other_choice' => 0,
      'save_other_choice' => 0,
      'default_value' => '',
      'layout' => 'horizontal',
      'return_format' => 'array',
    ),
    4 => 
    array (
      'key' => 'field_57ba93dbe77a5',
      'label' => 'Location',
      'name' => 'org_location',
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
    5 => 
    array (
      'key' => 'field_57bcc4c77f58b',
      'label' => 'Does this organization accept and/or distribute goods and supplies?',
      'name' => 'org_handles_goods',
      'type' => 'true_false',
      'instructions' => 'Check this off if the Organization offers or accepts food, cleaning supplies, clothing, etc.',
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
    6 => 
    array (
      'key' => 'field_57ba96f045dad',
      'label' => 'Select the Type of Location',
      'name' => 'org_location_type',
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
      'layout' => 'horizontal',
      'return_format' => 'value',
    ),
    7 => 
    array (
      'key' => 'field_57bd3dbed4b3b',
      'label' => 'Website',
      'name' => 'org_website',
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
    8 => 
    array (
      'key' => 'field_57ba942a7b8f7',
      'label' => 'Main Phone Number',
      'name' => 'org_main_phone',
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
    9 => 
    array (
      'key' => 'field_57ba94b54ae5c',
      'label' => 'Main Email Address',
      'name' => 'org_main_email',
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
    10 => 
    array (
      'key' => 'field_57ba950f57456',
      'label' => 'Contact Person(s)',
      'name' => 'org_contacts',
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
          'name' => 'org_contact_name',
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
          'name' => 'org_contact_title',
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
          'name' => 'org_contact_phone',
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
          'name' => 'org_contact_email',
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
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'lfr_org',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => 
  array (
    0 => 'the_content',
    1 => 'categories',
    2 => 'tags',
  ),
  'active' => 1,
  'description' => '',
);