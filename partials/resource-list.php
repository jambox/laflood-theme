
<ul class="resource-list">
  <?php
  $cat_ID = get_queried_object()->term_id;
  $child_cats = get_child_categories( $cat_ID );  
  foreach( $child_cats as $cat ) :
  ?>
    <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default"><?php echo $cat->name; ?></a></li>
  <?php
  endforeach;
  // echo get_sub_categories_by_name( $cat_name );
  ?>
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Housing</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Food</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Transportation</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Medical Supplies</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Animal Food/Supplies</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Clothing</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Funds</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Time/Hands-on-deck</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Specialized Services<br/>(i.e. MD/Nurse, counseling, car mechanic)</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Surveillance/Documentation</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Computers/Electronics/Comm. Devices</a></li> -->
  <!-- <li class="resource-tile offering col-md-4 col-sm-6 col-xs-6"><a href="#" class="resource-tile--link btn btn-default">Data Entry/Remote Work</a></li> -->
</ul> 
