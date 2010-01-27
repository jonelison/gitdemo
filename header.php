<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( empty($withcomments) && !is_single() ) {
?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbg-<?php bloginfo('text_direction'); ?>.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>

</style>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header" role="banner">
	<div id="headerimg">
		<div id="logo">
			<a href="<?php echo get_option('home'); ?>"><img src="http://lvasce.org/wip/wp-content/themes/default/images/logo.gif" /></a>
        </div>
        <div id="nav" class="clearfix">
        	<ul>
            	<li class="<?php if (is_category('articles') || in_category('articles') && !(is_home())) { ?>nav_current<?php } else { ?>blank<?php } ?>"><a href="<?php bloginfo('url'); ?>/category/articles" style="border-left: #61678a 1px solid;">Newsletter</a></li>
            	<li class="<?php if (is_category('events') || in_category('events')  && !(is_home(''))) { ?>nav_current<?php } else { ?>blank<?php } ?>"><a href="<?php bloginfo('url'); ?>/category/events">Events</a></li>
            	<li class="<?php if (is_page('resources') || $post->post_parent == '40') { ?>nav_current<?php } else { ?>blank<?php } ?>"><a href="<?php bloginfo('url'); ?>/resources/asce-links/">Resources</a></li>                
            	<li class="<?php if (is_category('sponsors') || in_category('sponsors')  && !(is_home(''))) { ?>nav_current<?php } else { ?>blank<?php } ?>"><a href="<?php bloginfo('url'); ?>/category/sponsors">Sponsors</a></li>                
            	<li class="<?php if (is_page('about-us') || $post->post_parent == '50'){ ?>nav_current<?php } else { ?>blank<?php } ?>"><a href="<?php bloginfo('url'); ?>/about-us">About Us</a></li>                                           
            </ul>
        </div>
	</div>
</div>

<!-- SUBNAV -->
<?php if (have_posts() && ($post->post_parent == '40' || $post->post_parent == '50' || is_page('about-us'))) : while (have_posts()) : the_post(); ?>
<div id="subnav">
    <?php
        if($post->post_parent)
            $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
        else
            $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
        if ($children) { ?>
            <ul>
                <?php echo $children; ?>
            </ul>
        <?php }
    ?>
</div>
<?php endwhile; endif; ?>
<!-- END SUBNAV -->

<!-- SUBNAV -->
<?php if (in_category('articles') && !(is_home())) { ?>
<div id="subnav">
        <ul>
	<?php wp_get_archives('type=monthly&cat=11&limit=4'); }?>
        </ul>
</div>
<!-- END SUBNAV -->
                     
                      

<div id="wrapper" class="clearfix">