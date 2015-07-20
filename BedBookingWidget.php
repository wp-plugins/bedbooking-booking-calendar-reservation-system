<?php

class BedBookingWidget extends WP_Widget {

	function BedBookingWidget() {
		// Instantiate the parent object
        
        add_action( 'admin_enqueue_scripts', array($this, 'bedbooking_widget_script' ) );
                
        wp_enqueue_script( 'bedbooking_main_full_script','https://panel.bed-booking.com/widget/main_full.js', array(), '1.0.0', false ); 
        wp_enqueue_script( 'bedbooking_main_script','https://panel.bed-booking.com/widget/main.js', array(), '1.0.0', false ); 
          
		parent::__construct(
			'BedBooking_Widget', // Base ID
			__('BedBooking', 'text_domain'), // Name
			array( 'description' => __( 'Booking calendar', bedbooking_Text_Domain ), ) // Args
		);
	}

    
    function bedbooking_widget_script() {
        wp_enqueue_script( 'bedbooking_widget_script',plugins_url('/js/bedbooking-widget.js', __FILE__), array(), '1.0.0', true );
    }

	function widget( $args, $instance ) {

        $data = unserialize(get_option(bedbooking_OptionName));
        $type = $instance['bedbooking-widget-type'];
        $lang = '"'.$instance['bedbooking-widget-language'].'"';
        
        ?>
        <?php if($type == -1) :    ?>

            <div id='bedbooking-widget-search'></div>
            <div id='bedbooking-widget-results'></div>
            <script type='text/javascript'>var d = document; window.bedbookingAsyncInit = function() {
                BedBooking.init({ userId : <?php echo $data['userId'];?>, objectId : <?php echo $data['objectId'];?>, debug : true, buttonColor: '#333333',
                    lang: <?php echo $lang;?>, baseUrl : '//panel.bed-booking.com/', hideLocationSearch : false,
                    statistic : 'bb_wp_search' }); }; (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) {  return; }
                    js = d.createElement(s); js.id = id; js.src = '//panel.bed-booking.com/widget/widget_v2.js'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'bedbooking-jssdk')); </script>
        <?php elseif($type == 0):  ?>
            <div id='bedbooking-calendar-0'></div><script type='text/javascript'>jQuery(document).ready(function() { new CalendarFull('<?php echo $data['calendarcode'];?>', '0', 'bedbooking-calendar-0', { normal: '7dbb2c',  reserved: 'fb1643', nextMonth: 'ecf5e1', font:'81817f', width: 450, lang: <?php echo $lang;?>,  statistic : 'bb_wp_full'  }); }); </script>
        <?php else :  ?>
            <div id='bedbooking-calendar-<?php echo $type ;?>'></div><script type='text/javascript'>jQuery(document).ready(function() { new Calendar('<?php echo $data['calendarcode'];?>', '<?php echo $type ;?>', 'bedbooking-calendar-<?php echo $type ;?>', { normal: '7dbb2c',  reserved: 'fb1643', nextMonth: 'ecf5e1', font:'81817f', width: 450, lang: <?php echo $lang;?>, statistic : 'bb_wp_room' }); }); </script>
        <?php endif;?>





<?php
	}

    function bedbooking_widget_vars($instance){ 
        $data = unserialize(get_option(bedbooking_OptionName));
        ?>
             <script>
                var bedbooking_selected = <?php echo isset($instance['bedbooking-widget-type']) ? $instance['bedbooking-widget-type'] : -2; ?>;
                var bedbooking_selectedLang = '<?php echo isset($instance['bedbooking-widget-language']) ? $instance['bedbooking-widget-language'] : 'en'; ?>';
                
                var bedbooking_username = "<?php echo $data['username'];?>";
                var bedbooking_password = "<?php echo $data['password'];?>";

                jQuery('document').ready(function () {
                    bedbooking_update();
                });
            </script>
        <?php
    }

        
    
	function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['bedbooking-widget-type'] = ( ! empty( $new_instance['bedbooking-widget-type'] ) ) ? strip_tags( $new_instance['bedbooking-widget-type'] ) : '0';
        $instance['bedbooking-widget-language'] = ( ! empty( $new_instance['bedbooking-widget-language'] ) ) ? strip_tags( $new_instance['bedbooking-widget-language'] ) : 'en';
		return $instance;
	}

	function form( $instance ) {
        $data = unserialize(get_option(bedbooking_OptionName));
        
        $this->bedbooking_widget_vars($instance );
        if(isset($data['username'])) : ?>

          
            
            <p>
                <label for="<?php echo $this->get_field_id( 'bedbooking-widget-type' ); ?>"><?php _e( 'Type:' ,  bedbooking_Text_Domain); ?></label> 
                <select class="widefat bedbooking-widget-type-select" id="<?php echo $this->get_field_id( 'bedbooking-widget-type' ); ?>" name="<?php echo $this->get_field_name( 'bedbooking-widget-type' ); ?>">
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'bedbooking-widget-language' ); ?>"><?php _e( 'Language:',  bedbooking_Text_Domain ); ?></label> 
                <select id="<?php echo $this->get_field_id( 'bedbooking-widget-language' ); ?>" name="<?php echo $this->get_field_name( 'bedbooking-widget-language' ); ?>" class="span6 bedbooking-language">                                                
                    <option value="en">English</option>
                    <option value="de">Deutsch</option>                
                    <option value="it">Italiano</option>
                    <option value="es">Español</option>
                    <option value="pl" selected="">Polski</option>
                </select>
            </p>
		<?php else : ?>
            <p>
                <?php _e( 'Please configure plugin first',  bedbooking_Text_Domain ); ?>
                 <a href="<?php echo admin_url('/admin.php?page=bedbooking-menu-page');?>"><?php _e( 'here',  bedbooking_Text_Domain ); ?></a>.
            </p>
        <?php endif; 
	
	}
}


