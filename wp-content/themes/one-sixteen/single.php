<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package One_Sixteen
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section id="news-single">

				<?php
				while ( have_posts() ) :

					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile; // End of the loop.
				?>

			</section><!-- #news-single -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
