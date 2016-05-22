<?php
/*
* Plugin Name: Business Address Widget Plugin
* Description: This is a widget used to format and display your business address. Displays the proper schema microdata for the best SEO benefit.
* Author: Your Name
* Version: 1.0.0
* Author URI: http://www.yourwebaddress.com
 * */

// Business Address Widget - Initial Setup and Registering

add_action( 'widgets_init', 'business_address_widget_init' );
function business_address_widget_init() {
    register_widget( 'business_address_widget' );
}
class business_address_widget extends WP_Widget {
    public function __construct() {
        $widget_details = array(
            'classname' => 'business_address_widget',
            'description' => 'Your business address. Displays the proper schema for the best SEO benefit.'
        );
        parent::__construct( 'business_address_widget', 'Business Address', $widget_details );
    }

    // Business Address Widget - Back-end display form
    public function form( $instance ) {
        $title = '';
        if( !empty( $instance['title'] ) ) {
            $title = $instance['title'];
        }

        $businessname = '';
        if( !empty( $instance['businessname'] ) ) {
            $businessname = $instance['businessname'];
        }

        $address1 = '';
        if( !empty( $instance['address1'] ) ) {
            $address1 = $instance['address1'];
        }

        $address2 = '';
        if( !empty( $instance['address2'] ) ) {
            $address2 = $instance['address2'];
        }

        $businesscity = '';
        if( !empty( $instance['businesscity'] ) ) {
            $businesscity = $instance['businesscity'];
        }

        $businessstate = '';
        if( !empty( $instance['businessstate'] ) ) {
            $businessstate = $instance['businessstate'];
        }

        $businesszip = '';
        if( !empty( $instance['businesszip'] ) ) {
            $businesszip = $instance['businesszip'];
        }

        $businessemail = '';
        if( !empty( $instance['businessemail'] ) ) {
            $businessemail = $instance['businessemail'];
        }

        $buscntrycode = '';
        if( !empty( $instance['buscntrycode'] ) ) {
            $buscntrycode = $instance['buscntrycode'];
        }

        $businessphone = '';
        if( !empty( $instance['businessphone'] ) ) {
            $businessphone = $instance['businessphone'];
        }

        $message = '';
        if( !empty( $instance['message'] ) ) {
            $message = $instance['message'];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title (optional):' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'businessname' ); ?>"><?php _e( 'Business Name:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'businessname' ); ?>" name="<?php echo $this->get_field_name( 'businessname' ); ?>" type="text" value="<?php echo esc_attr( $businessname ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'address1' ); ?>"><?php _e( 'Address line 1:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'address1' ); ?>" name="<?php echo $this->get_field_name( 'address1' ); ?>" type="text" value="<?php echo esc_attr( $address1 ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'address2' ); ?>"><?php _e( 'Address line 2 (optional):' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'address2' ); ?>" name="<?php echo $this->get_field_name( 'address2' ); ?>" type="text" value="<?php echo esc_attr( $address2 ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'businesscity' ); ?>"><?php _e( 'City:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'businesscity' ); ?>" name="<?php echo $this->get_field_name( 'businesscity' ); ?>" type="text" value="<?php echo esc_attr( $businesscity ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'businessstate' ); ?>"><?php _e( 'State:' ); ?></label>
            <input style="width: 35px; margin-right: 20px;" id="<?php echo $this->get_field_id( 'businessstate' ); ?>" name="<?php echo $this->get_field_name( 'businessstate' ); ?>" type="text" value="<?php echo esc_attr( $businessstate ); ?>" />
            <label for="<?php echo $this->get_field_name( 'businesszip' ); ?>"><?php _e( 'Zip:' ); ?></label>
            <input style="width: 70px;" id="<?php echo $this->get_field_id( 'businesszip' ); ?>" name="<?php echo $this->get_field_name( 'businesszip' ); ?>" type="text" value="<?php echo esc_attr( $businesszip ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'businessemail' ); ?>"><?php _e( 'Email:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'businessemail' ); ?>" name="<?php echo $this->get_field_name( 'businessemail' ); ?>" type="text" value="<?php echo esc_attr( $businessemail ); ?>" />
        </p>
        <p>
            <?php _e( 'Phone' ); ?><br>
            <label for="<?php echo $this->get_field_name( 'buscntrycode' ); ?>"><?php _e( 'Country Code #:' ); ?></label>
            <input style="width: 30px; margin-right: 5px;" id="<?php echo $this->get_field_id( 'buscntrycode' ); ?>" name="<?php echo $this->get_field_name( 'buscntrycode' ); ?>" type="text" value="<?php echo esc_attr( $buscntrycode ); ?>" />
            <label for="<?php echo $this->get_field_name( 'businessphone' ); ?>"><?php _e( '#' ); ?></label>
            <input style="width: 110px;" id="<?php echo $this->get_field_id( 'businessphone' ); ?>" name="<?php echo $this->get_field_name( 'businessphone' ); ?>" type="text" value="<?php echo esc_attr( $businessphone ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'message' ); ?>"><?php _e( 'Message (optional):' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'message' ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>" type="text" ><?php echo esc_attr( $message ); ?></textarea>
        </p>

        <?php
    }
    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

// Business Address Widget - Front-end display HTML
    public function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters( 'widget_title', $instance['title'] );
        $businessname = $instance['businessname'];
        $address1 = $instance['address1'];
        $address2 = $instance['address2'];
        $businesscity = $instance['businesscity'];
        $businessstate = $instance['businessstate'];
        $businesszip = $instance['businesszip'];
        $businessemail = $instance['businessemail'];
        $buscntrycode = $instance['buscntrycode'];
        $businessphone = $instance['businessphone'];
        $message = $instance['message'];

        echo $before_widget;
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        echo '<div class="businesswidget" itemscope itemtype="http://schema.org/LocalBusiness">';
        echo '<p class="businessname" itemprop="name"><i class="fa fa-map-marker"></i>' . $businessname . '</p>';
        echo '<address itemprop="address"><span style="display: block; padding-left: 22px;">';
        if ($address1) {
            echo $address1 . '<br>';
        }
        if ($address2) {
            echo $address2 . '<br>';
        }
        if ($businesscity) {
            echo $businesscity . ', ' . $businessstate . '  ' . $businesszip;
            echo '</span></address>';
        }
        if ($businessemail) {
            echo '<p class="businessemail"><a href="mailto:' . $businessemail . '"><i class="fa fa-envelope-o"></i>' . $businessemail . '</a></p>';
        }
        if ($businessphone) {
            echo '<p class="businessphone" itemprop="telephone"><a href="tel:+' . $buscntrycode . $businessphone . '"><i class="fa fa-phone"></i>' . $businessphone . '</a></p>';
        }
        if ($message) {
            echo $message;
        }
        echo '</div>';
        echo $after_widget;
    }
}
// class business_address_widget ends here

?>