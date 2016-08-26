<?php

/*
 *  Social Icons Widget
 *  Author: Gifford Nowland
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
  exit;
}

if ( !class_exists('widget_social_icons') ) {

	//Register Widget
  add_action('widgets_init', 'load_widget_social_icons');

  function load_widget_social_icons() {
    register_widget( 'widget_social_icons' );
  }

  // Set up available accounts
  $widgetSocialAccounts = array(
  	'Email' => 'email',
  	'Facebook' => 'facebook-official',
  	'Twitter' => 'twitter',
  	'YouTube' => 'youtube',
  	'tumblr' => 'tumblr',
  	'LinkedIn' => 'linkedin',
  	'Pinterest' => 'pinterest',
  	'Instagram' => 'instagram',
  	'Google+' => 'google-plus',
  	'Flickr' => 'flickr',
  	'Foursquare' => 'foursquare',
  	'Medium' => 'medium',
  	'Vimeo' => 'vimeo',
  	'Yelp' => 'yelp'
  );

  // start class
  class widget_social_icons extends WP_Widget {

	 /**
		*
		*  Register widget with WordPress
		*
		*/
		function __construct() {
			parent::__construct(
				'social_icons',
				'&#10052; Social Media Icons',
				array( 'description' => "Display icons linking to your Social Media accounts." )
			);
		} // /register widget

	 /**
		*
		*  Back-end widget form
		*
		*/
		public function form( $instance ) {

			if( isset($instance[ 'title' ])){ $title = $instance[ 'title' ]; } else { $title = 'Social Media'; }
      if( isset($instance[ 'iconfont' ])){ $iconfont = $instance[ 'iconfont' ]; } else { $iconfont = 'fa fa-'; }

			?>
			<p>
				<label>Widget Title:
				  <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" style="width:100%;" value="<?php echo esc_attr( $title ); ?>">
        </label>
			</p>
      <p>
        <label>Icon Font Prefix:<br>
          <input type="text" id="<?php echo $this->get_field_id( 'iconfont' ); ?>" name="<?php echo $this->get_field_name( 'iconfont' ); ?>" value="<?php echo esc_attr( $iconfont ); ?>">
        </label><br><small style="color:#8C8C8C;">e.g. "fa fa-" for <a href="http://fortawesome.github.io/Font-Awesome/" target="_blank" style="color:#8C8C8C;">Font Awesome</a></small>
      </p>
			<?php

			global $widgetSocialAccounts;

			foreach( $widgetSocialAccounts as $account => $accountUrl) {
				if( isset($instance[$accountUrl])){ $thisAccount = $instance[ $accountUrl ]; } else {  $thisAccount = ''; }

				?><p>
						<label><?php echo $account; ?>
						  <input id="<?php echo $this->get_field_id( $accountUrl ); ?>" name="<?php echo $this->get_field_name( $accountUrl ); ?>" class="widefat regular-text code" style="width:100%;" type="url" value="<?php echo esc_attr( $thisAccount ); ?>">
            </label>
				</p><?php
			}
		} // /backend form

	 /**
		*
		* Save & Sanitize widget form values as they are saved.
		*
		*/

		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

      $instance['iconfont'] = ( ! empty( $new_instance['iconfont'] ) ) ? strip_tags( $new_instance['iconfont'] ) : '';

			global $widgetSocialAccounts;
			foreach( $widgetSocialAccounts as $account => $accountUrl) {
				$instance[$accountUrl] = ( ! empty( $new_instance[$accountUrl] ) ) ? strip_tags( $new_instance[$accountUrl] ) : '';
			}

			return $instance;
		} // /save function

	 /**
		*
		* Front-end display of widget.
		*
		*/

		public function widget( $args, $instance ) {

			echo $args['before_widget']; // for the sake of css

			if(!empty($instance['title'])){
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'] . PHP_EOL;
			}

			global $widgetSocialAccounts;

			if($widgetSocialAccounts){
				echo '<ul class="social-icons list-unstyled list-inline">';
				foreach( $widgetSocialAccounts as $account => $slug) {

					if(!empty($instance[$slug])){
						$url = $instance[$slug];
						echo '<li>',
							'<a href="', $slug === 'email' ? 'mailto:' . $url . '"' : $url . '" target="_blank"', ' aria-label="', $account, '">',
								'<i class="', $instance['iconfont'], $slug === 'email' ? 'envelope' : $slug, '"></i>',
							'</a>',
						'</li>';
					}

				}
				echo '</ul>';
			}

			echo $args['after_widget']; // for the sake of css
		}

	} // end class

} // end if

?>