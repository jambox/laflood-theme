<?php get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>
    <div class="page-wrap row-fluid">
      <div class="explore-page--content col-md-8 col-md-offset-2">
        <h1>Other Services</h1>
        <?php $oppportunities_prompt = is_client_page() ? "find help" : "volunteer"; ?>
        <?php
          $funds_link = site_url( visitor_type() . '/' . 'funds');
          $food_link = site_url( visitor_type() . '/' . 'food-and-goods');
          $housing_link = site_url( visitor_type() . '/' . 'housing');
          $labor_link = site_url( visitor_type() . '/' . 'labor');
          $action_prompt = is_client_page() ?
            sprintf("explore the <a href='%s'>%s</a>, <a href='%s'>%s</a>, or <a href='%s'>%s</a> resources", $food_link, 'food & goods', $housing_link, 'housing', $labor_link, 'labor' ) :
            sprintf("consider giving <a href='%s'>%s</a>, <a href='%s'>%s</a>, <a href='%s'>%s</a>, or <a href='%s'>%s</a>", $funds_link, 'funds', $food_link, 'food & goods', $housing_link, 'housing', $labor_link, 'labor' ); ?>
        <p class="intro">A directory of other oppportunities to <?php echo $oppportunities_prompt; ?> will be available soon. In the meantime, please <?php echo $action_prompt; ?>.</p>
        <hr>        
        <?php
        $terms = get_terms( 'lfr_service', array('number' => 25) );
        if( !empty($terms) ) : ?>
        <div class="tag-list">
          <ul class="list-unstyled list-inline row-fluid">
            <li class="col-md-4"><strong>Coming Soon:</strong></li>
            <?php
              $term_list = [];
              foreach ( $terms as $term ) {
                $term_string = '<li class="col-md-4">';
                //$term_string .= '<a href="' . site_url(visitor_type() . '/service/' . $term->slug) . '" rel="tag">';
                $term_string .= $term->name;
                //$term_string .= '</a>';
                $term_string .= '</li>';

                $term_list[] = $term_string;
              }
              echo implode("", $term_list);
          ?></ul>
        </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endwhile; ?>

<?php get_footer(); ?>