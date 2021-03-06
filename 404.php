<?php get_header(); ?>

	<div class="wrapper">

		<div class="container">

			<div class="columns sixteen">

				<div class="about">
					<a class="anchor" id="about"></a>

					<div class="closed"></div>

					<?php
						$args = array (
							'pagename' => 'About Wonderland',
						);
						$delivery = new WP_Query( $args );
						if ( $delivery->have_posts() ) {
							while ( $delivery->have_posts() ) {
								$delivery->the_post();
					?>
					<div class="columns eight">
						<p><strong><?php the_title(); ?></strong></p>
						<?php the_content(); ?>
					</div>
					<div class="columns four">
						<p><strong><?php _e( 'Find Us', 'wl' ); ?></strong></p>
						<?php echo wpautop( get_post_meta( get_the_ID(), $prefix . '_wl_about_findus', true ) ); ?>
					</div>
					<div class="columns three">
						<p><strong><?php _e( 'Contact Us', 'wl' ); ?></strong></p>
						<?php echo wpautop( get_post_meta( get_the_ID(), $prefix . '_wl_about_contactus', true ) ); ?>
					</div>
					<?php
								}
							} else {
								// no posts found
							}
							// Restore original Post Data
							wp_reset_postdata();
						?>
					<div class="line-break"></div>

				</div><!--about-->

				<div class="sixteen columns section404">
					<h3>Whoops! The page you're looking for can't be found.</h3>

					<h3>See below for other pages that are just as nice.</h3>

					<div class="line-break"></div>
				</div>

				<div class="gridHolder" id="allPosts" data-masonry="">
					<?php
					$temp = $wp_query;
					$portfolio_query = null;
					$portfolio_query = new WP_Query();
					$args = array(
						'post_type' => 'portfolio',
						'tax_query' => array(
							array(
								'taxonomy' => 'type',
								'terms' => 'archive',
								'field' => 'slug',
								'operator' => 'NOT IN'
							),
						),
						'paged' => $paged
					);
					$portfolio_query->query($args);
					while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$thumbLarge = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbLarge' ); $urlLarge = $thumbLarge['0'];
					$thumbSquare = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbSquare' ); $urlSquare = $thumbSquare['0'];
					?>

					<?php global $post; $double = get_post_meta( $post->ID, '_wl_portfolio_double', true ); if( $double == 'on' ) : ?>
					<div <?php post_class('item triple');?> style="background-image:url(<?php echo $urlLarge; ?>);" itemscope itemtype="http://schema.org/Article">
					<?php else : ?>
					<div <?php post_class('item double');?> style="background-image:url(<?php echo $urlSquare; ?>);" itemscope itemtype="http://schema.org/Article">
					<?php endif; ?>
					<meta itemprop="keywords" content="<?php $keywords = get_post_meta( get_the_ID(), '_wl_seo_keywords', true ); echo $keywords; ?>" />
					<meta itemprop="description" content="<?php $description = get_post_meta( get_the_ID(), '_wl_seo_desc', true ); echo $description; ?>" />
					<meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>" />
					<meta itemprop="genre" content="<?php $taxonomy = 'type'; $queried_term = get_query_var($taxonomy); $terms = get_terms($taxonomy, 'slug='.$queried_term); if ($terms) { foreach($terms as $term) { echo $term->name . ', '; } } ?>" />
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
						<h5 itemprop="name headline"><?php the_title(); ?></h5>
						<div class="icons"></div>
					</a>
					</div>
					<?php endwhile; ?>
					<?php previous_posts_link('&laquo; Newer') ?>
					<?php next_posts_link('Older &raquo;') ?>
					<?php
					$portfolio_query = null;
					$portfolio_query = $temp;
					?>
				</div>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>