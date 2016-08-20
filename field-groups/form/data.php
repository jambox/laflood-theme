<?php 
$group = array (
  'key' => 'group_57b7dc88b831f',
  'title' => 'Form',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_57b7dcb23b6f1',
      'label' => 'Name',
      'name' => 'name',
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
      'key' => 'field_57b7dd82d44a7',
      'label' => 'Organization',
      'name' => 'organization',
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
      'taxonomy' => 'organization',
      'field_type' => 'select',
      'allow_null' => 0,
      'add_term' => 1,
      'save_terms' => 1,
      'load_terms' => 1,
      'return_format' => 'id',
      'multiple' => 0,
    ),
    2 => 
    array (
      'key' => 'field_57b7dcff3b6f2',
      'label' => 'Description',
      'name' => 'description',
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
      'maxlength' => 300,
      'rows' => '',
      'new_lines' => 'wpautop',
    ),
    3 => 
    array (
      'key' => 'field_57b7dd3e3b6f4',
      'label' => 'Website',
      'name' => 'url',
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
    4 => 
    array (
      'key' => 'field_57b7dde3955b1',
      'label' => 'Location',
      'name' => 'location',
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
      'center_lat' => '30.450746',
      'center_lng' => '-91.154551',
      'zoom' => 14,
      'height' => 400,
    ),
    5 => 
    array (
      'key' => 'field_57b7de2a9d36f',
      'label' => 'Category',
      'name' => 'category',
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
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'laflood_resource',
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