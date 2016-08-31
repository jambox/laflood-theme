<section class="search-module--wrap">
  <div class="container">
    <?php $search_prompt = is_client_page() ? "you need" : is_volunteer_page() ? "you can provide" : "you're looking for";  ?>
    <?php $action_prompt = is_client_page() ? "provide that for you" : is_volunteer_page() ? "put you to work" : "help you";  ?>
    <h5 class="search-bar-prompt">Do you have a specialized service <?php echo $search_prompt ?>? Search below to find an organization that can <?php echo $action_prompt; ?>.</h5>
  </div>
  <div class="search-bar--wrap">
    <div class="row-fluid">
      <div class="container">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</section>
