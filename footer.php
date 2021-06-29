<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gannett_Training
 */

?>

	<footer class="training-footer">
		<div class="outro">Designed by <a href="https://despace.design" target="_blank">de//space</a>. Built in Austin.</div>

	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">

	jQuery('.training-menu-toggle').on('click', function(){
		jQuery('.menu-expand').removeClass('off');
	});

	jQuery('.menu-close').on('click', function(){
		jQuery('.menu-expand').addClass('off');
	});

	jQuery('.skills-toggle').on('click',function(){
		jQuery('.categories-menu').toggleClass('open');
	});
	var headerAnimation = jQuery('body').is('.posts-page');

	if (headerAnimation == false) {
		jQuery(window).on('scroll',function(){
	 	var mainbottom = 0;
	 	var stop = 0;
	 	stop = Math.round(jQuery(window).scrollTop());

		if (stop > mainbottom) {
		  jQuery('#masthead').addClass('colorInverse');
		  jQuery('.header-line').addClass('colorInverse');
		} else {
		  jQuery('#masthead').removeClass('colorInverse');
		  jQuery('.header-line').removeClass('colorInverse');
		 }
	});

	};

	jQuery('.cat-item a').each(function() {
		var thisCat = jQuery(this).text();
		jQuery(this).attr('title', thisCat + ' posts');
	});


	var tileHeight = 0;
	jQuery('.post-tile').each(function() {
		if (jQuery(this).height() > tileHeight) {
			tileHeight = jQuery(this).height();
		}

	});

	jQuery('.post-tile').height(tileHeight);

	var videoLink = jQuery('.video-link-wrap a').attr('href');
	var videoCaptionText = jQuery('.video-link-copy').text();
	jQuery('.video-link-copy').html('<a href="'+videoLink+'" target="_blank">'+videoCaptionText+'</a>');


	var thisPage = window.location.pathname;
	var calHeight;

	if (thisPage == '/events-list/') {
		jQuery('.menu-expand').remove();
		jQuery('header#masthead.site-header').remove();
		jQuery('footer.training-footer').remove();
		jQuery('.header-line').remove();
		jQuery('body').addClass('cal');
		jQuery('.tribe-events-header').remove();
		jQuery('.tribe-events-calendar-list-nav').remove();
		jQuery('.tribe-events-calendar-list__month-separator').remove();
		calHeight = jQuery('.tribe-common-l-container.tribe-events-l-container').height() + 50;
		jQuery('.cal-embed', window.parent.document).height(calHeight);
		jQuery('a.tribe-events-c-ical__link').text('Add All to Calendar');
	} if (thisPage.substring(0,7) == '/event/') {
		console.log('!!!');
		jQuery('header#masthead.site-header').remove();
		jQuery('footer.training-footer').remove();
		jQuery('.header-line').remove();
		jQuery('body').addClass('cal');
		jQuery('.menu-expand').remove();
		jQuery('#tribe-events-header').remove();
		jQuery('.tribe-events-calendar-list-nav').remove();
		jQuery('.tribe-events-calendar-list__month-separator').remove();
		jQuery('.tribe-events-meta-group.tribe-events-meta-group-details').remove();
		calHeight = jQuery('.cal #page.site').height() + 50;


		jQuery('.cal-embed', window.parent.document).height(calHeight);
		jQuery('p.tribe-events-back a').html('<div class="backarrow"></div>All Events');
		jQuery('#tribe-events-footer').remove();
		jQuery('.tribe-events-gcal').remove();
		jQuery('a[title="Download .ics file"]').html('Add to Calendar');
	}



	jQuery('.tribe-events-calendar-list__event-date-tag-datetime').each(function(){
		var d = new Date();
		var dateTime = jQuery(this).attr('datetime');
		var day = dateTime.substring(8,10);
		d.setDate(day);
		var month = dateTime.substring(5,7);
		var monthInt = parseInt(month) -1;
		d.setMonth(monthInt);
		var dstring = d.toString();
		var dtrim = dstring.substring(0,10);
		var dayString = dtrim.substring(0,3);
		var monthString = dtrim.substring(4,7);
		var dateString = dtrim.substring(8,10);

		if (monthString == 'Jan') {
			monthString = 'Jan.';
		}
		if (monthString == 'Feb') {
			monthString = 'Feb.';
		}
		if (monthString == 'Mar') {
			monthString = 'March';
		}
		if (monthString == 'Apr') {
			monthString = 'April';
		}
		if (monthString == 'May') {
			monthString = 'May';
		}
		if (monthString == 'Jun') {
			monthString = 'June';
		}
		if (monthString == 'Jul') {
			monthString = 'July';
		}
		if (monthString == 'Aug') {
			monthString = 'Aug.';
		}
		if (monthString == 'Sep') {
			monthString = 'Sept.';
		}
		if (monthString == 'Oct') {
			monthString = 'Oct.';
		}
		if (monthString == 'Nov') {
			monthString = 'Nov.';
		}
		if (monthString == 'Dec') {
			monthString = 'Dec.';
		}

		var dayText = jQuery(this).html('<div class="day-badge">'+dayString+'</div><div class="month-day-badge">'+monthString+' '+dateString+'</div>');


	});

	jQuery('.tribe-events-calendar-list__event-date-tag.tribe-common-g-col').each(function(){
		var thisHeight = jQuery(this).parent().height();
		jQuery(this).css('min-height', thisHeight);
	});

	var windowsize = jQuery('.measure').width();

	jQuery(window).resize(function(){
		jQuery('.tribe-events-calendar-list__event-date-tag.tribe-common-g-col').each(function(){
			var thisHeight = jQuery(this).parent().height();
			jQuery(this).css('min-height', thisHeight);
		});

  	windowsize = jQuery('.measure').width();

		if (windowsize < 1077 && windowsize >= 912) {
			calHeight = calHeight + 50;
			jQuery(window.parent.document).height(calHeight);

		}
		if (windowsize < 912) {
			calHeight = calHeight + 50;
		}

	});


	var videoLink = jQuery('.video-link-wrap a').attr('href');
	var videoCaptionText = jQuery('.video-link-copy').text();
	jQuery('.video-link-copy').html('<a href="'+videoLink+'" target="_blank">'+videoCaptionText+'</a>');

	jQuery('div.tribe-events .tribe-events-view-loader').remove();

	jQuery('.menu-expand.off').css('right', jQuery('.menu-expand'*-1).width());


	// categories dropdown
		jQuery('.categories-dropdown').on('change', function(){
			window.location.href = jQuery(this).val();
		});

		//replace video block with fake button
		jQuery('.wp-block-video-link-main.video-link-wrap a').has('img').each(function() {
			jQuery(this).css('position', 'relative');

			var thisHtml = jQuery(this).html();
			jQuery(this).append('<div class="video-overlay"><img  src="<?php echo get_home_url();?>/wp-content/themes/gannett-training/assets/icons/play.svg" /></div>');
			jQuery(this).on('mouseover', function() {
				jQuery('.video-overlay img').css('opacity', '1');
			});
			jQuery(this).on('mouseout', function() {
				jQuery('.video-overlay img').css('opacity', '.5');
			});
		});

		var url = window.location.href;
		var splitArray = url.split('/');
		var lastPath = splitArray.length-2;
		lastPath = splitArray[lastPath];
		if (lastPath == 'calendar') {
			jQuery('.entry-content').addClass('static-cal-page');
		}
</script>

</body>
</html>
