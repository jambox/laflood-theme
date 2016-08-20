<li class="resource-card list-inline col-lg-4 col-md-6 col-sm-6 col-xs-12">
  <div class="resource-card--header">
    <h4 class="resource-name"><a href="<?php the_field('url') ?>"><?php the_title(); ?></a> </h4>
  </div>
  <div class="resource-card--body">
    <?php the_field('description'); ?>
  </div>
  <div class="resource-card--footer">
    <?php if ( get_field('url') ): ?>
      <a href="<?php the_field('url') ?>" class="btn btn-default">Visit Website</a>      
    <?php endif ?>
  </div>
</li>