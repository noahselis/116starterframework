<?php
/**
 * Template Name: Fancy Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package One_Sixteen
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :

			the_post();

			get_template_part( 'template-parts/content', 'fancy' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
