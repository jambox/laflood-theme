<?php 
$group = array (
  'key' => 'group_57ba91830f1a5',
  'title' => 'Organization Submission',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_57ba97abcd360',
      'label' => 'Main Phone Number',
      'name' => 'org_phone',
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
    1 => 
    array (
      'key' => 'field_57bbd0122a2a2',
      'label' => 'Website',
      'name' => 'org_url',
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
    2 => 
    array (
      'key' => 'field_57bbd0292a2a3',
      'label' => 'Description',
      'name' => 'org_description',
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
      'maxlength' => 500,
      'rows' => 4,
      'new_lines' => 'wpautop',
    ),
    3 => 
    array (
      'key' => 'field_57bbd0422a2a4',
      'label' => 'Category',
      'name' => 'org_category',
      'type' => 'taxonomy',
      'instructions' => 'Choose from the category that best describes your organization.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'taxonomy' => 'category',
      'field_type' => 'checkbox',
      'allow_null' => 0,
      'add_term' => 0,
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
        'value' => 'laflood_organization',
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