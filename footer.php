      </main><!-- /.main -->
    </div><!-- /.content-wrap -->


    <footer>
      <div class="footer-wrap">
        <?php
        if( visitor_type() && !is_page('explore') ) {
          get_template_part('partials/components/search-module');
        }
        ?>
        <div class="container">
          <div class="row">
            <div class="col-md-4"><p>This is a living directory of services that can assist the people and families who have been affected by the August 2016 flood disaster. <a href="<?php permalink_by_title('About'); ?>">Learn more</a>.</p></div>
            <div class="col-md-4 col-md-offset-1"><p>See something missing from our lists? Please help us expand this directory by <a href="<?php permalink_by_title('Add An Organization'); ?>">adding an organization</a>.</p>
            <p>If you see any problems with our organization info, please <a href="mailto:info@lafloodrecovery.org">let us know</a>.</p></div>
            <div class="col-md-2 col-md-offset-1">
              <nav class="nav-footer"><?php
                if (has_nav_menu('footer_navigation')) {
                  wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav list-unstyled']);
                }
              ?></nav>
            </div>
          </div>
        </div>
      </div>
      <div class="container"><?php if ( is_active_sidebar( 'primary-sidebar' ) ) { dynamic_sidebar( 'primary-sidebar' ); } ?></div>
    </footer>
  </div> <!-- .offcanvas-wrap-inner -->
</div><!-- /.wrap .offcanvas-wrap-outer -->

</div><!-- /.app-wrap -->
<?php wp_footer(); ?>

</body>
</html>
