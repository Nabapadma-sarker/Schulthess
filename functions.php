<?php

 register_nav_menus( array(
'header_menu' => 'it is for header menu',
'secondary_header_menu' => 'it is for Top header menu',
)
 ); 

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
	 $args = array(
	
	'default-image' => get_template_directory_uri() . '/images/logo.png',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );
}

function process_big_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {  
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'process-big' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'process_big_wp_title', 10, 2 );
 
 
 /*extra text field*/
 class WPTT_Tax_Image{
 
    function __construct(){
 
        add_action( 'product_cat_add_form_fields', array( $this, 'add_tax_image_field' ) );
        add_action( 'product_cat_edit_form_fields', array( $this, 'edit_tax_image_field' ) );
        // saving
        add_action( 'edited_product_cat', array( $this, 'save_tax_meta' ), 10, 2 );
        add_action( 'create_product_cat', array( $this, 'save_tax_meta' ), 10, 2 );
 
 
    } // __construct
 
    /**
     * Adds extra meta fields when you are adding a new taxonomy term
     *
     * @since 1.0
     * @author WP Theme Tutorial, Curtis McHale
     * @access public
     */
    public function add_tax_image_field(){
    ?>
        <div class="form-field">
            <label for="term_meta_title">Title</label>
            <input type="text" name="term_meta_title" id="term_meta_title" value="" />
            <p class="description">Add title for the taxonomy</p>
        </div><!-- /.form-field -->
    <?php
    } // add_tax_image_field
 
    /**
     * Adds extra meta fields when you are editing a taxonomy term
     *
     * @since 1.0
     * @author WP Theme Tutorial, Curtis McHale
     * @access public
     *
     * @uses get_option()       Returns option from the DB given string
     * @uses esc_url()          Makes sure I have a safe URL
     */
    public function edit_tax_image_field( $term ){
        $term_id = $term->term_id;
        $term_meta = get_option( "product_cat_$term_id" );
        $image = $term_meta ? $term_meta : '';
    ?>
        <tr class="form-field">
            <th scope="row">
                <label for="term_meta_title">Title</label>
                <td>
                    <input type="text" name="term_meta_title" id="term_meta_title" value="<?php echo $image; ?>" />
                    <p class="description">Add title for the taxonomy</p>
                </td>
            </th>
        </tr><!-- /.form-field -->
    <?php
    } // edit_tax_image_field
 
    /**
     * Does the saving for our extra taxonomy meta field
     *
     * @since 1.0
     * @author WP Theme Tutorial, Curtis McHale
     * @access public
     *
     * @param   int     $term_id    req     The id of the term we are saving
     *
     * @uses get_option()       Gets option from the DB given string
     * @uses update_option()    Updates option given key and new value. Creates if !exist
     */
    public function save_tax_meta( $term_id ){
 
        if ( isset( $_POST['term_meta_title'] ) ) {
 
            $t_id = $term_id;
            $term_meta = array();
 
            $term_meta = isset ( $_POST['term_meta_title'] ) ?  $_POST['term_meta_title']  : '';
 
            // Save the option array.
            update_option( "product_cat_$t_id", $term_meta );
 
        } // if isset( $_POST['term_meta'] )
    } // save_tax_meta
 
} // WPTT_Tax_Image
 
$wptt_tax_image = new WPTT_Tax_Image();



function Schulthess_widgets_init() {
  register_sidebar( array(
  'name'          => 'Home left sidebar',
  'id'            => 'home_left_sidebar',
  'before_widget' => '',
  'after_widget'  => '',
  'before_title'  => '',
  'after_title'   => '',
 ) );

 register_sidebar( array(
  'name'          => 'Footer area 1',
  'id'            => 'footer_area1',
  'before_widget' => '',
  'after_widget'  => '',
  'before_title'  => '',
  'after_title'   => '',
 ) ); 
 
  register_sidebar( array(
  'name'          => 'Footer area 2',
  'id'            => 'footer_area2',
  'before_widget' => '',
  'after_widget'  => '',
  'before_title'  => '',
  'after_title'   => '',
 ) ); 
 
}
add_action( 'widgets_init', 'Schulthess_widgets_init' );

// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );


function woo_add_custom_general_fields(){
  global $woocommerce, $post;
  
  echo '<div class="options_group">';

  // Text Field
woocommerce_wp_text_input( 
	array( 
		'id'          => 'text_field1', 
		'label'       => __( 'Country', 'woocommerce' ), 
		'placeholder' => 'Swissmade',
		'desc_tip'    => 'true',
		'description' => __( 'which country it has made', 'woocommerce' ) 
	)
);


  // Text Field
woocommerce_wp_text_input( 
	array( 
		'id'          => 'text_field2', 
		'label'       => __( 'Subtitle', 'woocommerce' ), 
		'placeholder' => 'Washing 6/7 kg',
		'desc_tip'    => 'true',
		'description' => __( 'Like weight,length,wide etc', 'woocommerce' ) 
	)
);
woocommerce_wp_text_input( 
	array( 
		'id'          => 'text_field3', 
		'label'       => __( 'Title', 'woocommerce' ), 
		'placeholder' => ' Commercial model for 6 kg capacity in white',
		'desc_tip'    => 'true',
		'description' => __( 'Product description title.', 'woocommerce' ) 
	)
);
  

  
  echo '</div>';

}


// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields_save( $post_id ){
	
	// Text Field1
	$woocommerce_text_field = $_POST['text_field1'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, 'text_field1', esc_attr( $woocommerce_text_field ) );

	// Text Field2
	$woocommerce_text_field = $_POST['text_field2'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, 'text_field2', esc_attr( $woocommerce_text_field ) );

	// Text Field3
	$woocommerce_text_field = $_POST['text_field3'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, 'text_field3', esc_attr( $woocommerce_text_field ) );
}


//----------------------------------------------
//--------------add theme support for thumbnails
//----------------------------------------------
if ( function_exists( 'add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
add_image_size( 'admin-list-thumb', 80, 80, true); //admin thumbnail
//----------------------------------------------
//----------register and label gallery post type
//----------------------------------------------
$gallery_labels = array(
    'name' => _x('Slider', 'post type general name'),
    'singular_name' => _x('Slider', 'post type singular name'),
    'add_new' => _x('Add New', 'slider'),
    'add_new_item' => __("Add New Slider"),
    'edit_item' => __("Edit Slider"),
    'new_item' => __("New Slider"),
    'view_item' => __("View Slider"),
    'search_items' => __("Search Slider"),
    'not_found' =>  __('No Slider found'),
    'not_found_in_trash' => __('No sliders found in Trash'), 
	'featured_image'        => __( 'Slider image', 'slider' ),
	'set_featured_image'    => __( 'Set Slider image', 'slider'),
	'remove_featured_image' => __( 'Remove Slider image', 'slider' ),
	'use_featured_image'    => __( 'Use Slider image', 'slider' ),
        
);
$gallery_args = array(
    'labels' => $gallery_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title',  'thumbnail'),
    'menu_icon' => 'dashicons-format-gallery' //16x16 png if you want an icon
); 
register_post_type('slider', $gallery_args);

//----------------------------------------------
//------------------------create custom taxonomy
//----------------------------------------------
add_action( 'init', 'jss_create_gallery_taxonomies', 0);
 
function jss_create_gallery_taxonomies(){
    register_taxonomy(
        'phototype', 'slider', 
        array(
            'hierarchical'=> true, 
            'label' => 'Photo Types',
            'singular_label' => 'Photo Type',
            'rewrite' => true
        )
    );    
}

//----------------------------------------------
//--------------------------admin custom columns
//----------------------------------------------
//admin_init
add_action('manage_posts_custom_column', 'jss_custom_columns');
add_filter('manage_edit-gallery_columns', 'jss_add_new_gallery_columns');
 
function jss_add_new_gallery_columns( $columns ){
    $columns = array(
        'cb'                =>        '<input type="checkbox">',
        'jss_post_thumb'    =>        'Thumbnail',
        'title'                =>        'Photo Title',
        'phototype'            =>        'Photo Type',
        'author'            =>        'Author',
        'date'                =>        'Date'
        
    );
    return $columns;
}
 
function jss_custom_columns( $column ){
    global $post;
    
    switch ($column) {
        case 'jss_post_thumb' : echo the_post_thumbnail('admin-list-thumb'); break;
        case 'description' : the_excerpt(); break;
        case 'phototype' : echo get_the_term_list( $post->ID, 'phototype', '', ', ',''); break;
    }
}
 
//add thumbnail images to column
add_filter('manage_posts_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'jss_add_post_thumbnail_column', 5);
 
// Add the column
function jss_add_post_thumbnail_column($cols){
    $cols['jss_post_thumb'] = __('Thumbnail');
    return $cols;
}
 
function jss_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'jss_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in this theme';
      break;
  }
}

    add_action('do_meta_boxes', 'replace_featured_image_box');  
    function replace_featured_image_box()  
    {  
        remove_meta_box( 'postimagediv', 'slider', 'side' );  
        add_meta_box('postimagediv', __('slider Image'), 'post_thumbnail_meta_box', 'slider', 'normal', 'low');  
    }  



add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', get_template_directory_uri() . '/js/color-script.js', array( 'wp-color-picker' ), false, true );
}

// Add the Events Meta Boxes add_meta_box( $id, $title, $callback, $page, $context, $priority, $callback_args );

function Products_metaboxes() {
	add_meta_box('color_picker', 'Slider title&read more color', 'color_picker', 'slider', 'side', 'default');
}

 add_action( 'add_meta_boxes', 'Products_metaboxes' );
 
 // The Event Location Metabox

function color_picker() {
	global $post;
	
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . wp_create_nonce( 'status_nonce'.$post->ID ) . '" />';
	
	// Get the location data if its already been entered
	$location = get_post_meta($post->ID, '_location', true);
	$read_location = get_post_meta($post->ID, 'read_location', true);
	
	// Echo out the field
	echo '<p>title color</p>
        <input type="text" value="'.$location.'"  name="_location" class="my-color-field" data-default-color="#000" />
        <p>Read more color</p>
        <input type="text" value="'.$read_location.'"  name="read_location" class="my-color-field" data-default-color="#000" />';

}

// Save the Metabox Data

function wpt_save_events_meta($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], 'status_nonce'.$post_id )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	$events_meta['_location'] = $_POST['_location'];
	
	// Add values of $events_meta as custom fields
	
	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}
      		
        $events_meta['read_location'] = $_POST['read_location'];
	
	// Add values of $events_meta as custom fields
	
	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields


////////////////////////////////

function Products_reviews() {
	add_meta_box('product_review_img', 'Product sidebar', 'product_review_img', 'product', 'normal', 'low');
}

 add_action( 'add_meta_boxes', 'Products_reviews' );
 
 // The Event Location Metabox

function product_review_img($post) {

	
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . wp_create_nonce( 'status_nonce'.$post->ID ) . '" />';
	

  $field_value = get_post_meta( $post->ID, '_wp_editor_test_1', false );

  // Settings that we'll pass to wp_editor
  $args = array (
        'tinymce' => true,
        'quicktags' => true,
  );
  wp_editor( $field_value[0], '_wp_editor_test_1', $args );


}

// Save the Metabox Data

function wpt_review_save_events_meta($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], 'status_nonce'.$post_id )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	  if ( isset ( $_POST['_wp_editor_test_1'] ) ) {
    update_post_meta( $post_id, '_wp_editor_test_1', $_POST['_wp_editor_test_1'] );
  }

	// Add values of $events_meta as custom fields

}

add_action('save_post', 'wpt_review_save_events_meta', 1, 2); // save the custom fields


function slider_link_role() {
	add_meta_box('slider_link', 'Product sidebar', 'slider_link', 'slider', 'normal', 'low');
}

 add_action( 'add_meta_boxes', 'slider_link_role' );
 
 // The Event Location Metabox

function slider_link($post) {

	
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . wp_create_nonce( 'status_nonce'.$post->ID ) . '" />';
	

	// Get the location data if its already been entered
	$read_location = get_post_meta($post->ID, 'link_location', true);
	
	// Echo out the field
	echo '<input type="text" value="'.$read_location.'"  name="link_location" class="link_location" style="width: 100%;" />';


}

// Save the Metabox Data

function wpt_link_save_events_meta($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], 'status_nonce'.$post_id )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	  if ( isset ( $_POST['link_location'] ) ) {
    update_post_meta( $post_id, 'link_location', $_POST['link_location'] );
  }

	// Add values of $events_meta as custom fields

}

add_action('save_post', 'wpt_link_save_events_meta', 1, 2); // save the custom fields

//-------------------------------------------------------------------
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo $paginate_links;
    echo "</nav>";
  }

}

?>
