<?php
//Load Shortcode Framework

//Hook Widget
add_action( 'widgets_init', 'techgasp_soundcloudmaster_widget' );
//Register Widget
function techgasp_soundcloudmaster_widget() {
register_widget( 'techgasp_soundcloudmaster_widget' );
}

class techgasp_soundcloudmaster_widget extends WP_Widget {
	function techgasp_soundcloudmaster_widget() {
	$widget_ops = array( 'classname' => 'SoundCloud Master', 'description' => __('SoundCloud Master is a light weight and shiny clean code wordpress plugin WIDGET that you need to show off and sell your music. ', 'SoundCloud Master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'techgasp_soundcloudmaster_widget' );
	$this->WP_Widget( 'techgasp_soundcloudmaster_widget', __('SoundCloud Master', 'soundcloud master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$name = "SoundCloud Master";
		$title = isset( $instance['title'] ) ? $instance['title'] :false;
		$soundcloudspacer ="'";
		$show_soundcloudconnect = isset( $instance['show_soundcloudconnect'] ) ? $instance['show_soundcloudconnect'] :false;
		$soundcloudconnect_page = $instance['soundcloudconnect_page'];
		$soundcloudlyrics_page = $instance['soundcloudlyrics_page'];
		echo $before_widget;
		
		// Display the widget title
	if ( $title )
		echo $before_title . $name . $after_title;
	//Display SoundClound Player

	//Display SoundClound Connect
	if ( $show_soundcloudconnect )
			echo '<a href="'.$soundcloudconnect_page.'" target="_blank"><img src="../wp-content/plugins/soundcloud-master/btn-connect-s.png"></a>' .
					'&nbsp;';
	//Display SoundCloud Lyrics

	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_soundcloudconnect'] = $new_instance['show_soundcloudconnect'];
		$instance['soundcloudconnect_page'] = $new_instance['soundcloudconnect_page'];
		$instance['soundcloudlyrics_page'] = $new_instance['soundcloudlyrics_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'name' => __('SoundCloud Master', 'soundcloud master'), 'title' => true, 'show_soundcloudconnect' => false, 'soundcloudconnect_page' => false, 'show_soundcloudlyrics' => false, 'soundcloudlyrics_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<b>Check the buttons to be displayed:</b>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['title'], true ); ?> id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><b><?php _e('Display Widget Title', 'soundcloud master'); ?></b></label></br>
	</p>
	<hr>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_soundcloudconnect'], true ); ?> id="<?php echo $this->get_field_id( 'show_soundcloudconnect' ); ?>" name="<?php echo $this->get_field_name( 'show_soundcloudconnect' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_soundcloudconnect' ); ?>"><b><?php _e('SoundCloud Connect Button', 'soundcloud master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'soundcloudconnect_page' ); ?>"><?php _e('insert SoundCloud User Page link:', 'soundcloud master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'soundcloudconnect_page' ); ?>" name="<?php echo $this->get_field_name( 'soundcloudconnect_page' ); ?>" value="<?php echo $instance['soundcloudconnect_page']; ?>" style="width:auto;" />
	</p>
	<hr>
	<hr>
	<p><b>SoundCloud Master Advanced Version:</b> contains the extra SoundCloud Player (full nine yards SoundCloud Player. Single tracks and Sets of Tracks Supported. Includes shortcode framework.</p>
	<p><a class="button-primary" href="http://wordpress.techgasp.com/soundcloud-master/" target="_blank" title="Soundclound Master Advanced Version">Soundclound Master Advanced Version</a></p>
	<?php
	}
 }
?>