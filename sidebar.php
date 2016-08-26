    <div class="page-sidebar col-md-4 col-md-offset-1">
      <p>Please do not contact us directly about getting assistance or volunteering. If you have a general question for our team, email <a href="mailto:info@lafloodrecovery.org">info@lafloodrecovery.org</a>.</p>
      <hr>
      <p>See something missing from our lists? Please help us expand this directory by <a href="<?php permalink_by_title('Add An Organization'); ?>">sharing a resource here</a>.</p>
      <hr>
      <?php if (!is_page('Who We Are')): ?>
        <p><a href="<?php permalink_by_title('Who We Are'); ?>">Learn more</a> about the people behind LA Flood Recovery.</p>
      <?php else: ?>
        <p><a href="<?php permalink_by_title('About'); ?>">Learn more</a> about the Louisiana Flood Recovery directory.</p>
      <?php endif; ?>
      <hr>
      <?php if ( is_active_sidebar( 'primary-sidebar' ) ) { dynamic_sidebar( 'primary-sidebar' ); } ?>
    </div>
