<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package One_Sixteen
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section id="basic-internal-heading">
				<div class="container">
					<div class="title">
						<h1>News &amp; Events</h1>
					</div><!-- .title -->
				</div><!-- .container -->
			</section><!-- #basic-internal-heading -->

			<section id="news-archive">
				<div class="container">
					<div class="row">
						<div class="searchbox col-12">
							<?php echo do_shortcode("[searchandfilter fields='category' empty_search_url='/news']"); ?>
						</div><!-- .searchbox -->
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : ?>
								<div class="column col-12 col-md-6 col-lg-4">
									<?php the_post();
									get_template_part( 'template-parts/content', get_post_type() ); ?>		
								</div><!-- .column -->
							<?php endwhile; ?>
							<div class="pager col-12">
								<?php the_posts_pagination( array(
								    'mid_size' => 7,
								    'prev_text' => __( '< Prev', 'textdomain' ),
								    'next_text' => __( 'Next >', 'textdomain' ),
								) ); ?>
							</div><!-- .pager -->
						<?php else : ?>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #news-archive -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
