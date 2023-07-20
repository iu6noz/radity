<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage radity
 * @since radity 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@700&family=Inter:wght@400;500&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Burada sayfa başlığı, menüler veya diğer içerikler yer alabilir -->

<header class="site-header">
    <div class="container">
        <div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">HomePage</a>
        </div>
        <nav class="site-navigation">
            <?php
            // Add your menu code here (if you have a custom menu)
            // Example: wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
            ?>
        </nav>
    </div>
</header>

<!-- Ana içerik alanı -->
<div id="content" class="site-content article-container">
    <!-- Diğer içerikler burada yer alabilir -->
