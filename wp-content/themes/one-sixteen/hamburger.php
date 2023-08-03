<?php
/*
 * The inside of the hamburger menu
 */
?>

<?php
	$linksPosition = "pos-left";
	// Control which side to put the links on
	if($linksPosition == "pos-left") { $imagePosition = "pos-right"; } 
	else { $imagePosition = "pos-left"; }
?>

<?php if( have_rows('header_settings', 'option') ): ?>
	<?php while( have_rows('header_settings', 'option') ): the_row(); ?>
		<?php 
			$enableSecondary = get_sub_field('enable_secondary_menu');
			$secondaryCTA = get_sub_field('enable_secondary_cta');
		?>
	<?php endwhile; ?>
<?php endif; ?>

<div id="hamburger-links" class="<?php echo $linksPosition; ?>">
	<div id="hamburger-closer" class="mobile-only">
		<button>X Close</button>
	</div><!-- #hamburger-closer -->
	<nav id="hamburger-menu" class="primary" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'one-sixteen'); ?>">
		<div class="menu-inner">
			<?php wp_nav_menu(array(
				'theme_location' => 'menu-1',
				'depth' => 2,
			)); ?>
			<?php if($enableSecondary ) { ?>
				<?php wp_nav_menu(array(
					'theme_location' => 'secondary-menu',
					'depth' => 1,
				)); ?>
				<?php if($secondaryCTA ) { ?>
					<div id="secondary-cta">
						<a class="button style2" href="/">Order Now</a>
					</div><!-- #secondary-cta -->
				<?php } ?>
			<?php } ?>
		</div><!-- .menu-inner -->
	</nav><!-- #hamburger-menu -->	
</div><!-- #hamburger-links -->

<div id="hamburger-image" class="<?php echo $imagePosition; ?>">
	<div id="hamburger-closer">
		<button>X Close</button>
	</div><!-- #hamburger-closer -->
</div><!-- #hamburger-image -->