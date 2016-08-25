<div class="col-md-12">
  <ul class="resource-list">
  <?php if( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
    <li class="resource-card list-inline col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="resource-card--header flex-box">
        <h4 class="resource-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
      </div>
      <div class="resource-card--body">
        <?php the_field('description'); ?>
      </div>
      <div class="resource-card--footer">
        <?php if ( get_field('url') ): ?>
          <a href="<?php the_field('url') ?>" class="btn btn-default btn-sm">Visit Website</a>      
        <?php endif ?>
        <?php if ( get_field('resource') ): ?>
          <a href="https://www.google.com/maps/place/<?php the_field('resource') ?>" class="btn btn-default btn-sm" target="_blank">View On Map</a>      
        <?php endif ?>
      </div>
    </li>
<?php endwhile;
    endif; ?>
  </ul> 
</div>