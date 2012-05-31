<!DOCTYPE html>
<html class="no-js" lang="<?php language_attributes(); ?>">
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,<?php bloginfo( 'html_type' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<title><?php wp_title(); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<?php wp_head(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
    <script type="text/javascript" src="http://use.typekit.com/ggb1aqu.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3634425-8']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head>
<body <?php body_class( 'blog' ); ?>>

	<header class="primary">
        <div class="wrap">
            <h1><a href="http://sawyerhollenshead.com">Sawyer. <span>Designer. Front-end developer.</span></a></h1>
            <nav>
                <ul>
                    <li><a href="http://sawyerhollenshead.com">Work</a></li>
                    <li<?php if(is_home()){ ?> class="current-menu-item"<?php } ?>><a href="<?php echo home_url( '/' ); ?>">Writing</a></li>
                    <li><a href="http://sawyerhollenshead.com/about">About</a></li>
                    <li class="twitter"><a href="http://twitter.com/sawyerh" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a></li>
                </ul>
            </nav>
        </div>
    </header>