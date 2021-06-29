<?php
/**
 * The template for displaying the front page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gannett_Training
 */

get_header();
?>

	<main id="primary" class="site-main measure">

		<div class="home-landing" style="background-image:url('<?php echo get_theme_mod('home-background'); ?>')">
			<div class="container">
				<?php
				if( get_option( 'page_on_front' ) ) {
				  echo apply_filters( 'the_content', get_post( get_option( 'page_on_front' ) )->post_content );
				}
				?>
				<label class="skills-label"><strong>Choose a skill from the list below to get started.</strong></label>
				<div class='categories-menu fp'>
					<select class="categories-dropdown">
						<option>Select</option>
						<?php
						$categories = get_categories( array(
						'orderby' => 'name',
						'parent'  => 0
				) );

				foreach ( $categories as $category ) {
						printf( '<option value="%1$s">%2$s</option>',
								esc_url( get_category_link( $category->term_id ) ),
								esc_html( $category->name )
						);
					}
						?>

					</select>



				</div>
			</div><!-- container -->
		</div><!-- home-landing -->

		<div class="bulletin <?php esc_html_e( get_theme_mod( 'bulletin_toggle' ) ); ?>">
			<div class="bulletin-text">
				<h1><?php echo get_theme_mod('bulletin-title') ?></h1>
				<p><?php echo get_theme_mod('bulletin-body') ?></p>
				<a href="<?php echo get_theme_mod('bulletin-link-url') ?>" class="bulletin-link <?php esc_html_e( get_theme_mod( 'bulletin-link-toggle' ) ); ?>"><p><?php echo get_theme_mod('bulletin-link-text') ?></p><div class="right-arrow"></div></a>
			</div>
			<div class="bulletin-image">
				<img src="<?php echo get_theme_mod('bulletin-illo');?>" alt="">
			</div>
		</div><!-- bulletin -->


		<div id="cal-contain" class="cal-container <?php esc_html_e( get_theme_mod( 'calendar_toggle' ) ); ?>">
			<h1><?php echo get_theme_mod('calendar-header')?></h1>
			<div class="calendar-wrap">
			<iframe class="cal-embed" src="<?php //the_permalink()?>/events-list" width="100%" scrolling="no"></iframe>
			</div><!-- calendar wrap -->
		</div>

		<div class="home-latest">
			<h2><?php echo get_theme_mod('latest-header')?></h2>

			<div class="home-posts">

			<?php
						$args = array(
			'post_type'=> 'post',
			'orderby'    => 'ID',
			'post_status' => 'publish',
			'order'    => 'DESC',
			'posts_per_page' => get_theme_mod('latest-number') // this will retrive all the published posts
			);
			$result = new WP_Query( $args );
			if ( $result-> have_posts() ) : ?>

			<?php while ( $result->have_posts() ) : $result->the_post(); ?>
				<div class="post-tile">
					<a href="<?php echo get_post_permalink() ?>">
					<h3><?php the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					</a>
					<div class="post-skills">
						<div class="post-skills-label">
							<p>Skill:</p>
							<p>Level:</p>
						</div>
						<?php
						$category = get_the_category();
						$parent = get_cat_name($category[0]->category_parent);
						$category_child = get_the_category();
						$child = get_cat_name($category_child[0]->category_child);

						$taxonomy = 'category';
						// Get the term IDs assigned to post.
						$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
						// Separator between links.

						if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
					    $term_ids = implode( ',' , $post_terms );
					    $terms = wp_list_categories( array(
					        'title_li' 		 => __( ' ' ),//space to keep li but no label
					        'style'    		 => 'list',
					        'echo'     		 => false,
					        'taxonomy' 		 => $taxonomy,
					        'include'  		 => $term_ids,

					    ) );

					    // Display post categories.
					    echo  $terms;
						}
							?>
					</div>

				</div><!-- post-tile -->
			<?php endwhile; ?>

			<?php endif; wp_reset_postdata(); ?>
		</div><!--  home-posts -->
		</div>
	</main><!-- #main -->
	<script type="text/javascript">
		jQuery('.categories-menu.header-section').remove();
		jQuery('.header-right').width(25);
	</script>

	<script type="text/javascript">

	jQuery('body').append('<div class="cal-cta"><a href="#cal-contain" class="cta-text">View upcoming events</a><div class="cta-close">&times;</div></div>')

	jQuery(document).ready(function() {
			setTimeout(function(){ jQuery('.cal-cta').css({'opacity': 1, 'bottom': 20}) }, 500);
	});
	jQuery('.cta-close').on('click', function() {
		jQuery('.cal-cta').css({'opacity': 0, 'bottom': -20});
	});

	//Add smooth scrolling to cta links
				$('.cal-cta a').on('click', function(event) {

					// clicked hash link should have value
					if (this.hash !== "") {
						// Prevent default link click behavior
						event.preventDefault();

						// get hash value
						var hash = this.hash;

						// animate for smooth scroll to clicked link
						$('html, body').animate({
							scrollTop: $(hash).offset().top -150
						}, 1000, function(){
						});
					} // End if
					jQuery('.cal-cta').css({'opacity': 0, 'bottom': -20});
				});


	</script>
<?php
get_sidebar();
get_footer();
