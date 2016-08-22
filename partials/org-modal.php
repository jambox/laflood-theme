<div class="org-modal modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="container-fluid">
        <div class="row">

          <h3 class="modal-title">Add Organization</h3>

        <?php
          $form_object =  get_page_by_title( 'Organization Submission', null, 'acf-field-group' );
          $form_ID = $form_object->ID;

          if( $form_ID ) {


            acf_form(array(
              'id'           => 'org-submission-form',
              'post_id'      => 'new_post',
              'post_title' => true,
              'return' => '%post_url%',
              'new_post'     => array(
                'post_type'   =>  get_org_cpt_name(),
                'post_status' => 'draft'
              ),
              'field_groups' => array($form_ID),
              'submit_value' => 'Add Organization'
            ));
          }
        ?>
        </div>

      </div>
    </div>
  </div>
</div>