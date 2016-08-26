      </main><!-- /.main -->
    </div><!-- /.content-wrap -->

    <?php
    if( visitor_type() && !is_page('explore') ) {
      get_template_part('partials/components/search-module');
    }
    ?>

    <footer>
      <div class="flex">
        <div class="footer-wrap flex-box">
          <div class="container">
            <div class="row">
              <div class="col-md-4"><p>This is a living directory of services that can assist the people and families who have been affected by the August 2016 flood disaster. <a href="<?php permalink_by_title('About'); ?>">Learn more</a>.</p></div>
              <div class="col-md-4"><p>See something missing from our lists? Please help us expand this directory by <a href="<?php permalink_by_title('Add An Organization'); ?>">submitting a resource</a>.</p></div>
              <div class="col-md-4">
                <nav class="nav-footer"><?php
                  if (has_nav_menu('footer_navigation')) {
                    wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']);
                  }
                ?></nav>
              </div>
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
