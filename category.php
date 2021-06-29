<?php
/**
* A Simple Category Template
*/

get_header(); ?>

<section id="primary" class="site-content">
<div id="content" role="main" class="category-page">

	<?php
	// Check if there are any posts to display
	if ( have_posts() ) : ?>

	<div class="category-landing" style="background-image: url('<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url();?>');">
	<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
	<?php echo category_description( get_category_by_slug( 'category-slug' )->term_id)?>
	</div>

	<label class="level-label"><strong>Filter by level:</strong></label>
	<select class="category-filters">
		<option value="All Posts">All Levels</option>
		<option value="Beginner">Beginner</option>
		<option value="Intermediate">Intermediate</option>
		<option value="Expert">Expert</option>
	</select><!-- category-filters -->

	<div class="category-posts">
		<?php

		// The Loop
		while ( have_posts() ) : the_post();
		$category = get_the_category();
		$parent = get_cat_name($category[0]->category_parent);
		$category_child = get_the_category();
		$child = get_cat_name($category_child[0]->category_child);
		?>

		<div class="content-box post-tile">
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

		<?php endwhile;

		else: ?>
		<p>Sorry, no posts matched your criteria.</p>


		<?php endif; ?>
	</div><!-- category-posts -->
</div><!-- category-page -->
</section>

<script type="text/javascript">

	jQuery('.content-box').each(function() {
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

  jQuery('.category-filters').on('change', function() {
		var filter = jQuery(this).val();
		jQuery('.content-box').each(function(){
			var boxValues = jQuery(this).val();
			var boxValuesSplit = boxValues.split(' ');
			console.log(boxValuesSplit);

	 			if (jQuery(this).hasClass(filter)){
					jQuery(this).show();
				} else if (filter == 'All Posts') {
						jQuery(this).show();
				}	else {
						jQuery(this).hide();
				}

		})
		});
		var defaultCategoryBg = '<?php echo get_theme_mod('skills-background')?>';
	if (jQuery('.category-landing').attr('style') == ("background-image: url('');")) {
		jQuery('.category-landing').attr('style', 'background-image: url("'+defaultCategoryBg+'");');
	}
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
