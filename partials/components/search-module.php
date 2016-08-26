<section class="search-module--wrap">
  <div class="container">
    <?php $search_prompt = is_client_page() ? "you need" : "you can provide";  ?>
    <?php $action_prompt = is_client_page() ? "provide that for you" : "put you to work";  ?>
    <h5 class="search-bar-prompt">Do you have a specialized service <?php echo $search_prompt ?>? Search below to connect to an organization that can <?php echo $action_prompt; ?>.</h5>
  </div>
  <div class="search-bar--wrap">
    <div class="row-fluid">
      <div class="container">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</section>
