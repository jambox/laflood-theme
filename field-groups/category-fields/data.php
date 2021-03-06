<?php 
$group = array (
  'key' => 'group_57b7ed6aa0d83',
  'title' => 'Category Fields',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_57bd056469291',
      'label' => 'Archive Display',
      'name' => 'cat_archive_display',
      'type' => 'radio',
      'instructions' => '',
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
        'short' => 'Short List',
        'long' => 'Long List',
      ),
      'allow_null' => 0,
      'other_choice' => 0,
      'save_other_choice' => 0,
      'default_value' => '',
      'layout' => 'horizontal',
      'return_format' => 'value',
    ),
    1 => 
    array (
      'key' => 'field_57bd06d2b212b',
      'label' => 'Visitor Type',
      'name' => 'cat_visitor_type',
      'type' => 'checkbox',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => 
      array (
        'need-help' => 'I need help',
        'want-to-help' => 'I want to help',
      ),
      'default_value' => 
      array (
      ),
      'layout' => 'vertical',
      'toggle' => 1,
      'return_format' => 'array',
    ),
    2 => 
    array (
      'key' => 'field_57b900218bd9f',
      'label' => 'Giving Guidelines',
      'name' => 'cat_guidelines',
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
    3 => 
    array (
      'key' => 'field_57d22b471bd7e',
      'label' => 'Need Help Subheader',
      'name' => 'cat_need_help_subheader',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'field' => 'field_57bd06d2b212b',
            'operator' => '==',
            'value' => 'need-help',
          ),
        ),
      ),
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => 2,
      'new_lines' => 'wpautop',
    ),
    4 => 
    array (
      'key' => 'field_57b7ed84dfef8',
      'label' => 'Items',
      'name' => 'cat_items',
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
      'collapsed' => 'field_57b7ede9dfef9',
      'min' => '',
      'max' => '',
      'layout' => 'table',
      'button_label' => '+ Add Item',
      'sub_fields' => 
      array (
        0 => 
        array (
          'key' => 'field_57b7ede9dfef9',
          'label' => 'Item',
          'name' => 'item',
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
      ),
    ),
    5 => 
    array (
      'key' => 'field_57d0f7aa702f6',
      'label' => 'Featured Organizations & Resources',
      'name' => 'cat_features',
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
        1 => 'lfr_resource',
      ),
      'taxonomy' => 
      array (
      ),
      'filters' => 
      array (
        0 => 'search',
        1 => 'post_type',
      ),
      'elements' => '',
      'min' => '',
      'max' => '',
      'return_format' => 'object',
    ),
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'taxonomy',
        'operator' => '==',
        'value' => 'category',
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