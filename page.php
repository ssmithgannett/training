<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gannett_Training
 */

get_header();


    global $post;
    $post_slug = $post->post_name;

		if ($post_slug == 'about') {
			$background_illo = get_theme_mod('about-background');
		}
		if ($post_slug == 'feedback') {
			$background_illo = get_theme_mod('feedback-background');
		}
?>


	<main id="primary" class="site-main static-page <?php echo $post_slug ?>" style="background-image: url('<?php echo $background_illo ?>')">
		<div  >



		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );



		endwhile; // End of the loop.
		?>
		</div>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
