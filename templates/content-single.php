  
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="col-md-7">
      <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>
      <?php if(get_the_tag_list()) : ?>
        <?php echo get_the_tag_list(
          '<ul class="list-unstyled list-inline post-meta-list meta-list contact-list"><li>', // Before
            '</li>&middot;<li>', // Seperator
          '</li></ul>' // After
        ); ?>
      <?php endif; ?>
      <div class="single-entry-content">
        <?php the_content(); ?>
      </div>
      <div class="single-footer"></div>
    </div>
    <?php get_sidebar(); ?>
  </article>
<?php endwhile; ?>
