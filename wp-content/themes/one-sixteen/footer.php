<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package One_Sixteen
 */

?>

	<footer id="colophon" class="site-footer">

		<div class="container">
			<div class="row">

				<div class="left col-12 col-lg-4 col-xl-5">
					<h3 class="title">Sign up for our newsletter</h3>
					<?php echo do_shortcode("[gravityform id='2' title='false' description='false' ajax='true']"); ?>
				</div><!-- .left -->

				<div class="right col-12 col-lg-8 col-xl-7">
					
					<nav id="footer-menu">
						<?php wp_nav_menu(array(
							'theme_location' => 'footer-menu',
							'depth' => 1,
						)); ?>
					</nav><!-- #footer-menu -->

					<nav id="footer-social">
						<ul>
							<li><a target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
							<li><a target="_blank" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
						</ul>
					</nav><!-- #footer-social -->

				</div><!-- .right -->

				<div class="bottom col-12">
					<p>&copy; <?php echo date("Y"); ?> Very Good Client. All Rights Reserved. <a target="_blank" href="https://116andwest.com/">Website by 116 & West</a>.</p>
				</div><!-- .bottom -->

			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php get_template_part('hamburger'); ?>

<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/wp-content/themes/one-sixteen/js/jquery.colorbox-min.js" type="text/javascript"></script>
<script src="/wp-content/themes/one-sixteen/js/countUp.js" type="text/javascript"></script>
<script src="/wp-content/themes/one-sixteen/js/scrollMonitor.js" type="text/javascript"></script>
<script src="/wp-content/themes/one-sixteen/js/parallax.min.js" type="text/javascript"></script>
<script src="/wp-content/themes/one-sixteen/js/scripts.js" type="text/javascript"></script>
</body>
</html>
