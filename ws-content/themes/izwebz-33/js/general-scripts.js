function tabs_nav_sidebar(){
	var div_count = $('ul#tab-buttons li').length;
	var tabs_id = [];
	var current_tab_id = '';
	for (var i = 0; i <= div_count; i++) {
		current_tab_id = $('ul#tab-buttons li:eq('+i+') a').data('tab');
		$('div.tab-lists:eq('+i+')').attr('id', current_tab_id);
		if( i!=0 ){
			$('div.tab-lists:eq('+i+')').hide(0);
		}
	}

	$('ul#tab-buttons li:first-child a').addClass('active-tab');

	$('ul#tab-buttons li a').click(function(){
		var time = 300;
		$('.active-tab').removeClass('active-tab');
		$(this).addClass('active-tab');
		var id = $(this).data('tab');

		$('div.tab-lists').fadeOut(0);

		$('div.tab-lists#'+id).fadeIn(time);

		return false;
	})
}

function dropdown_main_nav_menu(){
	var time = 300;
	$('ul#category-menu li').hover(
		function(){$(this).find('>ul').slideDown(time)},
		function(){$(this).find('>ul').slideUp(time)}
	);

	$('#store-in-menu').hover(
		function(){$(this).find('div>ul').fadeIn(time)},
		function(){$(this).find('div>ul').fadeOut(time)}
	);
}

$(document).ready(function(){
	tabs_nav_sidebar();
	dropdown_main_nav_menu();
});


