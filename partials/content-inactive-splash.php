<?php while (have_posts()) : the_post(); ?>
  <div class="inactive-splash--wrap">
    <div class="container">
      <div class="row-fluid">
        <div class="intro--wrap col-md-8">
          <div class="intro"><?php the_content() ?></div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>