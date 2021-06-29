<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gannett_Training
 */
 $category = get_the_category();
 $parent = get_cat_name($category[0]->category_parent);
?>

	<div class="content-box post-tile" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="fp-excerpt"><?php the_excerpt()?></div></a>
		<?php endif; ?>

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
	</div><!-- .content-box <?php the_ID(); ?> -->
