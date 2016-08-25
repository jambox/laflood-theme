      </main><!-- /.main -->
    </div><!-- /.content-wrap -->

    <?php
    if( visitor_type() && !is_page('explore') ) {
      get_template_part('partials/components/search-module');
    }
    ?>

    <footer class="flex">
      <div class="footer-wrap flex-box">
        <div class="container">
          <div class="row-fluid">
            <div class="col-md-4"><p>This is a living directory of services that can assist the people and families who have been affected by the August 2016 flood disaster. <a href="<?php permalink_by_title('About'); ?>">Learn more.</a></p></div>
            <div class="col-md-4"><p>See something missing from our lists? Please help us expand this directory by <a href="?php permalink_by_title('Add An Organization'); ?>">sharing a resource here</a>.</p></div>
          </div>
        </div>
      </div>
    </footer>
  </div> <!-- .offcanvas-wrap-inner -->
</div><!-- /.wrap .offcanvas-wrap-outer -->

</div><!-- /.app-wrap -->
<?php wp_footer(); ?>

</body>
</html>
