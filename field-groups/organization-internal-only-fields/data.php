<?php 
$group = array (
  'key' => 'group_57c8646070e91',
  'title' => 'Organization Internal Only Fields',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_57cfb2035885f',
      'label' => 'Featured?',
      'name' => 'featured',
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
      'taxonomy' => 'lfr_feature',
      'field_type' => 'select',
      'allow_null' => 0,
      'add_term' => 0,
      'save_terms' => 0,
      'load_terms' => 1,
      'return_format' => 'object',
      'multiple' => 0,
    ),
    1 => 
    array (
      'key' => 'field_57c86474040e7',
      'label' => 'Org Requested Removal',
      'name' => 'org_requested_removal',
      'type' => 'true_false',
      'instructions' => '',
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
    2 => 
    array (
      'key' => 'field_57c8648e040e8',
      'label' => 'Removal Request Date',
      'name' => 'org_removal_request_date',
      'type' => 'date_picker',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'field' => 'field_57c86474040e7',
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
      'display_format' => 'm/d/Y',
      'return_format' => 'm/d/Y',
      'first_day' => 1,
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
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
);