<?php
//Hook Widget
add_action( 'widgets_init', 'soundcloud_master_widget' );
//Register Widget
function soundcloud_master_widget() {
register_widget( 'soundcloud_master_widget' );
}

class soundcloud_master_widget extends WP_Widget {
	function soundcloud_master_widget() {
	$widget_ops = array( 'classname' => 'SoundCloud Master', 'description' => __('SoundCloud Master is a light weight and shiny clean code wordpress plugin WIDGET that you need to show off and sell your music. ', 'SoundCloud Master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'soundcloud_master_widget' );
	$this->WP_Widget( 'soundcloud_master_widget', __('SoundCloud Master', 'soundcloud_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$soundcloud_title = isset( $instance['soundcloud_title'] ) ? $instance['soundcloud_title'] :false;
		$soundcloud_title_new = isset( $instance['soundcloud_title_new'] ) ? $instance['soundcloud_title_new'] :false;
		$soundcloudspacer ="'";
		$show_soundcloudconnect = isset( $instance['show_soundcloudconnect'] ) ? $instance['show_soundcloudconnect'] :false;
		$soundcloudconnect_page = $instance['soundcloudconnect_page'];
		echo $before_widget;
		
		// Display the widget title
	if ( $soundcloud_title ){
		if (empty ($soundcloud_title_new)){
		$soundcloud_title_new = "Soundcloud Master";
		}
		echo $before_title . $soundcloud_title_new . $after_title;
	}
	else{
	}
	//Display SoundClound Player

	//Display SoundClound Connect
	if ( $show_soundcloudconnect ){
			$url_loc = plugins_url();
			echo '<a href="'.$soundcloudconnect_page.'" target="_blank"><img src="'.$url_loc.'/soundcloud-master/images/btn-connect-s.png"></a>' .
					'&nbsp;';
	}
	else{
	}
	//Display SoundCloud Lyrics

	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['soundcloud_title'] = strip_tags( $new_instance['soundcloud_title'] );
		$instance['soundcloud_title_new'] = $new_instance['soundcloud_title_new'];
		$instance['show_soundcloudconnect'] = $new_instance['show_soundcloudconnect'];
		$instance['soundcloudconnect_page'] = $new_instance['soundcloudconnect_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'soundcloud_title_new' => __('SoundCloud Master', 'soundcloud_master'), 'soundcloud_title' => true, 'soundcloud_title_new' => false, 'show_soundcloudconnect' => false, 'soundcloudconnect_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; height:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['soundcloud_title'], true ); ?> id="<?php echo $this->get_field_id( 'soundcloud_title' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'soundcloud_title' ); ?>"><b><?php _e('Display Widget Title', 'soundcloud_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'soundcloud_title_new' ); ?>"><?php _e('Change Title:', 'soundcloud_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'soundcloud_title_new' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud_title_new' ); ?>" value="<?php echo $instance['soundcloud_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_soundcloudconnect'], true ); ?> id="<?php echo $this->get_field_id( 'show_soundcloudconnect' ); ?>" name="<?php echo $this->get_field_name( 'show_soundcloudconnect' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_soundcloudconnect' ); ?>"><b><?php _e('SoundCloud Connect Button', 'soundcloud_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'soundcloudconnect_page' ); ?>"><?php _e('insert SoundCloud User Page link:', 'soundcloud_master'); ?></label>
	<input id="<?php echo $this->get_field_id( 'soundcloudconnect_page' ); ?>" name="<?php echo $this->get_field_name( 'soundcloudconnect_page' ); ?>" value="<?php echo $instance['soundcloudconnect_page']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Soundcloud Lyrics Button</b>
	</p>
	<div class="description">Only available in advanced version.</div><br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Soundcloud Player</b>
	</p>
	<div class="description">Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Shortcode Framework</b>
	</p>
	<div class="description">The shortcode framework allows you to insert Soundcloud Master inside Pages & Posts without the need of extra plugins or gimmicks. Fast page load times and top SEO. Only available in advanced version.</div>
	<br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
		<p>
		<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
		&nbsp;
		<b>SoundCloud Master Website</b>
		</p>
		<p><a class="button-secondary" href="http://wordpress.techgasp.com/soundcloud-master/" target="_blank" title="Soundcloud Master Info Page">Info Page</a> <a class="button-secondary" href="http://wordpress.techgasp.com/soundcloud-master-documentation/" target="_blank" title="Soundcloud Master Documentation">Documentation</a> <a class="button-primary" href="http://wordpress.techgasp.com/soundcloud-master/" target="_blank" title="Soundcloud Master">Adv. Version</a></p>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('../images/techgasp-minilogo-16.png', __FILE__); ?>" style="float:left; width:16px; vertical-align:middle;" />
	&nbsp;
	<b>Advanced Version Updater:</b>
	</p>
	<div class="description">The advanced version updater allows to automatically update your advanced plugin. Only available in advanced version.</div>
	<br>
	<?php
	}
 }
?>