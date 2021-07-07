<?php

/**
 * custom functions specific to the project
 * 
 */
//examples:
//add_filter('acf/load_field', 'msk_acf_disable_field');
//add_filter('acf/load_field/name=annonce_prix_avec_commission', 'msk_acf_disable_field');
//add_filter('acf/load_field/type=password', 'msk_acf_disable_field');
//add_filter('acf/load_field/key=field_5a9af8d5250dd', 'msk_acf_disable_field');

/**
 * Add the colors into Iris
 */
/*function register_acf_custom_color_palette() {
?>
    <script type="text/javascript">
        (function( $ ) {
            acf.add_filter( 'color_picker_args', function( args, $field ){
                // add the hexadecimal codes here for the colors you want to appear as swatches
                args.palettes = ['#03827F', '#FE9E95', '#686868', ''];
                // return colors
                return args;
            });
        })(jQuery);
    </script>
    <?php
}
add_action( 'acf/input/admin_footer', 'register_acf_custom_color_palette');
*/


// Create new toolbar for ACF - should be used to limitate options for the client
// when it's relevant to keep design consistency
add_filter( 'acf/fields/wysiwyg/toolbars' , 'custom_toolbars'  );

function custom_toolbars( $toolbars )
{
	// Add a new toolbar called "Very Simple"
	// - this toolbar has only 1 row of buttons
	$toolbars['Very Basic' ] = array();
	$toolbars['Very Basic' ][1] = array(
    'bold',
    'italic',
    'underline',
    'bullist',
    'numlist',
    //'blockquote',
    'pastetext',
    'removeformat',
    'undo',
    'redo',
    'link'
  );

  $toolbars['Basic' ] = array();
	$toolbars['Basic' ][1] = array(
    'formatselect',
    'bold',
    'italic',
    'underline',
    'bullist',
    'numlist',
    //'blockquote',
    'pastetext',
    'removeformat',
    'undo',
    'redo',
    'link'
  );

	// Edit the "Full" toolbar and remove 'code'
	// - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
	if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	{
	    unset( $toolbars['Full' ][2][$key] );
	}

	// remove the 'Basic' toolbar completely
	//unset( $toolbars['Basic' ] );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}

add_filter('oembed_fetch_url','add_video_args', 10, 3);

function add_video_args($provider, $url, $args) {
    if(is_front_page()) {
        if ( strpos($provider, '//vimeo.com/') !== false ) {
            $args = array(
                'title' => 0,
                'byline' => 0,
                'portrait' => 0,
                'badge' => 0
            );
            $provider = add_query_arg( $args, $provider );
        }
    }
    return $provider;   
}

//remove inline css added by wordpress (admin bar) for user role
add_action('get_header', 
    function () {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }
);

/*
Exceptions for Flexible content modules and templates

Remove Layout based on template or custom post types, for exceptions with shared flexible content field group
disabled on backend only with no impact on front end
the key is the field key for the flex field
the priority is set exceedingly high to ensure it runs last

Indicate all exceptions here - minimize exceptions as much as possible:

layouts             Available for Template(s) only - where flexible content is available on editing screen
------              --------------------------------------------------------------------------------------

*/
//add_filter('acf/load_field/key=field_5e4b64c9dbeb4', 'remove_layouts', 99);

function remove_layouts($field) {
    if (!is_admin() || 'acf-field-group' == get_current_screen()->post_type) {
        // not on front end and not when editing the Flexible Content field itself
        return $field;
    }
  
    $layouts_to_remove = array();

    /*
    if( (get_page_template_slug()!=='yout_template_slug')            
        array_push($layouts_to_remove, 'your_flexible_content_layout');
    }
    */

    /*
    if( get_post_type()!=='your_post_type' ) {
        array_push($layouts_to_remove, 'your_flexible_content_layout');
    }
    */

    if (empty($layouts_to_remove)) {
        return $field;
    }
    
    // move current layouts into a var
    $layouts = $field['layouts'];

    // clear layouts
    $field['layouts'] = array();

    foreach ($layouts as $layout) {
        // check
        if (!in_array($layout['name'], $layouts_to_remove)) {
        // keep this layout
        array_push($field['layouts'], $layout);
        }
    }

    return $field;
} 

//deregister CF7 default stylesheet - custom one available in Frontroots
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_deregister_style( 'contact-form-7' );
}

//remove auto formatting from contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');

//define image sizes
add_action( 'after_setup_theme', function(){
    //header image - restrictions on upload
    add_image_size( 'tile', 1000, 700 );
    add_image_size( 'square', 800, 800 );
});

// Allow SVG upload in backend
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    //global $wp_version;
    /*if ( $wp_version !== '4.7.1' ) {
        return $data;
    }*/

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

// Allow SVG mime type 
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Fix SVG
function fix_svg() {
echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

//Hide WPML meta box
add_action('admin_head', 'disable_icl_metabox',99);
function disable_icl_metabox() {
    global $post;
    remove_meta_box('icl_div_config',$post->posttype,'normal');
}

//Add language item in menu (wp_nav_menu)
// drop down with flags only
//add_filter('wp_nav_menu_items', 'wpml_nav_menu_items', 10, 2);
function wpml_nav_menu_items($items, $args) {
    //add language switcher to a specific WordPress menu
   if($args->theme_location == 'primary_navigation'){
        global $sitepress_settings, $sitepress;
        $languages = $sitepress->get_ls_languages();
            if(!empty($languages)){
                foreach($languages as $code => $lang){
                	if ($lang['language_code'] != $sitepress->get_current_language()){
                    	$items .= ' <li class="menu-item menu-item-language menu-item-language-current"><a href="' . $lang['url'] . $url_parameters . '">' . $lang['code'] . '</a></li>';
					}
                }
            }
    }
return $items;
}

//Add language item in menu (wp_nav_menu)
// drop down with flags only
function language_switcher() {
    //add language switcher to a specific WordPress menu
    global $sitepress_settings, $sitepress;
    $languages = $sitepress->get_ls_languages();
    if(!empty($languages)){
        foreach($languages as $code => $lang){
            if ($lang['language_code'] != $sitepress->get_current_language()){
                $items .= ' <div class="language-switcher"><a href="' . $lang['url'] . $url_parameters . '">' . $lang['code'] . '</a></div>';
            }
        }
    }
    echo $items;
}

//@image: image object wp
//@params: [ classe,  ] //might add size one day or alt
function responsive_image( $wp_image, $params = array() ){
    $image = "";
    if( !empty( $wp_image[ 'sizes' ] ) && !empty( $wp_image[ 'sizes' ][ 'thumb_medium' ] ) ){

        $image_srcset = $wp_image[ 'sizes' ][ 'thumb_largest' ] . ' 1800w,';
        $image_srcset .= $wp_image[ 'sizes' ][ 'thumb_large' ] . ' 1024w,';
        $image_srcset .= $wp_image[ 'sizes' ][ 'thumb_medium_large' ] . ' 768w,';
        $image_srcset .= $wp_image[ 'sizes' ][ 'thumb_medium' ] . ' 480w';

        if( empty( $params[ 'alt' ] ) ){
            $params[ 'alt' ] = $wp_image[ 'title' ];
        }

        $params_string = '';
        foreach( $params as $key => $value ){
            $params_string .= ' ' . $key . '="' . $value . '"';
        }

        $image = '<img srcset="'. $image_srcset .'" src="' . $wp_image[ 'sizes' ][ 'thumb_medium' ] . '"'. $params_string .' />';
    }

    return $image;
}