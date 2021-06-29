<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gannett_Training
 */

?>

<article class="post-content" style="background-image:url('<?php echo get_theme_mod('training-background')?>');" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="training-post">
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :

			$category = get_the_category();
			$parent = get_cat_name($category[0]->category_parent);
			$category_child = get_the_category();
			$child = get_cat_name($category_child[0]->category_child);
			?>
			<div class="entry-meta">
			<!--	<p><?php
				gannett_training_posted_by();?></p>
				<p>
				<?php
				gannett_training_posted_on();
				?></p>-->

				<div class="post-skills">
					<div class="post-skills-label">
						<p>Skill:</p>
						<p>Level:</p>
					</div>
					<?php


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
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gannett-training' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gannett-training' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->


	</div>

<hr>

<h1 class="more-header">More training on <?php $category = get_the_category();
$parent = get_cat_name($category[0]->category_parent);
if (!empty($parent)) {
	echo $parent;
} else {
	echo $category[0]->cat_name;
}?>:</h1>
	<div class="more-posts">
		<?php
// Default arguments
$args = array(
	'posts_per_page' => 4, // How many items to display
	'post__not_in'   => array( get_the_ID() ), // Exclude current post
	'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
);

// Check for current post category and add tax_query to the query arguments
$cats = wp_get_post_terms( get_the_ID(), 'category' );
$cats_ids = array();
foreach( $cats as $wpex_related_cat ) {
	$cats_ids[] = $wpex_related_cat->term_id;
}
if ( ! empty( $cats_ids ) ) {
	$args['category__in'] = $cats_ids;
}

// Query posts
$wpex_query = new wp_query( $args );

// Loop through posts
foreach( $wpex_query->posts as $post ) : setup_postdata( $post );

$category = get_the_category();
$parent = get_cat_name($category[0]->category_parent);
$category_child = get_the_category();
$child = get_cat_name($category_child[0]->category_child);
?>

<div class="content-box post-tile" value="<?php
 if (!empty($child)) {
	 echo $child;
 } else {
	 echo $category[0]->cat_name;
 }?>">
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

	</div><!-- content-box -->

<?php
// End loop
endforeach;

// Reset post data
wp_reset_postdata(); ?>
	</div>



<script type="text/javascript">
jQuery('.entry-meta').each(function() {
	var children = new Array();
	var boxChild = jQuery(this).find('.children li a');
	boxChild.each(function() {
		children.push(jQuery(this).text());
	});

	var childValues = '';
	for (var i = 0; i < children.length; i++) {
		childValues = childValues + children[i] + ' ';
	}
	jQuery(this).addClass(childValues);
});


jQuery('#masthead').addClass('colorInverse');
jQuery('.header-line').addClass('colorInverse');

jQuery('.posted-on').text('Posted on ' + jQuery('.entry-date.published').text());

jQuery('body').addClass('posts-page');
</script>

</article><!-- #post-<?php the_ID(); ?> -->
