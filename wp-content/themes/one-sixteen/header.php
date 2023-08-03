<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package One_Sixteen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('head'); ?>
<body <?php body_class(); ?>><?php wp_body_open(); ?>

<div id="page" class="site">

	<?php if( have_rows('header_settings', 'option') ): ?>
		<?php while( have_rows('header_settings', 'option') ): the_row(); ?>
			<?php 
				$bigHome = get_sub_field('big_home');
				$menuStyle = get_sub_field('menu_style');
				$enableSecondary = get_sub_field('enable_secondary_menu');
				$primaryCTA = get_sub_field('enable_primary_cta');
				$secondaryCTA = get_sub_field('enable_secondary_cta');
			?>
		<?php endwhile; ?>
	<?php endif; ?>

	<header id="masthead" class="site-header scroll-enabled <?php if($bigHome) { echo "big"; } ?>">
		<div class="container">

			<div id="site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<h1 class="hidden"><?php echo get_bloginfo('name'); ?></h1>
					<img src="/wp-content/uploads/2021/04/site-logo-placeholder.png" />
				</a>		
			</div><!-- #site-logo -->

			<div id="menu-wrapper">
				<div class="v-align">

					<div id="desktop-menu">
						<?php if($enableSecondary) { ?>
							<?php if($menuStyle == "standard") { ?>
								<nav id="secondary-menu" role="navigation" aria-label="<?php esc_attr_e('Secondary Menu', 'one-sixteen'); ?>">
									<?php wp_nav_menu(array(
										'theme_location' => 'secondary-menu',
										'depth' => 1,
									)); ?>
									<?php if($secondaryCTA ) { ?>
										<div id="secondary-cta">
											<a class="button style1" href="/">Order Now</a>
										</div><!-- #secondary-cta -->
									<?php } ?>
								</nav><!-- #primary-menu -->
							<?php } ?>
						<?php } ?>
						<?php if($menuStyle == "standard") { ?>
							<nav id="primary-menu" class="primary" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'one-sixteen'); ?>">
								<?php wp_nav_menu(array(
									'theme_location' => 'menu-1',
									'depth' => 2,
								)); ?>
							</nav><!-- #primary-menu -->
						<?php } ?>
						<?php if($primaryCTA ) { ?>
							<div id="primary-cta">
								<a class="button style1" href="/">Order Now</a>
							</div><!-- #primary-cta -->
						<?php } ?>
						<?php if($menuStyle == "hamburger") { ?>
							<div id="hamburger-opener">
								<button><i class="fas fa-bars"></i></button>
							</div><!-- #hamburger-opener -->
						<?php } ?>
					</div>

					<div id="mobile-menu">
						<div id="hamburger-opener">
							<button><i class="fas fa-bars"></i></button>
						</div><!-- #hamburger-opener -->
					</div>

				</div><!-- .v-align -->
			</div><!-- #menu-wrapper -->

		</div><!-- .container -->
	</header><!-- #masthead -->

