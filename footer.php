      </main><!-- /.main -->
    </div><!-- /.content-wrap -->

    <?php
    if( visitor_type() ) {
      get_template_part('partials/components/search-module');
    }
    ?>

    <footer class="flex">
      <div class="footer-msg-wrap flex-box">
        <p>See something missing from this list? Submit an organization on the <a href="<?php permalink_by_title('Add An Organization'); ?>" class="submit-org-link">Submissions Page</a>.</p>
        <p class="disclaimer">This site is not for profit. It was put together quickly to try to help and it's probably not perfect. We hope you find it useful.</p>

      </div>
    </footer>
  </div> <!-- .offcanvas-wrap-inner -->
</div><!-- /.wrap .offcanvas-wrap-outer -->

</div><!-- /.app-wrap -->
<?php wp_footer(); ?>

</body>
</html>
