<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gannett_Training
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
	<script id="parsely-cfg" src="//cdn.parsely.com/keys/training.usatodaynetwork.com/p.js"></script>

	<!-- Parsely metadata START -->
	<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "NewsArticle",
		"headline": "<?php the_title(); ?>",
		"url": "<?php the_permalink(); ?>",
		"thumbnailUrl": "<?php echo get_the_post_thumbnail_url(); ?>",
		"datePublished": "<?php echo $article_date_time; ?>",
		"creator": ["<?php echo get_the_author_meta('display_name'); ?>"],
		"section": "Training"
	}
	</script>
	<!-- Parsely metadata END -->
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'gannett-training' ); ?></a>

	<header id="masthead" class="site-header">
	<div class="logo-wrap">
		<a href="<?php echo get_home_url(); ?>" class="custom-logo-link" re;="home"><img class="custom-logo" alt="USA TODAY Network Training - Home" src="<?php echo get_theme_mod('site-logo'); ?>" /></a>
	</div>

	<div class="header-right">


	<div class='categories-menu header-section'>
		<select class="categories-dropdown">
			<option>Skills</option>
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
	<div class="training-menu-toggle">
		<div class="hamburger">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	</div>
	</header><!-- #masthead -->


	<div class="menu-expand off">
		<div class="menu-inner">
			<div class="menu-close">
				&times;
			</div>
			<div class="menu-items">
				<div class='categories-menu mobile-section'>
					<select class="categories-dropdown">
						<option>Skills</option>
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


				<div class="primary-menu">
				<?php /* Primary navigation */
		wp_nav_menu( array(
			'theme_location' => '',
			'depth'          => 2,
			'container'      => false,
			'menu_class'     => '',
		//  'walker'		 => new wp_bootstrap_navwalker()
			)
		);
		?></div>
			<div class="search-wrap">

				<div class="search-module">

			<div class="searcher">
		<?php get_search_form(); ?>
		<script type="text/javascript">
			jQuery('input[type="search"]').attr('autocomplete', 'off');
			jQuery('input[type="search"]').attr('placeholder', 'Search content');
			jQuery('.search-toggle').on('click', function() {
				jQuery('.search-module').toggleClass('hide');


			});
		</script>
	</div>
		</div>
			</div>
			</div>
		</div>
	</div>
