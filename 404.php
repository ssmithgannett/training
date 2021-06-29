<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gannett_Training
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found" style="background-image:url('<?php echo get_theme_mod('error-404-background') ?>')">
			<div>
			<header class="page-header">
				<h1 class="page-title"><?php echo get_theme_mod('error-404-header') ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<div class="container">
				<p><?php echo get_theme_mod('error-404-body') ?></p>



					<label class="skills-label"><strong>Select a skill to get started.</strong></label>
					<div class='categories-menu'>
						<select class="categories-dropdown">
							<option>--</option>
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

			</div><!-- .page-content -->
		</div>
		</section><!-- .error-404 -->
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

<?php
get_footer();
