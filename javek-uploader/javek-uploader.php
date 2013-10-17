<?php
/*
Plugin Name: Javek Uploader
Plugin URI: http://wordpress.org/extend/plugins/javek-uploader
Description: Allows people to securely send you files through your Wordpress site, using a Javek client-portal. Use the shortcode <code>[javek-portal name="your-company"]</code> in any post or page. (If your Javek portal is at http://www.javek.com/my-company, you would use "my-company" in the "name" field of the shortcode: <code>[javek-uploader name="my-company"]</code>).
Version: 3.2
Author: Javek
Author URI: http://www.javek.com
License: GPL2

	Copyright 2012 Javek  (email : support@javek.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function javek_uploader_shortcode($atts, $content = null)
{
    if (!isset($atts['name']))
    {
        $html = '<div style="padding:20px 40px;border:3px solid #ff0000;background:#fff">
            <p style="font-size:1.5em;color:#000">Javek Uploader</p>
            <p style="font-size:1em;color:#000">You did not enter your the Javek shortcode correctly in this post or page.</p>
            <p style="font-size:1em;color:#000">Please change [javek-uploader] to [javek-uploader name="your-subscription-name"].</p>
            <p style="font-size:1em;color:#000">(Your subscription name is the last part of your portal url. If your portal url is https://www.javek.com/my-company, "my-company" is your subscription name. Your shortcode would be [javek-uploader name="my-company"])</p>
        </div>';
    }
    elseif (!$atts['name'])
    {
        $html = '<div style="padding:20px 40px;border:3px solid #ff0000;background:#fff">
            <p style="font-size:1.5em;color:#000">Javek Uploader</p>
            <p style="font-size:1em;color:#000">You did not enter your the Javek shortcode correctly in this post or page.</p>
            <p style="font-size:1em;color:#000">Please change [javek-uploader name=""] to [javek-uploader name="your-subscription-name"].</p>
            <p style="font-size:1em;color:#000">(Your subscription name is the last part of your portal url. If your portal url is https://www.javek.com/my-company, "my-company" is your subscription name. Your shortcode would be [javek-uploader name="my-company"])</p>
        </div>';
    }
    else
    {
        $widget = new Javek_Uploader_Widget();
        
        $args = array();
        $instance = array(
                'subscription_name' => strtolower($atts['name'])
            );
        $html = $widget->widget($args, $instance);
    }
    
    return $html;
}
add_shortcode('javek-uploader', 'javek_uploader_shortcode');


class Javek_Uploader_Widget extends WP_Widget
{
	public function __construct() 
	{
		parent::__construct(
	 		'javek_uploader_widget', // Base ID
			'Javek Uploader', // Name
			array( 'description' => __( 'Creates an upload form on your site. People can use this form to securely send you large files via the Javek client portal service.', 'en_US' ), ) // Args
		);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
 	public function form( $instance ) 
 	{
		if (isset($instance['subscription_name'])) {
			$name = $instance['subscription_name'];
		}
		else {
			$name = '';
		}
		
 		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		else {
			$title = '';
		}
		
 		if (isset($instance['description'])) {
			$description = $instance['description'];
		}
		else {
			$description = '';
		}
		
		$border_color = (isset($instance['border_color'])) ? $instance['border_color'] : '';
		?>
		<p>URL of your <a href="http://www.javek.com" target="_blank">Javek</a> portal:</p>
		<p> 
		<span style="font-weight: bold">https://www.javek.com/<input style="width:80px" id="<?php echo $this->get_field_id( 'subscription_name' ); ?>" name="<?php echo $this->get_field_name( 'subscription_name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" /></span>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Optional Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>">Optional Description:</label>
			<textarea style="height:80px" class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo $description; ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'border_color' ); ?>">Optional Border Color:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'border_color' ); ?>" name="<?php echo $this->get_field_name( 'border_color' ); ?>" value="<?php echo $border_color; ?>" />
			<span style="font-style:italic;font-size:10px">Examples: "red" or "#FF0000" or "rgb(255, 0, 0)"</span>
		</p>
		
		<p>Please remember you must enable "Public Buckets" within your Javek subscription before this widget can be used.</p>
		<p>To do so, login to Javek, got to <strong>Administration</strong> &gt; <strong>Buckets</strong> and click the "Public Buckets/Uploads" button at the bottom of the page.</p>
		<p style="font-style:italic;font-size:10px">*By using this widget you give <a href="http://www.javek.com" target="_blank">Javek</a> permission to display a small link to www.javek.com within the widget.</p>
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
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['subscription_name'] = trim(strip_tags($new_instance['subscription_name']));
		$instance['title'] = trim(strip_tags($new_instance['title']));
		$instance['description'] = trim($new_instance['description']);
		$instance['border_color'] = trim($new_instance['border_color']);

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) 
	{
	    $style = ($instance['border_color']) ? 'border:4px solid '.$instance['border_color'] : '';
	    
	    echo '<div class="javek-uploader-widget-container" style="'.$style.'">';
	    
		if (isset($instance['title'])) {
			if ($instance['title']) echo '<h3 class="widget-title">'.$instance['title'].'</h3>';
		}
		if (isset($instance['description'])) {
			if ($instance['description']) echo '<p>'.$instance['description'].'</p>';
		}
		
		echo '<script>(function(d, s, id) {
 var domain=(window.location.protocol=="https:")?"https://c3438863.ssl.cf0.rackcdn.com":"http://c3438863.r63.cf0.rackcdn.com";
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) return;
 js = d.createElement(s); js.id = id;
 js.src = domain + "/widget.public-bucket.v3.2.min.js";
 fjs.parentNode.insertBefore(js, fjs); 
}(document, "script", "javek-public-bucket-js"));</script>
<style type="text/css">
.javek-uploader-widget-container { background:#fff;width:586px;padding:10px 20px 0 20px; }
#javek-public-uploader-iframe { width:580px; height:250px }
@media only screen and (max-device-width: 480px) {
    #javek-public-uploader-iframe { width:300px; height:275px }
    .javek-uploader-widget-container { width:300px;padding:2px }
}
</style>
<div class="javek-public-bucket" name="'.$instance['subscription_name'].'"></div>';
		
		echo '</div>';
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "javek_uploader_widget" );' ) );