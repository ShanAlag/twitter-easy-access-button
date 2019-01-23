<?php
/**
 * Adds Twitter_Subs widget.
 */
 
 add_action('widgets_init', create_function('', 'return register_widget("twitter_Subs_Widget");'));
 class twitter_Subs_Widget extends WP_Widget {
  
    /**
     * Register widget with WordPress.
     */
    function __construct() {
      parent::__construct(
	 		'twitter_Subs_Widget',
	 		__( 'Twitter Follow Button', 'twitter_Subs_Widget-new' ),
			array( 'description' => __( 'Add the Follow Button to your blog to increase engagement and create a lasting connection with your audience.', 'twitter_Subs_Widget-new'), )
		);
    }
  

    public function form( $instance ) {
      if ( $instance ) {
			$tsw_title = esc_attr($instance['tsw_title']);
			$tsw_username = esc_attr($instance['tsw_username']);
			$tsw_data_show_count = esc_attr($instance['tsw_data_show_count']);
			$tsw_size = esc_attr($instance['tsw_size']);
			$tsw_show_screen_name = esc_attr($instance['tsw_show_screen_name']);
			$tsw_data_dnt = esc_attr($instance['tsw_data_dnt']);
			$tsw_language = esc_attr($instance['tsw_language']);
		}
		else {
			$tsw_title = __( 'Follow Button', 'twitter_Subs_Widget-new' );
			$tsw_username = 'alag_shan';
			$tsw_data_show_count = 'true';
			$tsw_size = 'medium';
			$tsw_show_screen_name = 'true';
			$tsw_data_dnt = 'false';
			$tsw_language = 'en';
		}
      ?>
      
      
      
      <!-- TITLE -->
      <p>
			<label for="<?php echo $this->get_field_id('tsw_title'); ?>">
				<?php _e('Title:', 'twitter_Subs_Widget-new'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('tsw_title'); ?>" name="<?php echo $this->get_field_name('tsw_title'); ?>" type="text" value="<?php echo $tsw_title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('tsw_username'); ?>">
				<?php _e('Twitter Username:', 'twitter_Subs_Widget-new'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('tsw_username'); ?>" name="<?php echo $this->get_field_name('tsw_username'); ?>" type="text" value="<?php echo $tsw_username; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('tsw_data_show_count'); ?>">
				<?php _e('Followers count:', 'twitter_Subs_Widget-new'); ?>
				
			</label>
			<select id="<?php echo $this->get_field_id('tsw_data_show_count'); ?>" name="<?php echo $this->get_field_name('tsw_data_show_count'); ?>">
				<option value="true" <?php selected( 'true', $tsw_data_show_count ); ?>><?php _e('Yes', 'twitter_Subs_Widget-new'); ?></option>
				<option value="false" <?php selected( 'false', $tsw_data_show_count ); ?>><?php _e('No', 'twitter_Subs_Widget-new'); ?></option>
			</select>

		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tsw_size'); ?>">
				<?php _e('Button Size:', 'twitter_Subs_Widget-new'); ?>
				
			</label>
			<select id="<?php echo $this->get_field_id('tsw_size'); ?>" name="<?php echo $this->get_field_name('tsw_size'); ?>">
				<option value="medium" <?php selected( 'medium', $tsw_size ); ?>><?php _e('Medium', 'twitter_Subs_Widget-new'); ?></option>
				<option value="large" <?php selected( 'large', $tsw_size ); ?>><?php _e('Large', 'twitter_Subs_Widget-new'); ?></option>
			</select>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('tsw_show_screen_name'); ?>">
				<?php _e('Show Screen Name:', 'twitter_Subs_Widget-new'); ?>
			</label>
			<select id="<?php echo $this->get_field_id('tsw_show_screen_name'); ?>" name="<?php echo $this->get_field_name('tsw_show_screen_name'); ?>">
				<option value="true" <?php selected( 'true', $tsw_show_screen_name ); ?>><?php _e('Yes', 'twitter_Subs_Widget-new'); ?></option>
				<option value="false" <?php selected( 'false', $tsw_show_screen_name ); ?>><?php _e('No', 'twitter_Subs_Widget-new'); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('tsw_data_dnt'); ?>">
				<?php _e('Opt-out of tailoring Twitter:', 'twitter_Subs_Widget-new'); ?>
			</label>
			<select id="<?php echo $this->get_field_id('tsw_data_dnt'); ?>" name="<?php echo $this->get_field_name('tsw_data_dnt'); ?>">
				<option value="true" <?php selected( 'true', $tsw_data_dnt ); ?>><?php _e('Yes', 'twitter_Subs_Widget-new'); ?></option>
				<option value="false" <?php selected( 'false', $tsw_data_dnt ); ?>><?php _e('No', 'twitter_Subs_Widget-new'); ?></option>
			</select>
		</p>
		
      <?php 
    }
  
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;

		$instance['tsw_title'] = sanitize_text_field($new_instance['tsw_title']);
		$instance['tsw_username'] = sanitize_text_field($new_instance['tsw_username']);
		$instance['tsw_data_show_count'] = sanitize_text_field($new_instance['tsw_data_show_count']);
		$instance['tsw_size'] = sanitize_text_field($new_instance['tsw_size']);
		$instance['tsw_show_screen_name'] = sanitize_text_field($new_instance['tsw_show_screen_name']);
		$instance['tsw_data_dnt'] = sanitize_text_field($new_instance['tsw_data_dnt']);
		

		return $instance;
	}
	
	function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
			$tsw_title = apply_filters('widget_tsw_title', $instance['tsw_title']);
			$tsw_username = apply_filters('widget_tsw_username', $instance['tsw_username']);
			$tsw_data_show_count = apply_filters('widget_tsw_data_show_count', $instance['tsw_data_show_count']);
			$tsw_size = apply_filters('widget_tsw_size', $instance['tsw_size']);
			$tsw_show_screen_name = apply_filters('widget_tsw_show_screen_name', $instance['tsw_show_screen_name']);
			$tsw_data_dnt = apply_filters('widget_tsw_data_dnt', $instance['tsw_data_dnt']);
			

		
  
   
  ?>
  <?php echo $before_widget; ?>
	<?php if ( $tsw_title )
	 	echo $before_title . $tsw_title . $after_title; ?>
		<div class="container_twitter_Subs_Widget">
			<a href="http://twitter.com/<?php echo $tsw_username; ?>" class="twitter-follow-button" data-show-count="<?php echo $tsw_data_show_count; ?>" data-size="<?php echo $tsw_size; ?>" data-show-screen-name="<?php echo $tsw_show_screen_name; ?>" data-dnt="<?php echo $tsw_data_dnt; ?>" data-lang="<?php echo $tsw_language; ?>" >Follow @<?php echo $tsw_username; ?></a>
		</div>
		<?php echo $after_widget; ?>
<?php
	}
}

function tsw_load_plugin_textdomain() {
    load_plugin_textdomain( 'twitter_Subs_Widget-new', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'tsw_load_plugin_textdomain' );

add_action('wp_head', 'tsw_twitter_Subs_js');


function tsw_twitter_Subs_js() { 	?>
	<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>
<?php } 

  
  ?>