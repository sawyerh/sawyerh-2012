<?php

$functions_path = TEMPLATEPATH . '/functions/';
$widgets_path = TEMPLATEPATH . '/functions/widgets/';

add_action( 'after_setup_theme', 'shaken_setup' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override shaken_setup() in a child theme, add your own shaken_setup to your child theme's
 * functions.php file.
 *
 * @since 1.0
 */
function shaken_setup() {
	
	// Theme support
		add_theme_support( 'automatic-feed-links' );
		
		// Set featured image sizes
		add_theme_support('post-thumbnails');
			set_post_thumbnail_size(900, 1900);
	
	// Filters
		
		// Add featured images to RSS feed
		add_filter('pre_get_posts','shaken_feedFilter');
		
		// Add wmode='transparent' to auto embedded Flash videos
		add_filter('embed_oembed_html', 'add_video_wmode', 10, 3);
}

// smart jquery inclusion
function shaken_jquery(){
    if (!is_admin()) {
    	wp_enqueue_script('jquery');
    }
}
add_action( 'wp_enqueue_scripts', 'shaken_jquery' );

// enable threaded comments
function shaken_enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
	}
}

// no more jumping for read more link
function shaken_no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}

// -------------- Add featured images to RSS feed --------------
function shaken_feedContentFilter($content) {
	$thumbId = get_post_thumbnail_id();

	if($thumbId) {
		$img = wp_get_attachment_image_src($thumbId);
		$image = '<img src="'. $img[0] .'" alt="" width="'. $img[1] .'" height="'. $img[2] .'" />';
		echo $image;
	}
	
	return $content;
}

function shaken_feedFilter($query) {
	if ($query->is_feed) {
		add_filter('the_content', 'shaken_feedContentFilter');
		}
	return $query;
}

// Add wmode=transparent 
if(!function_exists('add_video_wmode')){
function add_video_wmode($html, $url, $attr) {
    if ( strpos( $html, "<embed src=" ) !== false ){ 
        return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $html); 
    } elseif ( strpos ( $html, 'feature=oembed' ) !== false ){ 
        return str_replace( 'feature=oembed', 'feature=oembed&wmode=opaque', $html ); 
    } else{ 
        return $html;
    }
}}

// Title Tag Function
function title_tag() {
	if (is_home() || is_front_page()) {
		echo bloginfo('name');
	} elseif (is_404()) {
		_e('404 Not Found','shaken');
	} elseif (is_category()) {
		_e('Category:','shaken'); wp_title('');
	} elseif (is_tag()) {
		_e('Tag:','shaken'); wp_title('');
	} elseif (is_search()) {
		_e('Search Results','shaken');
	} elseif ( is_day() || is_month() || is_year() ) {
		_e('Archives:','shaken'); wp_title('');
	} else {
		echo wp_title('');
	}
}

?>