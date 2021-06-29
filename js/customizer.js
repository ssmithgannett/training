/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

  //home background changes
  wp.customize( 'home-background', function ( value ) {
  value.bind( function( homeBackground ) {
    $('.home-landing').css('background-image','url("'+ homeBackground +'")' );
  });
});

//skills background changes
wp.customize( 'skills-background', function ( value ) {
value.bind( function( skillsBackground ) {
  $('.category-landing').css('background-image','url("'+ skillsBackground +'")' );
});
});

//training background changes
wp.customize( 'training-background', function ( value ) {
value.bind( function( trainingBackground ) {
  $('.post-content').css('background-image','url("'+ trainingBackground +'")' );
});
});

//about background changes
wp.customize( 'about-background', function ( value ) {
value.bind( function( aboutBackground ) {
  $('.post-content').css('background-image','url("'+ aboutBackground +'")' );
});
});

//no-results background changes
wp.customize( 'no-results-background', function ( value ) {
value.bind( function( noResultsBackground ) {
  $('.no-results').css('background-image','url("'+ noResultsBackground +'")' );
});
});

//about background changes
wp.customize( 'error-404-background', function ( value ) {
value.bind( function( error404Background ) {
  $('.error-404').css('background-image','url("'+ error404Background +'")' );
});
});

//bulletin illo changes
wp.customize( 'bulletin-illo', function ( value ) {
value.bind( function( bulletinIllo ) {
  $('.bulletin-image img').attr('src', bulletinIllo );
  console.log('this should change');
});
});

//site logo changes
wp.customize( 'site-logo', function ( value ) {
value.bind( function( siteLogo ) {
  $('img.custom-logo').attr('src', siteLogo );
  console.log('this should change');
});
});


	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );
}( jQuery ) );
