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
		$title = "SoundCloud Master";
		$soundcloudspacer ="'";
		$show_soundcloudconnect = isset( $instance['show_soundcloudconnect'] ) ? $instance['show_soundcloudconnect'] :false;
		$soundcloudconnect_page = $instance['soundcloudconnect_page'];
		$show_soundcloudlyrics = isset( $instance['show_soundcloudlyrics'] ) ? $instance['show_soundcloudlyrics'] :false;
		$soundcloudlyrics_page = $instance['soundcloudlyrics_page'];
		echo $before_widget;
		
		// Display the widget title
	if ( $title )
		echo $before_title . $title . $after_title;
	//Display SoundClound Player
	if ( $show_soundcloudplayer )
		echo $soundcloudplayer_code;
	//Display SoundClound Connect
	if ( $show_soundcloudconnect )
			echo '<a href="'.$soundcloudconnect_page.'" target="_blank"><img src="../wp-content/plugins/soundcloud-master/btn-connect-s.png"></a>' .
					'&nbsp;';
	//Display SoundCloud Lyrics
	
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_soundcloudconnect'] = $new_instance['show_soundcloudconnect'];
		$instance['soundcloudconnect_page'] = $new_instance['soundcloudconnect_page'];
		$instance['show_soundcloudlyrics'] = $new_instance['show_soundcloudlyrics'];
		$instance['soundcloudlyrics_page'] = $new_instance['soundcloudlyrics_page'];
		return $instance;
	}
	function form( $instance ) {
	//Set up some default widget settings.
	$defaults = array( 'title' => __('SoundCloud Master', 'soundcloud master'), 'show_soundcloudconnect' => false, 'soundcloudconnect_page' => false, 'show_soundcloudlyrics' => false, 'soundcloudlyrics_page' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<b>Check the buttons to be displayed:</b>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_soundcloudconnect'], true ); ?> id="<?php echo $this->get_field_id( 'show_soundcloudconnect' ); ?>" name="<?php echo $this->get_field_name( 'show_soundcloudconnect' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_soundcloudconnect' ); ?>"><b><?php _e('SoundCloud Connect Button', 'soundcloud master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'soundcloudconnect_page' ); ?>"><?php _e('insert SoundCloud User Page link:', 'soundcloud master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'soundcloudconnect_page' ); ?>" name="<?php echo $this->get_field_name( 'soundcloudconnect_page' ); ?>" value="<?php echo $instance['soundcloudconnect_page']; ?>" style="width:auto;" />
	</p>
	<hr>
	<p>
	<input type="checkbox" <?php checked( (bool) $instance['show_soundcloudlyrics'], true ); ?> id="<?php echo $this->get_field_id( 'show_soundcloudlyrics' ); ?>" name="<?php echo $this->get_field_name( 'show_soundcloudlyrics' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_soundcloudlyrics' ); ?>"><b><?php _e('Soundcloud Lyrics Button', 'soundcloud master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'soundcloudlyrics_page' ); ?>"><?php _e('insert SoundClound Lyrics Link:', 'soundclound master'); ?></label></br>
	<input id="<?php echo $this->get_field_id( 'soundcloudlyrics_page' ); ?>" name="<?php echo $this->get_field_name( 'soundcloudlyrics_page' ); ?>" value="<?php echo $instance['soundcloudlyrics_page']; ?>" style="width:auto;" />
	</p>
	<hr>
	<p><b>SoundCloud Master Advanced Version:</b> constains the extra SoundCloud Player (full nine yards SoundCloud Player. Single tracks and Sets of Tracks Supported. Includes shortcode framework.</p>
	<p><a class="button-primary" href="http://wordpress.techgasp.com/soundcloud-master/" target="_blank" title="Soundclound Master Advanced Version">Soundclound Master Advanced Version</a></p>
	<?php
	}
 }
?>
