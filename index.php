<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
  <div class="page-wrap row-fluid">
    <div class="page--content col-md-8">
      <div class="archive-list-header col-md-12">
        <h1 class="inline"><?php echo single_post_title(); ?></h1>
      </div>
      <div class="org-list featured-list col-md-12">
        <?php while ( have_posts()) : the_post(); ?>
          <article class="org-item col-md-12">
            <header>
              <h2 class="org-title"><a href="<?php echo get_permalink(); ?>"><?php echo str_no_wrap( get_the_title() ); ?></a></h2>
            </header>
            <?php if(get_the_tag_list()) : ?>
              <?php echo get_the_tag_list(
                '<ul class="list-unstyled list-inline contact-list"><li>', // Before
                  '</li>&middot;<li>', // Seperator
                '</li></ul>' // After
              ); ?>
            <?php endif; ?>
            <div>
              <p>
                <?php
                  $the_excerpt = get_the_excerpt();
                  if ( $the_excerpt != '' ) {
                    // Add "has-arrow" class
                    $pos_class = strrpos($the_excerpt, 'read-more');
                    if ($pos_class !== false ) {
                      $the_excerpt = substr_replace($the_excerpt, 'has-arrow ', $pos_class, 0);
                    }

                    // Add the arrow
                    $pos_arrow = strrpos($the_excerpt, '</a>');
                    if ($pos_arrow !== false) {
                      $the_excerpt = substr_replace($the_excerpt, '<i class="fa fa-fw fa-arrow-right"></i>', $pos_arrow, 0);
                    }
                    echo $the_excerpt;
                  }
                ?>
              </p>
            </div>
            <div class="org-meta">
              <div class="services-list">
                <ul class="list-unstyled list-inline post-meta">
                  <li><time datetime="<?php echo get_post_time('c', true); ?>"><?php echo get_the_date(); ?></time></li>
                  <li>by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="author"><?php echo get_the_author(); ?></a></li>
                </ul>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
<?php endif; ?>
<?php get_footer(); ?>