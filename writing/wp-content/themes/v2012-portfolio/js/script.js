var svgns = 'http://www.w3.org/2000/svg';
var defaultSVGWidth = 1248;
var defaultSVGHeight = 540;
var minWidth = 720;

jQuery.noConflict();

(function($) {

	var $body = $('body');

	if( ($body.hasClass('about') || $body.hasClass('main-home')) && $('html').hasClass('svgclippaths')){
		$(window).on('load', function(){
			setSVGHeight();
			centerInfo();
		});

		//$(window).on('throttledresize', function(event){
		$(window).on('resize', function(event){ /* performance-wise, not great. However this is the only way to get the row to resize properly across all major browsers */
			setSVGHeight();
			centerInfo();
		});
	}

	// Waypoints
	if( $body.hasClass('blog') ){
		$('.posts article').waypoint(function(event, direction){

			// Get the article in view
			var $active = $(this);

			if (direction === "up") {
				$active = $active.prev();
			}

			if (!$active.length) $active.end();

			// Toggle current list item in sidebar
			var postID = $active.data('id');
			var $li = $('.sidebar li[data-id="' + postID + '"]');
			var color = $li.data('color');

			$('.posts-widget .current').removeClass('current');
			$li.addClass('current');
			event.stopPropagation();
		},{
			offset: '50%'
		});

		$('.main').waypoint(function(event, direction){
			if (direction === "down") {
				$(this).addClass('sticky');
			} else if (direction === "up"){
				$(this).removeClass('sticky');
			}
		},{
			offset: 20
		});
	}

	// ScrollTo
	if( !$body.hasClass('single') ){
		$('.posts-widget a').on('click', function(e){
    		e.preventDefault();
    		var postID = $(this).parent().data('id');
    		var $target = $('#post-' + postID);
    		$(window).stop().scrollTo( $target, 800 );
		});
	}

})(jQuery);

/*
 * We need to set the height of the SVG row when the items inside are less than the defaultSVGHeight
 */
function setSVGHeight(){
	var row = document.getElementsByClassName('svg-row')[0]; // last svg row (since all will share same height)

	// Set the row back to its default height so we can recalculate (in case we are increasing the browser width)
	row.setAttribute('height', defaultSVGHeight);

	// Calculate new height based on height of image inside the row
	var newHeight = row.getElementsByTagNameNS(svgns, 'image')[0].getBoundingClientRect().height;

	var rows = document.getElementsByTagName('svg');

	// Set the height of each SVG row
	for (var i = rows.length - 1; i >= 0; i--) {
		rows[i].setAttribute('height', newHeight);
	};
}

function centerInfo(){

	var $ = jQuery;

	if( parseInt($(window).width()) <= 580 ){
		$('.content, .info').css({
			'marginLeft': 'auto',
			'marginTop': 'auto'
		});
		return;
	}

	// Set the container margin (currently absolute positioned and 'left: 50%')
	var contentWidth = $('.row:first > .content').width();
	$('.content').css({
		'marginLeft': '-' + contentWidth/2 + 'px',
		'left': '50%'
	});

	// Vertically center the info block
	$('.info').each(function(){
		var $this = $(this);
		var h = parseInt($this.height());

		var defaultTop = $this.attr('data-top');

		if( !defaultTop ){
			defaultTop = '50%';
		}

		$this.css({
			'marginTop': -(h/2) + 'px',
			'top': defaultTop
		});
	});
}