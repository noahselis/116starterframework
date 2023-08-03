<div id="team-member">

	<div class="container">
		<div class="row">
			<div class="backlink col-12">
				<a href="/our-team"><i class="fas fa-arrow-left"></i> Back to Our Team</a>
			</div><!-- .backlink -->
		</div><!-- .row -->
	</div><!-- .container -->

	<div class="container gutter">
		<div class="row">

			<div class="side col-12 col-md-4 desktop">
				<div class="inner">
					<div class="picture">
						<?php $picture = get_field('picture'); ?>
				    	<img src="<?php echo esc_url($picture['url']); ?>" alt="<?php echo esc_attr($picture['alt']); ?>" />
					</div><!-- .picture -->
					<?php if( !empty( get_field('phone_number') ) ): ?>
						<div class="phone">
							<a href="tel:+<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a>
						</div><!-- .phone -->
					<?php endif; ?>
					<div class="email">
						<a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a>
					</div><!-- .email -->
				</div><!-- .inner -->
			</div><!-- .side -->

			<div class="main col-12 col-md-8">

				<div class="picture mobile">
					<?php $picture = get_field('picture'); ?>
			    	<img src="<?php echo esc_url($picture['url']); ?>" alt="<?php echo esc_attr($picture['alt']); ?>" />
				</div><!-- .picture -->

				<h1 class="name"><?php the_title(); ?></h1>
				<h2 class="job-title"><?php the_field('job_title'); ?></h2>

				<?php if( !empty( get_field('phone_number') ) ): ?>
					<div class="phone mobile">
						<a href="tel:+<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a>
					</div><!-- .phone -->
				<?php endif; ?>
				<div class="email mobile">
					<a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a>
				</div><!-- .email -->

				<div class="about">
					<?php the_field('about'); ?>
				</div><!-- .about -->
                
			</div><!-- .main -->

		</div><!-- .row -->
	</div><!-- .container -->

</div><!-- #team-member -->











