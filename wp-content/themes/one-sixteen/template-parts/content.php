<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package One_Sixteen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- SINGLE POST -->
	<?php if ( is_singular() ) : ?>

		<div class="container">
			<div class="row">
				<div class="backlink col-12">
					<a href="/news"><i class="fas fa-arrow-left"></i> Back to News</a>
				</div><!-- .backlink -->
			</div><!-- .row -->
		</div><!-- .container -->

		<div class="container gutter">
			<div class="row">

				<div class="column col-12">
					<div class="image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .image -->
				</div><!-- .column -->

				<div class="column col-12">
					<div class="text">
						<div class="category">
							<?php the_category(); ?>
						</div><!-- .category -->
						
						<h1 class="title"><?php the_title(); ?></h1>

						<?php the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'duke' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) ); ?>

						<?php echo do_shortcode("[addtoany]"); ?>
					</div><!-- .text -->
				</div><!-- .column -->

			</div><!-- .row -->
		</div><!-- .container -->

	<!-- ARCHIVE POST -->
	<?php else : ?>

		<div class="imgwrap">
			<div class="image" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
		</div><!-- .imgwrap -->
		
		<div class="category">
			<?php the_category(); ?>
		</div><!-- .category -->

		<h3 class="title"><?php the_title(); ?></h3>

		<a class="postlink" href="<?php echo get_permalink(); ?>"></a>

	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->



















