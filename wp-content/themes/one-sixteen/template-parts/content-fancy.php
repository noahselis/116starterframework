<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BBBS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if (have_rows('content_blocks')) :
		while (have_rows('content_blocks')) : the_row(); ?>

			<!-- HERO BANNER -->
			<?php if (get_row_layout() == 'hero_banner') : ?>
				<section id="hero-banner">
					<div class="foreground">
						<div class="inner v-align">
							<?php $image = get_sub_field('image');
							if ($image) { ?>
								<div class="image">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</div><!-- .image -->
							<?php } ?>
							<?php $statement = get_sub_field('statement'); ?>
							<?php if ($statement) { ?>
								<div class="statement">
									<h2><?php echo $statement; ?></h2>
								</div><!-- .statement -->
							<?php } ?>
							<?php if (have_rows('links')) : ?>
								<?php while (have_rows('links')) : the_row();  ?>
									<?php $link1 = get_sub_field('link_1'); ?>
									<?php $link2 = get_sub_field('link_2'); ?>
									<?php if ($link1 || $link2) { ?>
										<div class="linkwrap">
											<?php if ($link1) :
												$link1_url = $link1['url'];
												$link1_title = $link1['title'];
												$link1_target = $link1['target'] ? $link1['target'] : '_self'; ?>
												<a class="button style1" href="<?php echo esc_url($link1_url); ?>" target="<?php echo esc_attr($link1_target); ?>">
													<?php echo esc_html($link1_title); ?>
												</a>
											<?php endif; ?>
											<?php if ($link2) :
												$link2_url = $link2['url'];
												$link2_title = $link2['title'];
												$link2_target = $link2['target'] ? $link2['target'] : '_self'; ?>
												<a class="button style1" href="<?php echo esc_url($link2_url); ?>" target="<?php echo esc_attr($link2_target); ?>">
													<?php echo esc_html($link2_title); ?>
												</a>
											<?php endif; ?>
										</div><!-- .linkwrap -->
									<?php } ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div><!-- .inner -->
					</div><!-- .foreground -->
					<div class="background">
						<?php if (get_sub_field('hero_type') == 'color') { ?>
							<div class="color-bg" style="background-color: <?php the_sub_field('background_color'); ?>;"></div>
						<?php } ?>
						<?php if (get_sub_field('hero_type') == 'image') { ?>
							<div class="image-bg" style="background-image: url('<?php the_sub_field('background_image'); ?>');"></div>
						<?php } ?>
						<?php if (get_sub_field('hero_type') == 'video') { ?>
							<div class="video-bg">
								<video class="media" data-object-fit autoplay loop muted>
									<source src="<?php the_sub_field('background_video'); ?>" type="video/mp4">
								</video>
							</div>
						<?php } ?>
					</div><!-- .background -->
				</section><!-- #hero-banner -->

				<!-- INTERNAL HEADING -->
			<?php elseif (get_row_layout() == 'internal_heading') : ?>
				<?php
				$image = get_sub_field('image');
				$imageUrl = esc_url($image['url']);
				$imageAlt = esc_attr($image['alt']);
				$link1 = get_sub_field('link_1');
				$link2 = get_sub_field('link_2');
				$textAlignment = get_sub_field('text_alignment');
				$imagePosition = get_sub_field('image_position');
				?>
				<section id="internal-heading" class="<?php echo $imagePosition; ?>">
					<div class="container gutter">
						<div class="row">
							<div class="text
					<?php if ($imagePosition == 'image-right') { ?>col-12 col-lg-6<?php } ?>
					<?php if ($imagePosition == 'image-below') { ?>col-12 <?php echo $textAlignment; ?><?php } ?>
					">
								<div class="inner">
									<h1><?php the_sub_field('title'); ?></h1>
									<p><?php the_sub_field('subtext'); ?></p>
									<?php if ($link1 || $link2) { ?>
										<div class="linkwrap">
											<?php if ($link1) :
												$link1_url = $link1['url'];
												$link1_title = $link1['title'];
												$link1_target = $link1['target'] ? $link1['target'] : '_self'; ?>
												<a class="button style1" href="<?php echo esc_url($link1_url); ?>" target="<?php echo esc_attr($link1_target); ?>">
													<?php echo esc_html($link1_title); ?>
												</a>
											<?php endif; ?>
											<?php if ($link2) :
												$link2_url = $link2['url'];
												$link2_title = $link2['title'];
												$link2_target = $link2['target'] ? $link2['target'] : '_self'; ?>
												<a class="button style2" href="<?php echo esc_url($link2_url); ?>" target="<?php echo esc_attr($link2_target); ?>">
													<?php echo esc_html($link2_title); ?>
												</a>
											<?php endif; ?>
										</div><!-- .linkwrap -->
									<?php } ?>
								</div><!-- .inner -->
							</div><!-- .text -->
							<?php if ($imagePosition != 'image-back') { ?>
								<div class="image
						<?php if ($imagePosition == 'image-right') { ?>col-12 col-lg-6<?php } ?>
						<?php if ($imagePosition == 'image-below') { ?>col-12<?php } ?>
						">
									<img class="media" data-object-fit="cover" src="<?php echo $imageUrl; ?>" alt="<?php echo $imageAlt; ?>" />
								</div><!-- .image -->
							<?php } ?>
						</div><!-- .row -->
					</div><!-- .container -->
					<?php if ($imagePosition == 'image-back') { ?>
						<div class="background" style="background-image: url('<?php echo $imageUrl; ?>');"></div>
					<?php } ?>
				</section><!-- #internal-heading -->

				<!-- BASIC INTERNAL HEADING -->
			<?php elseif (get_row_layout() == 'basic_internal_heading') : ?>
				<section id="basic-internal-heading">
					<div class="container gutter">
						<?php the_sub_field('title'); ?>
					</div><!-- .container -->
				</section><!-- #basic-internal-heading -->

				<!-- BASIC CONTENT -->
			<?php elseif (get_row_layout() == 'basic_content') : ?>
				<section id="basic-content">
					<div class="container gutter <?php the_sub_field('width'); ?>">
						<?php the_sub_field('content'); ?>
					</div><!-- .container -->
				</section><!-- #basic-content -->

				<!-- CONTENT WITH IMAGE -->
			<?php elseif (get_row_layout() == 'content_with_image') : ?>
				<?php
				$imagePosition = get_sub_field('image_position');
				?>
				<section id="content-with-image" class="<?php echo $imagePosition; ?>">
					<div class="container gutter">
						<div class="row">
							<div class="image left-side col-12 col-md-6">
								<?php $image = get_sub_field('image');
								if (!empty($image)) : ?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
							</div><!-- .image -->
							<div class="content col-12 col-md-6">
								<div class="inner <?php the_sub_field('text_alignment'); ?>">
									<?php the_sub_field('content'); ?>
									<?php $link1 = get_sub_field('link_1'); ?>
									<?php if ($link1) :
										$link1_url = $link1['url'];
										$link1_title = $link1['title'];
										$link1_target = $link1['target'] ? $link1['target'] : '_self';
									?>
										<a class="button style1" href="<?php echo esc_url($link1_url); ?>" target="<?php echo esc_attr($link1_target); ?>">
											<?php echo esc_html($link1_title); ?>
										</a>
									<?php endif; ?>
									<?php $link2 = get_sub_field('link_2'); ?>
									<?php if ($link2) :
										$link2_url = $link2['url'];
										$link2_title = $link2['title'];
										$link2_target = $link2['target'] ? $link2['target'] : '_self';
									?>
										<a class="button style2" href="<?php echo esc_url($link2_url); ?>" target="<?php echo esc_attr($link2_target); ?>">
											<?php echo esc_html($link2_title); ?>
										</a>
									<?php endif; ?>
								</div><!-- .inner -->
							</div><!-- .content -->
							<div class="image right-side col-12 col-md-6">
								<?php $image = get_sub_field('image');
								if (!empty($image)) : ?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
							</div><!-- .image -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #content-with-image -->

				<!-- CONTENT ACCORDION -->
			<?php elseif (get_row_layout() == 'content_accordion') : ?>
				<section id="content-accordion">
					<div class="container gutter extra-narrow">
						<?php if (have_rows('accordions')) :
							while (have_rows('accordions')) : the_row(); ?>
								<div class="accordion">
									<button class="accordion-link">
										<h3>
											<?php the_sub_field('title'); ?>
											<img class="arrow" aria-hidden="true" src="/wp-content/themes/one-sixteen/images/accordion-arrow.svg" />
										</h3>
									</button><!-- .accordion-link -->
									<div class="accordion-content">
										<div class="inner">
											<?php the_sub_field('content'); ?>
										</div><!-- .inner -->
									</div><!-- .accordion-content -->
								</div><!-- .accordion -->
						<?php endwhile;
						endif; ?>
					</div><!-- .container -->
				</section><!-- #content-accordion -->

				<!-- CONTENT COLUMNS -->
			<?php elseif (get_row_layout() == 'content_columns') : ?>
				<section id="content-columns">
					<div class="container">
						<?php $title = get_sub_field('title');
						if (!empty($title)) : ?>
							<h2><?php echo $title; ?></h2>
						<?php endif; ?>
						<div class="row">
							<div class="column col-12 col-lg-4">
								<div class="inner">
									<?php the_sub_field('column_1'); ?>
								</div><!-- .inner -->
							</div><!-- .column -->
							<div class="column col-12 col-lg-4">
								<div class="inner">
									<?php the_sub_field('column_2'); ?>
								</div><!-- .inner -->
							</div><!-- .column -->

							<div class="column col-12 col-lg-4">
								<div class="inner">
									<?php the_sub_field('column_3'); ?>
								</div><!-- .inner -->
							</div><!-- .column -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #content-columns -->

				<!-- EXTRA PADDING -->
			<?php elseif (get_row_layout() == 'extra_padding') : ?>
				<section id="extra-padding" style="padding-top: <?php the_sub_field('amount'); ?>px;">
				</section><!-- #extra-padding -->

				<!-- RECENT NEWS -->
			<?php elseif (get_row_layout() == 'recent_news') : ?>
				<section id="recent-news">
					<div class="container gutter">
						<h2><?php the_sub_field('title'); ?></h2>
						<div class="row">
							<?php $args = array(
								'post_type' => 'post',
								'order'   => 'DESC',
								'posts_per_page' => 3,
							);
							$query = new WP_Query($args); ?>
							<?php if ($query->have_posts()) : ?>
								<?php while ($query->have_posts()) : $query->the_post(); ?>
									<div class="news-post col-12 col-md-6 col-lg-4">
										<div class="imgwrap">
											<div class="image" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
										</div><!-- .imgwrap -->
										<div class="category">
											<?php the_category(); ?>
										</div><!-- .category -->
										<h3 class="title"><?php the_title(); ?></h3>
										<a class="postlink" href="<?php echo get_permalink(); ?>"></a>
									</div><!-- .news-post -->
								<?php endwhile; ?>
							<?php endif; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #recent-news -->

				<!-- PARALLAX SECTION -->
			<?php elseif (get_row_layout() == 'parallax_section') : ?>
				<section id="parallax-section">
					<?php if (get_sub_field('include_text')) { ?>
						<div class="text">
							<h2><?php the_sub_field('title'); ?></h2>
							<p><?php the_sub_field('text'); ?></p>
							<?php $link = get_sub_field('link');
							if ($link) :
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="button style1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php echo esc_html($link_title); ?>
								</a>
							<?php endif; ?>
						</div><!-- .text -->
					<?php } ?>
					<div class="parallax-window" data-parallax="scroll" data-speed="0.6" data-image-src="<?php the_sub_field('image'); ?>"></div>
				</section><!-- #parallax-section -->

				<!-- LARGE MEDIA SECTION -->
			<?php elseif (get_row_layout() == 'large_media_section') : ?>
				<?php
				$mediaType = get_sub_field('media_type');
				$includeText = get_sub_field('include_text');
				$textAlignment = get_sub_field('text_alignment');
				$title = get_sub_field('title');
				$text = get_sub_field('text');
				$link = get_sub_field('link');
				$image = get_sub_field('image');
				$video = get_sub_field('video');
				?>
				<section id="large-media-section">
					<?php if ($includeText) { ?>
						<div class="container gutter">
							<div class="text <?php echo $textAlignment; ?>">
								<div class="inner">
									<?php if ($title) { ?>
										<h2><?php echo $title; ?></h2>
									<?php } ?>
									<?php if ($text) { ?>
										<p><?php echo $text; ?></p>
									<?php } ?>
									<?php if ($link) :
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="button style1" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
											<?php echo esc_html($link_title); ?>
										</a>
									<?php endif; ?>
								</div><!-- .inner -->
							</div><!-- .text -->
						</div><!-- .container -->
					<?php } ?>
					<div class="container">
						<div class="media">
							<?php if ($mediaType == "image") { ?>
								<div class="image">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								</div><!-- .image -->
							<?php } ?>
							<?php if ($mediaType == "video") { ?>
								<div class="video">
									<!-- <div class="responsive"> -->
									<?php echo $video; ?>
								</div><!-- .video -->
							<?php } ?>
						</div><!-- .media -->
					</div><!-- .container -->
				</section><!-- #large-media-section -->

				<!-- ZOOM BLOCKS -->
			<?php elseif (get_row_layout() == 'zoom_blocks') : ?>
				<section id="zoom-blocks">
					<div class="container">
						<div class="row">
							<div class="text col-12 mobile-only">
								<div class="inner">
									<h2><?php the_sub_field('title'); ?></h2>
									<p><?php the_sub_field('subtext'); ?></p>
								</div><!-- .inner -->
							</div><!-- .text -->
							<div class="blocks col-12 col-lg-8">
								<div class="row">
									<div class="left-column col-12 col-md-6">
										<?php if (have_rows('blocks_left')) :
											while (have_rows('blocks_left')) : the_row(); ?>
												<a class="zoomblock" href="<?php the_sub_field('link_path'); ?>">
													<div class="slideout">
														<div class="inner">
															<h3><?php the_sub_field('title'); ?></h3>
															<p><?php the_sub_field('subtitle'); ?></p>
														</div><!-- .inner -->
													</div><!-- .slideout -->
													<div class="background" style="background-image: url('<?php the_sub_field('image'); ?>');"></div>
												</a><!-- .zoomblock -->
										<?php endwhile;
										endif; ?>
									</div><!-- .left-column -->
									<div class="right-column col-12 col-md-6">
										<?php if (have_rows('blocks_right')) :
											while (have_rows('blocks_right')) : the_row(); ?>
												<a class="zoomblock" href="<?php the_sub_field('link_path'); ?>">
													<div class="slideout">
														<div class="inner">
															<h3><?php the_sub_field('title'); ?></h3>
															<p><?php the_sub_field('subtitle'); ?></p>
														</div><!-- .inner -->
													</div><!-- .slideout -->
													<div class="background" style="background-image: url('<?php the_sub_field('image'); ?>');"></div>
												</a><!-- .zoomblock -->
										<?php endwhile;
										endif; ?>
									</div><!-- .right-column -->
								</div><!-- .row -->
							</div><!-- .blocks -->
							<div class="text col-4 desktop-only">
								<div class="inner">
									<h2><?php the_sub_field('title'); ?></h2>
									<p><?php the_sub_field('subtext'); ?></p>
								</div><!-- .inner -->
							</div><!-- .text -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #zoom-blocks -->

				<!-- LOGO GRID -->
			<?php elseif (get_row_layout() == 'logo_grid') : ?>
				<section id="logo-grid">
					<div class="container gutter">
						<div class="logos">
							<h2><?php the_sub_field('title'); ?></h2>
							<div class="row">
								<?php if (have_rows('logos')) :
									while (have_rows('logos')) : the_row(); ?>
										<div class="logo col-6 col-md-3">
											<?php $logo = get_sub_field('logo');
											if (!empty($logo)) : ?>
												<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
											<?php endif; ?>
										</div><!-- .logo -->
								<?php endwhile;
								endif; ?>
							</div><!-- .row -->
						</div><!-- .logos -->
					</div><!-- .container -->
				</section><!-- #logo-grid -->

				<!-- FEATURED LOGOS -->
			<?php elseif (get_row_layout() == 'featured_logos') : ?>
				<section id="featured-logos">
					<div class="container gutter">
						<div class="text">
							<h2><?php the_sub_field('title'); ?></h2>
							<p><?php the_sub_field('subtitle'); ?></p>
						</div><!-- .text -->
						<div class="logos">
							<div class="primary-logos">
								<div class="row">
									<?php if (have_rows('primary_logos')) :
										while (have_rows('primary_logos')) : the_row(); ?>
											<div class="logo col-6 col-md-3">
												<?php $logo = get_sub_field('logo');
												if (!empty($logo)) : ?>
													<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
												<?php endif; ?>
											</div><!-- .logo -->
									<?php endwhile;
									endif; ?>
								</div><!-- .row -->
							</div><!-- .primary-logos -->
							<div class="secondary-logos closed">
								<div class="outer equal">
									<div class="inner equal">
										<div class="row">
											<?php if (have_rows('secondary_logos')) :
												while (have_rows('secondary_logos')) : the_row(); ?>
													<div class="logo col-6 col-md-3">

														<?php $logo = get_sub_field('logo');
														if (!empty($logo)) : ?>
															<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
														<?php endif; ?>

													</div><!-- .logo -->
											<?php endwhile;
											endif; ?>
										</div><!-- .row -->
									</div><!-- .inner -->
								</div><!-- .outer -->
							</div><!-- .secondary-logos -->
						</div><!-- .logos -->
						<div class="viewlink closed">
							<button class="button style1 more">View More</button>
						</div><!-- .viewlink -->
					</div><!-- .container-fluid -->
				</section><!-- #featured-logos -->
	
				<!-- PHOTO GALLERY -->
			<?php elseif (get_row_layout() == 'photo_gallery') : ?>
				<section id="photo-gallery">
					<div class="container">
						<div class="row">
							<h2 class="col-12"><?php the_sub_field('title'); ?></h2>
							<?php if (have_rows('photos')) :
								while (have_rows('photos')) : the_row(); ?>
									<div class="column col-6 col-md-4">
										<a class="imagebox" rel="gallery" href="<?php the_sub_field('photo'); ?>">
											<div class="thumbnail" style="background-image: url('<?php the_sub_field('photo'); ?>')"></div>
										</a>
									</div><!-- .column -->
							<?php endwhile;
							endif; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #photo-gallery -->

				<!-- CONTACT FORM -->
			<?php elseif (get_row_layout() == 'contact_form') : ?>
				<?php
				$addressLine1 = get_sub_field('address_line_1');
				$addressLine2 = get_sub_field('address_line_2');
				$phone = get_sub_field('phone');
				?>
				<section id="contact-form">
					<div class="container gutter">
						<div class="row">
							<div class="text col-12 col-lg-4">
								<h1 class="title"><?php the_sub_field('title'); ?></h1>
								<h4>Address</h4>
								<p class="address">
									<span><?php echo $addressLine1; ?></span>
									<?php if ($addressLine2) { ?>
										<span><?php echo $addressLine2; ?></span>
									<?php } ?>
								</p>
								<h4>Phone</h4>
								<p class="phone">
									<span><a href="#"><?php echo $phone; ?></a></span>
								</p>
								<h4>Hours</h4>
								<p class="hours">
									<?php if (have_rows('hours')) :
										while (have_rows('hours')) : the_row(); ?>
											<span><?php the_sub_field('hours'); ?></span>
									<?php endwhile;
									endif; ?>
								</p>
							</div><!-- .text -->
							<div class="form col-12 col-lg-8">
								<?php echo do_shortcode("[gravityform id='1' title='false' description='false' ajax='true']"); ?>
							</div><!-- .form -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #contact-form -->

				<!-- NUMBER COUNTER -->
			<?php elseif (get_row_layout() == 'number_counter') : ?>
				<section id="number-counter">
					<div class="container">
						<div class="heading">
							<h2><?php the_sub_field('title'); ?></h2>
							<?php $text = get_sub_field('text');
							if (!empty($text)) : ?>
								<p><?php the_sub_field('text'); ?></p>
							<?php endif; ?>
						</div><!-- .heading -->
						<div id="counters" class="wrap">
							<?php $num_count = 0; ?>
							<?php if (have_rows('numbers')) :
								while (have_rows('numbers')) : the_row(); ?>
									<?php $prefix = get_sub_field('prefix'); ?>
									<?php $suffix = get_sub_field('suffix'); ?>
									<div class="column">
										<div class="icon">
											<?php $icon = get_sub_field('icon');
											if (!empty($icon)) : ?>
												<img aria-hidden="true" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
											<?php endif; ?>
										</div><!-- .icon -->
										<div class="number">
											<p>
												<?php if ($prefix) : ?><span class="prefix"><?php the_sub_field('prefix'); ?></span><?php endif; ?>
												<span id="num_count_<?php echo $num_count; ?>">0</span>
												<?php if ($suffix) : ?><span class="suffix"><?php the_sub_field('suffix'); ?></span><?php endif; ?>
											</p>
										</div><!-- .number -->
										<div class="text">
											<p><?php the_sub_field('text'); ?></p>
										</div><!-- .text -->
									</div><!-- .column -->
									<?php $num_count++; ?>
							<?php endwhile;
							endif; ?>
						</div><!-- #counters -->
						<script type="text/javascript">
							document.addEventListener("DOMContentLoaded", function() {
								let myElement = document.getElementById("counters");
								let numCount = 0;
								let hasEnteredViewport = false;
								// write the callback for the observer
								let enterViewport = (entries, observer) => {
									entries.forEach(entry => {
										if (entry.isIntersecting && !hasEnteredViewport) {
											setTimeout(function() {
												<?php if (have_rows('numbers')) :
													while (have_rows('numbers')) : the_row(); ?>
														<?php $num = get_sub_field('number'); ?>
														num = <?php echo $num ?>;
														numID = 'num_count_' + numCount.toString();
														var countUp = new CountUp(numID, num);
														countUp.start();
														numCount++;
												<?php endwhile;
												endif; ?>
											}, 600);
											hasEnteredViewport = true;
										}
									});
								};
								// declare a list of options to pass to the intersection observer
								const options = {
									root: null,
									rootMargin: '0px',
									threshold: 0.5,
								};
								// create an observer instance
								let observer = new IntersectionObserver(enterViewport, options);
								// target element for the observer to observe
								observer.observe(myElement);
							});
						</script>
					</div><!-- .container -->
				</section><!-- #number-counter -->

				<!-- TEAM SECTION -->
			<?php elseif (get_row_layout() == 'team_section') : ?>
				<section id="team-section">
					<div class="container">
						<div class="row">
							<h2 class="col-12"><?php the_sub_field('title'); ?></h2>
							<?php $teamMember = get_sub_field('team_members');
							if ($teamMember) : ?>
								<?php foreach ($teamMember as $sm) : ?>
									<div class="member col-12 col-sm-6 col-lg-4">
										<a class="post-link" href="<?php echo get_permalink($sm->ID); ?>">
											<div class="picture">
												<?php $picture = get_field('picture', $sm->ID); ?>
												<img src="<?php echo esc_url($picture['url']); ?>" alt="<?php echo esc_attr($picture['alt']); ?>" />
											</div><!-- .picture -->
											<h3><?php echo get_the_title($sm->ID); ?></h3>
											<p><?php the_field('job_title', $sm->ID); ?></p>
										</a><!-- .post-link -->
									</div><!-- .member  -->
								<?php endforeach; ?>
							<?php endif; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #team-section -->

				<!-- FOOTER CTA -->
			<?php elseif (get_row_layout() == 'footer_cta') : ?>
				<?php
				$link1 = get_sub_field('link_1');
				$link2 = get_sub_field('link_2');
				?>
				<section id="footer-cta" style="background-image: url('<?php the_sub_field('background'); ?>')">
					<div class="container">
						<div class="inner">
							<h2><?php the_sub_field('title'); ?></h2>
							<p><?php the_sub_field('subtext'); ?></p>
							<?php if ($link1 || $link2) { ?>
								<div class="links">
									<?php if ($link1) :
										$link1_url = $link1['url'];
										$link1_title = $link1['title'];
										$link1_target = $link1['target'] ? $link1['target'] : '_self'; ?>
										<a class="button style1" href="<?php echo esc_url($link1_url); ?>" target="<?php echo esc_attr($link1_target); ?>">
											<?php echo esc_html($link1_title); ?>
										</a>
									<?php endif; ?>
									<?php if ($link2) :
										$link2_url = $link2['url'];
										$link2_title = $link2['title'];
										$link2_target = $link2['target'] ? $link2['target'] : '_self'; ?>
										<a class="button style2" href="<?php echo esc_url($link2_url); ?>" target="<?php echo esc_attr($link2_target); ?>">
											<?php echo esc_html($link2_title); ?>
										</a>
									<?php endif; ?>
								</div><!-- .linkwrap -->
							<?php } ?>
						</div><!-- .inner -->

					</div><!-- .container -->
				</section><!-- #footer-cta -->






	<?php endif;
		endwhile;
	endif;
	?>
</article><!-- #post-## -->
