<?php
/**
 * Template Name: About Page
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
  <div class="page-wrap row-fluid">
    <div class="about-page--content col-md-7">
      <h3>Your open-source directory for finding and getting help after the 2016 Louisiana floods.</h3>
      <p>LAFloodRecovery.org helps connect flood survivors with effective flood relief and recovery organizations, and volunteers with opportunities to help. We do not personally offer any relief services; we’re here to connect you with the existing services that you’re looking for.</p>
      <h3>Check here for up-to-date, comprehensive flood recovery resources.</h3>
      <p>After the floods, everyone sprang into action. In fact, there’s been so much happening on the internet and in the media that it’s been a little overwhelming. How do you know where to go for help--or where your money or time will make the most difference for those in need? This website is here to guide volunteers toward effective ways of helping the flood recovery effort.</p>
      <a class="about-page--cta" href="<?php echo site_url('want-to-help') ?>">Find out how you can help<i class="fa fa-fw fa-arrow-right"></i></a>
      <p>It’s also here to provide flood survivors with the help you need right now. </p>
      <a class="about-page--cta" href="<?php echo site_url('want-to-help') ?>">Get flood recovery help<i class="fa fa-fw fa-arrow-right"></i></a>
      <h3>Let's Work Together.</h3>
      <p>If you, your team, or someone you know is doing the same thing as LAFloodRecovery.org, please let us know immediately so we can get in touch with them. We’ll happily put our energy towards another effort with the same goal, and we’ll happily partner with other folks who are offering services that we can add to this directory.</p>
    </div>
    <div class="about-page--sidebar col-md-4 col-md-offset-1">
      <p>Please do not contact us directly about getting assistance or volunteering. If you have a general question for our team, email <a href="mailto:info@lafloodrecovery.org">info@lafloodrecovery.org</a>.</p>
      <hr>
      <p>See something missing from our lists? Please help us expand this directory by <a href="<?php permalink_by_title('Add An Organization'); ?>">sharing a resource here</a>.</p>
      <hr>
      <p><a href="<?php permalink_by_title('About'); ?>">Learn more</a> about the people behind LA Flood Recovery.</p>
      <hr>
    </div>

  </div>
<?php endwhile; ?>

<?php get_footer(); ?>